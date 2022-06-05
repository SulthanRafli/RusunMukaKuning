<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tagihan extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function getAll()
    {
        $this->db->select('tagihan.*, penyewa.idPenyewa AS idPenyewa, penyewa.nama AS penyewa');
        $this->db->from('tagihan');
        $this->db->join('penyewa', 'tagihan.idPenyewa = penyewa.idPenyewa', 'left');        
        $this->db->where('tagihan.visible', 1);
        $this->db->order_by('idTagihan', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    function getAllByIdUser()
    {
        $id_user = $this->session->userdata('idUser');

        $this->db->select('tagihan.*, penyewa.idPenyewa AS idPenyewa, penyewa.nama AS penyewa');
        $this->db->from('tagihan');
        $this->db->join('penyewa', 'tagihan.idPenyewa = penyewa.idPenyewa', 'left');        
        $this->db->where('tagihan.visible', 1);
        $this->db->where('penyewa.idPenyewa', $id_user);
        $this->db->order_by('idTagihan', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    function getDetailTagihan($id)
    {
        $this->db->select('jenis_tagihan.idJenisTagihan AS idJenisTagihan, jenis_tagihan.nama AS jenisTagihan');
        $this->db->from('detail_tagihan');        
        $this->db->join('jenis_tagihan', 'detail_tagihan.idJenisTagihan = jenis_tagihan.idJenisTagihan', 'left');
        $this->db->where('detail_tagihan.visible', 1);
        $this->db->where('detail_tagihan.idTagihan', $id);
        $this->db->order_by('idDetailTagihan', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    function getById($id)
    {
        $this->db->select('tagihan.*, penyewa.idPenyewa AS idPenyewa, penyewa.nama AS penyewa');
        $this->db->from('tagihan');
        $this->db->join('penyewa', 'tagihan.idPenyewa = penyewa.idPenyewa', 'left');        
        $this->db->where('tagihan.visible', 1);
        $this->db->where('tagihan.idTagihan', $id);
        $query = $this->db->get();
        return $query->row();
    }

    function getTotalPaid($id)
    {
        $this->db->select_sum('jumlahTagihan');
        $this->db->from('tagihan');
        $this->db->where('visible', 1);
        $this->db->where('idPenyewa', $id);
        $this->db->where('status', 1);
        $query = $this->db->get();
        return $query->row();
    }

    function getTotalUnpaid($id)
    {
        $this->db->select_sum('jumlahTagihan');
        $this->db->from('tagihan');
        $this->db->where('visible', 1);
        $this->db->where('idPenyewa', $id);
        $this->db->where('status', 0);
        $query = $this->db->get();
        return $query->row();
    }

    function countTagihanUnpaid()
    {
        $id = $this->session->userdata('idUser');

        $this->db->select('COUNT(idTagihan) AS total');
        $this->db->from('tagihan');
        $this->db->where('visible', 1);
        $this->db->where('idPenyewa', $id);
        $this->db->where('status', 0);
        $query = $this->db->get();
        return $query->row();
    }

    function countTagihanPaid()
    {
        $id = $this->session->userdata('idUser');

        $this->db->select('COUNT(idTagihan) AS total');
        $this->db->from('tagihan');
        $this->db->where('visible', 1);
        $this->db->where('idPenyewa', $id);
        $this->db->where('status', 1);
        $query = $this->db->get();
        return $query->row();
    }

    function totalJumlahTagihan()
    {
        $this->db->select('SUM(jumlahTagihan) AS total');
        $this->db->from('tagihan');
        $this->db->where('visible', 1);        
        $this->db->where('status', 1);
        $query = $this->db->get();
        return $query->row();
    }

    function getTagihanJatuhTempo()
    {
        $id = $this->session->userdata('idUser');

        $this->db->select('*');
        $this->db->from('tagihan');
        $this->db->where('visible', 1);        
        $this->db->where('status', 0);
        $this->db->where('idPenyewa', $id);
        $this->db->where('tanggalBerlaku <', date("Y-m-d"));
        $query = $this->db->get();
        return $query->result();
    }

    function save()
    {
        $this->db->trans_begin();

        $tempJenisTagihan = $this->input->post('jenis_tagihan');
        $jumlah           = count($tempJenisTagihan);        

        $data['idPenyewa']      = $this->input->post('penyewa');        
        $data['jumlahTagihan']  = $this->input->post('jumlah_tagihan');   
        $data['tanggalBerlaku'] = $this->input->post('tanggal_berlaku');        

        $this->db->insert('tagihan', $data);        

        $idTagihan     = $this->db->insert_id();
        $batch_array   = array();

		for ($i = 0; $i < $jumlah; $i++) {			
			$sub_data['idTagihan']	  = $idTagihan;
			$sub_data['idJenisTagihan'] = $tempJenisTagihan[$i]; 			
			$batch_array[] = $sub_data;
		}

		$this->db->insert_batch('detail_tagihan', $batch_array);    

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        } else {
            $this->db->trans_commit();
            return TRUE;
        }
    }

    function update($id)
    {
        $this->db->trans_begin();

        $tempJenisTagihan = $this->input->post('jenis_tagihan');
        $jumlah             = count($tempJenisTagihan);   

        $data['idPenyewa']      = $this->input->post('penyewa');        
        $data['jumlahTagihan']  = $this->input->post('jumlah_tagihan');   
        $data['tanggalBerlaku'] = $this->input->post('tanggal_berlaku');          

        $this->db->where('idTagihan', $id);
        $this->db->update('tagihan', $data);

        $this->db->where('idTagihan', $id);
		$this->db->delete('detail_tagihan');

        $batch_array    = array();

		for ($i = 0; $i < $jumlah; $i++) {			
			$sub_data['idTagihan']	  = $id;
			$sub_data['idJenisTagihan'] = $tempJenisTagihan[$i]; 			
			$batch_array[] = $sub_data;
		}

		$this->db->insert_batch('detail_tagihan', $batch_array);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        } else {
            $this->db->trans_commit();
            return TRUE;
        }
    }

    function updateTagihan($id, $image)
    {
        $this->db->trans_begin(); 

        $data['status']     = 1;        
        $data['image']      = $image;           

        $this->db->where('idTagihan', $id);
        $this->db->update('tagihan', $data);

        $dataLog['idPenyewa']      = $this->session->userdata('idUser');
        $dataLog['type']           = 5;
        $dataLog['keterangan']     = "Anda berhasil mengupload bukti transfer";
        $dataLog['tanggal']        = date("Y-m-d");

        $this->db->insert('log_aktivitas', $dataLog);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        } else {
            $this->db->trans_commit();
            return TRUE;
        }
    }

    function delete($id)
    {
        $this->db->trans_begin();

        $data['visible'] = 0;

        $this->db->where('idTagihan', $id);
        $this->db->update('tagihan', $data);

        $this->db->where('idTagihan', $id);
		$this->db->update('detail_tagihan', $data);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        } else {
            $this->db->trans_commit();
            return TRUE;
        }
    }

    function deny($id)
    {
        $this->db->trans_begin();

        $data['status'] = 3;

        $this->db->where('idTagihan', $id);
        $this->db->update('tagihan', $data);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        } else {
            $this->db->trans_commit();
            return TRUE;
        }
    }

    function verify($id)
    {
        $this->db->trans_begin();

        $data['status'] = 2;

        $this->db->where('idTagihan', $id);
        $this->db->update('tagihan', $data);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        } else {
            $this->db->trans_commit();
            return TRUE;
        }
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_maintenance extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function getAll()
    {
        $this->db->select('maintenance.*, penyewa.idPenyewa AS idPenyewa, penyewa.nama AS penyewa');
        $this->db->from('maintenance');
        $this->db->join('penyewa', 'maintenance.idPenyewa = penyewa.idPenyewa', 'left');
        $this->db->where('maintenance.visible', 1);
        $this->db->order_by('idMaintenance', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    function getAllByIdUser()
    {
        $id_user = $this->session->userdata('idUser');

        $this->db->select('maintenance.*, penyewa.idPenyewa AS idPenyewa, penyewa.nama AS penyewa');
        $this->db->from('maintenance');
        $this->db->join('penyewa', 'maintenance.idPenyewa = penyewa.idPenyewa', 'left');
        $this->db->where('maintenance.visible', 1);
        $this->db->where('penyewa.idPenyewa', $id_user);
        $this->db->order_by('idMaintenance', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    function getDetailMaintenance($id)
    {
        $this->db->select('jenis_kerusakan.idJenisKerusakan AS idJenisKerusakan, jenis_kerusakan.nama AS jenisKerusakan');
        $this->db->from('detail_maintenance');
        $this->db->join('jenis_kerusakan', 'detail_maintenance.idJenisKerusakan = jenis_kerusakan.idJenisKerusakan', 'left');
        $this->db->where('detail_maintenance.visible', 1);
        $this->db->where('detail_maintenance.idMaintenance', $id);
        $this->db->order_by('idDetailMaintenance', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    function getById($id)
    {
        $this->db->select('maintenance.*, penyewa.idPenyewa AS idPenyewa, penyewa.nama AS penyewa');
        $this->db->from('maintenance');
        $this->db->join('penyewa', 'maintenance.idPenyewa = penyewa.idPenyewa', 'left');
        $this->db->where('maintenance.visible', 1);
        $this->db->where('maintenance.idMaintenance', $id);
        $query = $this->db->get();
        return $query->row();
    }

    function countMaintenancePenyewa()
    {
        $id_user = $this->session->userdata('idUser');

        $this->db->select('COUNT(idMaintenance) AS total');
        $this->db->from('maintenance');
        $this->db->join('penyewa', 'maintenance.idPenyewa = penyewa.idPenyewa', 'left');
        $this->db->where('maintenance.visible', 1);
        $this->db->where('penyewa.idPenyewa', $id_user);
        $query = $this->db->get();
        return $query->row();
    }

    function countMaintenanceUnverified()
    {
        $this->db->select('COUNT(idMaintenance) AS total');
        $this->db->from('maintenance');
        $this->db->where('maintenance.visible', 1);
        $this->db->where('maintenance.status', 0);
        $query = $this->db->get();
        return $query->row();
    }

    function countMaintenanceVerified()
    {
        $this->db->select('COUNT(idMaintenance) AS total');
        $this->db->from('maintenance');
        $this->db->where('maintenance.visible', 1);
        $this->db->where('maintenance.status', 1);
        $query = $this->db->get();
        return $query->row();
    }

    function countMaintenance()
    {
        $this->db->select('COUNT(idMaintenance) AS total');
        $this->db->from('maintenance');
        $this->db->where('maintenance.visible', 1);
        $query = $this->db->get();
        return $query->row();
    }

    function save()
    {
        $this->db->trans_begin();

        $tempJenisKerusakan = $this->input->post('jenis_kerusakan');
        $jumlah             = count($tempJenisKerusakan);

        $data['idPenyewa']          = $this->input->post('penyewa');
        $data['lokasi']             = $this->input->post('lokasi');
        $data['detail']             = $this->input->post('detail');
        $data['keterangan']         = $this->input->post('keterangan');

        $this->db->insert('maintenance', $data);

        $idMaintenance  = $this->db->insert_id();
        $batch_array    = array();

        for ($i = 0; $i < $jumlah; $i++) {
            $sub_data['idMaintenance']      = $idMaintenance;
            $sub_data['idJenisKerusakan'] = $tempJenisKerusakan[$i];
            $batch_array[] = $sub_data;
        }

        $this->db->insert_batch('detail_maintenance', $batch_array);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        } else {
            $this->db->trans_commit();
            return TRUE;
        }
    }

    function savePenyewa()
    {
        $this->db->trans_begin();

        $tempJenisKerusakan = $this->input->post('jenis_kerusakan');
        $jumlah             = count($tempJenisKerusakan);

        $data['idPenyewa']          = $this->session->userdata('idUser');
        $data['lokasi']             = $this->input->post('lokasi');
        $data['detail']             = $this->input->post('detail');

        $this->db->insert('maintenance', $data);

        $idMaintenance  = $this->db->insert_id();
        $batch_array    = array();

        for ($i = 0; $i < $jumlah; $i++) {
            $sub_data['idMaintenance']      = $idMaintenance;
            $sub_data['idJenisKerusakan'] = $tempJenisKerusakan[$i];
            $batch_array[] = $sub_data;
        }

        $this->db->insert_batch('detail_maintenance', $batch_array);

        $dataLog['idPenyewa']      = $this->session->userdata('idUser');
        $dataLog['type']           = 3;
        $dataLog['keterangan']     = "Anda berhasil menambah data maintenance";
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

    function update($id)
    {
        $this->db->trans_begin();

        $tempJenisKerusakan = $this->input->post('jenis_kerusakan');
        $jumlah             = count($tempJenisKerusakan);

        $data['idPenyewa']          = $this->input->post('penyewa');
        $data['lokasi']             = $this->input->post('lokasi');
        $data['detail']             = $this->input->post('detail');
        $data['keterangan']         = $this->input->post('keterangan');

        $this->db->where('idMaintenance', $id);
        $this->db->update('maintenance', $data);

        $this->db->where('idMaintenance', $id);
        $this->db->delete('detail_maintenance');

        $batch_array    = array();

        for ($i = 0; $i < $jumlah; $i++) {
            $sub_data['idMaintenance']      = $id;
            $sub_data['idJenisKerusakan'] = $tempJenisKerusakan[$i];
            $batch_array[] = $sub_data;
        }

        $this->db->insert_batch('detail_maintenance', $batch_array);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        } else {
            $this->db->trans_commit();
            return TRUE;
        }
    }

    function updatePenyewa($id)
    {
        $this->db->trans_begin();

        $tempJenisKerusakan = $this->input->post('jenis_kerusakan');
        $jumlah             = count($tempJenisKerusakan);

        $data['idPenyewa']          = $this->session->userdata('idUser');
        $data['lokasi']             = $this->input->post('lokasi');
        $data['detail']             = $this->input->post('detail');

        $this->db->where('idMaintenance', $id);
        $this->db->update('maintenance', $data);

        $this->db->where('idMaintenance', $id);
        $this->db->delete('detail_maintenance');

        $batch_array    = array();

        for ($i = 0; $i < $jumlah; $i++) {
            $sub_data['idMaintenance']      = $id;
            $sub_data['idJenisKerusakan'] = $tempJenisKerusakan[$i];
            $batch_array[] = $sub_data;
        }

        $this->db->insert_batch('detail_maintenance', $batch_array);

        $dataLog['idPenyewa']      = $this->session->userdata('idUser');
        $dataLog['type']           = 4;
        $dataLog['keterangan']     = "Anda berhasil mengubah data maintenance";
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

    function updateMaintenance($id)
    {
        $this->db->trans_begin();

        $idPenyewa              = $this->input->post('idPenyewa');
        $data['keterangan']     = $this->input->post('keterangan');
        $data['status']         = 1;

        $this->db->where('idMaintenance', $id);
        $this->db->update('maintenance', $data);

        $dataLog['idPenyewa']      = $idPenyewa;
        $dataLog['type']           = 6;
        $dataLog['keterangan']     = "Teknisi memverifikasi maintenance anda";
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

        $this->db->where('idMaintenance', $id);
        $this->db->update('maintenance', $data);

        $this->db->where('idMaintenance', $id);
        $this->db->update('detail_maintenance', $data);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        } else {
            $this->db->trans_commit();
            return TRUE;
        }
    }
}

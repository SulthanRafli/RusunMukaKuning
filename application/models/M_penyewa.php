<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_penyewa extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function getAll()
    {
        $this->db->select('*');
        $this->db->from('penyewa');
        $this->db->where('visible', 1);
        $this->db->order_by('idPenyewa', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    function searchPenyewa()
    {
        $search = $this->input->post('search');
        $this->db->select('*');
        $this->db->from('penyewa');
        $this->db->where('visible', 1);
        $this->db->like('nama', $search, 'both');
        $this->db->order_by('idPenyewa', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    function countPenyewa()
    {
        $this->db->select('COUNT(idPenyewa) AS total');
        $this->db->from('penyewa');
        $this->db->where('visible', 1);        
        $query = $this->db->get();
        return $query->row();
    }

    function getById($id)
    {
        $this->db->select('*');
        $this->db->from('penyewa');
        $this->db->where('visible', 1);
        $this->db->where('idPenyewa', $id);
        $query = $this->db->get();
        return $query->row();
    }

    function save()
    {
        $this->db->trans_begin();

        $data['nama']               = $this->input->post('nama');
        $data['noKtp']              = $this->input->post('no_ktp');
        $data['noTelepon']          = $this->input->post('no_telp');
        $data['noUnit']             = $this->input->post('no_unit');
        $data['noMeteranListrik']   = $this->input->post('no_meteran_listrik');
        $data['noMeteranAir']       = $this->input->post('no_meteran_air');
        $this->db->insert('penyewa', $data);

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

        $data['nama']               = $this->input->post('nama');
        $data['noKtp']              = $this->input->post('no_ktp');
        $data['noTelepon']          = $this->input->post('no_telp');
        $data['noUnit']             = $this->input->post('no_unit');
        $data['noMeteranListrik']   = $this->input->post('no_meteran_listrik');
        $data['noMeteranAir']       = $this->input->post('no_meteran_air');

        $this->db->where('idPenyewa', $id);
        $this->db->update('penyewa', $data);

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

        $this->db->where('idPenyewa', $id);
        $this->db->update('penyewa', $data);

        $data['visible'] = 0;

        $this->db->where('idUser', $id);
        $this->db->where('kategoriLogin', 2);
        $this->db->update('login', $data);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        } else {
            $this->db->trans_commit();
            return TRUE;
        }
    }
}

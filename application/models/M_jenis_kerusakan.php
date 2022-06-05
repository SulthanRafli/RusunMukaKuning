<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_jenis_kerusakan extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function getAll()
    {
        $this->db->select('*');
        $this->db->from('jenis_kerusakan');
        $this->db->where('visible', 1);
        $this->db->order_by('idJenisKerusakan', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    function getById($id)
    {
        $this->db->select('*');
        $this->db->from('jenis_kerusakan');
        $this->db->where('visible', 1);
        $this->db->where('idJenisKerusakan', $id);
        $query = $this->db->get();
        return $query->row();
    }

    function save()
    {
        $this->db->trans_begin();

        $data['nama']               = $this->input->post('nama');

        $this->db->insert('jenis_kerusakan', $data);

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

        $this->db->where('idJenisKerusakan', $id);
        $this->db->update('jenis_kerusakan', $data);

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

        $this->db->where('idJenisKerusakan', $id);
        $this->db->update('jenis_kerusakan', $data);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        } else {
            $this->db->trans_commit();
            return TRUE;
        }
    }
}

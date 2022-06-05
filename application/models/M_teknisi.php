<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_teknisi extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function getAll()
    {
        $this->db->select('*');
        $this->db->from('teknisi');
        $this->db->where('visible', 1);
        $this->db->order_by('idTeknisi', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    function getById($id)
    {
        $this->db->select('*');
        $this->db->from('teknisi');
        $this->db->where('visible', 1);
        $this->db->where('idTeknisi', $id);
        $query = $this->db->get();
        return $query->row();
    }

    function countTeknisi()
    {
        $this->db->select('COUNT(idTeknisi) AS total');
        $this->db->from('teknisi');
        $this->db->where('visible', 1);        
        $query = $this->db->get();
        return $query->row();
    }

    function save()
    {
        $this->db->trans_begin();

        $data['nama']               = $this->input->post('nama');

        $this->db->insert('teknisi', $data);

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

        $this->db->where('idTeknisi', $id);
        $this->db->update('teknisi', $data);

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

        $this->db->where('idTeknisi', $id);
        $this->db->update('teknisi', $data);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        } else {
            $this->db->trans_commit();
            return TRUE;
        }
    }
}

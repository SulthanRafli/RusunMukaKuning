<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_jenis_tagihan extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function getAll()
    {
        $this->db->select('*');
        $this->db->from('jenis_tagihan');
        $this->db->where('visible', 1);
        $this->db->order_by('idJenisTagihan', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    function getById($id)
    {
        $this->db->select('*');
        $this->db->from('jenis_tagihan');
        $this->db->where('visible', 1);
        $this->db->where('idJenisTagihan', $id);
        $query = $this->db->get();
        return $query->row();
    }

    function getByIdMultiple()
    {
        $id = $this->input->post('id_jenis_tagihan');
        $this->db->select('*');
        $this->db->from('jenis_tagihan');
        $this->db->where('visible', 1);
        $this->db->where_in('idJenisTagihan', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function save()
    {
        $this->db->trans_begin();

        $data['nama']    = $this->input->post('nama');
        $data['harga']   = $this->input->post('harga');

        $this->db->insert('jenis_tagihan', $data);

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

        $data['nama']   = $this->input->post('nama');
        $data['harga']  = $this->input->post('harga');

        $this->db->where('idJenisTagihan', $id);
        $this->db->update('jenis_tagihan', $data);

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

        $this->db->where('idJenisTagihan', $id);
        $this->db->update('jenis_tagihan', $data);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        } else {
            $this->db->trans_commit();
            return TRUE;
        }
    }
}

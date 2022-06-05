<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_log_aktivitas extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function getByIdUser($id)
    {
        $this->db->select('*');
        $this->db->from('log_aktivitas');
        $this->db->where('visible', 1);
        $this->db->where('idPenyewa', $id);
        $this->db->order_by('idLogAktivitas', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
}

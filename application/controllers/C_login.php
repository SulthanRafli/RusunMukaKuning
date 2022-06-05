<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('M_login');
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function cek_login()
    {
        $result     = $this->M_login->checkUsernamePassword();
        if ($result) {
            $data = [
                'nama' => $result->nama,
                'photoProfile' => $result->image,
                'idUser' => $result->idUser,
                'idLogin' => $result->idLogin,
                'kategoriLogin' => $result->kategoriLogin,
                'status' => true
            ];
            $this->session->set_userdata($data);
            echo json_encode(array(
                'status' => true,
                'kategori' => $result->kategoriLogin,
            ));
            return;
        } else {
            echo json_encode(array(
                'status' => false,
            ));
            return;
        }
    }

    public function logout()
    {
        session_destroy();
        redirect(base_url());
    }
}

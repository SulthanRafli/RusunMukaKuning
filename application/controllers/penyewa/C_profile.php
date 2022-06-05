<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_profile extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('M_penyewa');
        $this->load->model('M_tagihan');
        $this->load->model('M_login');
        $this->load->model('M_log_aktivitas');
    }

    public function index()
    {
        $id                     = $this->session->userdata('idUser');
        $data['page']           = "penyewa/view_profile";
        $data['classAktif']     = "profile";
        $data['data_penyewa']   = $this->M_penyewa->getById($id);
        $data['total_paid']     = $this->M_tagihan->getTotalPaid($id);
        $data['total_unpaid']   = $this->M_tagihan->getTotalUnpaid($id);
        $list_log               = $this->M_log_aktivitas->getByIdUser($id);

        $tanggalIndex = array();
        foreach ($list_log as $subarray) {
            if (!isset($tanggalIndex[$subarray->tanggal]))
                $tanggalIndex[$subarray->tanggal] = array('tanggal' => date('d F Y', strtotime($subarray->tanggal)), 'value' => array());
            $sub_table                  = new stdClass();
            $sub_table->keterangan      = $subarray->keterangan;
            $sub_table->type            = $subarray->type;
            $sub_table->waktu           = date("H:i", strtotime($subarray->dateMake));
            $tanggalIndex[$subarray->tanggal]['value'][] = $sub_table;
        }
        $data['list_log']       = array_values($tanggalIndex);

        $this->load->view('template/index', $data);
    }

    function check_password()
    {
        $check = $this->M_login->checkPassword();
        if ($check) {
            $status     = true;
            echo json_encode(array(
                'status' => $status,
            ));
        } else {
            $status     = false;
            echo json_encode(array(
                'status' => $status,
            ));
        }
    }

    public function update($id)
    {
        $result     = $this->M_login->updatePassword($id);
        $status     = $result;

        echo json_encode(array(
            'status' => $status,
        ));
        return;
    }

    public function update_profile()
    {
        $image      = $_FILES['file']['name'];
        $id         = $this->session->userdata('idLogin');
        $data_login = $this->M_login->getById($id);

        if ($image) {
            $config['upload_path']          = './assets/images/profile_picture/';
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['max_size']             = 2048;
        }
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
            $old_image  = $data_login->image;
            if ($old_image != 'default.png' || $old_image != 'admin.png') {
                unlink(FCPATH . 'assets/images/profile_picture/' . $old_image);
            }
            $new_image  = $this->upload->data('file_name');
            $this->session->set_userdata('photoProfile', $new_image);
            $result     = $this->M_login->updateProfile($id, $new_image);
            $status     = $result;

            echo json_encode(array(
                'status' => $status,
            ));
            return;
        } else {
            $status     = false;
            echo json_encode(array(
                'status' => $status,
            ));
            return;
        }
    }
}

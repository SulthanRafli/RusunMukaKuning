<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('M_login');
        $this->load->model('M_penyewa');
        $this->load->model('M_teknisi');
    }

    public function index()
    {
        $data['page']          = "admin/list_login";
        $data['classAktif']    = "login";
        $data['list_login']    = $this->M_login->getAll();

        $this->load->view('template/index', $data);
    }

    public function add()
    {
        $data['page']        = "admin/add_login";
        $data['classAktif']  = "login";

        $this->load->view('template/index', $data);
    }

    public function save()
    {
        $check      = $this->M_login->checkAlreadyExist();
        if ($check) {
            $status     = 203;
            echo json_encode(array(
                'status' => $status,
            ));
            return;
        } else {
            $checkUsername  = $this->M_login->checkUsernameExist();
            if ($checkUsername) {
                $status     = 204;
                echo json_encode(array(
                    'status' => $status,
                ));
                return;
            } else {
                $result         = $this->M_login->save();
                $status         = $result;

                echo json_encode(array(
                    'status' => $status,
                ));
                return;
            }
        }
    }

    public function view($id)
    {
        $data['page']           = "admin/view_login";
        $data['classAktif']     = "login";
        $data['data_login']     = $this->M_login->getById($id);

        $this->load->view('template/index', $data);
    }

    public function edit($id)
    {
        $data['page']           = "admin/edit_login";
        $data['classAktif']     = "login";
        $data['data_login']     = $this->M_login->getById($id);

        $this->load->view('template/index', $data);
    }

    public function update($id)
    {
        $result     = $this->M_login->update($id);
        $status     = $result;

        echo json_encode(array(
            'status' => $status,
        ));
        return;
    }

    public function delete($id)
    {
        $result     = $this->M_login->delete($id);
        $status     = $result;

        echo json_encode(array(
            'status' => $status,
        ));
        return;
    }

    function get_penyewa()
    {
        $penyewa = $this->M_penyewa->getAll();
        echo json_encode($penyewa);
    }

    function get_teknisi()
    {
        $teknisi = $this->M_teknisi->getAll();
        echo json_encode($teknisi);
    }
}

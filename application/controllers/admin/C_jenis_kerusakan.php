<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_jenis_kerusakan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('M_jenis_kerusakan');
    }

    public function index()
    {
        $data['page']                   = "admin/list_jenis_kerusakan";
        $data['classAktif']             = "jenis_kerusakan";
        $data['list_jenis_kerusakan']   = $this->M_jenis_kerusakan->getAll();        

        $this->load->view('template/index', $data);
    }

    public function add()
    {
        $data['page']        = "admin/add_jenis_kerusakan";
        $data['classAktif']  = "jenis_kerusakan";        

        $this->load->view('template/index', $data);
    }

    public function save()
    {
        $result     = $this->M_jenis_kerusakan->save();
        $status     = $result;

        echo json_encode(array(
            'status' => $status,
        ));
        return;
    }


    public function view($id)
    {
        $data['page']                   = "admin/view_jenis_kerusakan";
        $data['classAktif']             = "jenis_kerusakan";
        $data['data_jenis_kerusakan']   = $this->M_jenis_kerusakan->getById($id);        

        $this->load->view('template/index', $data);
    }

    public function edit($id)
    {
        $data['page']                   = "admin/edit_jenis_kerusakan";
        $data['classAktif']             = "jenis_kerusakan";
        $data['data_jenis_kerusakan']   = $this->M_jenis_kerusakan->getById($id);        

        $this->load->view('template/index', $data);
    }

    public function update($id)
    {
        $result     = $this->M_jenis_kerusakan->update($id);
        $status     = $result;

        echo json_encode(array(
            'status' => $status,
        ));
        return;
    }

    public function delete($id)
    {
        $result     = $this->M_jenis_kerusakan->delete($id);
        $status     = $result;

        echo json_encode(array(
            'status' => $status,
        ));
        return;
    }
}

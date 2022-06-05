<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_teknisi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('M_teknisi');
    }

    public function index()
    {
        $data['page']           = "admin/list_teknisi";
        $data['classAktif']     = "teknisi";
        $data['list_teknisi']   = $this->M_teknisi->getAll();        

        $this->load->view('template/index', $data);
    }

    public function add()
    {
        $data['page']        = "admin/add_teknisi";
        $data['classAktif']  = "teknisi";        

        $this->load->view('template/index', $data);
    }

    public function save()
    {
        $result     = $this->M_teknisi->save();
        $status     = $result;

        echo json_encode(array(
            'status' => $status,
        ));
        return;
    }

    public function view($id)
    {
        $data['page']           = "admin/view_teknisi";
        $data['classAktif']     = "teknisi";
        $data['data_teknisi']   = $this->M_teknisi->getById($id);        

        $this->load->view('template/index', $data);
    }

    public function edit($id)
    {
        $data['page']           = "admin/edit_teknisi";
        $data['classAktif']     = "teknisi";
        $data['data_teknisi']   = $this->M_teknisi->getById($id);        

        $this->load->view('template/index', $data);
    }

    public function update($id)
    {
        $result     = $this->M_teknisi->update($id);
        $status     = $result;

        echo json_encode(array(
            'status' => $status,
        ));
        return;
    }

    public function delete($id)
    {
        $result     = $this->M_teknisi->delete($id);
        $status     = $result;

        echo json_encode(array(
            'status' => $status,
        ));
        return;
    }
}

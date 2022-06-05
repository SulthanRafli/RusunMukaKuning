<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_jenis_tagihan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('M_jenis_tagihan');
    }

    public function index()
    {
        $data['page']               = "admin/list_jenis_tagihan";
        $data['classAktif']         = "jenis_tagihan";
        $data['list_jenis_tagihan'] = $this->M_jenis_tagihan->getAll();        

        $this->load->view('template/index', $data);
    }

    public function add()
    {
        $data['page']        = "admin/add_jenis_tagihan";
        $data['classAktif']  = "jenis_tagihan";

        $this->load->view('template/index', $data);
    }

    public function save()
    {
        $result     = $this->M_jenis_tagihan->save();
        $status     = $result;

        echo json_encode(array(
            'status' => $status,
        ));
        return;
    }

    public function view($id)
    {
        $data['page']               = "admin/view_jenis_tagihan";
        $data['classAktif']         = "jenis_tagihan";
        $data['data_jenis_tagihan'] = $this->M_jenis_tagihan->getById($id);        

        $this->load->view('template/index', $data);
    }

    public function edit($id)
    {
        $data['page']               = "admin/edit_jenis_tagihan";
        $data['classAktif']         = "jenis_tagihan";
        $data['data_jenis_tagihan'] = $this->M_jenis_tagihan->getById($id);        

        $this->load->view('template/index', $data);
    }

    public function update($id)
    {
        $result     = $this->M_jenis_tagihan->update($id);
        $status     = $result;

        echo json_encode(array(
            'status' => $status,
        ));
        return;
    }

    public function delete($id)
    {
        $result     = $this->M_jenis_tagihan->delete($id);
        $status     = $result;

        echo json_encode(array(
            'status' => $status,
        ));
        return;
    }
}

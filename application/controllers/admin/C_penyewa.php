<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_penyewa extends CI_Controller
{

    function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('M_penyewa');		
	}
    
    public function index()
    {
        $data['page']          = "admin/list_penyewa";
        $data['classAktif']    = "penyewa";
        $data['list_penyewa']  = $this->M_penyewa->getAll();                

        $this->load->view('template/index', $data);
    }

    public function add()
    {
        $data['page']        = "admin/add_penyewa";
        $data['classAktif']  = "penyewa";             

        $this->load->view('template/index', $data);
    }

    public function save()
    {
        $result     = $this->M_penyewa->save();
        $status     = $result;        

        echo json_encode(array(
            'status' => $status,            
        ));
        return;
    }

    public function view($id)
    {
        $data['page']           = "admin/view_penyewa";
        $data['classAktif']     = "penyewa";    
        $data['data_penyewa']   = $this->M_penyewa->getById($id);               

        $this->load->view('template/index', $data);
    }

    public function edit($id)
    {
        $data['page']           = "admin/edit_penyewa";
        $data['classAktif']     = "penyewa";     
        $data['data_penyewa']   = $this->M_penyewa->getById($id);               

        $this->load->view('template/index', $data);
    }

    public function update($id)
    {
        $result     = $this->M_penyewa->update($id);
        $status     = $result;        

        echo json_encode(array(
            'status' => $status,            
        ));
        return;
    }

    public function delete($id)
    {
        $result     = $this->M_penyewa->delete($id);
        $status     = $result;        

        echo json_encode(array(
            'status' => $status,            
        ));
        return;
    }
}

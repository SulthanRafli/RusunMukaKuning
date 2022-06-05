<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_404 extends CI_Controller
{
    public function index()
    {
        $data['page']        = "404";
        $data['classAktif']  = "";        
        
        $this->load->view('template/index', $data);
    }
}

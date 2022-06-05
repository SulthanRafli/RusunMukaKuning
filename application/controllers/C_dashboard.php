<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('M_penyewa');
        $this->load->model('M_teknisi');
        $this->load->model('M_tagihan'); 
        $this->load->model('M_login');        
    }

    public function index()
    {
        $data['total1']     = $this->M_penyewa->countPenyewa();
        $data['total2']     = $this->M_teknisi->countTeknisi();
        $data['total3']     = $this->M_tagihan->totalJumlahTagihan();

        $data['page']        = "dashboard";
        $data['classAktif']  = "dashboard";

        $this->load->view('template/index', $data);
    }

    function search_penyewa()
    {
        $list_penyewa = $this->M_penyewa->searchPenyewa();
        if ($list_penyewa) {
            $final = array();
            foreach($list_penyewa as $lp){
                $total_paid                     = $this->M_tagihan->getTotalPaid($lp->idPenyewa);
                $total_unpaid                   = $this->M_tagihan->getTotalUnpaid($lp->idPenyewa);
                $data_login                     = $this->M_login->getByIdUser($lp->idPenyewa);
                $sub_data                       = new stdClass();
                $sub_data->nama                 = $lp->nama;
                $sub_data->image                = !empty($data_login) ? $data_login->image : "default.png";
                $sub_data->noKtp                = $lp->noKtp;
                $sub_data->noTelepon            = $lp->noTelepon;
                $sub_data->noUnit               = $lp->noUnit;
                $sub_data->noMeteranListrik     = $lp->noMeteranListrik;
                $sub_data->noMeteranAir         = $lp->noMeteranAir;
                $sub_data->noMeteranAir         = $lp->noMeteranAir;               
                $sub_data->totalPaid            = $total_paid->jumlahTagihan ? $total_paid->jumlahTagihan : 0;               
                $sub_data->totalUnpaid          = $total_unpaid->jumlahTagihan ? $total_unpaid->jumlahTagihan : 0;               
                $final[]                        = $sub_data;
            }
            $status     = true;
            echo json_encode(array(
                'status' => $status,
                'result' => $final,
            ));
        } else {
            $status     = false;
            echo json_encode(array(
                'status' => $status,
            ));
        }
    }
}

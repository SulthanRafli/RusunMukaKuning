<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_maintenance extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('M_maintenance');
        $this->load->model('M_penyewa');
        $this->load->model('M_jenis_kerusakan');
        $this->load->model('M_tagihan');
    }

    public function index()
    {
        $data['page']          = "penyewa/list_maintenance";
        $data['classAktif']    = "maintenance";

        $list_maintenance  = $this->M_maintenance->getAllByIdUser();
        $data_maintenance  = array();

        foreach ($list_maintenance as $lm) {
            $detail_maintenance   = $this->M_maintenance->getDetailMaintenance($lm->idMaintenance);
            $arr_jenis_kerusakan  = [];
            foreach ($detail_maintenance as $dm) {
                if (isset($dm->jenisKerusakan)) {
                    $arr_jenis_kerusakan[] = $dm->jenisKerusakan;
                }
            }
            $jenis_kerusakan = implode(", ", $arr_jenis_kerusakan);

            $sub_data                   = new stdClass();
            $sub_data->idMaintenance    = $lm->idMaintenance;
            $sub_data->idPenyewa        = $lm->idPenyewa;
            $sub_data->penyewa          = $lm->penyewa;
            $sub_data->lokasi           = $lm->lokasi;
            $sub_data->detail           = $lm->detail;
            $sub_data->keterangan       = $lm->keterangan;
            $sub_data->status           = $lm->status;
            $sub_data->visible          = $lm->visible;
            $sub_data->dateMake         = $lm->dateMake;
            $sub_data->dateUpdate       = $lm->dateUpdate;
            $sub_data->jenisKerusakan   = $jenis_kerusakan;
            $data_maintenance[]         = $sub_data;
        }

        $data['list_maintenance']  = $data_maintenance;

        $this->load->view('template/index', $data);
    }

    public function add()
    {
        $data['page']                   = "penyewa/add_maintenance";
        $data['classAktif']             = "maintenance";
        $data['list_jenis_kerusakan']   = $this->M_jenis_kerusakan->getAll();

        $this->load->view('template/index', $data);
    }

    public function save()
    {
        $result     = $this->M_maintenance->savePenyewa();
        $status     = $result;

        echo json_encode(array(
            'status' => $status,
        ));
        return;
    }

    public function view($id)
    {
        $data['page']               = "penyewa/view_maintenance";
        $data['classAktif']         = "maintenance";
        $data['data_maintenance']   = $this->M_maintenance->getById($id);

        $detail_maintenance         = $this->M_maintenance->getDetailMaintenance($id);
        $arr_jenis_kerusakan        = [];
        foreach ($detail_maintenance as $dm) {
            if (isset($dm->jenisKerusakan)) {
                $arr_jenis_kerusakan[] = $dm->jenisKerusakan;
            }
        }
        $jenis_kerusakan = implode(", ", $arr_jenis_kerusakan);

        $data['jenis_kerusakan']    = $jenis_kerusakan;

        $this->load->view('template/index', $data);
    }

    public function edit($id)
    {
        $data['page']                   = "penyewa/edit_maintenance";
        $data['classAktif']             = "maintenance";
        $data['list_jenis_kerusakan']   = $this->M_jenis_kerusakan->getAll();
        $data['data_maintenance']       = $this->M_maintenance->getById($id);

        $detail_maintenance         = $this->M_maintenance->getDetailMaintenance($id);
        $arr_jenis_kerusakan        = [];
        foreach ($detail_maintenance as $dm) {
            if (isset($dm->idJenisKerusakan)) {
                $arr_jenis_kerusakan[] = $dm->idJenisKerusakan;
            }
        }
        $jenis_kerusakan = implode(",", $arr_jenis_kerusakan);

        $data['jenis_kerusakan']    = $jenis_kerusakan;

        $this->load->view('template/index', $data);
    }

    public function update($id)
    {
        $result     = $this->M_maintenance->updatePenyewa($id);
        $status     = $result;

        echo json_encode(array(
            'status' => $status,
        ));
        return;
    }
}

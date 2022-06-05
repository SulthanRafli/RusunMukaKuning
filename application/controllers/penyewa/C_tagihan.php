<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_tagihan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('M_tagihan');
    }

    public function index()
    {
        $data['page']           = "penyewa/list_tagihan";
        $data['classAktif']     = "tagihan";
        $list_tagihan  = $this->M_tagihan->getAllByIdUser();
        $data_tagihan  = array();

        foreach ($list_tagihan as $lt) {
            $detail_tagihan   = $this->M_tagihan->getDetailTagihan($lt->idTagihan);
            $arr_jenis_tagihan  = [];
            foreach ($detail_tagihan as $dt) {
                if (isset($dt->jenisTagihan)) {
                    $arr_jenis_tagihan[] = $dt->jenisTagihan;
                }
            }
            $jenis_tagihan = implode(", ", $arr_jenis_tagihan);

            $sub_data                   = new stdClass();
            $sub_data->idTagihan        = $lt->idTagihan;
            $sub_data->idPenyewa        = $lt->idPenyewa;
            $sub_data->image            = $lt->image;
            $sub_data->penyewa          = $lt->penyewa;
            $sub_data->jumlahTagihan    = $lt->jumlahTagihan;
            $sub_data->tanggalBerlaku   = $lt->tanggalBerlaku;
            $sub_data->status           = $lt->status;
            $sub_data->visible          = $lt->visible;
            $sub_data->dateMake         = $lt->dateMake;
            $sub_data->dateUpdate       = $lt->dateUpdate;
            $sub_data->jenisTagihan     = $jenis_tagihan;
            $data_tagihan[]             = $sub_data;
        }

        $data['list_tagihan']  = $data_tagihan;

        $this->load->view('template/index', $data);
    }

    public function bayar($id)
    {
        $data['page']        = "penyewa/bayar_tagihan";
        $data['classAktif']  = "tagihan";
        $data['data_tagihan']   = $this->M_tagihan->getById($id);

        $detail_tagihan         = $this->M_tagihan->getDetailTagihan($id);
        $arr_jenis_tagihan      = [];
        foreach ($detail_tagihan as $dt) {
            if (isset($dt->jenisTagihan)) {
                $arr_jenis_tagihan[] = $dt->jenisTagihan;
            }
        }
        $jenis_tagihan = implode(", ", $arr_jenis_tagihan);

        $data['jenis_tagihan']    = $jenis_tagihan;


        $this->load->view('template/index', $data);
    }

    public function update($id)
    {
        $image = $_FILES['file']['name'];

        if ($image) {
            $config['upload_path']          = './assets/images/bukti_pembayaran/';
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['max_size']             = 2048;
        }
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
            $new_image  = $this->upload->data('file_name');
            $result     = $this->M_tagihan->updateTagihan($id, $new_image);
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

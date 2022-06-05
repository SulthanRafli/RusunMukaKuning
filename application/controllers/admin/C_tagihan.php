<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_tagihan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('M_tagihan');
        $this->load->model('M_penyewa');
        $this->load->model('M_jenis_tagihan');
    }

    public function index()
    {
        $data['page']        = "admin/list_tagihan";
        $data['classAktif']  = "tagihan";        

        $list_tagihan  = $this->M_tagihan->getAll();
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
            $sub_data->penyewa          = $lt->penyewa;
            $sub_data->jumlahTagihan    = $lt->jumlahTagihan;
            $sub_data->image            = $lt->image;
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

    public function add()
    {
        $data['page']               = "admin/add_tagihan";
        $data['classAktif']         = "tagihan";
        $data['list_penyewa']       = $this->M_penyewa->getAll();
        $data['list_jenis_tagihan'] = $this->M_jenis_tagihan->getAll();        

        $this->load->view('template/index', $data);
    }

    public function save()
    {
        $result     = $this->M_tagihan->save();
        $status     = $result;

        echo json_encode(array(
            'status' => $status,
        ));
        return;
    }

    public function view($id)
    {
        $data['page']           = "admin/view_tagihan";
        $data['classAktif']     = "tagihan";
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

    public function verifikasi($id)
    {
        $data['page']           = "admin/verifikasi_tagihan";
        $data['classAktif']     = "tagihan";
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

    public function edit($id)
    {
        $data['page']               = "admin/edit_tagihan";
        $data['classAktif']         = "tagihan";
        $data['menu']               = "Ubah";
        $data['list_penyewa']       = $this->M_penyewa->getAll();
        $data['list_jenis_tagihan'] = $this->M_jenis_tagihan->getAll();
        $data['data_tagihan']       = $this->M_tagihan->getById($id);

        $detail_tagihan      = $this->M_tagihan->getDetailTagihan($id);
        $arr_jenis_tagihan   = [];
        foreach ($detail_tagihan as $dt) {
            if (isset($dt->idJenisTagihan)) {
                $arr_jenis_tagihan[] = $dt->idJenisTagihan;
            }
        }
        $jenis_tagihan = implode(",", $arr_jenis_tagihan);

        $data['jenis_tagihan']    = $jenis_tagihan;        

        $this->load->view('template/index', $data);
    }

    public function update($id)
    {
        $result     = $this->M_tagihan->update($id);
        $status     = $result;

        echo json_encode(array(
            'status' => $status,
        ));
        return;
    }

    public function delete($id)
    {
        $result     = $this->M_tagihan->delete($id);
        $status     = $result;

        echo json_encode(array(
            'status' => $status,
        ));
        return;
    }

    public function deny($id)
    {
        $result     = $this->M_tagihan->deny($id);
        $status     = $result;

        echo json_encode(array(
            'status' => $status,
        ));
        return;
    }

    public function verify($id)
    {
        $result     = $this->M_tagihan->verify($id);
        $status     = $result;

        echo json_encode(array(
            'status' => $status,
        ));
        return;
    }

    function get_jenis_tagihan()
	{        
		$jenis_tagihan = $this->M_jenis_tagihan->getByIdMultiple();
		echo json_encode($jenis_tagihan);
	}
}

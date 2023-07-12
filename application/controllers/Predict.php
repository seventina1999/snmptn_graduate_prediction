<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Predict extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('prodi_model');
        $this->load->model('ptn_model');
    }

    public function index()
    {
        $data = array();
        $data['selectedp'] = '--Pilih PTN--';
        $data['selectedpd'] = '--Pilih Prodi--';
        $data['nilai'] = '';
        $data['sertifikat'] = '';
        $data['pred'] = '';
        $data['prodi'] = $this->prodi_model->get();
        $data['ptn'] = $this->ptn_model->get();
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('layout/header', $data);
        $this->load->view('Predic/Prediction', $data);
        $this->load->view('layout/footer', $data);
    }

    public function predict()
    {
        // menyimpan data dalam variabel input data yang berbentuk array
        $input_data = [
            $ptn2 = $_POST['ptn'],
            $prodi2 = $_POST['prodi'],
            $nilai = $_POST['nilai'],
            $sertifikat = $_POST['sertifikat']
        ];

        $pythonScriptPath = APPPATH . 'controllers/make_prediction.py'; //lokasi mesin berada, appath sama fungsinya seperti base url
        //guna python didepan menjalankan python yang variabel sebelumnya beserta data array yang sudah disimpan tadi.
        $command = 'python ' . escapeshellarg($pythonScriptPath) . ' ' . escapeshellarg(json_encode($input_data));
        $prediction = shell_exec($command); // eksekusi berlangsung

        $data = array();
        $data['selectedp'] = $ptn2;
        $data['selectedpd'] = $prodi2;
        $data['nilai'] = $nilai;
        $data['sertifikat'] = $sertifikat;
        $data['pred'] = $prediction;

        $data['prodi'] = $this->prodi_model->get();
        $data['ptn'] = $this->ptn_model->get();

        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        // // $data['pred'] = $prediction;
        $this->load->view('layout/header');
        $this->load->view('Predic/Prediction', $data);
        $this->load->view('layout/footer');
    }
}

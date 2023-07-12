<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('uploadfile_model');
    }
    public function index()
    {
        $year = array(2018, 2019, 2020, 2021, 2022);
        $data['hitungLulusan'] = $this->uploadfile_model->hitungLulusan($year);
        $data['hitung'] = $this->uploadfile_model->hitung($year);
        $data['year'] = $year;
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('layout/header', $data);
        $this->load->view('Dashboard/HalamanUtama', $data);
        $this->load->view('layout/footer', $data);
    }
}

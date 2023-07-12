<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    function index()
    {
        if ($this->session->userdata('username')) {
            redirect('Dashboard');
        }
        $this->form_validation->set_rules('username', 'Username', 'trim|required|valid_username', [
            'valid_username' => 'Username Harus Valid',
            'required' => 'Username Wajib di isi'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Password Wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('authlayout/header_auth');
            $this->load->view('authlayout/view_auth');
            $this->load->view('authlayout/footer_auth');
        } else {
            $this->cek_login();
        }
    }

    function cek_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $where = array(
            'username' => $username,
            'password' => $password,
        );
        $cek = $this->User_model->cek_login("admin", $where)->num_rows();
        if ($cek > 0) {
            $data_session = array(
                'username' => $username,
            );
            $this->session->set_userdata($data_session);
            redirect(base_url("Dashboard"));
        } else {
            echo "<script type='text/javascript'>alert('Username dan password salah!');</script>";
            $this->output->set_header('refresh:1; url=' . site_url("Auth"));
            // redirect(base_url("Auth"));
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('Auth'));
    }
}

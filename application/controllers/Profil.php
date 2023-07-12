<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('layout/header', $data);
        $this->load->view('Dashboard/UbahPassword', $data);
        $this->load->view('layout/footer', $data);
    }
    public function ganti_password()
    {
        // Form validation rules
        $this->form_validation->set_rules('current_password', 'Current Password', 'required');
        $this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');

        if ($this->form_validation->run() == FALSE) {
            // Validation failed, reload the change password form with validation errors
            $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
            $this->load->view('layout/header', $data);
            $this->load->view('Dashboard/UbahPassword', $data);
            $this->load->view('layout/footer', $data);
        } else {
            // Validation passed, update the user's password
            $username = $this->session->userdata('username');
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password');

            // Verify the user's current password from the database
            $this->load->model('user_model');
            $is_valid_password = $this->user_model->verify_password($username, $current_password);

            if ($is_valid_password) {
                // Update the user's password
                $this->user_model->update_password($username, $new_password);
                $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert"><strong>Sukses!</strong>Password berhasil di ubah.</div>');
                redirect('Profil');
            } else {
                // Current password is incorrect, show error message
                $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert"><strong>Danger!</strong>Password tidak benar.</div>');
                redirect('Profil');
            }
        }
    }
}

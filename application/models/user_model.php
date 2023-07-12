<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public $table = "admin";
    public $id = "admin.id";
    public function __construct()
    {
        parent::__construct();
    }

    function cek_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    public function verify_password($username, $password)
    {
        // Query the database to verify the user's current password
        // Replace 'users' with your actual table name
        $query = $this->db->get_where('admin', array('username' => $username, 'password' => $password));

        return $query->num_rows() === 1;
    }

    public function update_password($username, $new_password)
    {
        // Update the user's password in the database
        // Replace 'users' with your actual table name
        $this->db->where('username', $username);
        $this->db->update('admin', array('password' => $new_password));
    }
}

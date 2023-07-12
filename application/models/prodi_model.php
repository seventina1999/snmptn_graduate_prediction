<?php
defined('BASEPATH') or exit('No direct script access allowed');

class prodi_model extends CI_Model
{
    public $table = 'prodi';
    public $id = 'prodi.prodi_label';

    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result_array();
    }
}

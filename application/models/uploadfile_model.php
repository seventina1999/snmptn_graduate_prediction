<?php
defined('BASEPATH') or exit('No direct script access allowed');

class uploadfile_model extends CI_Model
{
    public $table = 'uploadfile';
    public $id = 'uploadfile.id';

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

    public function hitungLulusan($year)
    {
        $counts = array();

        foreach ($year as $y) {
            $this->db->select('COUNT(nama) as count');
            $this->db->from('uploadfile');
            $this->db->where('kelas', $y);
            $this->db->where('keterangan', 'LULUS');
            $query = $this->db->get();
            $result = $query->row();

            $counts[$y] = $result->count;
        }

        return $counts;
    }

    public function hitung($year)
    {
        $counts = array();

        foreach ($year as $y) {
            $this->db->select('COUNT(nama) as count');
            $this->db->from('uploadfile');
            $this->db->where('kelas', $y);
            $query = $this->db->get();
            $result = $query->row();

            $counts[$y] = $result->count;
        }

        return $counts;
    }
}

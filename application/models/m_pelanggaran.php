<?php
// Model: M_pelanggaran.php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pelanggaran extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->model('M_pelanggaran');
        $this->load->database();
    }
 
    
// File: Pelanggaran_model.php



    // Method to insert data into 't_pelanggaran' table
    public function tambah_data_pelanggaran($data) {
        return $this->db->insert('t_pelanggaran', $data);
    }

    // Method to fetch all students
    public function getAllSiswa() {
        $this->db->select('id_siswa, nama_siswa');
        $query = $this->db->get('t_siswa');
        return $query->result_array();
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Input_pelanggaran extends CI_Controller {
   

    public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pelanggaran');
        $data['siswa_list'] = $this->M_pelanggaran->getAllSiswa();
	}

    public function index()
    {
        
        $id_level = $this->session->userdata('id_level');
        $id_user = $this->session->userdata('id_user');
        // $sess['id_kelas']=$id_wali_kelas->id_kelas;

        
        
        // Lakukan logika berdasarkan peran pengguna
        if ($id_level == '2') {
            $a['layout'] = 'v_input_dapel';
            
            $a['title'] = 'Data pelanggaran';
            $this->load->view('layouts/v_backend',$a);
            // Lakukan sesuatu untuk pengguna dengan peran admin
        } else {
            redirect('Home');
           
        // Lakukan sesuatu untuk pengguna dengan peran lain
        }
        
    
    }



    public function tambah_pelanggaran() {
        $tanggal_pelanggaran = $this->input->post('tanggal_pelanggaran');
        $id_siswa = $this->input->post('nama_siswa');
       
        
        // Pastikan semua data yang diperlukan sudah diisi
        if (!empty($tanggal_pelanggaran) && !empty($id_siswa)) {
            // Susun data pelanggaran
            $data = array(
                'tanggal_pelanggaran' => $tanggal_pelanggaran,
                'id_siswa' => $id_siswa
              
            );
    
            // Panggil model untuk menambahkan data pelanggaran
            $inserted = $this->M_pelanggaran->tambah_data_pelanggaran($data);
            
            // Cek apakah penambahan data berhasil
            if ($inserted) {
                // Jika berhasil, redirect ke halaman data pelanggaran atau tampilkan pesan sukses
                redirect('Data_pelanggaran');
            } else {
                // Jika gagal, tampilkan pesan kesalahan
                echo "Gagal menambahkan data pelanggaran.";
            }
        } else {
            // Jika ada data yang belum diisi, tampilkan pesan kesalahan
            echo "Semua data harus diisi.";
        }
    }
}

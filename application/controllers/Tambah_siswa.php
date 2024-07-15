<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tambah_siswa extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('M_siswa');
    }

    public function index() {
        $id_level = $this->session->userdata('id_level');
        if ($id_level == '2') {
            $data['layout'] = 'v_tambah_siswa';
            $data['title'] = 'Tambah Siswa';
            $data['parents'] = $this->M_siswa->get_all_parents();
            $data['gurus'] = $this->M_siswa->get_all_gurus();
            $this->load->view('layouts/v_backend', $data);
        }
    }
    public function tambahData() {
        $data = array(
            'nisn' => $this->input->post('nisn'),
            'nama_siswa' => $this->input->post('nama_siswa'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'alamat' => $this->input->post('alamat'),
            'id_orang_tua' => $this->input->post('id_orang_tua'),
            'id_wali_kelas' => $this->input->post('id_wali_kelas')
        );

		$id_siswa_baru = $this->M_siswa->tambahData($data);

        if ($id_siswa_baru) {
            echo "Data siswa berhasil disimpan dengan ID: " . $id_siswa_baru;
        } else {
            echo "Data siswa gagal disimpan.";
        }
    }
    


    public function deleteData($id_siswa) {
        $id_level = $this->session->userdata('id_level');
        if ($id_level == '2') {
            $deleted = $this->M_siswa->deleteData($id_siswa);

            if ($deleted) {
                redirect('Data_siswa');
            } else {
                echo "Gagal menghapus data siswa.";
            }
        } else {
            echo "Anda tidak memiliki izin untuk menghapus siswa.";
        }
    }

    public function updateData() {
    $id_level = $this->session->userdata('id_level');
    if ($id_level == '2') {
        $id_siswa = $this->input->post('id_siswa');
        
        $data = array(
            'nisn' => $this->input->post('nisn'),
            'nama_siswa' => $this->input->post('nama_siswa'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'alamat' => $this->input->post('alamat'),
            'id_orang_tua' => $this->input->post('nama_orang_tua')
           
        );

        // var_dump($id_siswa);
        // die;


   

         // Debugging: Print the data and where clause
        // echo '<pre>';
        // print_r($where);
        // print_r($data);
        // echo '</pre>';

        $updated = $this->M_siswa->updateData($id_siswa, $data);

        if ($updated) {
            echo "Data siswa berhasil diperbarui.";
        } else {
            echo "Gagal memperbarui data siswa.";
        }
    } else {
        echo "Anda tidak memiliki izin untuk memperbarui siswa.";
    }
}

}

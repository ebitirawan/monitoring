<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verifikasi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
		checkLogin();
		checkAkses([1]);
        $this->title = "Verifikasi";
    }

    public function index()
    {
        $data['title'] = $this->title;
        $data['pelaporans'] = $this->M_pelanggaran->belumterverifikasi();
        
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('main/verifikasi', $data);
        $this->load->view('template/footer', $data);
    }

    public function detail($id_pelaporan)
    {
        // Ambil data detail pelanggaran dari model
        $data['pelaporan'] = $this->M_pelanggaran->getById($id_pelaporan);
        
        if (!$data['pelaporan']) {
            show_404(); // Tampilkan halaman 404 jika data tidak ditemukan
        }
        


        $data['title'] = "Detail Pelanggaran";

        // Load view untuk menampilkan detail
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('main/detail_pelanggaran', $data);
        $this->load->view('template/footer', $data);
    }
    
    public function update($id_pelaporan)
    {
        $data = array(
            'status_pelaporan' => $this->input->post('target')
        );

        $this->M_pelanggaran->update($id_pelaporan, $data);
        redirect('verifikasi');
    }

}

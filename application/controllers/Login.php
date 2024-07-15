<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	
	public function index()
	{
		$this->load->view('v_login');
	}

    public function ceklogin() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        // Memuat model config
        $this->load->Model('m_login');
        $result = $this->m_login->ceklogin($email, $password);

        if($result) {
            $this->load->view('v_home');
        //login berhasil, lakukan sesuatu seperti redirect ke halaman dashboard
        } else {
            $this->load->view('v_login');
            // login gagal, tampilkan pesan kesalahan atau redirect kembali ke halaman login dengan pesan kesalahan
        }
    }

   
    }

?>
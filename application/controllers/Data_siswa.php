<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_siswa extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('M_siswa');
	}

    public function index()
    {
        
        $id_level = $this->session->userdata('id_level');
        $id_user = $this->session->userdata('id_user');
        // $sess['id_kelas']=$id_wali_kelas->id_kelas;

         
        // Lakukan logika berdasarkan peran pengguna
        if ($id_level == '2') {
            $a['Siswa'] = $this->M_siswa->Siswa($id_user)->result();
            $a['layout'] = 'v_data_siswa';
            $a['parents'] = $this->M_siswa->get_all_parents();
            $a['title'] = 'Data siswa';
            // var_dump($a);
            // die;
            $this->load->view('layouts/v_backend',$a);
            // Lakukan sesuatu untuk pengguna dengan peran admin
        } else {
            redirect('Home');
           
        // Lakukan sesuatu untuk pengguna dengan peran lain
        }
        
    
    }

    
    }

?>

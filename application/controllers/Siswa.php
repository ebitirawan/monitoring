<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// checkLogin();
		// checkAkses([0,1,2]);
		$this->title = "Siswa";
		$this->session = $this->session->userdata();
	}

	public function index()
	{
		$data['title'] = $this->title;
		$data['session'] = (object)$this->session;
		$this->load->view('template/header',$data);
		$this->load->view('template/navbar',$data);
		$this->load->view('template/topbar',$data);
		$this->load->view('main/siswa',$data);
		$this->load->view('template/footer',$data);
		
		
	}
}

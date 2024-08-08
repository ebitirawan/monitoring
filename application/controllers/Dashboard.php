<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		checkLogin();
		checkAkses([1,2,3]);
		$this->title = "Dashboard";
	}

	public function index()
	{
		$data['title'] = $this->title;
		$data['siswa'] = $this->M_siswa->getAll();
		$this->load->view('template/header',$data);
		$this->load->view('template/navbar',$data);
		$this->load->view('template/topbar',$data);
		$this->load->view('main/dashboard',$data);
		$this->load->view('template/footer',$data);	
    }
}

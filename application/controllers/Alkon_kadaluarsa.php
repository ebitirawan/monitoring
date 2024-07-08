<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alkon_kadaluarsa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		checkLogin();
		checkAkses([0,1]);
		$this->title = "Data Alkon Kadaluarsa";
		$this->session = $this->session->userdata();
	}

	public function index()
	{
		$data['title'] = $this->title;
		$data['session'] = (object)$this->session;
		$this->load->view('template/header',$data);
		$this->load->view('template/navbar',$data);
		$this->load->view('template/topbar',$data);
		$this->load->view('main/dashboard',$data);
		$this->load->view('template/footer',$data);
	}
}

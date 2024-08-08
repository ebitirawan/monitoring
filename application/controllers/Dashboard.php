<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		checkLogin();
		checkAkses([1,2,3]);
		$this->title = "Dashboard";
		$this->session = $this->session->userdata();
	}

	public function index()
	{
		$data['title'] = $this->title;
		$data['session'] = (object)$this->session;
		$data['siswa'] = $this->M_siswa->getAll();
		$data['wali'] = $this->db->select('COUNT(*) as count')->from('tbl_pelaporan')->where('status_pelaporan',2)->get()->row();
		$data['bk'] = $this->db->select('COUNT(*) as count')->from('tbl_pelaporan')->where('status_pelaporan',3)->get()->row();
		$data['panggil'] = $this->db->select('COUNT(*) as count')->from('tbl_pelaporan')->where('pemanggilan',1)->get()->row();
		$this->load->view('template/header',$data);
		$this->load->view('template/navbar',$data);
		$this->load->view('template/topbar',$data);
		$this->load->view('main/dashboard',$data);
		$this->load->view('template/footer',$data);	
    }
}

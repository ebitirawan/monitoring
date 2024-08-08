<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lapor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		checkLogin();
		checkAkses([2]);
		$this->title = "Pelaporan";
	}

	public function index()
	{
		$data['title'] = $this->title;
		$data['siswa'] = $this->db->where('id_wali_kelas',$this->session->userdata('id'))->get('tbl_siswa')->result();
		$this->load->view('template/header',$data);
		$this->load->view('template/navbar',$data);
		$this->load->view('template/topbar',$data);
		$this->load->view('main/pelaporan',$data);
		$this->load->view('template/footer',$data);
	}

	public function insert()
	{
		$data = array(
			'id_wali_kelas'		=> $this->session->userdata('id'),
			'id_siswa'			=> $this->input->post('siswa'),
			'tgl_pelanggaran'	=> $this->input->post('tgl_pelanggaran'),
			'judul_pelaporan'	=> $this->input->post('perihal'),
			'ket_pelaporan'		=> $this->input->post('detail_pelanggaran'),
			'status_pelaporan'	=> 1,
			'pemanggilan'		=> 0,
			'tindak_lanjut'		=> '-',
			'selesai'			=> 0,
			'ket_selesai'		=> '-',
			'created_at'		=> date('Y-m-d H:i:s'),
			
		);

		$this->db->insert('tbl_pelaporan',$data);
		redirect('lapor');
	}
}

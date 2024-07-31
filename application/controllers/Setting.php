<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		checkLogin();
		checkAkses([1]);
		$this->title = "Setting";
		$this->session = $this->session->userdata();
	}

	public function index()
	{
		$data['title'] = $this->title;
		$data['session'] = (object)$this->session;
		$data['setting'] = $this->db->get('tbl_user_system')->row();
		$this->load->view('template/header',$data);
		$this->load->view('template/navbar',$data);
		$this->load->view('template/topbar',$data);
		$this->load->view('main/setting',$data);
		$this->load->view('template/footer',$data);
	}

	public function update($id)
	{
		$data = [
			'nama_sekolah' => $this->input->post('nama_sekolah'),
			'alamat_sekolah' => $this->input->post('alamat_sekolah'),
			'hook_api_wa' => $this->input->post('wa_hook')
		];
		$this->db->where('id_user_system',$id);
		$this->db->update('tbl_user_system',$data);
		redirect('setting');
	}
}

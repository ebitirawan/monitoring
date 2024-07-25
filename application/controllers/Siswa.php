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
		$data['siswa'] = $this->M_siswa->getAll();
		$this->load->view('template/header',$data);
		$this->load->view('template/navbar',$data);
		$this->load->view('template/topbar',$data);
		$this->load->view('main/siswa-new',$data);
		$this->load->view('template/footer',$data);		
	}

	public  function add()
	{
		$data = array(
			'nip_nisn' => $this->input->post('nip_nisn'),
			'nama_siswa' => $this->input->post('nama_siswa'),
			'tgl_lahir' => $this->input->post('tgl_lahir'),
			'jk' => $this->input->post('jk'),
			'id_wali_kelas' => 1,
			'nama_ortu' => $this->input->post('nama_ortu'),
			'no_ortu' => $this->input->post('no_ortu'),
			'alamat' => $this->input->post('alamat'),
			'created_at' => date('Y-m-d H:i:s')
		);	

		$this->M_siswa->add($data);
		redirect('siswa');
	}

	public function show($id)
	{
		$data = $this->M_siswa->getById($id);

		header('Content-Type: application/json');
		echo json_encode($data);
	}

	public function update()
	{
		$id = $this->input->post('edit_siswa_id');

		var_dump($id);
		die;
		$data = array(
			'nip_nisn' => $this->input->post('edit_nisn'),
			'nama_siswa' => $this->input->post('edit_nama_siswa'),
			'tgl_lahir' => $this->input->post('edit_tgl_lahir'),
			'jk' => $this->input->post('edit_jk'),
			'id_wali_kelas' => 1,
			'nama_ortu' => $this->input->post('edit_nama_ortu'),
			'no_ortu' => $this->input->post('edit_no_ortu'),
			'alamat' => $this->input->post('edit_alamat'),
			'updated_at' => date('Y-m-d H:i:s')
		);

		// $this->M_siswa->update($id, $data);
		// redirect('siswa');
	}

	public function delete($id)
	{
		$this->M_siswa->delete($id);
		redirect('siswa');
	}
}

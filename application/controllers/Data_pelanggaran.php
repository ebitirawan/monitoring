<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_pelanggaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// checkLogin();
		// checkAkses([0,1,2]);
		$this->title = "Data Pelanggaran";
		$this->session = $this->session->userdata();
	}

	public function index()
	{
		$data['title'] = $this->title;
		$data['session'] = (object)$this->session;
		// $data['walikelas'] = $this->M_pelanggaran->getPelanggaranBelumSelesaiWk(1);
		// $data['selesai'] = $this->M_pelanggaran->getPelanggaranSelesaiWk(1);
		$data['selesai'] = $this->M_pelanggaran->getPelanggaranSelesai();
		$this->load->view('template/header',$data);
		$this->load->view('template/navbar',$data);
		$this->load->view('template/topbar',$data);
		// $this->load->view('main/data_pelanggaran/wali_kelas',$data);
		$this->load->view('main/data_pelanggaran/index',$data);
		$this->load->view('template/footer',$data);
	}

	public function get_by_id($id)
	{
		$data = $this->M_pelanggaran->getById($id);

		header('Content-Type: application/json');
		echo json_encode($data);
	}

	public function update()
	{
		$id = $this->input->post('edit_pelanggaran_id');

		// if ($this->input->post('edit_selesai') == 1) {
		// 	$selesai = "Selesai";
		// } else {
		// 	$selesai = "Belum Selesai";
		// }

		$data = array(
			'selesai' => 1,
			'tindak_lanjut' => $this->input->post('edit_tindak_lanjut'),
			'ket_selesai' => "SELESAI"
		);

		$this->M_pelanggaran->update($id, $data);
		redirect('data_pelanggaran');
	}
}

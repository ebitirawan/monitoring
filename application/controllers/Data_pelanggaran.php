<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use GuzzleHttp\Client;
class Data_pelanggaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		checkLogin();
		checkAkses([1,2,3]);
		$this->title = "Data Pelanggaran";
		$this->session = $this->session->userdata();
	}

	public function index()
	{
		$data['title'] = $this->title;
		$data['session'] = (object)$this->session;

		if ($this->session['role'] == 1) {
			$data['walikelas'] = $this->M_pelanggaran->getPelanggaranBelumSelesaiBk();
			$data['selesai'] = $this->M_pelanggaran->getPelanggaranSelesaiBk();
		} else if ($this->session['role'] == 2) {
			$data['walikelas'] = $this->M_pelanggaran->getPelanggaranBelumSelesaiWk($this->session['id_user']);
			$data['selesai'] = $this->M_pelanggaran->getPelanggaranSelesaiWk($this->session['id_user']);
		} else {
			$data['selesai'] = $this->M_pelanggaran->getPelanggaranSelesai();
		}


		$data['walikelas'] = $this->M_pelanggaran->getPelanggaranBelumSelesaiWk(1);
		$data['selesai'] = $this->M_pelanggaran->getPelanggaranSelesaiWk(1);
		$this->load->view('template/header',$data);
		$this->load->view('template/navbar',$data);
		$this->load->view('template/topbar',$data);
		if ($this->session['role'] == 3) {
			$this->load->view('main/data_pelanggaran/index',$data);
		} else {
			$this->load->view('main/data_pelanggaran/wali_kelas',$data);
		}
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

	public function panggil_ortu($id)
	{
		$pelanggaran = $this->M_pelanggaran->getById($id);
		$no_ortu = $pelanggaran->no_ortu;
		$url = app_config()->hook_api_wa;

		$data = [
			'form_params' => [
				'number' => $no_ortu,
				'message' => 'Pesan panggilan untuk orang tua.',
				// 'file_kirim' => 'Pesan panggilan untuk orang tua.',
			]
		];
		
		$client = new Client();

		try {
			$response = $client->post($url, $data);
			
			if ($response->getStatusCode() == 200) {
				$update_data = array(
					'pemanggilan' => 1
				);

				$this->M_pelanggaran->update($id, $update_data);
			}

		} catch (\Exception $e) {
			log_message('error', $e->getMessage());
		}

		redirect('data_pelanggaran');
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use GuzzleHttp\Client;
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
		$data['walikelas'] = $this->M_pelanggaran->getPelanggaranBelumSelesaiWk(1);
		$data['selesai'] = $this->M_pelanggaran->getPelanggaranSelesaiWk(1);
		// $data['selesai'] = $this->M_pelanggaran->getPelanggaranSelesai();
		$this->load->view('template/header',$data);
		$this->load->view('template/navbar',$data);
		$this->load->view('template/topbar',$data);
		$this->load->view('main/data_pelanggaran/wali_kelas',$data);
		// $this->load->view('main/data_pelanggaran/index',$data);
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

		$data = [
			'form_params' => [
				'number' => $no_ortu,
				'message' => 'Pesan panggilan untuk orang tua.',
				// 'file_kirim' => 'Pesan panggilan untuk orang tua.',
			]
		];
		
		$client = new Client();

		try {
			$response = $client->post('http://127.0.0.1:8000/send-message', $data);
			
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

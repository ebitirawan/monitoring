<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekapan_pelanggaran extends CI_Controller {

	public function simpan_pelanggaran()
{
    $data = array(
        'NISN' => $this->input->post('NISN'),
        'tanggal' => $this->input->post('tanggal'),
        'jenis' => $this->input->post('jenis'),
        'detail' => $this->input->post('detail')
    );

    $this->load->model('m_pelanggaran');
    $id_pelanggaran = $this->m_pelanggaran->simpan_pelanggaran($data);

    // Handle respon sesuai kebutuhan, misalnya tampilkan pesan atau redirect
}
    
	public function index()
	{
        $a['layout'] = 'v_rekapan_pelanggaran';
        $a['title'] = 'Rekapan pelanggaran';
		$this->load->view('layouts/v_backend',$a);
	}
}

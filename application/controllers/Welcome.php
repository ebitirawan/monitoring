<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
	
		// $this->load->model->('m_login');
		// $this->m_login->keamanan();
		// $this->load->view('welcome_message');
// 	}
// 	public function ceklogin()
// 	{
// 		$this->load->model->('m_login');
// 		$this->m_login->keamanan();
// 		$this->load->view('v_home');
// 		// $this->load->view('v_home');
	
// }

public function logout(){
	$this->session->session_destroy();
	redirect('Login');
}}}
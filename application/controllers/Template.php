<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends CI_Controller {

	public function backend($template_backend)
	{
		$this->load->view('layouts/v_backend',$template_backend);
	
}
}
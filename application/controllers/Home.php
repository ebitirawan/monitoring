<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
    
	public function index()
	{
        $a['layout'] = 'v_home';
        $a['title'] = 'Dashboard';
		$s = $this->session->userdata();
		//  print_r ($s);die;
		$this->load->view('layouts/v_backend',$a);
	}
}
?>
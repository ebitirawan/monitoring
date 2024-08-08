<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		checkLogin();
		checkAkses([1]);
		$this->title = "User";
	}

	public function index()
	{
		$data['title'] = $this->title;
		$data['user'] = $this->db->get('tbl_user')->result();
		$this->load->view('template/header',$data);
		$this->load->view('template/navbar',$data);
		$this->load->view('template/topbar',$data);
		$this->load->view('main/user',$data);
		$this->load->view('template/footer',$data);
	}

	public function show($id)
	{
		$data = $this->db->get_where('tbl_user',['id' => $id])->row();

		header('Content-Type: application/json');
		echo json_encode($data);
	}

	public function add()
	{
		$data = array(
			'nama_user' => $this->input->post('nama_user'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'role' => $this->input->post('role'),
			'status' => 1,
			'nama_ruangan' => $this->input->post('ruangan'),
		);

		$this->db->insert('tbl_user',$data);
		redirect('user');
	}

	public function update()
	{
		$data = array(
			'nama_user' => $this->input->post('edit_nama_user'),
			'username' => $this->input->post('edit_username'),
			'role' => $this->input->post('edit_role'),
			'nama_ruangan' => $this->input->post('edit_ruangan'),
		);

		$this->db->where('id_user',$this->input->post('edit_id_user'));
		$this->db->update('tbl_user',$data);
		redirect('user');
	}

	public function reset($id)
	{
		$data = array(
			'password' => md5('default123'),
		);

		$this->db->where('id_user',$id);
		$this->db->update('tbl_user',$data);
		redirect('user');
	}
	
	public function delete($id)
	{
		$this->db->where('id_user',$id);
		$this->db->delete('tbl_user');
		redirect('user');
	}
	public function getUserById($id)
{
    $user = $this->db->get_where('tbl_user', ['id_user' => $id])->row();
    echo json_encode($user);
}
}

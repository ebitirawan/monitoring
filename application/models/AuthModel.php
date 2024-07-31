<?php

class AuthModel extends CI_Model
{
	public function login()
    {
        $username = $this->input->post('username');
        $password = MD5($this->input->post('password'));

        $checkuser = $this->db->where('username',$username)->get('tbl_user')->row();

        if ($checkuser->password == $password) {

            $data = array(
				'id' => $checkuser->id_user,
                'username' => $checkuser->username,
                'name' => $checkuser->nama_user,
                'role' => $checkuser->role
            );

            $this->session->set_userdata($data);

            return true;    
            
        } else {
            return false;
        }
    }
}

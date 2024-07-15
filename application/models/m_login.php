
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_login extends CI_Model {

     public function __construct() {
         parent::__construct();
         $this->load->database();
     }

     public function ceklogin($email, $password) {
      $array = array('email' => $email, 'password' => $password);
$this->db->where($array);
      // $this->db->where('email', $email);
      // $this->db->where('password', $password);
      $query = $this->db->get('t_user');
     
     
      if ($query->num_rows() ==1) {
          foreach ($query->result() as $row) {
              $sess = array(
                  'id_user' => $row->id_user,
                  'id_level' => $row->id_level,
                  'level' => $row->id_level,
                
              );
          }
          $this->db->where(array('id_user',$sess['id_user']));
          $id_guru =$this->db->get('t_guru')->row();
          $this->db->where(array('id_guru',$id_guru->id_guru));
          $id_wali_kelas =$this->db->get('t_wali_kelas')->row();
          $sess['id_guru']=$id_guru->id_guru;
          $sess['nama_guru']=$id_guru->nama_guru;
          $sess['id_kelas']=$id_wali_kelas->id_kelas;
          //  print_r($sess); die;

          $this->session->set_userdata($sess);
          redirect('Home');
        } else {
          $this->session->set_flashdata('info', 'Maaf, username atau password salah');
          redirect('Login');
      }
  }

  public function keamanan(){
    $email = $this->session->userdata('email');
    if(empty($email)){
      $this->session->session_destroy();
      redirect('Login');
    }
  }
}
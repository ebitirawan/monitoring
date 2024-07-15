<?php
// File: application/models/M_siswa.php
defined('BASEPATH') OR exit('No direct script access allowed');


class M_siswa extends CI_Model {
    public function __construct(){
		parent::__construct();
		$this->load->model('m_Siswa');
	}
    // public function get_siswa_by_id($id_siswa) {
    //     $query = $this->db->get_where('t_siswa', array('id_siswa' => $id_siswa));
    //     return $query->row(); // Mengembalikan satu baris hasil query
    // }

    // public function data_siswa($id_user) {
    //     $query = $this->db->query('SELECT * FROM `t_siswa`  WHERE id_guru = (SELECT id_guru FROM t_guru where id_user ='. $id_user .')');
    //     return $query->result();
    // }
    public function Siswa($id_user)
    {
        
        return $this->db->query('SELECT a.*,b.id_kelas,c.nama_orang_tua,d.nama_guru FROM t_siswa a LEFT JOIN t_wali_kelas b ON a.id_wali_kelas=b.id_wali_kelas 
         LEFT JOIN t_orang_tua c ON a.id_orang_tua=c.id_orang_tua
           LEFT JOIN t_guru d ON b.id_guru=d.id_guru WHERE d.id_guru = (SELECT id_guru FROM t_guru where id_user ='. $id_user .')');
           
             
    }

    public function tambahData($data) {
        $this->db->insert('t_siswa', $data);
        return $this->db->insert_id();
    }

    
    public function get_all_parents() {
        $query = $this->db->query("select * from t_orang_tua ");
        return $query->result();
    }

	public function get_all_gurus() {
		$query = $this->db->query("SELECT wk.*, g.nama_guru 
								   FROM t_wali_kelas wk
								   INNER JOIN t_guru g ON wk.id_guru = g.id_guru");
		return $query->result();
	}
	
	
    
    public function get_id_orang_tua_by_nama($nama_orang_tua) {
       
        $query = $this->db->get_where('t_orang_tua', array('nama_orang_tua' => $nama_orang_tua));
       
        $row = $query->row();
  
        return $row ? $row->id_orang_tua : null;
    }
      
        

    public function deleteData($id_siswa) {
        // Lakukan query DELETE untuk menghapus data siswa berdasarkan ID siswa
        $this->db->where('id_siswa', $id_siswa);
        $deleted = $this->db->delete('t_siswa');
    
        return $deleted;
    }
     
  public function updateData($id, $data) {
    $this->db->where('id_siswa', $id);
    $updated = $this->db->update('t_siswa', $data);

    // Debugging: Check the last executed query
    // echo $this->db->last_query();

    return $updated;
}

}

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
        
        return $this->db->query('SELECT a.*,b.id_kelas,c.nama_orang_tua,d.nama_guru FROM t_siswa a INNER JOIN t_wali_kelas b ON a.id_wali_kelas=b.id_wali_kelas 
         INNER JOIN t_orang_tua c ON a.id_orang_tua=c.id_orang_tua
            INNER JOIN t_guru d ON b.id_guru=d.id_guru WHERE d.id_guru = (SELECT id_guru FROM t_guru where id_user ='. $id_user .')');
           
             
    }
    public function tambahData($data) {
        // Memasukkan data siswa ke dalam tabel 't_siswa' di database
        $id_user = $this->session->userdata('id_user');

        // Mendapatkan nama orang tua dari inputan
        $nama_orang_tua = $this->input->post('nama_orang_tua');
    
        // Melakukan pengecekan apakah $id_user memiliki nilai yang valid sebelum menggunakan dalam query SQL
        if ($id_user) {
            // Query untuk mendapatkan id_wali_kelas dari tabel t_wali_kelas sesuai dengan id_user
            $query = $this->db->query("SELECT id_wali_kelas FROM t_wali_kelas WHERE id_guru = (SELECT id_guru FROM t_guru WHERE id_user = ". $id_user .")");
            
            // Memeriksa apakah query berhasil dieksekusi dan hasilnya tidak kosong
            if ($query && $query->num_rows() > 0) {
                $row = $query->row();
                $id_wali_kelas = $row->id_wali_kelas;
    
                // Dapatkan id_orang_tua berdasarkan nama orang tua yang dipilih
                $id_orang_tua = $this->get_id_orang_tua_by_nama($nama_orang_tua);
                
                if ($id_orang_tua !== null) {
                    // Lakukan INSERT dengan id_wali_kelas dan id_orang_tua yang diperoleh
                    $this->db->query("INSERT INTO t_siswa (nisn, nama_siswa, tanggal_lahir, jenis_kelamin, alamat, id_wali_kelas, id_orang_tua, id_guru) VALUES ('". $data['nisn'] ."', '". $data['nama_siswa'] ."', '". $data['tanggal_lahir'] ."', '". $data['jenis_kelamin'] ."', '". $data['alamat'] ."', $id_wali_kelas, $id_orang_tua, $id_guru)");
    
                    // Lakukan query SELECT untuk mengembalikan hasil yang Anda inginkan
                    $result = $this->db->query('SELECT a.*,b.id_kelas,c.nama_orang_tua,d.nama_guru FROM t_siswa a INNER JOIN t_wali_kelas b ON a.id_wali_kelas=b.id_wali_kelas INNER JOIN t_orang_tua c ON a.id_orang_tua=c.id_orang_tua INNER JOIN t_guru d ON b.id_guru=d.id_guru WHERE d.id_guru = (SELECT id_guru FROM t_guru WHERE id_user ='. $id_user .')');
    
                    return $result;
                } else {
                    // Jika nama orang tua tidak ditemukan, lakukan penanganan error sesuai kebutuhan aplikasi Anda
                    return false;
                }
            } else {
                // Jika query tidak menghasilkan id_wali_kelas yang sesuai, lakukan penanganan error sesuai kebutuhan aplikasi Anda
                return false;
            }
        } else {
            // Jika $id_user tidak memiliki nilai yang valid, lakukan penanganan error sesuai kebutuhan aplikasi Anda
            return false;
        }
    }
    
    public function get_all_parents() {
        $query = $this->db->query("select * from t_orang_tua ");
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
     
    public function updateData($where, $data, $tabel) {
        $this->db->where($where);
        return $this->db->update($tabel, $data);
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VerifikasiModel extends CI_Model {

    public function getPelanggaranBelumSelesaiWk($id)
	{
		$query = $this->db->select('a.*, b.*, c.*')
							->from('tbl_pelaporan a')
							->from('tbl_siswa b', 'a.id_siswa = b.id_siswa', 'left')
							->join('tbl_user c', 'a.id_wali_kelas = c.id_user', 'left')
							->where('a.selesai', 0)
							->where('a.status_pelaporan', 0)
							->where('a.id_wali_kelas', $id)
							->get();
		return $query->result();
	}
	

}
?>

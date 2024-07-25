<?php

class PelanggaranModel extends CI_Model
{
	public function getPelanggaranBelumSelesaiWk($id)
	{
		$query = $this->db->select('a.*, b.*, c.*')
							->from('tbl_pelaporan a')
							->from('tbl_siswa b', 'a.id_siswa = b.id_siswa', 'left')
							->join('tbl_user c', 'a.id_wali_kelas = c.id_user', 'left')
							->where('a.selesai', 0)
							->where('a.status_pelaporan', 2)
							->where('a.id_wali_kelas', $id)
							->get();
		return $query->result();
	}

	public function getPelanggaranSelesaiWk($id)
	{
		$query = $this->db->select('a.*, b.*, c.*')
							->from('tbl_pelaporan a')
							->from('tbl_siswa b', 'a.id_siswa = b.id_siswa', 'left')
							->join('tbl_user c', 'a.id_wali_kelas = c.id_user', 'left')
							->where('a.selesai', 1)
							->where('a.id_wali_kelas', $id)
							->get();
		return $query->result();
	}

	public function getPelanggaranSelesai()
	{
		$query = $this->db->select('a.*, b.*, c.*')
							->from('tbl_pelaporan a')
							->from('tbl_siswa b', 'a.id_siswa = b.id_siswa', 'left')
							->join('tbl_user c', 'a.id_wali_kelas = c.id_user', 'left')
							->where('a.selesai', 1)
							->get();
		return $query->result();
	}

	public function getById($id)
	{
		$query = $this->db->select('a.*, b.*, c.*')
							->from('tbl_pelaporan a')
							->from('tbl_siswa b', 'a.id_siswa = b.id_siswa', 'left')
							->join('tbl_user c', 'a.id_wali_kelas = c.id_user', 'left')
							->where('a.id_pelaporan', $id)
							->get();
		return $query->row();
	}

	public function update($id, $data)
	{
		$this->db->where('id_pelaporan', $id);
		$this->db->update('tbl_pelaporan', $data);
	}	
}

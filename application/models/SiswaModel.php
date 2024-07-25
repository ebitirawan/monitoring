<?php

class SiswaModel extends CI_Model
{
	public function getAll($id = null)
	{
		if ($id == null) {
			$query = $this->db->select('a.*, b.nama_ruangan, ')
						->from('tbl_siswa a')
						->join('tbl_user b', 'a.id_wali_kelas = b.id_user', 'left')
						->get();
			return $query->result();
		} else {
			$query = $this->db->select('a.*, b.nama_ruangan, ')
						->from('tbl_siswa a')
						->join('tbl_user b', 'a.id_wali_kelas = b.id_user', 'left')
						->where('id_wali_kelas', $id)
						->get();
			return $query->result();
		}
	}

	public function getById($id)
	{
		$query = $this->db->get_where('tbl_siswa', ['id_siswa' => $id]);
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('tbl_siswa', $data);
	}

	public function update($id, $data)
	{
		$this->db->where('id_siswa', $id);
		$this->db->update('tbl_siswa', $data);
	}

	public function delete($id)
	{
		$this->db->where('id_siswa', $id);
		$this->db->delete('tbl_siswa');
	}
}

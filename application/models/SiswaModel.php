<?php

class SiswaModel extends CI_Model
{
	public function get_all()
	{
		$query = $this->db->get('tbl_mst_faskes');
		return $query->result();
	}	

	public function insert($data)
	{
		$this->db->insert('tbl_mst_faskes', $data);

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function delete($id)
	{
		$this->db->where('id_faskes', $id);
		$this->db->delete('tbl_mst_faskes');

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}	
}

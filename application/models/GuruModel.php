<?php

class GuruModel extends CI_Model
{
	public function get_all()
	{
		$query = $this->db->get('tbl_mst_jns_alkon');
		return $query->result();
	}	

	public function insert($data)
	{
		$this->db->insert('tbl_mst_jns_alkon', $data);

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function delete($id)
	{
		$this->db->where('id_jns_alkon', $id);
		$this->db->delete('tbl_mst_jns_alkon');

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

}

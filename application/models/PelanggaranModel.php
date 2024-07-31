<?php

class PelanggaranModel extends CI_Model
{
    // Mengambil pelanggaran yang belum selesai dan sesuai dengan id_wali_kelas
    public function getPelanggaranBelumSelesaiWk($id)
    {
        $query = $this->db->select('a.*, b.nama_siswa, b.nip_nisn, c.nama_user')
                          ->from('tbl_pelaporan a')
                          ->join('tbl_siswa b', 'a.id_siswa = b.id_siswa', 'left')
                          ->join('tbl_user c', 'a.id_wali_kelas = c.id_user', 'left')
                          ->where('a.selesai', 0)
                          ->where('a.status_pelaporan', 2)
                          ->where('a.id_wali_kelas', $id)
                          ->get();
        return $query->result();
    }

    // Mengambil pelanggaran selesai berdasarkan id_wali_kelas
    public function getPelanggaranSelesaiWk($id)
    {
        $query = $this->db->select('a.*, b.nama_siswa, b.nip_nisn, c.nama_user')
                          ->from('tbl_pelaporan a')
                          ->join('tbl_siswa b', 'a.id_siswa = b.id_siswa', 'left')
                          ->join('tbl_user c', 'a.id_wali_kelas = c.id_user', 'left')
                          ->where('a.selesai', 1)
                          ->where('a.id_wali_kelas', $id)
                          ->get();
        return $query->result();
    }

    // Mengambil pelanggaran selesai tanpa filter id_wali_kelas
    public function getPelanggaranSelesai()
    {
        $query = $this->db->select('a.*, b.nama_siswa, b.nip_nisn, c.nama_user')
                          ->from('tbl_pelaporan a')
                          ->join('tbl_siswa b', 'a.id_siswa = b.id_siswa', 'left')
                          ->join('tbl_user c', 'a.id_wali_kelas = c.id_user', 'left')
                          ->where('a.selesai', 1)
                          ->get();
        return $query->result();
    }

    // Mengambil pelanggaran berdasarkan id_pelaporan
    public function getById($id)
    {
        $query = $this->db->select('a.*, b.nama_siswa, b.nip_nisn, b.no_ortu, c.nama_user')
                          ->from('tbl_pelaporan a')
                          ->join('tbl_siswa b', 'a.id_siswa = b.id_siswa', 'left')
                          ->join('tbl_user c', 'a.id_wali_kelas = c.id_user', 'left')
                          ->where('a.id_pelaporan', $id)
                          ->get();
        return $query->row();
    }

    // Memperbarui data pelanggaran berdasarkan id_pelaporan
    public function update($id, $data)
    {
        $this->db->where('id_pelaporan', $id);
        $this->db->update('tbl_pelaporan', $data);
    }   

    // Mengambil pelanggaran yang belum terverifikasi
    public function belumterverifikasi()
    {
        $query = $this->db->select('a.*, b.nama_siswa, c.nama_user')
                          ->from('tbl_pelaporan a')
                          ->join('tbl_siswa b', 'a.id_siswa = b.id_siswa', 'left')
                          ->join('tbl_user c', 'a.id_wali_kelas = c.id_user', 'left')
                          ->where('a.selesai', 0)
                          ->where('a.status_pelaporan', 1)
                          ->get();
        return $query->result();
    }

    // Mengambil pelanggaran yang belum selesai dan sesuai dengan id_wali_kelas
    public function getPelanggaranBelumSelesaiBk()
    {
        $query = $this->db->select('a.*, b.nama_siswa, b.nip_nisn, c.nama_user')
                          ->from('tbl_pelaporan a')
                          ->join('tbl_siswa b', 'a.id_siswa = b.id_siswa', 'left')
                          ->join('tbl_user c', 'a.id_wali_kelas = c.id_user', 'left')
                          ->where('a.selesai', 0)
                          ->where('a.status_pelaporan', 3)
                          ->get();
        return $query->result();
    }

    // Mengambil pelanggaran selesai berdasarkan id_wali_kelas
    public function getPelanggaranSelesaiBk()
    {
        $query = $this->db->select('a.*, b.nama_siswa, b.nip_nisn, c.nama_user')
                          ->from('tbl_pelaporan a')
                          ->join('tbl_siswa b', 'a.id_siswa = b.id_siswa', 'left')
                          ->join('tbl_user c', 'a.id_wali_kelas = c.id_user', 'left')
                          ->where('a.selesai', 1)
                          ->where('a.status_pelaporan', 3)
                          ->get();
        return $query->result();
    }
}

<?php

class Krs_model extends CI_Model
{
    private $_table = 'kres';

    //Method get() untuk mengambil semua artikel dari database;

    public function get()
    {
        $query = $this->db->get('kres')->result();
        $this->db->join('mahasiswa', 'krs.nim = mahasiswa.nim');
        $this->db->join('konversi_nilai_mutu', 'krs.id_nilai = konversi_nilai_mutu.id_nilai');
        $this->db->join('semester', 'krs.id_semester = semester.id_semester');
        $this->db->join('mata_kuliah', 'krs.kode_mk = mata_kuliah.kode_mk');
        return $query;
    }

    public function nim()
    {
        return $this->db->get('mahasiswa')->result_array();
    }

    public function idNilaiHuruf()
    {
        return $this->db->get('konversi_nilai_mutu')->result_array();
    }

    public function idSemester()
    {
        $this->db->order_by('semester.id_semester', 'ASC');
        return $this->db->get('semester')->result_array();
    }

    public function kodeMk()
    {
        return $this->db->get('mata_kuliah')->result_array();
    }
    //Method find() untuk mengambil satu artikel saja dengan id tertentu;

    public function find($id_krs)
    {
        if (!$id_krs) {
            return;
        }

        $query = $this->db->get_where($this->_table, array('id_krs' => $id_krs));
        return $query->row();
    }

    //Method insert() untuk menambahkan artikel baru;

    public function insert($krs)
    {
        return $this->db->insert($this->_table, $krs);
    }

    // Method update() untuk mengupdate artikel;
    public function update($krs)
    {
        if (!isset($krs['id_krs'])) {
            return;
        }

        return $this->db->update($this->_table, $krs, ['id_krs' => $krs['id_krs']]);
    }

    public function ubah($id_krs, $data)
    {
        $this->db->where('id_krs', $id_krs);
        $this->db->update('id_krs', $data);
    }

    // method delete() untuk menghapus artikel.
    public function delete($id_krs)
    {
        if (!$id_krs) {
            return;
        }

        return $this->db->delete($this->_table, ['id_krs' => $id_krs]);
    }

    public function hitung()
    {
        return $this->db->count_all($this->_table);
    }
}

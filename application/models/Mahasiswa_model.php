<?php

class Mahasiswa_model extends CI_Model
{
    private $_table = 'mahasiswa';

    //Method get() untuk mengambil semua artikel dari database;

    public function get()
    {
        $query = $this->db->get('mahasiswa')->result();
        $this->db->join('info_program_studi', 'mahasiswa.id_prodi = info_program_studi.id_prodi');
        return $query;
    }

    public function getProdi()
    {
        return $this->db->get('info_program_studi')->result_array();
    }

    //Method find() untuk mengambil satu artikel saja dengan id tertentu;

    public function find($nim)
    {
        if (!$nim) {
            return;
        }

        $query = $this->db->get_where($this->_table, array('nim' => $nim));
        return $query->row();
    }

    //Method insert() untuk menambahkan artikel baru;

    public function insert($mahasiswa)
    {
        return $this->db->insert($this->_table, $mahasiswa);
    }

    // Method update() untuk mengupdate artikel;
    public function update($mahasiswa)
    {
        if (!isset($mahasiswa['nim'])) {
            return;
        }

        return $this->db->update($this->_table, $mahasiswa, ['nim' => $mahasiswa['nim']]);
    }

    public function ubah($nim, $data)
    {
        $this->db->where('nim', $nim);
        $this->db->update('mahasiswa', $data);
    }

    // method delete() untuk menghapus artikel.
    public function delete($nim)
    {
        if (!$nim) {
            return;
        }

        return $this->db->delete($this->_table, ['nim' => $nim]);
    }

    public function count()
    {
        return $this->db->count_all($this->_table);
    }

    public function hitung()
    {
        return $this->db->count_all($this->_table);
    }
}

<?php

class Prodi_model extends CI_Model
{
    private $_table = 'info_program_studi';

    //Method get() untuk mengambil semua artikel dari database;

    public function get()
    {
        $query = $this->db->get($this->_table);
        return $query->result();
    }

    //Method find() untuk mengambil satu artikel saja dengan id tertentu;

    public function find($id_prodi)
    {
        if (!$id_prodi) {
            return;
        }

        $query = $this->db->get_where($this->_table, array('id_prodi' => $id_prodi));
        return $query->row();
    }

    //Method insert() untuk menambahkan artikel baru;

    public function insert($info_program_studi)
    {
        return $this->db->insert($this->_table, $info_program_studi);
    }

    // Method update() untuk mengupdate artikel;
    public function update($info_program_studi)
    {
        if (!isset($info_program_studi['id_prodi'])) {
            return;
        }

        return $this->db->update($this->_table, $info_program_studi, ['id_prodi' => $info_program_studi['id_prodi']]);
    }

    // method delete() untuk menghapus artikel.
    public function delete($id_prodi)
    {
        if (!$id_prodi) {
            return;
        }

        return $this->db->delete($this->_table, ['id_prodi' => $id_prodi]);
    }

    public function hitung()
    {
        return $this->db->count_all($this->_table);
    }
}

 <?php

    class Matkul_model extends CI_Model
    {

        private $_table = 'mata_kuliah';

        //Method get() untuk mengambil semua artikel dari database;

        public function get()
        {
            $query = $this->db->get($this->_table);
            return $query->result();
        }
        public function find($kode_mk)
        {
            if (!$kode_mk) {
                return;
            }

            $query = $this->db->get_where($this->_table, array('kode_mk' => $kode_mk));
            return $query->row();
        }

        //Method insert() untuk menambahkan artikel baru;

        public function insert($mata_kuliah)
        {
            return $this->db->insert($this->_table, $mata_kuliah);
        }

        // Method update() untuk mengupdate artikel;
        public function update($mata_kuliah)
        {
            if (!isset($mata_kuliah['kode_mk'])) {
                return;
            }

            return $this->db->update($this->_table, $mata_kuliah, ['kode_mk' => $mata_kuliah['kode_mk']]);
        }

        public function ubah($kode_mk, $data)
        {
            $this->db->where('kode_mk', $kode_mk);
            $this->db->update('mata_kuliah', $data);
        }

        // method delete() untuk menghapus artikel.
        public function delete($kode_mk)
        {
            if (!$kode_mk) {
                return;
            }

            return $this->db->delete($this->_table, ['kode_mk' => $kode_mk]);
        }

        public function hitung()
        {
            return $this->db->count_all($this->_table);
        }
    }

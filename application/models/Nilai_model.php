 <?php

    class Nilai_model extends CI_Model
    {

        private $_table = 'konversi_nilai_mutu';

        //Method get() untuk mengambil semua artikel dari database;

        public function get()
        {
            $query = $this->db->get($this->_table);
            return $query->result();
        }
        public function find($id_nilai)
        {
            if (!$id_nilai) {
                return;
            }

            $query = $this->db->get_where($this->_table, array('id_nilai' => $id_nilai));
            return $query->row();
        }

        //Method insert() untuk menambahkan artikel baru;

        public function insert($konversi_nilai_mutu)
        {
            return $this->db->insert($this->_table, $konversi_nilai_mutu);
        }

        // Method update() untuk mengupdate artikel;
        public function update($konversi_nilai_mutu)
        {
            if (!isset($konversi_nilai_mutu['id_nilai'])) {
                return;
            }

            return $this->db->update($this->_table, $konversi_nilai_mutu, ['id_nilai' => $konversi_nilai_mutu['id_nilai']]);
        }

        public function ubah($id_nilai, $data)
        {
            $this->db->where('id_nilai', $id_nilai);
            $this->db->update('konversi_nilai_mutu', $data);
        }

        // method delete() untuk menghapus artikel.
        public function delete($id_nilai)
        {
            if (!$id_nilai) {
                return;
            }

            return $this->db->delete($this->_table, ['id_nilai' => $id_nilai]);
        }
    }

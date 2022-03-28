 <?php

    class Semester_model extends CI_Model
    {

        private $_table = 'semester';

        //Method get() untuk mengambil semua artikel dari database;

        public function get()
        {
            $this->db->select('*');
            $this->db->from('semester');
            $this->db->order_by('semester.id_semester', 'ASC');
            return $this->db->get('');
        }
        public function find($id_semester)
        {
            if (!$id_semester) {
                return;
            }

            $query = $this->db->get_where($this->_table, array('id_semester' => $id_semester));
            return $query->row();
        }

        //Method insert() untuk menambahkan artikel baru;

        public function insert($semester)
        {
            return $this->db->insert($this->_table, $semester);
        }

        // Method update() untuk mengupdate artikel;
        public function update($semester)
        {
            if (!isset($semester['id_semester'])) {
                return;
            }

            return $this->db->update($this->_table, $semester, ['id_semester' => $semester['id_semester']]);
        }

        public function ubah($id_semester, $data)
        {
            $this->db->where('id_semester', $id_semester);
            $this->db->update('semester', $data);
        }

        // method delete() untuk menghapus artikel.
        public function delete($id_semester)
        {
            if (!$id_semester) {
                return;
            }

            return $this->db->delete($this->_table, ['id_semester' => $id_semester]);
        }

        public function hitung()
        {
            return $this->db->count_all($this->_table);
        }
    }

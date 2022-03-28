<?php

class Semester extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
        $this->load->model('semester_model');

        if (!$this->auth_model->current_user()) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data['current_user'] = $this->auth_model->current_user();
        $data['semester'] = $this->semester_model->get()->result();

        if (count($data['semester']) > 0) {
            // kirim data artikel ke view
            $this->load->view('admin/semester_list', $data);
        } else {
            // kalau gaada artikel, tampilkan view ini
            $this->load->view('admin/semester_empty', $data);
        }
    }

    public function neww()
    {
        $data['current_user'] = $this->auth_model->current_user();
        $this->load->library('form_validation');

        if ($this->input->method() === 'post') {
            // TODO: Lakukan validasi sebelum menyimpan ke model

            // generate unique id and slug

            $semester = [
                'id_semester' => $this->input->post('id_semester'),
                'nama_semester' => $this->input->post('nama_semester')
            ];

            $saved = $this->semester_model->insert($semester);

            if ($saved) {
                $this->session->set_flashdata('message', 'Data Semester berhasil ditambahkan');
                return redirect('admin/semester');
            }
        }

        $this->load->view('admin/semester_new_form.php', $data);
    }

    public function edit($id_semester = null)
    {
        $data['current_user'] = $this->auth_model->current_user();
        $data['semester'] = $this->semester_model->find($id_semester);

        if (!$data['semester'] || !$id_semester) {
            show_404();
        }

        if ($this->input->method() === 'post') {
            // TODO: lakukan validasi data seblum simpan ke model
            $semester =
                [
                    'id_semester' => $this->input->post('id_semester'),
                    'nama_semester' => $this->input->post('nama_semester')
                ];

            $updated = $this->semester_model->update($semester);
            if ($updated) {
                $this->session->set_flashdata('message', 'Data Semester berhasil diperbarui');
                redirect('admin/semester');
            }
        }

        $this->load->view('admin/semester_edit_form.php', $data);
    }

    public function fungsi_edit()
    {
        $id_semester = $this->input->post('id_semester');
        $nama_semester = $this->input->post('nama_semester');

        $data = array(
            'id_semester' => $id_semester,
            'nama_semester' => $nama_semester,
        );

        $this->semester_model->ubah($id_semester, $data);
        redirect(base_url('admin/semester'));
    }

    public function delete($id_semester = null)
    {
        if (!$id_semester) {
            show_404();
        }

        $deleted = $this->semester_model->delete($id_semester);
        if ($deleted) {
            $this->session->set_flashdata('message', 'Data Semester berhasil dihapus');
            redirect('admin/semester');
        }
    }
}

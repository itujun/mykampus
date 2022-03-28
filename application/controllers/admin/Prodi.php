<?php

class Prodi extends CI_Controller
{

    // Method __construct(): konstruktor untuk load model Article_model.php secara default;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
        $this->load->model('prodi_model');

        if (!$this->auth_model->current_user()) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data['current_user'] = $this->auth_model->current_user();
        $data['prodis'] = $this->prodi_model->get();

        if (count($data['prodis']) > 0) {
            // kirim data artikel ke view
            $this->load->view('admin/prodi_list', $data);
        } else {
            // kalau gaada artikel, tampilkan view ini
            $this->load->view('admin/prodi_empty', $data);
        }
    }

    public function neww()
    {
        $data['current_user'] = $this->auth_model->current_user();
        $this->load->library('form_validation');

        if ($this->input->method() === 'post') {
            // TODO: Lakukan validasi sebelum menyimpan ke model

            // generate unique id and slug

            $info_program_studi = [
                'id_prodi' => $this->input->post('id_prodi'),
                'nama_prodi' => $this->input->post('nama_prodi')
            ];

            $saved = $this->prodi_model->insert($info_program_studi);

            if ($saved) {
                $this->session->set_flashdata('message', 'Data Prodi berhasil ditambahkan');
                return redirect('admin/prodi');
            }
        }

        $this->load->view('admin/prodi_new_form.php', $data);
    }

    public function edit($id_prodi = null)
    {
        $data['current_user'] = $this->auth_model->current_user();
        $data['info_program_studi'] = $this->prodi_model->find($id_prodi);

        if (!$data['info_program_studi'] || !$id_prodi) {
            show_404();
        }

        if ($this->input->method() === 'post') {
            // TODO: lakukan validasi data seblum simpan ke model
            $info_program_studi =
                [
                    'id_prodi' => $this->input->post('id_prodi'),
                    'nama_prodi' => $this->input->post('nama_prodi')
                ];

            $updated = $this->prodi_model->update($info_program_studi);
            if ($updated) {
                $this->session->set_flashdata('message', 'Data Prodi berhasil diperbarui');
                redirect('admin/prodi');
            }
        }

        $this->load->view('admin/prodi_edit_form.php', $data);
    }

    public function delete($id_prodi = null)
    {
        if (!$id_prodi) {
            show_404();
        }

        $deleted = $this->prodi_model->delete($id_prodi);
        if ($deleted) {
            $this->session->set_flashdata('message', 'Data Prodi berhasil dihapus');
            redirect('admin/prodi');
        }
    }
}

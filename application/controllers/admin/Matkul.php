<?php

class Matkul extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
        $this->load->model('matkul_model');

        if (!$this->auth_model->current_user()) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data['current_user'] = $this->auth_model->current_user();
        $data['matkul'] = $this->matkul_model->get();

        if (count($data['matkul']) > 0) {
            // kirim data artikel ke view
            $this->load->view('admin/matkul_list', $data);
        } else {
            // kalau gaada artikel, tampilkan view ini
            $this->load->view('admin/matkul_empty', $data);
        }
    }

    public function neww()
    {
        $data['current_user'] = $this->auth_model->current_user();
        $this->load->library('form_validation');

        if ($this->input->method() === 'post') {
            // TODO: Lakukan validasi sebelum menyimpan ke model

            // generate unique id and slug

            $mata_kuliah = [
                'kode_mk' => $this->input->post('kode_mk'),
                'nama_mk' => $this->input->post('nama_mk'),
                'sks_mk' => $this->input->post('sks_mk')
            ];

            $saved = $this->matkul_model->insert($mata_kuliah);

            if ($saved) {
                $this->session->set_flashdata('message', 'Data Mata Kuliah berhasil ditambahkan');
                return redirect('admin/matkul');
            }
        }

        $this->load->view('admin/matkul_new_form.php', $data);
    }

    public function edit($kode_mk = null)
    {
        $data['current_user'] = $this->auth_model->current_user();
        $data['matkul'] = $this->matkul_model->find($kode_mk);

        if (!$data['matkul'] || !$kode_mk) {
            show_404();
        }

        if ($this->input->method() === 'post') {
            // TODO: lakukan validasi data seblum simpan ke model

            $mata_kuliah = [
                'kode_mk' => $this->input->post('kode_mk'),
                'nama_mk' => $this->input->post('nama_mk'),
                'sks_mk' => $this->input->post('sks_mk')
            ];

            $updated = $this->matkul_model->update($mata_kuliah);
            if ($updated) {
                $this->session->set_flashdata('message', 'Data Mata Kuliah berhasil diperbarui');
                redirect('admin/matkul');
            }
        }

        $this->load->view('admin/matkul_edit_form.php', $data);
    }

    public function fungsi_edit()
    {
        $kode_mk = $this->input->post('kode_mk');
        $nama_mk = $this->input->post('nama_mk');
        $sks_mk = $this->input->post('sks_mk');

        $edit = array(
            'kode_mk' => $kode_mk,
            'nama_mk' => $nama_mk,
            'sks_mk' => $sks_mk
        );

        $this->matkul_model->ubah($kode_mk, $edit);
        redirect(base_url('admin/matkul'));
    }

    public function delete($kode_mk = null)
    {
        if (!$kode_mk) {
            show_404();
        }

        $deleted = $this->matkul_model->delete($kode_mk);
        if ($deleted) {
            $this->session->set_flashdata('message', 'Data Mata Kuliah berhasil dihapus');
            redirect('admin/matkul');
        }
    }
}

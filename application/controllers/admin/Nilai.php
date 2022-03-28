<?php

class Nilai extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
        $this->load->model('nilai_model');

        if (!$this->auth_model->current_user()) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data['current_user'] = $this->auth_model->current_user();
        $data['nilai'] = $this->nilai_model->get();

        if (count($data['nilai']) > 0) {
            // kirim data artikel ke view
            $this->load->view('admin/nilai_list', $data);
        } else {
            // kalau gaada artikel, tampilkan view ini
            $this->load->view('admin/nilai_empty', $data);
        }
    }

    public function neww()
    {
        $data['current_user'] = $this->auth_model->current_user();
        $this->load->library('form_validation');

        if ($this->input->method() === 'post') {
            // TODO: Lakukan validasi sebelum menyimpan ke model

            // generate unique id and slug

            $konversi_nilai_mutu = [
                'id_nilai' => $this->input->post('id_nilai'),
                'id_nilai_huruf' => $this->input->post('id_nilai_huruf'),
                'nilai_mutu' => $this->input->post('nilai_mutu'),
                'is_ulang' => $this->input->post('is_ulang')
            ];

            $saved = $this->nilai_model->insert($konversi_nilai_mutu);

            if ($saved) {
                $this->session->set_flashdata('message', 'Data Nilai berhasil ditambahkan');
                return redirect('admin/nilai');
            }
        }

        $this->load->view('admin/nilai_new_form.php', $data);
    }

    public function edit($id_nilai = null)
    {
        $data['current_user'] = $this->auth_model->current_user();
        $data['nilai'] = $this->nilai_model->find($id_nilai);

        if (!$data['nilai'] || !$id_nilai) {
            show_404();
        }

        if ($this->input->method() === 'post') {
            // TODO: lakukan validasi data seblum simpan ke model

            $konversi_nilai_mutu = [
                'id_nilai' => $this->input->post('id_nilai'),
                'id_nilai_huruf' => $this->input->post('id_nilai_huruf'),
                'nilai_mutu' => $this->input->post('nilai_mutu'),
                'is_ulang' => $this->input->post('is_ulang')
            ];

            $updated = $this->nilai_model->update($konversi_nilai_mutu);
            if ($updated) {
                $this->session->set_flashdata('message', 'Data Nilai berhasil diperbarui');
                redirect('admin/nilai');
            }
        }

        $this->load->view('admin/nilai_edit_form.php', $data);
    }

    public function fungsi_edit()
    {
        $id_nilai = $this->input->post('id_nilai');
        $id_nilai_huruf = $this->input->post('id_nilai_huruf');
        $nilai_mutu = $this->input->post('nilai_mutu');
        $is_ulang = $this->input->post('is_ulang');

        $edit = array(
            'id_nilai' => $id_nilai,
            'id_nilai_huruf' => $id_nilai_huruf,
            'nilai_mutu' => $nilai_mutu,
            'is_ulang' => $is_ulang
        );

        $this->nilai_model->ubah($id_nilai, $edit);
        redirect(base_url('admin/nilai'));
    }

    public function delete($id_nilai = null)
    {
        if (!$id_nilai) {
            show_404();
        }

        $deleted = $this->nilai_model->delete($id_nilai);
        if ($deleted) {
            $this->session->set_flashdata('message', 'Data Nilai berhasil dihapus');
            redirect('admin/nilai');
        }
    }
}

<?php

class Krs extends CI_Controller
{

    // Method __construct(): konstruktor untuk load model Article_model.php secara default;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
        $this->load->model('krs_model');

        if (!$this->auth_model->current_user()) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data['current_user'] = $this->auth_model->current_user();
        $data['krs'] = $this->krs_model->get();

        if (count($data['krs']) > 0) {
            // kirim data artikel ke view
            $this->load->view('admin/krs_list', $data);
        } else {
            // kalau gaada artikel, tampilkan view ini
            $this->load->view('admin/krs_empty', $data);
        }
    }

    public function neww()
    {
        $data['current_user'] = $this->auth_model->current_user();
        $data['semester'] = $this->krs_model->idSemester();
        $data['nilai'] = $this->krs_model->idNilaiHuruf();
        $data['nim'] = $this->krs_model->nim();
        $data['matkul'] = $this->krs_model->kodeMk();

        if ($this->input->method() === 'post') {

            $krs = [
                'id_krs' => $this->input->post('id_krs'),
                'id_semester' => $this->input->post('id_semester'),
                'id_nilai' => $this->input->post('id_nilai'),
                'nim' => $this->input->post('nim'),
                'kode_mk' => $this->input->post('kode_mk'),
                'nilai_angka' => $this->input->post('nilai_angka'),
                'is_lulus' => $this->input->post('is_lulus')
            ];

            $saved = $this->krs_model->insert($krs);

            if ($saved) {
                $this->session->set_flashdata('message', 'Data KRS berhasil ditambahkan');
                return redirect('admin/krs');
            }
        }

        $this->load->view('admin/krs_new_form.php', $data);
    }

    public function edit($id_krs = null)
    {
        $data['current_user'] = $this->auth_model->current_user();
        $data['krs'] = $this->krs_model->find($id_krs);
        $data['semester'] = $this->krs_model->idSemester();
        $data['nilai'] = $this->krs_model->idNilaiHuruf();
        $data['mahasiswa'] = $this->krs_model->nim();
        $data['matkul'] = $this->krs_model->kodeMk();

        if (!$data['krs'] || !$id_krs) {
            show_404();
        }

        if ($this->input->method() === 'post') {
            // TODO: lakukan validasi data seblum simpan ke model
            $krs = [
                'id_krs' => $this->input->post('id_krs'),
                'id_semester' => $this->input->post('id_semester'),
                'id_nilai' => $this->input->post('id_nilai'),
                'nim' => $this->input->post('nim'),
                'kode_mk' => $this->input->post('kode_mk'),
                'nilai_angka' => $this->input->post('nilai_angka'),
                'is_lulus' => $this->input->post('is_lulus')
            ];

            $updated = $this->krs_model->update($krs);
            if ($updated) {
                $this->session->set_flashdata('message', 'Data Krs berhasil diperbarui');
                redirect('admin/krs');
            }
        }

        $this->load->view('admin/krs_edit_form.php', $data);
    }

    // public function fungsi_edit()
    // {
    //     $id_krs = $this->input->post('id_krs');
    //     $id_semester = $this->input->post('id_semester');
    //     $id_nilai = $this->input->post('id_nilai');
    //     $nim = $this->input->post('nim');
    //     $kode_mk = $this->input->post('kode_mk');
    //     $nilai_angka = $this->input->post('nilai_angka');
    //     $is_lulus = $this->input->post('is_lulus');

    //     $data = array(
    //         'id_krs' => $id_krs,
    //         'id_semester' => $id_semester,
    //         'id_nilai' => $id_nilai,
    //         'nim' => $nim,
    //         'kode_mk' => $kode_mk,
    //         'nilai_angka' => $nilai_angka,
    //         'is_lulus' => $is_lulus,
    //     );

    //     $this->krs_model->ubah($id_krs, $data);
    //     redirect(base_url('admin/krs'));
    // }

    public function delete($id_krs = null)
    {
        if (!$id_krs) {
            show_404();
        }

        $deleted = $this->krs_model->delete($id_krs);
        if ($deleted) {
            $this->session->set_flashdata('message', 'Data Krs berhasil dihapus');
            redirect('admin/krs');
        }
    }
}

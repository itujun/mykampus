<?php

class Mahasiswa extends CI_Controller
{

    // Method __construct(): konstruktor untuk load model Article_model.php secara default;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
        $this->load->model('mahasiswa_model');


        if (!$this->auth_model->current_user()) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data['current_user'] = $this->auth_model->current_user();
        $data['mahasiswa'] = $this->mahasiswa_model->get();

        if (count($data['mahasiswa']) > 0) {
            // kirim data artikel ke view
            $this->load->view('admin/mahasiswa_list', $data);
        } else {
            // kalau gaada artikel, tampilkan view ini
            $this->load->view('admin/mahasiswa_empty', $data);
        }
    }

    public function neww()
    {
        $data['current_user'] = $this->auth_model->current_user();
        $data['prodi'] = $this->mahasiswa_model->getProdi();

        if ($this->input->method() === 'post') {

            $mahasiswa = [
                'nim' => $this->input->post('nim'),
                'id_prodi' => $this->input->post('id_prodi'),
                'nama_mahasiswa' => $this->input->post('nama_mahasiswa'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'alamat' => $this->input->post('alamat'),
                'kota' => $this->input->post('kota'),
                'nik' => $this->input->post('nik')
            ];

            $saved = $this->mahasiswa_model->insert($mahasiswa);

            if ($saved) {
                $this->session->set_flashdata('message', 'Data Mahasiswa berhasil ditambahkan');
                return redirect('admin/mahasiswa');
            }
        }

        $this->load->view('admin/mahasiswa_new_form.php', $data);
    }

    public function edit($nim = null)
    {
        $data['current_user'] = $this->auth_model->current_user();
        $data['mahasiswa'] = $this->mahasiswa_model->find($nim);
        $data['prodi'] = $this->mahasiswa_model->getProdi();

        if (!$data['mahasiswa'] || !$nim) {
            show_404();
        }

        if ($this->input->method() === 'post') {
            // TODO: lakukan validasi data seblum simpan ke model
            $mahasiswa = [
                'nim' => $this->input->post('nim'),
                'id_prodi' => $this->input->post('id_prodi'),
                'nama_mahasiswa' => $this->input->post('nama_mahasiswa'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'alamat' => $this->input->post('alamat'),
                'kota' => $this->input->post('kota'),
                'nik' => $this->input->post('nik')
            ];

            $updated = $this->mahasiswa_model->update($mahasiswa);
            if ($updated) {
                $this->session->set_flashdata('message', 'Data Mahasiswa berhasil diperbarui');
                redirect('admin/mahasiswa');
            }
        }

        $this->load->view('admin/mahasiswa_edit_form.php', $data);
    }

    public function fungsi_edit()
    {
        $nim = $this->input->post('nim');
        $id_prodi = $this->input->post('id_prodi');
        $nama_mahasiswa = $this->input->post('nama_mahasiswa');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $alamat = $this->input->post('alamat');
        $kota = $this->input->post('kota');
        $nik = $this->input->post('nik');

        $data = array(
            'nim' => $nim,
            'id_prodi' => $id_prodi,
            'nama_mahasiswa' => $nama_mahasiswa,
            'jenis_kelamin' => $jenis_kelamin,
            'alamat' => $alamat,
            'kota' => $kota,
            'nik' => $nik,
        );

        $this->mahasiswa_model->ubah($nim, $data);
        redirect(base_url('admin/mahasiswa'));
    }

    public function delete($nim = null)
    {
        if (!$nim) {
            show_404();
        }

        $deleted = $this->mahasiswa_model->delete($nim);
        if ($deleted) {
            $this->session->set_flashdata('message', 'Data Mahasiswa berhasil dihapus');
            redirect('admin/mahasiswa');
        }
    }
}

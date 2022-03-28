<?php

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
        if (!$this->auth_model->current_user()) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $this->load->model('prodi_model');
        $this->load->model('matkul_model');
        $this->load->model('mahasiswa_model');
        $this->load->model('krs_model');

        $data = [
            "current_user" => $this->auth_model->current_user(),
            "prodi_total" => $this->prodi_model->hitung(),
            "matkul_total" => $this->matkul_model->hitung(),
            "mahasiswa_total" => $this->mahasiswa_model->hitung(),
            "krs_total" => $this->krs_model->hitung()
        ];

        $this->load->view('admin/dashboard.php', $data);
    }
}

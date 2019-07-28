<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login(true);
    }

    public function index()
    {
        return $this->load->view('login');
    }

    public function login()
    {
        $this->load->model('User_Model', 'user');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $check = $this->user->find_by('username', $username, false);
        if ($check->num_rows() == 1) {
            $user_data = $check->row();
            $verify_password = password_verify($password, $user_data->password);

            if ($verify_password) {
                $this->set_session($user_data);
                redirect('dashboard');
            } else {
                $this->error('Login gagal! <br>Password tidak sesuai');
            }
        } else {
            $this->error('Login gagal! <br>User tidak ditemukan');
        }

        redirect('auth/');
    }

    private function set_session($user_data)
    {
        $this->load->model('Absensi_model', 'absensi');
        $this->session->set_userdata([
           'id_user' => $user_data->id_user,
           'nama' => $user_data->nama,
           'foto' => $user_data->foto,
           'username' => $user_data->username,
           'divisi' => $user_data->divisi,
           'level' => $user_data->level,
           'is_login' => true
        ]);

        if ($user_data->level == 'Karyawan') {
            $time = date('H:i:s');
            $absen = $this->absensi->absen_harian_user($user_data->id_user);
            $absen_hari_ini = $absen->num_rows();

            if ($absen_hari_ini < 2) {
                $keterangan = '';
                if ($absen_hari_ini == 1) {
                    $keterangan = 'pulang';
                } else if ($absen_hari_ini == 0) {
                    $keterangan = 'masuk';
                }

                $this->session->set_flashdata('absen_needed', [
                    'href' => base_url('absensi/check_absen/'),
                    'message' => 'Anda belum melakukan absensi'
                ]);
            }
        }

        $this->session->set_flashdata('response', [
            'status' => 'success', 
            'message' => 'Selamat Datang ' . $user_data->nama
        ]);
    }

    private function error($msg)
    {
        $this->session->set_flashdata('error', $msg);
    }
}

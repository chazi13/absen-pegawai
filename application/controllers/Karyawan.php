<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Karyawan extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        redirect_if_level_not('Manager');
        $this->load->model('Karyawan_model', 'karyawan');
    }

    public function index()
    {
        $data['karyawan'] = $this->karyawan->get_all();
        return $this->template->load('template', 'karyawan/index', $data);
    }

    public function create()
    {
        $this->load->model('Divisi_model', 'divisi');
        $data['divisi'] = $this->divisi->get_all();
        return $this->template->load('template', 'karyawan/create', $data);
    }

    public function store()
    {
        $post = $this->input->post();
        $data = [
            'nik' => $post['nik'],
            'nama' => $post['nama'],
            'telp' => $post['telp'],
            'divisi' => $post['divisi'],
            'email' => $post['email'],
            'username' => $post['username'],
            'password' => password_hash($post['password'], PASSWORD_DEFAULT),
        ];

        $result = $this->karyawan->insert_data($data);
        if ($result) {
            $response = [
                'status' => 'success',
                'message' => 'Data karyawan telah ditambahkan!'
            ];
            $redirect = 'karyawan/';
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Data karyawan gagal ditambahkan'
            ];
            $redirect = 'karyawan/create';
        }
        
        $this->session->set_flashdata('response', $response);
        redirect($redirect);
    }

    public function edit()
    {
        $id_user = $this->uri->segment(3);
        $data['karyawan'] = $this->karyawan->find($id_user);
        return $this->template->load('template', 'karyawan/edit', $data);
    }

    public function update()
    {
        $post = $this->input->post();
        $data = [
            'nik' => $post['nik'],
            'nama' => $post['nama'],
            'telp' => $post['telp'],
            'divisi' => $post['divisi'],
            'email' => $post['email'],
            'username' => $post['username'],
        ];

        if ($post['password'] !== '') {
            $data['password'] = password_hash($post['password'], PASSWORD_DEFAULT);
        }

        $result = $this->karyawan->update_data($post['id_user'], $data);
        if ($result) {
            $response = [
                'status' => 'success',
                'message' => 'Data Karyawan berhasil diubah!'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Data Karyawan gagal diubah!'
            ];
        }
        
        $this->session->set_flashdata('response', $response);
        redirect('karyawan');
    }

    public function destroy()
    {
        $id_user = $this->uri->segment(3);
        $result = $this->karyawan->delete_data($id_user);
        if ($result) {
            $response = [
                'status' => 'success',
                'message' => 'Data karyawan berhasil dihapus!'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Data karyawan gagal dihapus!'
            ];
        }
        
        header('Content-Type: application/json');
        echo $response;
    }
}



/* End of File: d:\Ampps\www\project\absen-pegawai\application\controllers\Karyawan.php */
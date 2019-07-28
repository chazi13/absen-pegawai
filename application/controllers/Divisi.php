<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Divisi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        redirect_if_level_not('Manager');
        $this->load->model('Divisi_model', 'divisi');
    }

    public function index()
    {
        $data['divisi'] = $this->divisi->get_all();
        return $this->template->load('template', 'divisi', $data);
    }

    public function store()
    {
        $nama_divisi = $this->input->post('nama_divisi');
        $result = $this->divisi->insert_data(['nama_divisi' => $nama_divisi]);
        if ($result) {
            $response = [
                'status' => 'success',
                'message' => 'Divisi berhasil ditambahkan!',
                'data' => $result
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Divisi gagal ditambahkan!'
            ];
        }

        return $this->response_json($response);
    }

    public function update()
    {
        $id_divisi = $this->input->post('id_divisi');
        $nama_divisi = $this->input->post('nama_divisi');

        $result = $this->divisi->update_data($id_divisi, ['nama_divisi' => $nama_divisi]);
        if ($result) {
            $response = [
                'status' => 'success',
                'message' => 'Divisi berhasil diupdate!',
                'data' => $result
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Divisi gagal diupdate!'
            ];
        }

        return $this->response_json($response);
    }

    public function destroy()
    {
        $id_divisi = $this->uri->segment(3);
        $result = $this->divisi->delete_data($id_divisi);
        if ($result) {
            $response = [
                'status' => 'success',
                'message' => 'Divisi telah dihapus!'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Divisi gagal dihapus!'
            ];
        }

        return $this->response_json($response);
    }

    private function response_json($response)
    {
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}



/* End of File: d:\Ampps\www\project\absen-pegawai\application\controllers\Divisi.php */
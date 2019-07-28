<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Jam extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        redirect_if_level_not('Manager');
        $this->load->model('Jam_model', 'jam');
    }

    public function index()
    {
        $data['jam'] = $this->jam->get_all();
        return $this->template->load('template', 'jam', $data);
    }

    public function update()
    {
        $post = $this->input->post();
        $data = [
            'start' => $post['start'],
            'finish' => $post['finish']
        ];

        $result = $this->jam->update_data($post['id_jam'], $data);
        if ($result) {
            $response = [
                'status' => 'success',
                'message' => 'Jam Kerja telah diubah!',
                'data' => $this->jam->find($post['id_jam'])
            ];
        } else {
            $reponse = [
                'status' => 'error',
                'message' => 'Jam Kerja gagal diubah!'
            ];
        }

        return $this->response_json($response);
    }

    public function response_json($response)
    {
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}



/* End of File: d:\Ampps\www\project\absen-pegawai\application\controllers\Jam.php */
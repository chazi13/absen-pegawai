<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Jam_model extends CI_Model
{
    public function get_all()
    {
        $result = $this->db->get('jam');
        return $result->result();
    }

    public function find($id)
    {
        $this->db->where('id_jam', $id);
        $result = $this->db->get('jam');
        return $result->row();
    }

    public function update_data($id, $data)
    {
        $this->db->where('id_jam', $id);
        $result = $this->db->update('jam', $data);
        return $result;
    }
}



/* End of File: d:\Ampps\www\project\absen-pegawai\application\controllers\Jam_model.php */
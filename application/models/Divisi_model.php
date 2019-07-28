<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Divisi_model extends CI_Model
{
    public function get_all()
    {
        $result = $this->db->get('divisi');
        return $result->result();
    }

    public function find($id)
    {
        $this->db->where('id_divisi', $id);
        $result = $this->db->get('divisi');
        return $result->row();
    }

    public function insert_data($data)
    {
        $result = $this->db->insert('divisi', $data);
        if ($result) {
            $new_id = $this->db->insert_id();
            $data = $this->find($new_id);
            return $data;
        } 
        return $result;
    }

    public function update_data($id, $data)
    {
        $this->db->where('id_divisi', $id);
        $result = $this->db->update('divisi', $data);
        if ($result) {
            $data = $this->find($id);
            return $data;
        } 
        return $result;
    }

    public function delete_data($id)
    {
        $this->db->where('id_divisi', $id);
        $result = $this->db->delete('divisi');
        return $result;
    }
}


/* End of File: d:\Ampps\www\project\absen-pegawai\application\models\Divisi_model.php */
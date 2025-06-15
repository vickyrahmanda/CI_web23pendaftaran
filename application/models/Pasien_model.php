<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pasien_model extends CI_Model
{
    private $table = 'tb_pasien';

    public function get_all_by_user($id_user)
{
    return $this->db->get_where('tb_pasien', ['id_user' => $id_user])->result_array();
}

public function get_all()
{
    return $this->db->get($this->table)->result_array();
}


    public function get_by_id($id)
    {
        return $this->db->get_where($this->table, ['id_pasien' => $id])->row_array();
    }

    public function get_by_user($id_user)
    {
      return $this->db->get_where('tb_pasien', ['id_user' => $id_user])->row_array();
    }

    public function insert($data)
    {
        return $this->db->insert('tb_pasien', $data);
    }
    
    public function update($id, $data)
    {
        return $this->db->where('id_pasien', $id)->update($this->table, $data);
    }
    
    public function delete($id)
    {
        return $this->db->delete($this->table, ['id_pasien' => $id]);
    }
}  
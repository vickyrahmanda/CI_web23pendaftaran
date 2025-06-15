<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    private $table = 'tb_user';

    public function get_by_username($username)
    {
        return $this->db->get_where($this->table, ['username' => $username])->row_array();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function get_all()
    {
        return $this->db->get($this->table)->result_array();
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, ['id_user' => $id]);
    }

    public function update($id, $data)
    {
        return $this->db->where('id_user', $id)->update($this->table, $data);
    }
}  


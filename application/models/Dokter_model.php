<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dokter_model extends CI_Model
{
    private $table = 'tb_dokter';

    public function get_all()
    {
        return $this->db->get($this->table)->result_array();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where($this->table, ['id_dokter' => $id])->row_array();
    }

    public function insert($data)
    {
        return $this->db->insert('tb_dokter', $data);
    }
    
    public function update($id, $data)
    {
        return $this->db->where('id_dokter', $id)->update('tb_dokter', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('tb_dokter', ['id_dokter' => $id]);
    }
    
}  
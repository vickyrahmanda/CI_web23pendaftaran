<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran_model extends CI_Model
{
    private $table = 'tb_pendaftaran';

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function get_all()
    {
        $this->db->select('p.*, pas.nama_pasien, d.nama_dokter, d.spesialis');
        $this->db->from('tb_pendaftaran p');
        $this->db->join('tb_pasien pas', 'pas.id_pasien = p.id_pasien', 'left');
        $this->db->join('tb_dokter d', 'd.id_dokter = p.id_dokter', 'left');
        return $this->db->get()->result_array();
    }

    public function get_by_pasien($id_pasien)
    {
        $this->db->select('p.*, d.nama_dokter, d.spesialis');
        $this->db->from($this->table . ' p');
        $this->db->join('tb_dokter d', 'd.id_dokter = p.id_dokter', 'left');
        $this->db->where('p.id_pasien', $id_pasien);
        return $this->db->get()->result_array();
    }

    public function get_by_many_pasien($id_pasien_array)
    {
        if (empty($id_pasien_array)) return [];
        
        $this->db->select('p.*, d.nama_dokter, d.spesialis');
        $this->db->from('tb_pendaftaran p');
        $this->db->join('tb_dokter d', 'd.id_dokter = p.id_dokter', 'left');
        $this->db->where_in('p.id_pasien', $id_pasien_array);
        return $this->db->get()->result_array();
    }

    public function update_status($id, $status)
    {
        return $this->db->where('id_pendaftaran', $id)
                        ->update($this->table, ['status' => $status]);
    }

    public function count_by_status($status)
    {
        return $this->db->where('status', $status)->from($this->table)->count_all_results();
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, ['id_pendaftaran' => $id]);
    }
}
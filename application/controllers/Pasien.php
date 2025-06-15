<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Pasien_model', 'Dokter_model', 'Pendaftaran_model']);
        $this->load->library('session');
    }
    
    public function daftar()
    {
        if ($this->input->post()) {
            $id_user = $this->session->userdata('user_id'); // Ambil ID user dari session
            
            $pasien = [
                'id_user' => $id_user,
                'nama_pasien' => $this->input->post('nama_pasien'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'alamat' => $this->input->post('alamat'),
                'telepon' => $this->input->post('telepon')
            ];
            $this->Pasien_model->insert($pasien);
            $id_pasien = $this->db->insert_id();
            
            $pendaftaran = [
                'id_pasien' => $id_pasien,
                'id_dokter' => $this->input->post('id_dokter'),
                'keluhan' => $this->input->post('keluhan'),
                'jadwal_kunjungan' => $this->input->post('jadwal_kunjungan')
            ];
            $this->Pendaftaran_model->insert($pendaftaran);
            
            $this->session->set_flashdata('success', 'Pendaftaran berhasil. Silakan cek status.');
            redirect('pasien/status');
        }
        
        $data['dokter'] = $this->Dokter_model->get_all();
        $this->load->view('pasien/form_daftar', $data);
    }
    
    public function status()
    {
        $id_user = $this->session->userdata('user_id');
        $pasien_list = $this->Pasien_model->get_all_by_user($id_user);
        
        $id_pasien_array = array_column($pasien_list, 'id_pasien');
        $data['pendaftaran'] = $this->Pendaftaran_model->get_by_many_pasien($id_pasien_array);
        
        $this->load->view('pasien/status_pendaftaran', $data);
    }
    
    
	public function index()
	{
        $this->load->view('pasien/dashboard_pasien');
	}
    
    public function get_all()
    {
        return $this->db->get('tb_pasien')->result_array();
    }
    
    public function get_by_id($id)
    {
        return $this->db->get_where('tb_pasien', ['id_pasien' => $id])->row_array();
    }
    
    public function insert($data)
    {
        return $this->db->insert('tb_pasien', $data);
    }
    
    public function update($id, $data)
    {
        return $this->db->where('id_pasien', $id)->update('tb_pasien', $data);
    }
    
    public function delete($id)
    {
        return $this->db->delete('tb_pasien', ['id_pasien' => $id]);
    }
       
}
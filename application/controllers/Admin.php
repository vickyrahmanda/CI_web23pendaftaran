<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property CI_Session $session
 * @property CI_Input $input
 * @property object $pdf
 * @property Pendaftaran_model $Pendaftaran_model
 * @property Pasien_model $Pasien_model
 * @property Dokter_model $Dokter_model
 */

class Admin extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Pendaftaran_model', 'Pasien_model', 'Dokter_model']);
        $this->load->library(['session', 'pdf']);

        // Cek apakah user adalah admin
        if ($this->session->userdata('role') !== 'admin') {
            redirect('login');
        }
    }

    public function index()
    {
        $data['total'] = count($this->Pendaftaran_model->get_all());
        $data['diterima'] = $this->Pendaftaran_model->count_by_status('diterima');
        $data['ditolak'] = $this->Pendaftaran_model->count_by_status('ditolak');
        $this->load->view('admin/dashboard', $data);
    }

    public function pendaftaran()
    {
        $data['pendaftaran'] = $this->Pendaftaran_model->get_all();
        $this->load->view('admin/pendaftaran_list', $data);
    }

    public function set_status($id, $status)
    {
        $this->Pendaftaran_model->update_status($id, $status);
        redirect('admin/pendaftaran');
    }

    // Tampilkan daftar pasien
    public function pasien()
    {
        $data['pasien'] = $this->Pasien_model->get_all();
        $this->load->view('admin/pasien_list', $data);
    }

    // Tampilkan form tambah
    public function pasien_tambah()
    {
        $this->load->view('admin/pasien_form');
    }

    // Simpan data baru
    public function pasien_simpan()
    {
        $data = [
            'nama_pasien' => $this->input->post('nama_pasien'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'alamat' => $this->input->post('alamat'),
            'telepon' => $this->input->post('telepon')
        ];
        $this->Pasien_model->insert($data);
        redirect('admin/pasien');
    }

    // Edit pasien
    public function pasien_edit($id)
    {
        $data['edit'] = true;
        $data['pasien'] = $this->Pasien_model->get_by_id($id);
        $this->load->view('admin/pasien_form', $data);
    }

    // Update pasien
    public function pasien_update($id)
    {
        $data = [
            'nama_pasien' => $this->input->post('nama_pasien'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'alamat' => $this->input->post('alamat'),
            'telepon' => $this->input->post('telepon')
        ];
        $this->Pasien_model->update($id, $data);
        redirect('admin/pasien');
    }

    // Hapus pasien
    public function pasien_hapus($id)
    {
        $this->Pasien_model->delete($id);
        redirect('admin/pasien');
    }


    public function dokter()
    {
        $data['dokter'] = $this->Dokter_model->get_all();
        $this->load->view('admin/dokter_list', $data);
    }

    public function dokter_tambah()
    {
        $this->load->view('admin/dokter_tambah');
    }

    public function dokter_edit($id)
    {
        $data['dokter'] = $this->Dokter_model->get_by_id($id);
        $this->load->view('admin/dokter_edit', $data);
    }

    public function dokter_update($id)
    {
        $data = [
            'nama_dokter' => $this->input->post('nama_dokter'),
            'spesialis'   => $this->input->post('spesialis')
        ];
        $this->Dokter_model->update($id, $data);
        $this->session->set_flashdata('success', 'Data dokter berhasil diperbarui.');
        redirect('admin/dokter');
    }

    public function dokter_simpan()
    {
        $data = [
            'nama_dokter' => $this->input->post('nama_dokter'),
            'spesialis'   => $this->input->post('spesialis')
        ];
        $this->Dokter_model->insert($data);
        $this->session->set_flashdata('success', 'Data dokter berhasil ditambahkan.');
        redirect('admin/dokter');
    }

    public function dokter_hapus($id)
    {
        $this->Dokter_model->delete($id);
        $this->session->set_flashdata('success', 'Data dokter berhasil dihapus.');
        redirect('admin/dokter');
    }

    public function export_csv()
    {
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="data_pendaftaran.csv"');

        $pendaftaran = $this->Pendaftaran_model->get_all_with_detail();
        $output = fopen('php://output', 'w');

        // Header kolom
        fputcsv($output, ['Nama Pasien', 'Dokter', 'Spesialis', 'Keluhan', 'Jadwal Kunjungan', 'Status']);

        // Data isi
        foreach ($pendaftaran as $p) {
            fputcsv($output, [
                $p['nama_pasien'],
                $p['nama_dokter'],
                $p['spesialis'],
                $p['keluhan'],
                $p['jadwal_kunjungan'],
                $p['status']
            ]);
        }

        fclose($output);
        exit;
    }

    public function export_pdf()
    {
        $this->load->library('pdf');
        $data['pendaftaran'] = $this->Pendaftaran_model->get_all();

        // Debug sementara:
        if (empty($data['pendaftaran'])) {
            echo "Data kosong";
            exit;
        }

        $html = $this->load->view('admin/laporan_pdf', $data, true); // pastikan pakai true
        // echo $html; exit; // cek apakah HTML-nya keluar

        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->loadHtml($html);
        $this->pdf->render();
        $this->pdf->stream("laporan_pendaftaran.pdf", array("Attachment" => false)); // buka langsung di browser
    }
}
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function login()
    {
        if ($this->input->post()) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $this->User_model->get_by_username($username);

            if ($user && password_verify($password, $user['password'])) {
                $this->session->set_userdata([
                    'user_id' => $user['id_user'],
                    'username' => $user['username'],
                    'role' => $user['role']
                ]);

                if ($user['role'] == 'admin') {
                    redirect('admin');
                } else {
                    redirect('pasien');
                }
            } else {
                $this->session->set_flashdata('error', 'Login gagal. Periksa username dan password.');
            }
        }
        $this->load->view('auth/login');
    }

    public function register()
    {
        if ($this->input->post()) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $role = 'pasien';

            // Validasi sederhana (pastikan username belum ada)
            $existing = $this->User_model->get_by_username($username);
            if ($existing) {
                $this->session->set_flashdata('error', 'Username sudah digunakan.');
            } else {
                $data = [
                    'username' => $username,
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                    'role' => $role
                ];
                $this->User_model->insert($data);
                $this->session->set_flashdata('success', 'Registrasi berhasil. Silakan login.');
                redirect('login');
            }
        }
        $this->load->view('auth/register');
    }

    public function register_admin()
    {
    if ($this->input->post()) {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $role = 'admin';

        $existing = $this->User_model->get_by_username($username);
        if ($existing) {
            $this->session->set_flashdata('error', 'Username sudah digunakan.');
        } else {
            $data = [
                'username' => $username,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'role' => $role
            ];
            $this->User_model->insert($data);
            $this->session->set_flashdata('success', 'Akun admin berhasil dibuat. Silakan login.');
            redirect('login');
            }
        }
        $this->load->view('auth/register_admin');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}

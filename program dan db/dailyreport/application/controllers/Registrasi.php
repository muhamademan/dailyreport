<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registrasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'JNE - Halaman Registrasi';
        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('beranda/header', $data);
        $this->load->view('beranda/navbar');
        $this->load->view('registrasi/register');
        $this->load->view('beranda/footer');
    }

    public function tambahAkun()
    {
        $nik            = htmlspecialchars($this->input->post('nik', true));
        $nama           = htmlspecialchars($this->input->post('nama'));
        $tgl_lahir      = htmlspecialchars($this->input->post('tgl_lahir'));
        $email          = htmlspecialchars($this->input->post('email'), true);
        $password       = htmlspecialchars($this->input->post('password'), true);
        $jenis_kelamin  = htmlspecialchars($this->input->post('jenis_kelamin'));
        $role_id        = htmlspecialchars($this->input->post('role_id'));

        $data = [
            'nik' => $nik,
            'nama' => $nama,
            'tgl_lahir' => $tgl_lahir,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'jenis_kelamin' => $jenis_kelamin,
            'image' => 'default.png',
            'role_id' => $role_id,
            'status' => 1
        ];

        $add = $this->db->insert('user', $data);
        if ($add) :
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat! registrasi akun berhasil, silahkan login.</div>');
            redirect('auth');
        endif;
    }
}
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan extends CI_Controller
{
    // My Profile
    public function index()
    {
        $data['title'] = 'Pengaturan profile';
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();

        $UserId = $data['user']['id'];
        $QueryUser = "SELECT * FROM user u JOIN user_role ur
                        ON u.role_id = ur.id
                        WHERE u.id = '$UserId'";
        $data['DataUser'] = $this->db->query($QueryUser)->row_array();

        // $query = "SELECT * FROM user_role WHERE id != 1";

        // $data['user_role'] = $this->db->query($query)->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pengaturan/index', $data);
        $this->load->view('templates/footer');
    }

    // Bagian Ubah Password
    public function gantiPassword()
    {
        $data['title'] = 'Halaman Ganti Password';
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();

        $this->form_validation->set_rules('currentPassword', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('newPassword1', 'New Password', 'required|trim|min_length[4]|matches[newPassword2]');
        $this->form_validation->set_rules('newPassword2', 'Confirm New Password', 'required|trim|min_length[4]|matches[newPassword1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pengaturan/gantipass', $data);
            $this->load->view('templates/footer');
        } else {
            $cpass = $this->input->post('currentPassword');
            $npass = $this->input->post('newPassword1');

            if (!password_verify($cpass, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password lama salah!</div>');
                redirect('pengaturan/gantiPassword');
            } else {
                if ($npass == $cpass) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password baru sama dengan password lama </div>');
                    redirect('pengaturan/gantiPassword');
                } else {
                    //true password
                    $pw_hash = password_hash($npass, PASSWORD_DEFAULT);
                    $this->db->set('password', $pw_hash);
                    $this->db->where('nik', $this->session->userdata('nik'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diubah!</div>');
                    redirect('pengaturan');
                }
            }
        }
    }

    // Bagian Edit Profile
    public function ubahProfile()
    {
        $data['title'] = 'Halaman Edit Profile';
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();

        // from validation
        $this->form_validation->set_rules('nik', 'Nik', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pengaturan/editProfile', $data);
            $this->load->view('templates/footer');
        } else {
            // Ambil Data Post
            $nik = $this->input->post('nik');
            $nama = $this->input->post('nama');
            $tgl_lahir = $this->input->post('tgl_lahir');
            $email = $this->input->post('email');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $useDefault = $this->input->post('useDefault');

            // Cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'jpg|png|svg|jpeg';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];

                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            if ($useDefault == 1) {
                $this->db->set('image', 'default.png');
            }

            $this->db->set('nik', $nik);
            $this->db->set('nama', $nama);
            $this->db->set('tgl_lahir', $tgl_lahir);
            $this->db->set('email', $email);
            $this->db->set('jenis_kelamin', $jenis_kelamin);
            $this->db->where('nik', $nik);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data profile berhasil <b>di edit.</b>  </div>');
            redirect('pengaturan');
        }
    }
}
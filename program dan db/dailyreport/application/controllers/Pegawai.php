<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_pegawai');
    }

    public function index()
    {
        $data['title'] = 'Daily Report Pegawai';
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pegawai/dailyreport', $data);
        $this->load->view('templates/footer');
    }

    // Function dailu Report
    public function dailyreport()
    {
        $data['title'] = 'Daily Report Pegawai';
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();

        // query daily report sesuai user yang login
        $nik = $data['user']['nik'];
        $queryNik = "SELECT d.*, YEAR(d.tgl_kegiatan) as tahun
                            FROM user u, daily d
                            WHERE u.id = d.id_user
                             AND u.nik = '$nik'";
        $data['nik'] = $this->db->query($queryNik)->result_array();


        $data['tahun'] = $this->M_pegawai->gettahun();

        // mengambil data pada tabel daily
        $data['dailyPegawai'] = $this->db->get('daily')->result_array();

        $this->form_validation->set_rules('tgl_kegiatan', 'Tgl_kegiatan', 'required|trim');
        $this->form_validation->set_rules('kegiatan', 'Kegiatan', 'required|trim');
        $this->form_validation->set_rules('waktu_mulai', 'Waktu_mulai', 'required|trim');
        $this->form_validation->set_rules('waktu_selesai', 'Waktu_selesai', 'required|trim');
        $this->form_validation->set_rules('durasi', 'Durasi', 'required|trim');
        $this->form_validation->set_rules('output', 'Output', 'required|trim');
        $this->form_validation->set_rules('status', 'Status');
        $this->form_validation->set_rules('verifikator', 'Verifikator');
        $this->form_validation->set_rules('id_user', 'Id_user');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pegawai/dailyreport', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('daily', [
                'tgl_kegiatan' => $this->input->post('tgl_kegiatan'),
                'kegiatan' => $this->input->post('kegiatan'),
                'waktu_mulai' => $this->input->post('waktu_mulai'),
                'waktu_selesai' => $this->input->post('waktu_selesai'),
                'durasi' => $this->input->post('durasi'),
                'output' => $this->input->post('output'),
                'status' => 1,
                'verifikator' => '-',
                'id_user' => $this->input->post('id_user')
            ]);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Daily report berhasil <b>ditambahkan.</b> </div>');
            redirect('pegawai/dailyreport');
        }
    }
    // End Daily Report

    // Edit daily
    public function editDaily($id_daily)
    {
        $data['title'] = 'Edit Daily Report';
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();

        // query edit data pada tabel daily
        $edit_daily = "SELECT* FROM daily WHERE id = $id_daily";
        $data['ubah_daily'] = $this->db->query($edit_daily)->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pegawai/editdaily', $data);
        $this->load->view('templates/footer');
    }

    public function proseseditDaily()
    {
        $id = $this->input->post('id');
        $tgl_kegiatan = $this->input->post('tgl_kegiatan');
        $kegitan = $this->input->post('kegiatan');
        $waktu_mulai = $this->input->post('waktu_mulai');
        $waktu_selesai = $this->input->post('waktu_selesai');
        $durasi = $this->input->post('durasi');
        $output = $this->input->post('output');
        $verifikator = $this->input->post('verifikator');

        $data = [
            'id' => $id,
            'tgl_kegiatan' => $tgl_kegiatan,
            'kegiatan' => $kegitan,
            'waktu_mulai' => $waktu_mulai,
            'waktu_selesai' => $waktu_selesai,
            'durasi' => $durasi,
            'output' => $output,
            'verifikator' => $verifikator
        ];

        $this->db->where('id', $id);
        $edit = $this->db->update('daily', $data);

        if ($edit) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat! daily report berhasil <b>diubah.</b> </div>');
            redirect('pegawai/dailyreport');
        }
    }
    // End Edit Daily

    // Detail Daily
    public function detaildaily($id)
    {
        $data['title'] = "Halaman Detail Daily Report";
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();

        // Mengambil data siswa sesuai dengan id_siswa
        $where1 = array('id' => $id);
        $data['dtdaily'] = $this->M_pegawai->tampil_detail($where1)->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pegawai/detail_Daily', $data);
        $this->load->view('templates/footer');
    }
    // End detail daily

    public function hapusdaily($id = null)
    {
        $this->db->where('id', $id);
        $hapus = $this->db->delete('daily');

        if ($hapus) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Daily report berhasil <b>dihapus.</b> </div>');
            redirect('pegawai/dailyreport');
        }
    }

    // filter daily berdasarkan tanggal, bulan, dan tahun
    public function filter()
    {
        $data['title'] = "Halaman Detail Daily Report";
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();

        $tanggalawal = $this->input->post('tanggalawal');
        $tanggalakhir = $this->input->post('tanggalakhir');
        $tahun1 = $this->input->post('tahun1');
        $bulanawal = $this->input->post('bulanawal');
        $bulanakhir = $this->input->post('bulanakhir');
        $tahun2 = $this->input->post('tahun2');
        $nilai_filter = $this->input->post('nilai_filter');

        if ($nilai_filter == 1) {
            $data['title'] = 'Daily Report By Tanggal';
            $data['subtitle'] = 'Dari tanggal : ' . $tanggalawal . ' Sampai tanggal : ' . $tanggalakhir;
            $data['datafilter'] = $this->M_pegawai->filterbytanggal($tanggalawal, $tanggalakhir);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pegawai/print_laporan', $data);
            $this->load->view('templates/footer');
        } elseif ($nilai_filter == 2) {
            $data['title'] = 'Daily Report By Bulan';
            $data['subtitle'] = 'Dari bulan : ' . $bulanawal . ' Sampai bulan : ' . $bulanakhir . ' Tahun : ' . $tahun1;
            $data['datafilter'] = $this->M_pegawai->filterbybulan($tahun1, $bulanawal, $bulanakhir);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pegawai/print_laporan', $data);
            $this->load->view('templates/footer');
        } elseif ($nilai_filter == 3) {
            $data['title'] = 'Daily Report By Tahun';
            $data['subtitle'] = 'Tahun : ' . $tahun2;
            $data['datafilter'] = $this->M_pegawai->filterbytahun($tahun2);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pegawai/print_laporan', $data);
            $this->load->view('templates/footer');
        }
    }
    // End Filter Daily Report
}
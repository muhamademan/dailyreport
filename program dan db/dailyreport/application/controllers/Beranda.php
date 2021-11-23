<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    public function index()
    {
        $data['title'] = "JNE - Daily Report";

        $this->load->view('beranda/header', $data);
        $this->load->view('beranda/navbar');
        $this->load->view('beranda/beranda');
        $this->load->view('beranda/footer');
    }
}
<?php
class M_manager extends CI_Model
{
    function tampil_detail($where1)
    {
        $this->db->select('*');
        $this->db->from('daily');
        $this->db->where_in('id', $where1);
        return $query = $this->db->get();
    }

    // Filter Tahun
    function gettahun()
    {
        $query = $this->db->query("SELECT YEAR(tgl_kegiatan) AS tahun FROM daily GROUP BY YEAR(tgl_kegiatan) ORDER BY YEAR(tgl_kegiatan) ASC");
        return $query->result();
    }

    // Filter by Tanggal
    function filterbytanggal($tanggalawal, $tanggalakhir)
    {
        $query = $this->db->query("SELECT * FROM daily WHERE tgl_kegiatan BETWEEN '$tanggalawal' AND '$tanggalakhir' ORDER BY tgl_kegiatan ASC");
        return $query->result();
    }

    // Filter by Bulan
    function filterbybulan($tahun1, $bulanawal, $bulanakhir)
    {
        $query = $this->db->query("SELECT * FROM daily WHERE YEAR(tgl_kegiatan) = '$tahun1' AND MONTH(tgl_kegiatan) 
        BETWEEN '$bulanawal' AND '$bulanakhir' ORDER BY tgl_kegiatan ASC");
        return $query->result();
    }

    // Filter by Tahun
    function filterbytahun($tahun2)
    {
        $query = $this->db->query("SELECT * FROM daily WHERE YEAR(tgl_kegiatan) = '$tahun2' ORDER BY tgl_kegiatan ASC");
        return $query->result();
    }
}
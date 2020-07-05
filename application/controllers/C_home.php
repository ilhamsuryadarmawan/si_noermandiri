<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class C_home extends CI_Controller {

    function __construct(){
    parent::__construct();
        if($this->session->userdata('masuk') != TRUE){
            redirect(site_url('login'));
        }
    $this->load->library('form_validation');
    }

    function index(){
        if ($this->session->userdata('akses') == 'Siswa' || $this->session->userdata('akses') == 'Tentor') {
            $this->load->model('M_jadwal_les');
            date_default_timezone_set('Asia/Jakarta');
            if ($this->session->userdata('akses') == 'siswa') {
                $jadwal = $this->M_jadwal_les->jadwal_siswa_hari_ini($this->session->userdata('ses_kelas'),date("Y-m-d"))->result();
            }else{
                $jadwal = $this->M_jadwal_les->jadwal_pegawai_hari_ini($this->session->userdata('ses_id'),date("Y-m-d"))->result();
            }
            $data = array(
                    'title'            => 'Home',
                    'content'          => 'home',
                    'judul'            => 'Home',
                    'jadwal'           => $jadwal
            );
            $this->load->view('layout', $data);
        }else{
            // $this->load->model('M_pembayaran');
            // $this->load->model('M_pembayaran_daftar_ulang');
            // $this->load->model('M_pendaftaran');
            // $this->load->model('M_daftar_ulang');
            $this->load->model('M_pegawai');
            $this->load->model('M_siswa');
            // $pendaftaran             = $this->M_pendaftaran->get_belum_bayar()->num_rows();
            // $daftar_ulang            = $this->M_daftar_ulang->get_belum_bayar()->num_rows();
            // $pembayaran              = $this->M_pembayaran->getTotalPembayaran();
            // $pembayaran_daftar_ulang = $this->M_pembayaran_daftar_ulang->getTotalPembayaran();
            // $siswa                   = $this->M_siswa->siswa_aktif()->num_rows();
            // $tentor                  = $this->M_pegawai->tentor_aktif()->num_rows();
            $data = array(
                    'title'            => 'Home',
                    'content'          => 'home',
                    'judul'            => 'Home',
                    // 'pembayaran'       => $pembayaran,
                    // 'p_daftar_ulang'   => $pembayaran_daftar_ulang,
                    // 'pendaftaran'      => $pendaftaran,
                    // 'daftar_ulang'     => $daftar_ulang,
                    'siswa'            => $siswa,
                    'pegawai'           => $pegawai
            );
            $this->load->view('layout', $data);
        }
    }

}
?>
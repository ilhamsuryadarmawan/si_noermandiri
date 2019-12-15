<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class C_absensi extends CI_Controller {

    function __construct(){
    parent::__construct();
        if($this->session->userdata('masuk') != TRUE){
            redirect(site_url('C_login'));
        }
    $this->load->library('form_validation');
    }

    function index(){
        if($this->session->userdata('akses') == 'admin'){
        $this->load->model('M_kelas');
        $kelombel = $this->M_kelas->TampilkanSemua()->result();
        
        $data = array(
	            'title' => 'Home',
	            'content' => 'form/f_absensi',
	            'judul' => 'Home',
                'kelombel'  => $kelombel,
                
	        );
	        $this->load->view('layout', $data);
        }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo"<script>history.go(-1);</script>";
            }
    }

    function tampilSiswa(){
        if($this->session->userdata('akses') == 'admin'){
            $kelas = $this->input->post('kelas');
            $pegawai = $this->input->post('akses');
            $this->load->model('M_siswa');
            $this->load->model('M_pegawai');
            $siswa = $this->M_siswa->tampilSiswaPerKelas($kelas)->result();
            $data = array( 
                'title'    => 'Data Absensi',
                'content'  => 'tabel/t_absensi',
                'judul' => 'Input Absensi',
                'siswa' => $siswa,
                'kelas' => $kelas,
                'pegawai' => $pegawai
                );
            $this->load->view('layout', $data);
        }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
            echo"<script>history.go(-1);</script>";
            }
    }
    
}
?>
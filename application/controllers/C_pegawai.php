<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class C_pegawai extends CI_Controller {

        function __construct(){
        parent::__construct();
            if($this->session->userdata('masuk') != TRUE){
                redirect(site_url('C_login'));
            }
        $this->load->library('form_validation');
        }
        function index(){
            //jika sebagai admin
            if($this->session->userdata('akses') == 'admin'){
                $this->load->model('M_pegawai');
                $rows = $this->M_pegawai->tampilkanSemua()->result();
                $data = array(
                        'peg'          => $rows,
        	            'title'        => 'Data Pegawai',
        	            'content'      => 'tabel/t_pegawai',
        	            'judul'        => 'Data Pegawai',
        	        );
        	        $this->load->view('layout', $data);
            }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo"<script>history.go(-1);</script>";
            }
        }
        public function tambah() {
            //jika sebagai admin
            if($this->session->userdata('akses') == 'admin'){
            $this->load->library('form_validation');
            $this->load->model('M_jadwal_les');
            $this->load->model('M_ruangan');
            $this->load->model('M_mata_pelajaran');
            $this->load->model('M_kelas_kelompok_belajar');
            $ruangan = $this->M_ruangan->TampilkanSemua()->result();
            $kelombel = $this->M_kelas_kelompok_belajar->TampilkanSemua()->result();
            $mata_ajar = $this->M_mata_pelajaran->TampilkanSemua()->result();
            $data = array(
                'ruangan'   => $ruangan,
                'kelombel'     => $kelombel,
                'mata_ajar' => $mata_ajar,
                'judul'     => 'Form Tambah Jadwal Les',
                'title'     => 'Input Jadwal Les',
                'content'   => 'form/f_tambah_jadwal',
            );
            $this->load->view('layout', $data);
            }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo "<script>history.go(-1);</script>";
            }
        }
    }
?>
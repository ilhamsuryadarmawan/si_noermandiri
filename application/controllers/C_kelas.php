<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class C_kelas extends CI_Controller {

        function __construct(){
        parent::__construct();
            if($this->session->userdata('masuk') != TRUE){
                redirect(site_url('Auth'));
            }
        $this->load->library('form_validation');
        }
        function index(){
            //jika sebagai admin
            if($this->session->userdata('akses') == 'admin'){
                $this->load->model('M_kelas');
                $rows = $this->M_kelas->tampilkanSemua()->result();
                $data = array(
                        'kelas'     => $rows,
        	            'title'     => 'Data Kelompok Belajar',
        	            'content'   => 'tabel/t_kelombel',
        	            'judul'     => 'Data Kelompok Belajar',
        	        );
        	        $this->load->view('layout', $data);
            }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo"<script>history.go(-1);</script>";
            }
        }
        public function tambah() {
            //jika sebagai admin
            if($this->session->userdata('akses') == 'admin'){
            $this->load->model('M_kelas');
            $rows = $this->M_kelas->TampilkanSemua()->result();
            $data = array(
                'kelas' => $rows,
                'judul'     => 'Form Tambah Data Kelompok Belajar',
                'title'     => 'Tambah Data Kelompok Belajar',
                'content'   => 'form/f_tambah_kelombel',
            );
            $this->load->view('layout', $data);
            }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo "<script>history.go(-1);</script>";
            }
        }
    }
?>
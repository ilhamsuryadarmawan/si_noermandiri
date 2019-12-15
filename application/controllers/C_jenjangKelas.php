<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class C_jenjangKelas extends CI_Controller {

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
                $this->load->model('M_jenjang_kelas');
                $row = $this->M_jenjang_kelas->tampilkanSemua()->result();
                $data = array(
                        'jenjang'    => $row, 
        	            'title'    => 'Data Jenjang Kelas',
        	            'content'  => 'tabel/t_jenjang_kelas',
        	            'judul' => 'Data Jenjang Kelas',
        	        );
        	        $this->load->view('layout', $data);
            }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo"<script>history.go(-1);</script>";
            }
        }

        public function tambah() {
            if($this->session->userdata('akses') == 'admin'){
            $this->load->library('form_validation');
            $this->load->model('M_jenjang_kelas');
            $rows = $this->M_jenjang_kelas->TampilkanSemua()->result();
            $data = array(
                'jenjang' => $rows,
                'judul'     => 'Form Tambah Data Jenjang Kelas',
                'title'     => 'Tambah Data Jenjang Kelas',
                'content'   => 'form/f_jenjang_kelas',
            );
            $this->load->view('layout', $data);
            }else{//jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo "<script>history.go(-1);</script>";
            }
        }
    }
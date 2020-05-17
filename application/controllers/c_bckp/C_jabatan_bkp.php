<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class C_jabatan extends CI_Controller {

        function __construct(){
        parent::__construct();
            if($this->session->userdata('masuk') != TRUE){
                redirect(site_url('login'));
            }
        $this->load->library('form_validation');
        }
        function index(){
            //jika sebagai admin
            if($this->session->userdata('akses') == 'admin'){
                $this->load->model('M_jabatan');
                $row = $this->M_jabatan->tampilkanSemua()->result();
                $data = array(
                        'jabatan'    => $row, 
        	            'title'    => 'Data Jabatan',
        	            'content'  => 'tabel/t_jabatan',
        	            'judul' => 'Data Jabatan',
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
            $this->load->model('M_jabatan');
            $jab = $this->M_jabatan->TampilkanSemua()->result();
            $data = array(
                'jab' => $jab,
                'judul'     => 'Form Tambah Jabatan',
                'title'     => 'Input Jabatan',
                'content'   => 'form/f_jabatan',
            );
            $this->load->view('layout', $data);
            }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo "<script>history.go(-1);</script>";
            }
        }

        public function simpan(){             
            $this->load->model('M_jabatan');
            $simpan = $this->M_jabatan;
            $validasi=$this->form_validation;
            $validasi->set_rules($simpan->rules());             
            if($validasi->run()){
                $simpan->simpan();                 
                redirect('C_jabatan/index','refresh');
            }else{
                echo "<script>history.go(-1);</script>";
            }
        } 
    }
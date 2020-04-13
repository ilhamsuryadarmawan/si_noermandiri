<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class C_kelas extends CI_Controller {

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
                $this->load->model('M_kelas');
                $rows = $this->M_kelas->tampilkanSemua()->result();
                $data = array(
                        'kelas'     => $rows,
        	            'title'     => 'Data Kelas',
        	            'content'   => 'tabel/t_kelas',
        	            'judul'     => 'Data Kelas',
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
            $this->load->model('M_jenjang_kelas');
            $jenjang = $this->M_jenjang_kelas->TampilkanSemua()->result();
            $rows = $this->M_kelas->TampilkanSemua()->result();
            $data = array(
                'kelas' => $rows,
                'judul'     => 'Form Tambah Data Kelas',
                'title'     => 'Tambah Data Kelas',
                'content'   => 'form/f_kelas',
            );
            $this->load->view('layout', $data);
            }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo "<script>history.go(-1);</script>";
            }
        }

        public function simpan(){             
            $this->load->model('M_kelas');
            $simpan = $this->M_kelas;
            $validasi=$this->form_validation;
            $validasi->set_rules($simpan->rules());             
            if($validasi->run()){
                $simpan->simpan();                 
                redirect('C_kelas/index','refresh');
            }else{
                echo "<script>history.go(-1);</script>";
            }
        } 
    }
?>
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class C_ruangan extends CI_Controller {

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
                $this->load->model('M_ruangan');
                $rows = $this->M_ruangan->tampilkanSemua()->result();
                $data = array(
                        'ruangan'    => $rows,
        	            'title'        => 'Data Ruangan',
        	            'content'      => 'tabel/t_ruangan',
        	            'judul'        => 'Data Ruangan',
        	        );
        	        $this->load->view('layout', $data);
            }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo"<script>history.go(-1);</script>";
            }
        }
        public function tambah() {
            //jika sebagai admin
            if($this->session->userdata('akses') == 'admin'){
            $this->load->model('M_ruangan');
            $mata_ajar = $this->M_ruangan->TampilkanSemua()->result();
            $data = array(
                'mata_ajar' => $mata_ajar,
                'judul'     => 'Form Tambah Data Ruangan',
                'title'     => 'Tambah Data Ruangan',
                'content'   => 'form/f_tambah_ruangan',
            );
            $this->load->view('layout', $data);
            }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo "<script>history.go(-1);</script>";
            }
        }
    }
?>
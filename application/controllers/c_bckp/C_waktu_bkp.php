<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class C_waktu extends CI_Controller {

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
                $this->load->model('M_siswa');
                $row = $this->M_siswa->tampilkanSemua()->result();
                $data = array(
                        'murid'    => $row, 
        	            'title'    => 'Data Siswa',
        	            'content'  => 'tabel/t_siswa',
        	            'judul' => 'Data Siswa',
        	        );
        	        $this->load->view('layout', $data);
            }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo"<script>history.go(-1);</script>";
            }
        }
    }
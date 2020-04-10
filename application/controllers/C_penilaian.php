<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class C_penilaian extends CI_Controller {

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
            $this->load->model('M_mapel');
            $kelombel = $this->M_kelas->TampilkanSemua()->result();
            $matapel = $this->M_mapel->TampilkanSemua()->result();
                $data = array(
        	            'title'    => 'Data Penilaian Siswa',
        	            'content'  => 'form/f_penilaian',
        	            'judul' => 'Data Penilaian Siswa',
                        'kelombel'  => $kelombel,
                        'matapel' => $matapel
        	        );
        	        $this->load->view('layout', $data);
            }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo"<script>history.go(-1);</script>";
            }
        }

        function tampilSiswa(){
            if($this->session->userdata('akses') == 'admin'){
                $kelas = $this->input->post('kelas');
                $mapel = $this->input->post('mapel');
                $this->load->model('M_siswa');
                $siswa = $this->M_siswa->tampilSiswaPerKelas($kelas)->result();
                $data = array( 
                        'title'    => 'Data Penilaian Siswa',
                        'content'  => 'tabel/t_penilaian',
                        'judul' => 'Data Penilaian Siswa',
                        'siswa' => $siswa,
                        'kelas' => $kelas,
                        'mapel' => $mapel,                        
                    );
                    $this->load->view('layout', $data);
            }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo"<script>history.go(-1);</script>";
            }
        }
    }    
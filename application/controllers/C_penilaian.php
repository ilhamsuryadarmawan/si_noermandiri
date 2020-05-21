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
            if($this->session->userdata('akses') == 'Administrator'){
                $kelas = $this->input->post('kelas');
                $this->load->model('M_siswa');
                $this->load->model('M_nilai');
                $nilai = $this->M_nilai->tampilNilai()->result();
                $jumlah = $this->M_absensi->tampilPertemuan()->result();
                $data = array( 
                    'title'    => 'Data Absensi',
                    'content'  => 'tabel/t_penilaian2',
                    'judul' => 'Penilaian Siswa',
                    'nilai' => $nilai,
                    'kelas' => $kelas,
                    'jumlah' => $jumlah

                    );
                $this->load->view('layout', $data);
            }else{ //jika selain Administrator dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo"<script>history.go(-1);</script>";
                }

        }

        function tampilSiswa(){
            if($this->session->userdata('akses') == 'Administrator'){
                $kelas = $this->input->post('kelas');
                $mapel = $this->input->post('mapel');
                $this->load->model('M_siswa');
                $this->load->model('M_mapel');
                $this->load->model('M_jadwal_les');
                $siswa = $this->M_siswa->tampilSiswaPerKelas($kelas)->result();
                $data = array( 
                    'title'    => 'Data Absensi',
                    'content'  => 'tabel/t_penilaian',
                    'judul' => 'Input Penilaian',
                    'siswa' => $siswa,
                    'kelas' => $kelas,
                    'mapel' => $mapel
                    );
                $this->load->view('layout', $data);
            }else{ //jika selain Administrator dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo"<script>history.go(-1);</script>";
                }
            }

        function inputNilai(){
            if($this->session->userdata('akses') == 'Administrator'){
            $this->load->model('M_kelas');
            $this->load->model('M_mapel');
            $kelombel = $this->M_kelas->TampilkanSemua()->result();
            $matapel = $this->M_mapel->TampilkanMapel()->result();
            $data = array(
                    'title' => 'Home',
                    'content' => 'form/f_penilaian',
                    'judul' => 'Home',
                    'kelombel'  => $kelombel,
                    'matapel' => $matapel,
                );
                $this->load->view('layout', $data);
            }else{ //jika selain Administrator dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                    echo"<script>history.go(-1);</script>";
                }
        }
    }    
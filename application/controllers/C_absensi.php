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
            $this->load->model('M_siswa');
            $this->load->model('M_jadwal_les');
            $siswa = $this->M_siswa->tampilSiswaPerKelas($kelas)->result();
            $data = array( 
                'title'    => 'Data Absensi',
                'content'  => 'tabel/t_absensi',
                'judul' => 'Input Absensi',
                'siswa' => $siswa,
                'kelas' => $kelas
                );
            $this->load->view('layout', $data);
        }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
            echo"<script>history.go(-1);</script>";
            }
    }

    function tampilAbsensi(){
        if($this->session->userdata('akses') == 'admin'){
            $kelas = $this->input->post('kelas');
            $this->load->model('M_siswa');
            $this->load->model('M_absensi');
            $absensi = $this->M_absensi->tampilKehadiran()->result();
            $data = array( 
                'title'    => 'Data Absensi',
                'content'  => 't_detail_absen',
                'judul' => 'Absensi Siswa',
                'absensi' => $absensi,
                'kelas' => $kelas

                );
            $this->load->view('layout', $data);
        }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
            echo"<script>history.go(-1);</script>";
            }
    }

    //   function tampilPertemuan(){
    //     if($this->session->userdata('akses') == 'admin'){
    //         $kelas = $this->input->post('kelas');
    //         $this->load->model('M_siswa');
    //         $this->load->model('M_absensi');
    //         // $absensi = $this->M_absensi->tampilKehadiran()->result();
    //         $temu = $this->M_absensi->tampilPertemuan()->result();
    //         $data = array( 
    //             'title'    => 'Data Absensi',
    //             'content'  => 't_detail_absen',
    //             'judul' => 'Absensi Siswa',
    //             // 'absensi' => $absensi,
    //             // 'kelas' => $kelas,
    //             'temu' => $temu

    //             );
    //         $this->load->view('layout', $data);
    //     }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
    //         echo"<script>history.go(-1);</script>";
    //         }
    // }

    public function simpan(){             
            $this->load->model('M_absensi');
            $simpan = $this->M_absensi;
            $validasi=$this->form_validation;

            $kehadiran = json_decode($this->input->post('hadir'));
            $nosiswaa = json_decode($this->input->post('nosiswa'));


            $materi = $this->input->post('materi');
            $keterangan = $this->input->post('keterangan');

            print_r($kehadiran);
            print_r($nosiswaa);


            $len=count($kehadiran);
            $lent=count($nosiswaa);
            for ($i=0; $i < $lent ; $i++) { 
                $a=0;
                for ($j=0; $j < $len ; $j++) { 
                    if ($nosiswaa[$i]==$kehadiran[$j]) {
                        $status='H';
                        $this->M_absensi->simpan($nosiswaa[$i],$status, $materi, $keterangan);
                        $a=1;
                    }



                }
                    if($a!=1){
                        $status='A';
                        $this->M_absensi->simpan($nosiswaa[$i],$status, $materi, $keterangan);  
                    }

            }
            redirect(site_url('C_absensi/tampilAbsensi'));

    }
    
}
?>
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
            if($this->session->userdata('akses') == 'Tentor'){
                $this->load->model('M_siswa');
                $this->load->model('M_kelas');
                $this->load->model('M_absensi');
                $this->load->model('M_penilaian');
                $this->load->model('M_mapel');
                $this->load->model('M_jenis_ujian');

                $data = array(
                    'judul'     => 'Nilai Siswa' ,
                    'title'     => 'Nilai Siswa',
                    'content'   => 'tabel/t_rekap_nilai',
                    'matapel'   => $this->M_mapel->tampilkanSemua()->result(),
                    'ujian'     => $this->M_jenis_ujian->tampilkanSemua()->result(),
                    'kelas'     => $this->M_kelas->tampilkanSemua()->result()
                );

                $this->load->view('layout', $data);
                
            }elseif ($this->session->userdata('akses') == 'Siswa'){
                $this->load->model('M_penilaian');
                $this->load->model('M_jenis_ujian');
                $this->load->model('M_semester');

                $nilai = $this->M_penilaian->histori_nilai($this->session->userdata('ses_id'),$this->input->post('ujian'),$this->input->post('periode'))->result();

                $data = array(
                    'judul'     => 'Histori Nilai',
                    'title'     => 'Histori Nilai',
                    'content'   => 'tabel/t_histori_nilai',
                    'nilai'     => $nilai,
                    'ujian'     => $this->M_jenis_ujian->tampilkanSemua()->result(),
                    'semester'  => $this->M_semester->getAll()->result(),
                );
                
                $this->load->view('layout', $data);
            }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo "<script>history.go(-1);</script>";
            }
        }

        function tampilKelas(){
            //jika sebagai Administrator
            if($this->session->userdata('akses') == 'Tentor'){
                $this->load->model('M_kelas');
                $this->load->model('M_jenjang_kelas');

                $data = array(
                    'title'     => 'Daftar Kelas',
                    'content'   => 'tabel/t_kelas_nilai',
                    'judul'     => 'Daftar Kelas',
                    'kelas'     => $this->M_kelas->tampilkanSemua()->result(),
                    'jenjang'   => $this->M_jenjang_kelas->TampilkanSemua()->result()
                );

                $this->load->view('layout', $data);
            }else{ //jika selain Administrator dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo"<script>history.go(-1);</script>";
            }
        }

        function tampilSiswa($id){
            if($this->session->userdata('akses') == 'Tentor'){

                $this->load->model('M_kelas');
                $this->load->model('M_mapel');
                $this->load->model('M_siswa');
                $this->load->model('M_API');
                $this->load->model('M_jenis_ujian');
                $this->load->model('M_semester');

                $kelas   = $this->M_API->getAll('kelas')->result();
                $siswa  = $this->M_siswa->tampilSiswaPerKelas(str_replace("%20"," ",$id))->result();
                
                $data = array(
                        'title'     => 'Input Penilaian',
                        'content'   => 'tabel/t_nilai',
                        'judul'     => 'Input Nilai',
                        'siswa'     => $siswa,
                        'kelas'     => $kelas,
                        'id'        => $id,
                        'jenis'     => $this->M_jenis_ujian->tampilkanSemua()->result(),
                        'matapel'   => $this->M_mapel->tampilkanSemua()->result(),
                        'semester'  => $this->M_semester->getAll()->result()
                );

                $this->load->view('layout', $data);
            }else{ //jika selain Administrator dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                    echo"<script>history.go(-1);</script>";
                }
        }

        public function tambahNilai(){
            if($this->session->userdata('akses') == 'Tentor'){
            //load library form validation
                $this->load->model('M_penilaian');
                $this->form_validation->set_error_delimiters('<div style="margin-bottom:-10px"><span style="color:red;font-size:12px">', '</span></div>');
            
            //jika validasi berhasil
                $kelas      = $this->input->post('kelas');
                $ujian      = $this->input->post('ujian');
                $semester   = $this->input->post('semester');
                $nilai      = $this->input->post('nilai');
                $noinduk    = $this->input->post('noinduk');
                $mapel      = $this->input->post('mapel');
                $topik      = $this->input->post('topik');
                date_default_timezone_set('Asia/Jakarta');
                foreach ($noinduk as $key => $value)
                {
                    $data = array(
                        'ID_NILAI'          => '',
                        'ID_KELAS'          => str_replace("%20"," ",$kelas),                        
                        'ID_PEGAWAI'        => $this->session->userdata('ses_id'),
                        'ID_MAPEL'          => $mapel,
                        'ID_SEMESTER'       => $semester,
                        'ID_JENIS_UJIAN'    => $ujian,
                        'NOINDUK'           => $value,
                        'TGL_PENILAIAN'     => date("Y-m-d"),
                        'JUMLAH_NILAI'      => $nilai[$key],
                        'TOPIK_UJIAN'       => $topik
                    );
                    $this->M_penilaian->tambah($data);
                }
                
                $this->session->set_flashdata('flash','Disimpan');
                redirect(site_url('C_penilaian'));

            }else{
                echo "<script>history.go(-1);</script>";
            }
        }

        public function get_laporan(){
            $this->load->model('M_penilaian');
            $data = $this->M_penilaian->rekap_nilai($this->input->post('kls'))->result();
            echo json_encode($data);
        }

        public function get_rekap_nilai(){
            $this->load->model('M_penilaian');

            $kelas = $this->input->post('kelas');
            $mapel = $this->input->post('mapel');
            $ujian = $this->input->post('ujian');

            if ($kelas && $mapel && $ujian) {
                $k = $kelas;
                $m = $mapel;
                $u = $ujian;
            }else{
                $k = null;
                $m = null;
                $u = null;
            }
            
            $data = $this->M_penilaian->getAll($k,$m,$u)->result();
            echo json_encode($data);
        }

    }

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
            $this->load->model('M_kelas');
            if($this->session->userdata('akses') == 'Tentor'){
                $data = array(
                    'kelas'         => $this->M_kelas->tampilkanSemua()->result(),
                    'judul'         => 'Nilai Siswa' ,
                    'title'         => 'Nilai Siswa',
                    'content'       => 'tabel/t_laporan_nilai'
                );
                $this->load->view('layout', $data);
            }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo "<script>history.go(-1);</script>";
            }
            // if($this->session->userdata('akses') == 'Administrator'){
            //     $this->load->model('M_siswa');
            //     $this->load->model('M_kelas');
            //     $this->load->model('M_jadwal_les');
            //     $this->load->model('M_absensi');

            //     if ($this->input->post('submit')) {
            //         if ($this->input->post('periode') == "") {
            //             $d['periode'] = null;
            //             $d['kelas'] = $this->input->post('kelas');
            //         }elseif($this->input->post('kelas') == ""){
            //             $d['periode'] = $this->input->post('periode');
            //             $d['kelas'] = null;
            //         }else{
            //             $d['periode'] = $this->input->post('periode');
            //             $d['kelas'] = $this->input->post('kelas');
            //         }
            //     }else{
            //         $d['periode'] = null;
            //         $d['kelas'] = null;
            //     }

            //     $kelombel   = $this->M_kelas->TampilkanSemua()->result();
            //     $jadwal = $this->M_absensi->getAll($d['kelas'],$d['periode'])->result();
            //     $jumlah = $this->M_absensi->getAll($d['kelas'],$d['periode'])->num_rows();
            //     $absensi = $this->M_absensi->tampilKehadiran()->result();
            //     $data = array( 
            //         'title'    => 'Data Absensi',
            //         'content'  => 'tabel/t_rekap_nilai',
            //         'judul' => 'Penilaian Siswa',
            //         'absensi' => $absensi,
            //         'kelombel'  => $kelombel,
            //         'jadwal'    => $jadwal,
            //         'jumlah'    => $jumlah,
            //     );
                
            //     $this->load->view('layout', $data);
            // }else{ //jika selain Administrator dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
            //     echo"<script>history.go(-1);</script>";
            // }
        }


        function tampilKelas(){
            //jika sebagai Administrator
            if($this->session->userdata('akses') == 'Tentor'){
                $this->load->model('M_kelas');
                $this->load->model('M_jenjang_kelas');
                $kelas = $this->M_kelas->tampilkanSemua()->result();
                $jenjang = $this->M_jenjang_kelas->TampilkanSemua()->result();
                $data = array(
                        'kelas'     => $kelas,
                        'title'     => 'Daftar Kelas',
                        'content'   => 'tabel/t_kelas_nilai',
                        'judul'     => 'Daftar Kelas',
                        'jenjang'   => $jenjang
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

                $kelas   = $this->M_API->getAll('kelas')->result();
                $matapel = $this->M_mapel->tampilkanSemua()->result();
                $jenis = $this->M_jenis_ujian->tampilkanSemua()->result();
                $siswa  = $this->M_siswa->tampilSiswaPerKelas(str_replace("%20"," ",$id))->result();
                
                $data = array(
                        'title' => 'Input Penilaian',
                        'content' => 'tabel/t_nilai',
                        'judul' => 'Input Nilai',
                        'siswa'   => $siswa,
                        'kelas' => $kelas,
                        'id'    => $id,
                        'jenis' => $jenis,
                        'matapel' => $matapel
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

            //rules validasi

            // $this->form_validation->set_rules('nilai[]','nilai[]', 'required',['required' => '*nilai tidak boleh kosong']);

            //     if ($this->form_validation->run() == FALSE) {
            //         //jika validasi gagal maka akan kembali ke form tambah jadwal
            //         $this->tambah();
            //     } else {    
                    //jika validasi berhasil
                    $kelas = $this->input->post('kelas');
                    $ujian = $this->input->post('ujian');
                    $nilai = $this->input->post('nilai');
                    $noinduk = $this->input->post('noinduk');
                    $mapel = $this->input->post('mapel');
                    $topik = $this->input->post('topik');
                    date_default_timezone_set('Asia/Jakarta');
                        foreach ($noinduk as $key => $value) {
                            $data = array(
                                'ID_NILAI'          => '',
                                'ID_KELAS'          => str_replace("%20"," ",$kelas),
                                'ID_PEGAWAI'        => $this->session->userdata('ses_id'),
                                'ID_MAPEL'          => $mapel,
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
                // }

            }else{
                echo "<script>history.go(-1);</script>";
            }
        }

        public function get_laporan(){
            $this->load->model('M_penilaian');
            $data= $this->M_penilaian->rekap_nilai($this->input->post('kls'))->result();
            echo json_encode($data);
        }
    }

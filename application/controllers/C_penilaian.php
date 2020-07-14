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
                $this->load->model('M_siswa');
                $this->load->model('M_kelas');
                $this->load->model('M_jadwal_les');
                $this->load->model('M_absensi');

                if ($this->input->post('submit')) {
                    if ($this->input->post('periode') == "") {
                        $d['periode'] = null;
                        $d['kelas'] = $this->input->post('kelas');
                    }elseif($this->input->post('kelas') == ""){
                        $d['periode'] = $this->input->post('periode');
                        $d['kelas'] = null;
                    }else{
                        $d['periode'] = $this->input->post('periode');
                        $d['kelas'] = $this->input->post('kelas');
                    }
                }else{
                    $d['periode'] = null;
                    $d['kelas'] = null;
                }

                $kelombel   = $this->M_kelas->TampilkanSemua()->result();
                $jadwal = $this->M_absensi->getAll($d['kelas'],$d['periode'])->result();
                $jumlah = $this->M_absensi->getAll($d['kelas'],$d['periode'])->num_rows();
                $absensi = $this->M_absensi->tampilKehadiran()->result();
                $data = array( 
                    'title'    => 'Data Absensi',
                    'content'  => 'tabel/t_rekap_nilai',
                    'judul' => 'Penilaian Siswa',
                    'absensi' => $absensi,
                    'kelombel'  => $kelombel,
                    'jadwal'    => $jadwal,
                    'jumlah'    => $jumlah,
                );
                
                $this->load->view('layout', $data);
            }else{ //jika selain Administrator dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo"<script>history.go(-1);</script>";
            }
        }

        // function index(){
        //     if($this->session->userdata('akses') == 'Administrator'){
        //         $kelas = $this->input->post('kelas');
        //         $this->load->model('M_siswa');
        //         $this->load->model('M_nilai');
        //         $nilai = $this->M_nilai->tampilNilai()->result();
        //         $jumlah = $this->M_absensi->tampilPertemuan()->result();
        //         $data = array( 
        //             'title'    => 'Data Absensi',
        //             'content'  => 'tabel/t_penilaian2',
        //             'judul' => 'Penilaian Siswa',
        //             'nilai' => $nilai,
        //             'kelas' => $kelas,
        //             'jumlah' => $jumlah

        //             );
        //         $this->load->view('layout', $data);
        //     }else{ //jika selain Administrator dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
        //         echo"<script>history.go(-1);</script>";
        //         }

        // }

        // function tampilSiswa(){
        //     if($this->session->userdata('akses') == 'Administrator'){
        //         $kelas = $this->input->post('kelas');
        //         $mapel = $this->input->post('mapel');
        //         $this->load->model('M_siswa');
        //         $this->load->model('M_mapel');
        //         $this->load->model('M_jadwal_les');
        //         $siswa = $this->M_siswa->tampilSiswaPerKelas($kelas)->result();
        //         $data = array( 
        //             'title'    => 'Data Absensi',
        //             'content'  => 'tabel/t_penilaian',
        //             'judul' => 'Input Penilaian',
        //             'siswa' => $siswa,
        //             'kelas' => $kelas,
        //             'mapel' => $mapel
        //             );
        //         $this->load->view('layout', $data);
        //     }else{ //jika selain Administrator dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
        //         echo"<script>history.go(-1);</script>";
        //         }
        // }

        function tampilKelas(){
            //jika sebagai Administrator
            if($this->session->userdata('akses') == 'Administrator'){
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
            if($this->session->userdata('akses') == 'Administrator'){

                $this->load->model('M_kelas');
                $this->load->model('M_mapel');
                $this->load->model('M_siswa');
                $this->load->model('M_API');

                $kelas   = $this->M_API->getAll('kelas')->result();
                $siswa  = $this->M_siswa->tampilSiswaPerKelas(str_replace("%20"," ",$id))->result();
                
                $data = array(
                        'title' => 'Input Penilaian',
                        'content' => 'tabel/t_nilai',
                        'judul' => 'Input Nilai',
                        'siswa'   => $siswa,
                        'kelas' => $kelas,
                        'id'    => $id
                );
                $this->load->view('layout', $data);
            }else{ //jika selain Administrator dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                    echo"<script>history.go(-1);</script>";
                }
        }

        public function tambahNilai(){
            if($this->session->userdata('akses') == 'Administrator'){
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
                    $nilai = $this->input->post('nilai');
                    $noinduk = $this->input->post('noinduk');
                    date_default_timezone_set('Asia/Jakarta');
                        foreach ($noinduk as $key => $value) {
                            $data = array(
                                'ID_NILAI'          => '',
                                'ID_KELAS'          => '9SMA-A',
                                'ID_PEGAWAI'        => $this->session->userdata('ses_id'),
                                // 'ID_MAPEL'          => 'MPL001',
                                'ID_JENIS_UJIAN'    => 'UJI002',
                                'NOINDUK'           => $value,
                                'TGL_PENILAIAN'     => date("Y-m-d"),
                                'JUMLAH_NILAI'      => $nilai[$key],
                                // 'KETERANGAN_NILAI'    => $this->input->post('ket', TRUE)

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

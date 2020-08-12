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

                if ($this->input->post('submit')) {
                    if ($this->input->post('mapel') == "") {
                        $d['mapel'] = null;                       
                        $d['kelas'] = $this->input->post('kelas');
                        $d['ujian'] = $this->input->post('ujian');
                    }elseif($this->input->post('kelas') == ""){
                        $d['mapel'] = $this->input->post('mapel');
                        $d['kelas'] = null;
                        $d['ujian'] = $this->input->post('ujian');
                    }elseif ($this->input->post('ujian') == ""){
                        $d['mapel'] = $this->input->post('mapel');
                        $d['kelas'] = $this->input->post('kelas');
                        $d['ujian'] = null;
                    }elseif ($this->input->post('mapel') == "" && $this->input->post('kelas') == "") {
                        $d['mapel'] = null;                       
                        $d['kelas'] = null;
                        $d['ujian'] = $this->input->post('ujian');
                    }elseif ($this->input->post('mapel') == "" && $this->input->post('ujian') == "") {
                        $d['mapel'] = null;                       
                        $d['kelas'] = $this->input->post('kelas');
                        $d['ujian'] = null;
                    }elseif ($this->input->post('kelas') == "" && $this->input->post('ujian') == "") {
                        $d['mapel'] = $this->input->post('mapel');                       
                        $d['kelas'] = null;
                        $d['ujian'] = null;
                    }
                    else{
                        $d['mapel'] = $this->input->post('mapel');
                        $d['kelas'] = $this->input->post('kelas');
                        $d['ujian'] = $this->input->post('ujian');
                    }
                }else{
                    $d['mapel'] = null;
                    $d['kelas'] = null;
                    $d['ujian'] = null;
                }

                $nilai = $this->M_penilaian->getAll($d['kelas'],$d['mapel'],$d['ujian'])->result();
                $jumlah = $this->M_penilaian->getAll($d['kelas'],$d['mapel'],$d['ujian'])->num_rows();
                $data = array(
                    'kelas'         => $this->M_kelas->tampilkanSemua()->result(),
                    'judul'         => 'Nilai Siswa' ,
                    'title'         => 'Nilai Siswa',
                    'content'       => 'tabel/t_rekap_nilai',
                    'matapel'       => $this->M_mapel->tampilkanSemua()->result(),
                    'ujian'         => $this->M_jenis_ujian->tampilkanSemua()->result(),
                    'nilai'         => $nilai,
                    'jumlah'        => $jumlah
                );
                $this->load->view('layout', $data);
                
            }elseif ($this->session->userdata('akses') == 'Siswa'){
                $this->load->model('M_penilaian');
                
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

                $nilai = $this->M_penilaian->histori_nilai($this->input->post('periode'),$this->session->userdata('ses_id'))->result();
                $data = array(
                    'judul'     => 'Histori Nilai',
                    'title'     => 'Histori Nilai',
                    'content'   => 'tabel/t_histori_nilai',
                    'nilai'     => $nilai
                );
                echo json_encode($data);
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

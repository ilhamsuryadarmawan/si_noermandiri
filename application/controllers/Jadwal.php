<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class Jadwal extends CI_Controller {

        function __construct(){
        parent::__construct();
            if($this->session->userdata('masuk') != TRUE){
                redirect(site_url('C_login'));
            }
        $this->load->library('form_validation');
        }
        function index(){
            //jika sebagai admin
            $month ='';
            $bulan     = date('m');
                if ($bulan == '01') {
                    $bln = ' Bulan Januari';
                }elseif ($bulan == '02') {
                    $bln = ' Bulan Februari';
                }elseif ($bulan == '03') {
                    $bln = ' Bulan Maret';
                }elseif ($bulan == '04') {
                    $bln = ' Bulan April';
                }elseif ($bulan == '05') {
                    $bln = ' Bulan Mei';
                }elseif ($bulan == '06') {
                    $bln = ' Bulan Juni';
                }elseif ($bulan == '07') {
                    $bln = ' Bulan Juli';
                }elseif ($bulan == '08') {
                    $bln = ' Bulan Agustus';
                }elseif ($bulan == '09') {
                    $bln = ' Bulan September';
                }elseif ($bulan == '10') {
                    $bln = ' Bulan Oktober';
                }elseif ($bulan == '11') {
                    $bln = ' Bulan November';
                }elseif ($bulan == '12') {
                    $bln = ' Bulan Desember';
                }else{
                    $bln = ' ';
                }
            if($this->session->userdata('akses') == 'admin'){
                $this->load->model('M_jadwal_les');
                $this->load->model('M_kelas');
                $kelombel   = $this->M_kelas->TampilkanSemua()->result();
                $rows = $this->M_jadwal_les->getByBulan($bulan)->result();
                $data = array(
                        'jdwl'    => $rows,
        	            'title'   => 'Jadwal Les',
        	            'content' => 'tabel/t_jadwal',
        	            'judul'   => 'Jadwal Les',
                        'bln'     => $bln,
                        'kelombel'=> $kelombel,
        	        );
        	        $this->load->view('layout', $data);
            //jika sebagai tentor
            }elseif ($this->session->userdata('akses') == 'tentor') {
                $this->load->model('M_jadwal_les');
                $id = $this->session->userdata('ses_id');
                $rows = $this->M_jadwal_les->JadwalTentor($id)->result();
                $data = array(
                        'jdwl'  => $rows,
                        'title' => 'Jadwal Les',
                        'content' => 'tabel/t_jadwal_tentor',
                        'judul' => 'Jadwal Les',
                        'bln'     => $bln,
                    );
                    $this->load->view('layout', $data);
            //jika sebagai siswa
            }elseif ($this->session->userdata('akses') == 'siswa'){
                $this->load->model('M_jadwal_les');
                $kelas = $this->session->userdata('ses_kelas');
                $rows = $this->M_jadwal_les->getJadwalSiswaByBulan($kelas)->result();
                $data = array(
                        'jdwl'    => $rows,
                        'title'   => 'Jadwal Les',
                        'content' => 'tabel/t_jadwal_siswa',
                        'judul'   => 'Jadwal Les',
                        'bln'     => $bln, 
                    );
                    $this->load->view('layout', $data);
            }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo"<script>history.go(-1);</script>";
            }
        }
        public function tambah() {
            //jika sebagai admin
            if($this->session->userdata('akses') == 'admin'){
            $this->load->library('form_validation');
            $this->load->model('M_jadwal_les');
            $this->load->model('M_ruangan');
            $this->load->model('M_mata_pelajaran');
            $this->load->model('M_kelas');
            $this->load->model('M_pegawai');
            $this->load->model('M_waktu');
            $ruangan    = $this->M_ruangan->TampilkanSemua()->result();
            $kelombel   = $this->M_kelas->TampilkanSemua()->result();
            $mata_ajar  = $this->M_mata_pelajaran->TampilMapel()->result();
            $pengajar   = $this->M_pegawai->tampilTentor()->result();
            $waktu      = $this->M_waktu->TampilkanSemua()->result();
            $data = array(
                'waktu'     => $waktu,
                'ruangan'   => $ruangan,
                'kelombel'  => $kelombel,
                'mata_ajar' => $mata_ajar,
                'pengajar'  => $pengajar,
                'judul'     => 'Form Tambah Jadwal Les',
                'title'     => 'Input Jadwal Les',
                'content'   => 'form/f_jadwal',
            );
            $this->load->view('layout', $data);
            }else{//jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo "<script>history.go(-1);</script>";
            }
        }

        public function aksiTambah(){
            if($this->session->userdata('akses') == 'admin'){
            //load library form validation
            $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom: 5px">', '</div>');

            //rules validasi
            $this->form_validation->set_rules('kelas', 'ID_KELAS', 'required');
            $this->form_validation->set_rules('mapel', 'ID_MAPEL', 'required');
            $this->form_validation->set_rules('tentor','ID_PEGAWAI', 'required');
            $this->form_validation->set_rules('ruangan', 'ID_RUANGAN', 'required');
            $this->form_validation->set_rules('waktu', 'ID_WAKTU', 'required');
            $this->form_validation->set_rules('tanggal', 'TANGGAL', 'required');

                if ($this->form_validation->run() == FALSE) {
                    //jika validasi gagal maka akan kembali ke form tambah jadwal
                    $this->tambah();
                    } else {    
                    //jika validasi berhasil
                        $tanggal = $this->input->post('tanggal');
                        $tahun = date("y",strtotime($tanggal));
                        $bulan = date("m",strtotime($tanggal));
                        $tgl = date("d",strtotime($tanggal));
                        $id = $tgl.$bulan.$tahun;
                        $data = array(
                            'ID_JADWAL'   => 'J'.$this->input->post('kelas').$id,
                            'ID_PEGAWAI'  => $this->input->post('tentor', TRUE),
                            'ID_MAPEL'    => $this->input->post('mapel', TRUE),
                            'ID_KELAS'    => $this->input->post('kelas', TRUE),
                            'ID_RUANGAN'  => $this->input->post('ruangan', TRUE),
                            'ID_WAKTU'    => $this->input->post('waktu', TRUE),
                            'TANGGAL'     => $this->input->post('tanggal', TRUE),
                        );

                        $this->load->model('M_jadwal_les');
                        $this->M_jadwal_les->tambah($data);
                        $this->session->set_flashdata('success','Data berhasil disimpan');

                        redirect(site_url('Jadwal'));
                    }

            }else{
                echo "<script>history.go(-1);</script>";
            }
        }


        public function cekTentor(){
            $this->load->model('M_Pegawai');
            $json_data = json_encode($this->M_pegawai->getTentorTersedia($_POST['data']));
            print_r($json_data);
        }

    }
?>
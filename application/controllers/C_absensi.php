<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class C_absensi extends CI_Controller {

    function __construct(){
    parent::__construct();
        if($this->session->userdata('masuk') != TRUE){
            redirect(site_url('login'));
        }
    $this->load->library('form_validation');
    }

    function index(){
        if($this->session->userdata('akses') == 'Tentor'){
            $this->load->model('M_kelas');
            $this->load->model('M_absensi');
            $this->load->model('M_API');

            $kelombel = $this->M_API->getAll('kelas')->result();
            
            $data = array( 
                'title'    => 'Data Absensi',
                'content'  => 'tabel/t_rekap_absensi',
                'judul' => 'Absensi Siswa',
                'kelombel'  => $kelombel,
                'semester' => $this->M_API->getAll('semester')->result()

                );
            $this->load->view('layout', $data);
            
        }elseif ($this->session->userdata('akses') == 'Siswa'){
            $this->load->model('M_absensi');
            $this->load->model('M_semester');

            $absensi = $this->M_absensi->histori_absen($this->session->userdata('ses_id'),$this->input->post('periode'))->result();
            $data = array(
                'judul'     => 'Histori Absensi',
                'title'     => 'Histori Absensi',
                'content'   => 'tabel/t_histori_absen',
                'semester'  => $this->M_semester->getAll()->result(),
                'absensi'   => $absensi

            );
            
            $this->load->view('layout', $data);
        }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo "<script>history.go(-1);</script>";
        }
    }


    function inputAbsen($id){
        if($this->session->userdata('akses') == 'Administrator' || $this->session->userdata('akses') == 'Tentor'){

            $this->load->model('M_jadwal_les');
            $this->load->model('M_siswa');

            $jadwal = $this->M_jadwal_les->getById($id)->row();
            $siswa  = $this->M_siswa->tampilSiswaPerKelas($jadwal->ID_KELAS)->result();

            $data = array(
                    'title' => 'Input Absensi',
                    'content' => 'form/f_absensi',
                    'judul' => 'Input Absensi',
                    'jadwal'  => $jadwal,
                    'siswa'   => $siswa
            );
            $this->load->view('layout', $data);
        }else{ //jika selain Administrator dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo"<script>history.go(-1);</script>";
        }
    }


    public function simpan(){             
        $this->load->model('M_absensi');
        $id_jadwal = $this->input->post('id_jadwal');
        $data_absensi = $this->M_absensi->cekAbsensi($id_jadwal)->result();
        $simpan = $this->M_absensi;
        $validasi=$this->form_validation;

        $kehadiran = json_decode($this->input->post('hadir'));
        $nosiswaa = json_decode($this->input->post('nosiswa'));

        print_r($kehadiran);
        print_r($nosiswaa);
        $len=count($kehadiran);
        $lent=count($nosiswaa);

        if (count($data_absensi) > 0) {
            redirect('jadwal');
        }else{
            $this->load->model('M_absensi');
            $this->load->model('M_jadwal_les');
    
            for ($i=0; $i < $lent ; $i++) { 
                $a=0;
                for ($j=0; $j < $len ; $j++) { 
                    if ($nosiswaa[$i]==$kehadiran[$j]) {
                        $status='H';
                        $this->M_absensi->simpan($id_jadwal, $nosiswaa[$i],$status);
                        $a=1;
                    }
                }
                if($a!=1){
                    $status='A';
                    $this->M_absensi->simpan($id_jadwal, $nosiswaa[$i],$status);  
                }
            }

            $absen = $this->M_absensi->get_by_id_jadwal($id_jadwal)->num_rows();
            $data2  = array('STATUS_JADWAL' => '1');                
            if ($absen > 0) {
                $this->M_jadwal_les->update_status($data2,$id_jadwal);
            } 
        }

        redirect('jadwal');
    }
    

    public function get_laporan()
    {
        $this->load->model('M_absensi');
        $data= $this->M_absensi->laporan_absen($this->input->post('periode'),$this->input->post('kls'))->result();
        echo json_encode($data);
    }

        public function get_rekap_absen(){
            $this->load->model('M_absensi');

            $kelas = $this->input->post('kelas');
            $periode = $this->input->post('periode');

            if ($kelas && $periode) {
                $k = $kelas;
                $p = $periode;
            }else{
                $k = null;
                $p = null;
            }

            $data = $this->M_absensi->rekap_absen($p,$k)->result();
            echo json_encode($data);
        }
    
}
?>
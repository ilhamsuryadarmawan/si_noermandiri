<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class Laporan extends CI_Controller {

        function __construct(){
        parent::__construct();
            if($this->session->userdata('masuk') != TRUE){
                redirect(site_url('login'));
            }
        }

        public function cetak_laporan_absensi()
        {   
            $this->load->library('dompdf_gen');           

            $this->load->model('M_absensi');
            $rekap = $this->M_absensi->laporan_absen($this->input->post('periode'),$this->input->post('kls'))->result();
            $data['absen']      = $rekap;
            $data['kelas']      = $this->input->post('kls');
            $data['periode']    = $this->input->post('periode');
            
            $html = $this->output->get_output($this->load->view('laporan_absensi', $data));
            $this->dompdf->load_html($html);
            $this->dompdf->set_paper('A4','potrait');
            $this->dompdf->render();
            $this->dompdf->stream($nama_file,array("Attachment" => 0));
        }

        public function cetak_laporan_nilai()
        {   
            $this->load->library('dompdf_gen');           

            $this->load->model('M_penilaian');
            $rekap = $this->M_penilaian->rekap_nilai($this->input->post('kls'))->result();
            $data['nilai']      = $rekap;
            $data['kelas']      = $this->input->post('kls');
            
            $html = $this->output->get_output($this->load->view('laporan_nilai', $data));
            $this->dompdf->load_html($html);
            $this->dompdf->set_paper('A4','potrait');
            $this->dompdf->render();
            $this->dompdf->stream($nama_file,array("Attachment" => 0));
        }

        public function cetak_laporan_siswa()
        {
            $this->load->library('dompdf_gen'); 

                $this->load->model('M_siswa');
                $this->load->model('M_kelas');
                $data['kelas']          = $this->input->post('kelas1', TRUE);
                $data['tabel']          = $this->input->post('tabel',TRUE);
                $kls                    = $this->M_kelas->getById($data['kelas'])->row_array();
                $data['siswa']          = $this->M_siswa->getSiswaByKelas($data['kelas'])->result();
                $data['title']          = "Laporan Data Siswa";
                $data['judul']          = "Laporan Data Siswa <br><br>Kelas ". $kls['NAMA_KELAS'];
                $nama_file              = "Laporan Data Siswa Kelas ". $kls['NAMA_KELAS'].".pdf";
                $laporan                = 'laporan_data_siswa';

            $html = $this->output->get_output($this->load->view('laporan_data_siswa', $data));
            $this->dompdf->load_html($html);
            $this->dompdf->set_paper('A4','potrait');
            $this->dompdf->render();
            $this->dompdf->stream($nama_file,array("Attachment" => 0));
            
        }

        public function absensi(){
            $this->load->model('M_kelas');
            $this->load->model('M_semester');
            if($this->session->userdata('akses') == 'Pemilik'){
                $data = array(
                    'kelas'         => $this->M_kelas->tampilkanSemua()->result(),
                    'semester'      => $this->M_semester->getAll()->result(),
                    'judul'         => 'Laporan Absensi',
                    'title'         => 'Laporan Absensi',
                    'content'       => 'tabel/t_laporan_absensi'
                );
                $this->load->view('layout', $data);
            }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo "<script>history.go(-1);</script>";
            }
        }

        public function nilai(){
            $this->load->model('M_kelas');
            if($this->session->userdata('akses') == 'Pemilik'){
                $data = array(
                    'kelas'         => $this->M_kelas->tampilkanSemua()->result(),
                    'judul'         => 'Laporan Nilai',
                    'title'         => 'Laporan Nilai',
                    'content'       => 'tabel/t_laporan_nilai'
                );
                $this->load->view('layout', $data);
            }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo "<script>history.go(-1);</script>";
            }
        }

        public function siswa(){
            if($this->session->userdata('akses') == 'Pemilik'){
                $this->load->model('M_kelas');
                $kelas = $this->M_kelas->tampilkanSemua()->result();
                    $data = array(
                    'judul'         => 'Laporan Siswa',
                    'title'         => 'Laporan Siswa',
                    'content'       => 'tabel/t_laporan_siswa',
                    'kelas'         => $kelas
                );
                $this->load->view('layout', $data);
            }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo "<script>history.go(-1);</script>";
            }
        }

        public function siswa_perkelas()
        {
            $kelas       = $this->input->post('kelas',TRUE);
            $this->load->model('M_siswa');
            $data = $this->M_siswa->getSiswaByKelas($kelas)->result();
            echo json_encode($data);
        }
    }
?>
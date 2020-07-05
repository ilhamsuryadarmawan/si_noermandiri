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
            $rekap = $this->M_absensi->rekap_absen($this->input->post('periode'))->result();
            $data['absen']      = $rekap;
            $data['periode']    = $this->input->post('periode');
            
            $html = $this->output->get_output($this->load->view('laporan_absensi', $data));
            $this->dompdf->load_html($html);
            $this->dompdf->set_paper('A4','potrait');
            $this->dompdf->render();
            $this->dompdf->stream($nama_file,array("Attachment" => 0));
        }

        public function absensi(){
            $this->load->model('M_kelas');
            if($this->session->userdata('akses') == 'Pemilik'){
                $data = array(
                    'kelas'         => $this->M_kelas->tampilkanSemua()->result(),
                    'judul'         => 'Laporan Pendaftaran Siswa Baru',
                    'title'         => 'Laporan Pendaftaran Siswa Baru',
                    'content'       => 'tabel/t_laporan_absensi'
                );
                $this->load->view('layout', $data);
            }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo "<script>history.go(-1);</script>";
            }
        }
    }
?>
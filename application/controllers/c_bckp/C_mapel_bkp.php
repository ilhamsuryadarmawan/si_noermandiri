<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class C_mapel extends CI_Controller {

        function __construct(){
        parent::__construct();
            if($this->session->userdata('masuk') != TRUE){
                redirect(site_url('C_login'));
            }
        $this->load->library('form_validation');
        }
        function index(){
            //jika sebagai admin
            if($this->session->userdata('akses') == 'admin'){
                $this->load->model('M_mapel');
                $rows = $this->M_mapel->tampilkanSemua()->result();
                $data = array(
                        'mata_ajar'    => $rows,
        	            'title'        => 'Data Mata Pelajaran',
        	            'content'      => 'tabel/t_mata_pelajaran',
        	            'judul'        => 'Data Mata Pelajaran',
        	        );
        	        $this->load->view('layout', $data);
            }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo"<script>history.go(-1);</script>";
            }
        }
        
        public function get_mapel(){
            $kode = $this->input->post('kode_mapel');
            $data =$this->M_mapel->getMapelById($kode);
            echo json_encode($data);
        }

        public function tambah() {
            //jika sebagai admin
            if($this->session->userdata('akses') == 'admin'){
            $this->load->model('M_mapel');
            $mata_ajar = $this->M_mapel->TampilkanSemua()->result();
            $data = array(
                'mata_ajar' => $mata_ajar,
                'judul'     => 'Form Tambah Mata Pelajaran',
                'title'     => 'Tambah Data Mata Pelajaran',
                'content'   => 'form/f_mapel',
            );
            $this->load->view('layout', $data);
            }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo "<script>history.go(-1);</script>";
            }
        }

        public function simpan(){             
            $this->load->model('M_mapel');
            $simpan = $this->M_mapel;
            $validasi=$this->form_validation;
            $validasi->set_rules($simpan->rules());             
            if($validasi->run()){
                $simpan->simpan();                 
                redirect('C_mapel/index','refresh');
            }else{
                echo "<script>history.go(-1);</script>";
            }
        } 
    }
?>

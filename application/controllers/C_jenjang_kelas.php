<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class C_jenjang_kelas extends CI_Controller {

        function __construct(){
        parent::__construct();
            if($this->session->userdata('masuk') != TRUE){
                redirect(site_url('Auth'));
            }
        
        $this->load->library('form_validation');
        }
        function index(){
            //jika sebagai admin
            if($this->session->userdata('akses') == 'admin'){
                $this->load->model('M_jenjang_kelas');
                $row = $this->M_jenjang_kelas->tampilkanSemua()->result();
                $data = array(
                        'jenjang'    => $row, 
        	            'title'    => 'Data Jenjang Kelas',
        	            'content'  => 'tabel/t_jenjang_kelas',
        	            'judul' => 'Data Jenjang Kelas',
        	        );
        	        $this->load->view('layout', $data);
            }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo"<script>history.go(-1);</script>";
            }
        }

        public function aksiTambah(){
            if($this->session->userdata('akses') == 'admin'){
            
            $this->load->helper('security');
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div style="margin-bottom:-10px"><span style="color:red;font-size:12px">', '</span></div>');

            //rules validasi
            $this->form_validation->set_rules('nama', 'NAMA JENJANG', 'required|min_length[3]|max_length[15]',['required' => '*nama jenjang tidak boleh kosong',
                'min_length' => '*nama jenjang minimal 3 karakter',
                'max_length' => '*nama jenjang maksimal 8 karakter',]);
            $this->form_validation->set_rules('biaya', 'biaya', 'required|min_length[7]|max_length[11]',['required' => '*biaya kelas tidak boleh kosong',
                'min_length' => '*biaya minimal 7 karakter',
                'max_length' => '*biaya minimal 7 karakter']);

                if ($this->form_validation->run() == FALSE) {
                    //jika validasi gagal maka akan kembali ke form tambah jadwal
                    $this->index();
                    } else {    
                    //jika validasi berhasil
                        $data = array(
                            'ID_JENJANG'      =>  '',
                            'NAMA_JENJANG'    => $this->input->post('nama', TRUE),
                            'BIAYA'           => $this->input->post('biaya', TRUE),
                        );
                        $this->load->model('M_jenjang_kelas');
                        $this->M_jenjang_kelas->tambah($data);
                        $this->session->set_flashdata('flash','Disimpan');

                        redirect(site_url('Jenjang_Kelas'));
                    }

            }else{
                echo "<script>history.go(-1);</script>";
            }
        }
    }
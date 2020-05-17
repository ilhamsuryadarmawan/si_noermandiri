<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class C_jabatan extends CI_Controller {

        function __construct(){
        parent::__construct();
            if($this->session->userdata('masuk') != TRUE){
                redirect(site_url('login'));
            }
        $this->load->library('form_validation');
        }
        function index(){
            //jika sebagai admin
            if($this->session->userdata('akses') == 'admin'){
                $this->load->model('M_jabatan');
                $row = $this->M_jabatan->tampilkanSemua()->result();
                $data = array(
                        'jabatan'    => $row, 
        	            'title'    => 'Data Jabatan',
        	            'content'  => 'tabel/t_jabatan',
        	            'judul' => 'Data Jabatan',
        	        );
        	        $this->load->view('layout', $data);
            }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo"<script>history.go(-1);</script>";
            }
        }

        public function aksiTambah(){
            if($this->session->userdata('akses') == 'admin'){
            //load library form validation
            $this->load->library('form_validation');

            $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom: 5px">', '</div>');

            //rules validasi
            $this->form_validation->set_rules('nama', 'NAMA JABATAN', 'required|min_length[5]|max_length[15]',['required' => 'Nama Jabatan tidak boleh kosong',
                'min_length' => 'Nama ruangan minimal 5 karakter',
                'max_length' => 'Nama ruangan maksimal 15 karakter',]);

                if ($this->form_validation->run() == FALSE) {
                    //jika validasi gagal maka akan kembali ke list ruangan
                    $this->index();
                    } else {    
                    //jika validasi berhasil
                        $data = array(
                            'JABATAN'    => $this->input->post('nama', TRUE),
                        );
                        $this->load->model('M_jabatan');
                        $this->M_jabatan->tambah($data);
                        $this->session->set_flashdata('flash','Disimpan');

                        redirect(site_url('C_Jabatan'));
                    }

            }else{
                echo "<script>history.go(-1);</script>";
            }
        }
    }
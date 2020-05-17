<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class C_ruangan extends CI_Controller {

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
                $this->load->model('M_ruangan');
                $rows = $this->M_ruangan->tampilkanSemua()->result();
                $data = array(
                        'ruangan'    => $rows,
        	            'title'        => 'Data Ruang Kelas',
        	            'content'      => 'tabel/t_ruangan',
        	            'judul'        => 'Data Ruang Kelas',
        	        );
        	        $this->load->view('layout', $data);
            }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo"<script>history.go(-1);</script>";
            }
        }

        public function tambah(){
            if($this->session->userdata('akses') == 'admin'){
            //load library form validation
            $this->load->library('form_validation');

            $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom: 5px">', '</div>');

            //rules validasi
            $this->form_validation->set_rules('nama', 'NAMA RUANGAN', 'required|min_length[7]|max_length[10]',['required' => 'Nama ruangan tidak boleh kosong',
                'min_length' => 'Nama ruangan minimal 7 karakter',
                'max_length' => 'Nama ruangan maksimal 10 karakter',]);

                if ($this->form_validation->run() == FALSE) {
                    //jika validasi gagal maka akan kembali ke list ruangan
                    $this->index();
                    } else {    
                    //jika validasi berhasil
                        $data = array(
                            'NAMA_RUANGAN'    => $this->input->post('nama', TRUE),
                        );
                        $this->load->model('M_ruangan');
                        $this->M_ruangan->tambah($data);
                        $this->session->set_flashdata('flash','Disimpan');

                        redirect(site_url('C_ruangan'));
                    }

            }else{
                echo "<script>history.go(-1);</script>";
            }
        }
        
        public function update(){
            if($this->session->userdata('akses') == 'admin'){
                $id = $this->input->post('id_edit', TRUE);
                $data = array(
                    'NAMA_RUANGAN'     => $this->input->post('nama_edit', TRUE)
                );
                $this->load->model('M_ruangan');
                $this->M_ruangan->update($data, $id);
                $this->session->set_flashdata('flash','ubah');

                redirect(site_url('C_ruangan'));

            }else{
                echo "<script>history.go(-1);</script>";
            }
        }
    }
?>
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class C_jenis_ujian extends CI_Controller {

        function __construct(){
        parent::__construct();
            if($this->session->userdata('masuk') != TRUE){
                redirect(site_url('login'));
            }
        $this->load->library('form_validation');
        }
        function index(){
            //jika sebagai Administrator
            if($this->session->userdata('akses') == 'Administrator'){
                $this->load->model('M_JENIS_UJIAN');
                $rows = $this->M_JENIS_UJIAN->tampilkanSemua()->result();
                $data = array(
                        'jenis_ujian'    => $rows,
        	            'title'        => 'Data Jenis Ujan',
        	            'content'      => 'tabel/t_jenis_ujian',
        	            'judul'        => 'Data Jenis Ujian',
        	        );
        	        $this->load->view('layout', $data);
            }else{ //jika selain Administrator dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo"<script>history.go(-1);</script>";
            }
        }

        public function tambah(){
            if($this->session->userdata('akses') == 'Administrator'){
            //load library form validation
            $this->load->library('form_validation');

            $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom: 5px">', '</div>');

            //rules validasi
            $this->form_validation->set_rules('nama', 'NAMA JENIS_UJIAN', 'required|min_length[4]|max_length[10]',['required' => 'Nama Jenis Ujian tidak boleh kosong',
                'min_length' => 'Nama Jenis Ujian minimal 4 karakter',
                'max_length' => 'Nama Jenis Ujian maksimal 10 karakter',]);

                if ($this->form_validation->run() == FALSE) {
                    //jika validasi gagal maka akan kembali ke list Jenis Ujian
                    $this->index();
                    } else {    
                    //jika validasi berhasil
                        $data = array(
                            'NAMA_JENIS_UJIAN'    => $this->input->post('nama', TRUE),
                        );
                        $this->load->model('M_JENIS_UJIAN');
                        $this->M_JENIS_UJIAN->tambah($data);
                        $this->session->set_flashdata('flash','Disimpan');

                        redirect(site_url('C_jenis_ujian'));
                    }

            }else{
                echo "<script>history.go(-1);</script>";
            }
        }
        
        public function update(){
            if($this->session->userdata('akses') == 'Administrator'){
                $id = $this->input->post('id_edit', TRUE);
                $data = array(
                    'NAMA_JENIS_UJIAN'     => $this->input->post('nama_edit', TRUE)
                );
                $this->load->model('M_JENIS_UJIAN');
                $this->M_JENIS_UJIAN->update($data, $id);
                $this->session->set_flashdata('flash','ubah');

                redirect(site_url('C_jenis_ujian'));

            }else{
                echo "<script>history.go(-1);</script>";
            }
        }

        public function hapus($id)
        {
            $this->load->model('M_jenis_ujian');
            $this->M_jenis_ujian->hapus($id);
            $this->session->set_flashdata('flash','Dihapus');
            redirect(site_url('C_jenis_ujian'));
        }
    }
?>
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
            //jika sebagai Administrator
            if($this->session->userdata('akses') == 'Administrator'){
                $this->load->model('M_jenjang_kelas');
                $row = $this->M_jenjang_kelas->tampilkanSemua()->result();
                $data = array(
                        'jenjang'      => $row, 
        	            'title'        => 'Data Jenjang Kelas',
        	            'content'      => 'tabel/admin/t_jenjang_kelas',
        	            'judul'        => 'Data Jenjang Kelas',
        	        );
        	        $this->load->view('layout', $data);
            }else{ //jika selain Administrator dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo"<script>history.go(-1);</script>";
            }
        }

        public function aksiTambah(){
            if($this->session->userdata('akses') == 'Administrator'){
            
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
                            'STATUS_JENJANG'  =>  '1',
                        );
                        $this->load->model('M_jenjang_kelas');
                        $this->M_jenjang_kelas->tambah($data);
                        $this->session->set_flashdata('flash','Disimpan');

                        redirect(site_url('C_jenjang_kelas'));
                    }

            }else{
                echo "<script>history.go(-1);</script>";
            }
        }

        public function update(){
            if($this->session->userdata('akses') == 'Administrator'){
                $id = $this->input->post('id_edit', TRUE);
                $data = array(
                    'NAMA_JENJANG'      => $this->input->post('nama_edit', TRUE),
                    'BIAYA'             => $this->input->post('biaya_edit', TRUE),
                    'STATUS_JENJANG'    => $this->input->post('status_edit', TRUE),
                );
                $this->load->model('M_jenjang_kelas');
                $this->M_jenjang_kelas->update($data, $id);
                $this->session->set_flashdata('flash','ubah');

                redirect(site_url('C_jenjang_kelas'));

            }else{
                echo "<script>history.go(-1);</script>";
            }
        }

        // public function hapus($id)
        // {
        //     $this->load->model('M_jenjang_kelas');
        //     $this->M_jenjang_kelas->hapus($id);
        //     $this->session->set_flashdata('flash','Dihapus');
        //     redirect(site_url('C_jenjang_kelas'));
        // }
    }
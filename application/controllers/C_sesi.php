<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class C_sesi extends CI_Controller {

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
                $this->load->model('M_API');
                $sesi = $this->M_API->getAll('sesi')->result();
                $data = array(
                        'sesi'       => $sesi,
                        'title'      => 'Data Sesi',
                        'content'    => 'tabel/admin/t_sesi',
                        'judul'      => 'Data Sesi',
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
            $this->form_validation->set_rules('nama', 'NAMA SESI', 'required|min_length[7]|max_length[15]',['required' => 'Nama ruangan tidak boleh kosong',
                'min_length' => 'Nama ruangan minimal 7 karakter',
                'max_length' => 'Nama ruangan maksimal 15 karakter',]);

                if ($this->form_validation->run() == FALSE) {
                    //jika validasi gagal maka akan kembali ke list ruangan
                    $this->index();
                    } else {    
                    //jika validasi berhasil
                        $data = array(
                            'ID_SESI'            => '',
                            'NAMA_SESI'          => $this->input->post('nama', TRUE),
                            'JAM_MULAI'          => $this->input->post('jam_mulai', TRUE),
                            'JAM_SELESAI'        => $this->input->post('jam_selesai', TRUE),
                            'STATUS_SESI'            => '1'
                        );
                        $this->load->model('M_sesi');
                        $this->M_sesi->tambah($data);
                        $this->session->set_flashdata('flash','Disimpan');

                        redirect(site_url('C_sesi'));
                    }

            }else{
                echo "<script>history.go(-1);</script>";
            }
        }

        public function update(){
            if($this->session->userdata('akses') == 'Administrator'){
                $id = $this->input->post('id_edit', TRUE);
                $data = array(
                    'NAMA_SESI'     => $this->input->post('nama_edit', TRUE),
                    'JAM_MULAI'     => $this->input->post('jam_mulai_edit', TRUE),
                    'JAM_SELESAI'   => $this->input->post('jam_selesai_edit', TRUE),
                    'STATUS_SESI'     => $this->input->post('status_edit', TRUE)
                );
                $this->load->model('M_sesi');
                $this->M_sesi->update($data, $id);
                $this->session->set_flashdata('flash','ubah');

                redirect(site_url('C_sesi'));

            }else{
                echo "<script>history.go(-1);</script>";
            }
        }

        // public function hapus($id)
        // {
        //     $this->load->model('M_sesi');
        //     $this->M_sesi->hapus($id);
        //     $this->session->set_flashdata('flash','Dihapus');
        //     redirect(site_url('Sesi'));
        // }
    }
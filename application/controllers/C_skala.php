<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class C_skala extends CI_Controller {

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
                $skala = $this->M_API->getAll('skala_nilai')->result();
                $data = array(
                        'skala'       => $skala,
                        'title'      => 'Data Skala Nilai',
                        'content'    => 'tabel/t_skala_nilai',
                        'judul'      => 'Data Skala Nilai',
                    );
                    $this->load->view('layout', $data);
            }else{ //jika selain Administrator dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo"<script>history.go(-1);</script>";
            }
        }


        public function hapus($id)
        {
            $this->load->model('M_skala_nilai');
            $this->M_sesi->hapus($id);
            $this->session->set_flashdata('flash','Dihapus');
            redirect(site_url('Sesi'));
        }

        public function tambah()
        {
            if($this->session->userdata('akses') == 'Administrator'){
                $data = array(
                    'ID_SKALA'         => '',
                    'BATAS_ATAS'       => $this->input->post('batas_atas', TRUE),
                    'BATAS_BAWAH'      => $this->input->post('batas_bawah', TRUE),
                    'GRADE'            => $this->input->post('grade', TRUE),
                );
                $this->load->model('M_API');
                $this->M_API->saveData('skala_nilai',$data);
                $this->session->set_flashdata('flash','Disimpan');
                redirect(site_url('C_skala'));

            }else{
                echo "<script>history.go(-1);</script>";
            }
        }

        public function update(){
            if($this->session->userdata('akses') == 'Administrator'){
                $id = $this->input->post('id_edit', TRUE);
                $data = array(
                    'JAM_MULAI'     => $this->input->post('jam_mulai_edit', TRUE),
                    'JAM_SELESAI'   => $this->input->post('jam_selesai_edit', TRUE),
                );
                $this->load->model('M_sesi');
                $this->M_sesi->update($data, $id);
                $this->session->set_flashdata('flash','ubah');

                redirect(site_url('C_sesi'));

            }else{
                echo "<script>history.go(-1);</script>";
            }
        }
    }
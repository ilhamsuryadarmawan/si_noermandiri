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
                        'content'    => 'tabel/t_sesi',
                        'judul'      => 'Data Sesi',
                    );
                    $this->load->view('layout', $data);
            }else{ //jika selain Administrator dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo"<script>history.go(-1);</script>";
            }
        }


        public function hapus($id)
        {
            $this->load->model('M_sesi');
            $this->M_sesi->hapus($id);
            $this->session->set_flashdata('flash','Dihapus');
            redirect(site_url('Sesi'));
        }

        public function aksiTambah()
        {
            if($this->session->userdata('akses') == 'Administrator'){
                $data = array(
                    'ID_SESI'            => '',
                    'JAM_MULAI'          => $this->input->post('jam_mulai', TRUE),
                    'JAM_SELESAI'        => $this->input->post('jam_selesai', TRUE)
                );
                $this->load->model('M_API');
                $this->M_API->saveData('sesi',$data);
                $this->session->set_flashdata('flash','Disimpan');
                redirect(site_url('Sesi'));

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
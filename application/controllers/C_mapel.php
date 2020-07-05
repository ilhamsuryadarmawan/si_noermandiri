<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class C_mapel extends CI_Controller {

        function __construct(){
        parent::__construct();
            if($this->session->userdata('masuk') != TRUE){
                redirect(site_url('login'));
            }
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
        }
        function index(){
            //jika sebagai Administrator
            if($this->session->userdata('akses') == 'Administrator'){
                $this->load->model('M_mapel');

                $rows = $this->M_mapel->tampilkanSemua()->result();
                $data = array(
                        'mapel'        => $rows,
        	            'title'        => 'Data Mata Pelajaran',
        	            'content'      => 'tabel/t_mata_pelajaran',
        	            'judul'        => 'Data Mata Pelajaran',
        	        );
        	        $this->load->view('layout', $data);
            }else{ //jika selain Administrator dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo"<script>history.go(-1);</script>";
            }
        }

        // public function get_mapel(){
        //     $kode = $this->input->post('kode_mapel');
        //     $data =$this->M_mapel->getMapelById($kode);
        //     echo json_encode($data);
        // }

        public function tambah(){
            if($this->session->userdata('akses') == 'Administrator'){
            //load library form validation
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom: 5px">','</div>');

            //rules validasi

            $this->form_validation->set_rules('nama_mapel', 'ID Mapel', 'trim|required|min_length[3]|max_length[16]', [
                'required' => 'Nama mapel tidak boleh kosong',
                'min_length'=>'Minimal 3 karakter',
                'max_length' => 'Maksimal 16 karakter']);

                if ($this->form_validation->run() == FALSE) {
                    //jika validasi gagal maka akan kembali ke list mapel
                    $this->index();
                    } else {    
                    //jika validasi berhasil
                        $data = array(
                            'NAMA_MAPEL'  => $this->input->post('nama_mapel', TRUE),
                        );

                        $this->load->model('M_mapel');
                        $this->M_mapel->tambah($data);
                        $this->session->set_flashdata('flash','Disimpan');

                        redirect(site_url('C_mapel'));
                    }

            }else{
                echo "<script>history.go(-1);</script>";
            }
        }

        public function update(){
            if($this->session->userdata('akses') == 'Administrator'){
                $id = $this->input->post('id_edit', TRUE);
                $data = array(
                    'NAMA_MAPEL'     => $this->input->post('nama_edit', TRUE)
                );
                $this->load->model('M_mapel');
                $this->M_mapel->update($data, $id);
                $this->session->set_flashdata('flash','ubah');

                redirect(site_url('C_mapel'));

            }else{
                echo "<script>history.go(-1);</script>";
            }
        }

        public function hapus($id)
        {
            $this->load->model('M_mapel');
            $this->M_mapel->hapus($id);
            $this->session->set_flashdata('flash','Dihapus');
            redirect(site_url('C_mapel'));
        }
    }
?>
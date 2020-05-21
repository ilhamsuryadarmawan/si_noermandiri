<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class C_kelas extends CI_Controller {

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
                $this->load->model('M_kelas');
                $this->load->model('M_jenjang_kelas');
                $rows = $this->M_kelas->tampilkanSemua()->result();
                $jenjang = $this->M_jenjang_kelas->TampilkanSemua()->result();
                $data = array(
                        'kelas'     => $rows,
        	            'title'     => 'Data Kelas',
        	            'content'   => 'tabel/t_kelas',
        	            'judul'     => 'Data Kelas',
                        'jenjang'   => $jenjang
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
            $this->form_validation->set_error_delimiters('<div style="margin-bottom:-10px"><span style="color:red;font-size:12px">', '</span></div>');

            //rules validasi
            $this->form_validation->set_rules('nama_kelas', 'NAMA KELAS', 'required|min_length[7]|max_length[10]',[
                'required' =>'Nama kelas tidak boleh kosong',
                'min_length' => 'Nama kelas minimal 7 karakter',
                'max_length'=> 'Nama kelas maksimal 10 karakter']);
            $this->form_validation->set_rules('jenjang','ID JENJANG', 'required',['required' => 'Jenjang Kelas tidak boleh kosong']);

                if ($this->form_validation->run() == FALSE) {
                    //jika validasi gagal maka akan kembali ke form tambah jadwal
                    $this->index();
                    } else {    
                    //jika validasi berhasil
                        $data = array(
                            'ID_KELAS'      =>  str_replace(' ', '', $this->input->post('nama_kelas', TRUE)),
                            'ID_JENJANG'    => $this->input->post('jenjang', TRUE),
                            'NAMA_KELAS'    => $this->input->post('nama_kelas', TRUE),
                        );
                        $this->load->model('M_kelas');
                        $this->M_kelas->tambah($data);
                        $this->session->set_flashdata('flash','Disimpan');

                        redirect(site_url('C_kelas'));
                    }

            }else{
                echo "<script>history.go(-1);</script>";
            }
        }

        public function update(){
            if($this->session->userdata('akses') == 'Administrator'){
                $id = $this->input->post('id_edit', TRUE);
                $data = array(
                    'NAMA_KELAS'     => $this->input->post('nama_edit', TRUE)
                );
                $this->load->model('M_kelas');
                $this->M_kelas->update($data, $id);
                $this->session->set_flashdata('flash','ubah');

                redirect(site_url('C_kelas'));

            }else{
                echo "<script>history.go(-1);</script>";
            }
        }

        public function hapus($id)
        {
            $this->load->model('M_kelas');
            $this->M_kelas->hapus($id);
            $this->session->set_flashdata('flash','Dihapus');
            redirect(site_url('C_kelas'));
        }

        public function tampilKelas()
        {
            $jenjang = $this->input->post('jenjang',TRUE);
            $this->load->model('M_kelas');
            $data    = $this->M_kelas->getKelas($jenjang)->result();
            echo json_encode($data);
        }
    }
?>
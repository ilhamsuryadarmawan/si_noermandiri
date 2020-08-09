<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class C_Siswa extends CI_Controller {

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
                $this->load->model('M_siswa');
                $this->load->model('M_kelas');

                if ($this->input->post('submit')) {
                    $d['kelas'] = $this->input->post('kelas');
                }else{
                    $d['kelas'] = null;
                }

                
            $kelombel   = $this->M_kelas->TampilkanSemua()->result();
            $siswa = $this->M_siswa->TampilkanSemua($d['kelas'])->result();
            $jumlah = $this->M_siswa->TampilkanSemua($d['kelas'])->num_rows();

                $data = array(
                        'murid'    => $siswa, 
        	            'title'    => 'Data Siswa',
        	            'content'  => 'tabel/t_siswa',
        	            'judul'    => 'Data Siswa',
                        'kelombel' => $kelombel,
                        'jumlah' => $jumlah
        	        );
        	        $this->load->view('layout', $data);
            }else{ //jika selain Administrator dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo"<script>history.go(-1);</script>";
            }
        }

        function simpan()
        {
            if($this->session->userdata('akses') == 'Administrator'){
                $id = $this->input->post('no_regist', TRUE);
                $this->load->model('M_siswa');
                $data = array(
                    'NOINDUK'           => '',
                    'ID_KELAS'           => $this->input->post('kelas', TRUE),
                    'NAMA_SISWA'         => $this->input->post('nama', TRUE),
                    'ALAMAT_SISWA'       => $this->input->post('alamat', TRUE),
                    'TGL_LAHIR_SISWA'    => $this->input->post('tgl_lahir',TRUE),
                    'JK_SISWA'           => $this->input->post('jk', TRUE),
                    'EMAIL_SISWA'        => $this->input->post('email', TRUE),
                    'NOTELP_ORTU_SISWA'  => $this->input->post('telp_ortu', TRUE),
                    'NOTELP_SISWA'       => $this->input->post('telp', TRUE),
                    'ASAL_SEKOLAH'       => $this->input->post('asal_sekolah', TRUE),
                    'STATUS_SISWA'       => '1',
                    'PASSWORD_SISWA'     => MD5($this->input->post('telp', TRUE))
                );
                $this->db->insert('siswa', $data);
                $this->session->set_flashdata('flash','Disimpan');
                redirect(site_url('Pembayaran/pembayaran_daftar_siswa_baru'));

            }else{
                echo "<script>history.go(-1);</script>";
            }
        }

        public function update(){
            if($this->session->userdata('akses') == 'Administrator'){
                $id = $this->input->post('noinduk_edit', TRUE);
                $data = array(
                    'NAMA_SISWA'          => $this->input->post('nama_edit', TRUE),
                    'ALAMAT_SISWA'        => $this->input->post('alamat_edit', TRUE),
                    'TGL_LAHIR_SISWA'     => $this->input->post('tgl_lahir_edit', TRUE),
                    'NOTELP_SISWA'        => $this->input->post('notelp_edit', TRUE),
                    'NOTELP_ORTU_SISWA'   => $this->input->post('notelp_ortu_edit', TRUE),
                    'EMAIL_SISWA'         => $this->input->post('email_edit', TRUE),
                    'STATUS_SISWA'        => $this->input->post('status_edit', TRUE)
                );
                $this->load->model('M_siswa');
                $this->M_siswa->update($data, $id);
                $this->session->set_flashdata('flash','ubah');

                redirect(site_url('C_siswa'));

            }else{
                echo "<script>history.go(-1);</script>";
            }
        }

        public function update_kelas()
        {
            $data = array('ID_KELAS' => $this->input->post('kelas',TRUE));
            $this->load->model('M_siswa');
            $this->M_siswa->update($data, $id);
            $this->session->set_flashdata('flash','Disimpan');
            redirect(site_url('Siswa'));
        }
    }
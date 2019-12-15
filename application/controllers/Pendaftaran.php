<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class Pendaftaran extends CI_Controller {

        function __construct(){
        parent::__construct();
            if($this->session->userdata('masuk') != TRUE){
                redirect(site_url('C_login'));
            }
        $this->load->library('form_validation');
        }
        
        public function aksiTambah(){
            //load library form validation
            $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom: 5px">', '</div>');

            //rules validasi
            $this->form_validation->set_rules('kelas', 'ID_KELAS', 'required');
            $this->form_validation->set_rules('mapel', 'ID_MAPEL', 'required');
            $this->form_validation->set_rules('tentor','ID_PEGAWAI', 'required');
            $this->form_validation->set_rules('ruangan', 'ID_RUANGAN', 'required');
            $this->form_validation->set_rules('waktu', 'ID_WAKTU', 'required');
            $this->form_validation->set_rules('tanggal', 'TANGGAL', 'required');

                if ($this->form_validation->run() == FALSE) {
                    //jika validasi gagal maka akan kembali ke form tambah jadwal
                    $this->tambah();
                    } else {    
                    //jika validasi berhasil
                        $tanggal = $this->input->post('tanggal');
                        $tahun = date("y",strtotime($tanggal));
                        $bulan = date("m",strtotime($tanggal));
                        $tgl = date("d",strtotime($tanggal));
                        $id = $tgl.$bulan.$tahun;
                        $data = array(
                            'ID_JADWAL'   => 'J'.$this->input->post('kelas').$id,
                            'ID_PEGAWAI'  => $this->input->post('tentor', TRUE),
                            'ID_MAPEL'    => $this->input->post('mapel', TRUE),
                            'ID_KELAS'    => $this->input->post('kelas', TRUE),
                            'ID_RUANGAN'  => $this->input->post('ruangan', TRUE),
                            'ID_WAKTU'    => $this->input->post('waktu', TRUE),
                            'TANGGAL'     => $this->input->post('tanggal', TRUE),
                        );

                        $this->load->model('M_jadwal_les');
                        $this->M_jadwal_les->tambah($data);
                        $this->session->set_flashdata('success','Data berhasil disimpan');

                        redirect(site_url('Jadwal'));
                    }
        }
    }
?>
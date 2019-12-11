<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class C_absensi extends CI_Controller {

    function __construct(){
    parent::__construct();
        if($this->session->userdata('masuk') != TRUE){
            redirect(site_url('Auth'));
        }
    $this->load->library('form_validation');
    }

    function index(){
       $data = array(
	            'title' => 'Home',
	            'content' => 'tabel/t_absensi',
	            'judul' => 'Home',
	        );
	        $this->load->view('layout', $data);

    }

    public function tambah() {
        //jika sebagai admin
            $data = array(
                'judul'     => 'Form Tambah Data Absensi',
                'title'     => 'Tambah Data Absensi',
                'content'   => 'form/f_absensi',
            );
            $this->load->view('layout', $data);
    }
    
}
?>
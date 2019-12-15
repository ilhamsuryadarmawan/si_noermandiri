<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class C_landingPage extends CI_Controller {

        function __construct(){
        parent::__construct();
        //     if($this->session->userdata('logged') <> 1){
        //         redirect(site_url('auth'));
        //     }
        // $this->load->library('form_validation');
        }

    public function index(){
        $this->load->model('M_jenjang_kelas');
        $row = $this->M_jenjang_kelas->tampilkanSemua()->result();
        $data = array(
	            'title' => 'LBB Noermandiri',
	            'content' => 'home',
	            'judul' => 'LBB Noermandiri',
                'jkelas' => $row, 
	        );
	        $this->load->view('landingpage', $data);
    }

	 


}
?>
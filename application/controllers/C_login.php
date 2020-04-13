 <?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class C_login extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('M_login');
    }

    public function index($error = NULL) {
        $data = array(
            'title' => 'Halaman Login',
            'action'=> site_url('C_login/login'),
            'error' => $error,
            // 'judul' => 'Login'
        );
        $this->load->view('v_login', $data);
    }

    public function login(){

        $username=$this->input->post('username');
        $password=$this->input->post('password');
        
        $cek_pegawai=$this->M_login->akses_pegawai($username,$password);
        //jika login sebagai pegawai
        if($cek_pegawai->num_rows() > 0){ 
            $data=$cek_pegawai->row_array();
            $this->session->set_userdata('masuk',TRUE);
            if($data['ID_JABATAN']=='JAB001'){ //akses login utk admin sesuai id_jab
                $this->session->set_userdata('akses','admin');
                $this->session->set_userdata('ses_id',$data['ID_PEGAWAI']);
                $this->session->set_userdata('ses_nama',$data['NAMA_PEGAWAI']);
                redirect(site_url('C_home'));
            }elseif($data['ID_JABATAN']=='JAB002'){ //akses login utk pemilik
                $this->session->set_userdata('akses','pemilik');
                $this->session->set_userdata('ses_id',$data['ID_PEGAWAI']);
                $this->session->set_userdata('ses_nama',$data['NAMA_PEGAWAI']);
                redirect(site_url('C_home'));
            }elseif($data['ID_JABATAN']=='JAB003'){ //akses login utk tentor
                $this->session->set_userdata('akses','tentor');
                $this->session->set_userdata('ses_id',$data['ID_PEGAWAI']);
                $this->session->set_userdata('ses_nama',$data['NAMA_PEGAWAI']);
                redirect(site_url('C_home'));
            }else{
                $error = 'Username atau Password salah';
                $this->index($error);
            }
        
        }else { 
            $cek_siswa=$this->M_login->akses_siswa($username,$password); //jika login sebagai siswa
            if ($cek_siswa->num_rows() > 0) {
                $data=$cek_siswa->row_array();
                $this->session->set_userdata('masuk',TRUE);
                $this->session->set_userdata('akses','siswa');
                $this->session->set_userdata('ses_id',$data['NOINDUK']);
                $this->session->set_userdata('ses_nama',$data['NAMA_SISWA']);
                $this->session->set_userdata('ses_kelas',$data['ID_KELAS']);
                redirect(site_url('C_home'));
            }else {
                $error = 'Username atau Password salah';
            $this->index($error);
            }

        }
    }

    function logout(){
        $this->session->sess_destroy();
        redirect(site_url('C_home'));
    }
}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */
<?php

class M_siswa extends CI_Model {
	//nama tabel dan primary key
    private $table = 'siswa';
    private $pk = 'NOINDUK';

	//tampilkan semua data
    public function tampilkanSemua($kelas=null) {
        if ($kelas) {
            $this->db->where('k.ID_KELAS',$kelas);
        }elseif (strlen($kelas)>0) {
            $this->db->where('k.ID_KELAS',$kelas);
        }

        $this->db->SELECT('*');
        $this->db->FROM('siswa s');
        $this->db->join('kelas k','s.ID_KELAS = k.ID_KELAS');
        $query = $this->db->get();
        return $query;
    }

    public function tampilSiswaPerKelas($kelas){
    	$query=$this->db->query("SELECT *
                                FROM siswa
                                WHERE ID_KELAS='$kelas'");
        return $query;
    }

    public function getByNoinduk($noinduk) {
        $query=$this->db->query("SELECT *
                                 FROM siswa
                                 WHERE NOINDUK = '$noinduk'");
        return $query;
    }

    public function tambah($data){
        $this->db->insert($this->table, $data);
    }

    function update($data , $id){
        $this->db->where('NOINDUK', $id);
        $this->db->update($this->table, $data);
    }

    public function getSiswaByKelas($id)
    {
        $this->db->SELECT('*');
        $this->db->FROM('siswa s'); 
        $this->db->join('kelas k','s.ID_KELAS = k.ID_KELAS');
        $this->db->where('s.ID_KELAS',$id);
        $this->db->where('s.STATUS_SISWA','1');
        $query = $this->db->get();
        return $query;
    }

    public function siswa_aktif($status)
    {
        $this->db->SELECT('*');
        $this->db->FROM('siswa');
        $this->db->where('STATUS_SISWA','1');
        $query = $this->db->get();
        return $query;
    }

}
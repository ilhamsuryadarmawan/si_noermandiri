<?php

class M_siswa extends CI_Model {
	//nama tabel dan primary key
    private $table = 'siswa';
    private $pk = 'NOINDUK';

	//tampilkan semua data
    public function tampilkanSemua() {
        $q = $this->db->order_by($this->pk);
        $q = $this->db->get($this->table);
        return $q;
    }

    public function tampilSiswaPerKelas($kelas){
    	$query=$this->db->query("SELECT *
                                FROM siswa
                                WHERE ID_KELAS='$kelas'");
        return $query;
    }
}
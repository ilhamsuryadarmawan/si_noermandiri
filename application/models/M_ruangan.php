<?php

class M_ruangan extends CI_Model {
	//nama tabel dan primary key
    private $table = 'ruangan';
    private $pk = 'ID_RUANGAN';

	//tampilkan semua data
    public function tampilkanSemua() {
        $q = $this->db->order_by($this->pk);
        $q = $this->db->get($this->table);
        return $q;
    }

    	public function tambah($data){
        $this->db->insert($this->table, $data);
    }

}
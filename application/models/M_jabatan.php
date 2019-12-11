<?php

class M_jabatan extends CI_Model {
	//nama tabel dan primary key
    private $table = 'jabatan';
    private $pk = 'ID_JABATAN';

	//tampilkan semua data
    public function tampilkanSemua() {
        $q = $this->db->order_by($this->pk);
        $q = $this->db->get($this->table);
        return $q;
    }
}
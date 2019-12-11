<?php

class M_kelas extends CI_Model {
	//nama tabel dan primary key
    private $table = 'kelas';
    private $pk = 'ID_KELAS';

	//tampilkan semua data
    public function tampilkanSemua() {
        $q = $this->db->order_by($this->pk);
        $q = $this->db->get($this->table);
        return $q;
    }
}
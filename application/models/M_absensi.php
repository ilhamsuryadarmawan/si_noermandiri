<?php

class M_absensi extends CI_Model {
	//nama tabel dan primary key
    private $table = 'absensi';
    private $pk = 'ID_ABSENSI';

	//tampilkan semua data
    public function tampilkanSemua() {
        $q = $this->db->order_by($this->pk);
        $q = $this->db->get($this->table);
        return $q;
    }
}
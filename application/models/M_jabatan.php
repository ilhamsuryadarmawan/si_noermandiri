<?php

class M_jabatan extends CI_Model {
	//nama tabel dan primary key
    private $table = 'jabatan';
    private $pk = 'ID_JABATAN';

	//tampilkan semua data
    public function tampilkanSemua() {
        $query = $this->db->order_by($this->pk);
        $query = $this->db->get($this->table);
        return $query;
    }

    public function tambah($data){
        $this->db->insert($this->table, $data);
    }

    function update($data , $id){
        $this->db->where('ID_JABATAN', $id);
        $this->db->update($this->table, $data);
    }
}
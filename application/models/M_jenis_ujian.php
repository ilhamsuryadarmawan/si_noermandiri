<?php

class M_jenis_ujian extends CI_Model {
	//nama tabel dan primary key
    private $table = 'jenis_ujian';
    private $pk = 'ID_JENIS_UJIAN';

	//tampilkan semua data
    public function tampilkanSemua() {
        $q = $this->db->order_by($this->pk);
        $q = $this->db->get($this->table);
        return $q;
    }

    public function tambah($data){
        $this->db->insert($this->table, $data);
    }

    function update($data , $id){
        $this->db->where('ID_JENIS_UJIAN', $id);
        $this->db->update($this->table, $data);
    }

    function hapus($id)
    {
        $this->db->where('ID_JENIS_UJIAN', $id);
        $this->db->delete('JENIS_UJIAN');
    }


}
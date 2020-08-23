<?php

class M_semester extends CI_Model {
    //nama tabel dan primary key
    private $table = 'semester';
    private $pk = 'ID_SEMESTER';

    //tampilkan semua data
    public function getAll() {
        $q = $this->db->order_by($this->pk);
        $q = $this->db->get($this->table);
        return $q;
    }

    public function tambah($data){
        $this->db->insert($this->table, $data);
    }
    
    function update($data , $id){
        $this->db->where('ID_SEMESTER', $id);
        $this->db->update($this->table, $data);
    }

}
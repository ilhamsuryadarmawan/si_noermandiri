<?php

class M_skala_nilai extends CI_Model {
    //nama tabel dan primary key
    private $table = 'skala_nilai';
    private $pk = 'ID_SKALA';

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
        $this->db->where('ID_SKALA', $id);
        $this->db->update($this->table, $data);
    }

    function hapus($id)
    {
        $this->db->where('ID_SKALA', $id);
        $this->db->delete('sesi');
    }
}
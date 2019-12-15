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

    function rules(){
        return[
            ['field' => 'NAMA_KELAS','label' => 'NAMA_KELAS','rules' => 'required']
        ];
    }

    function simpan(){ 
        $post = $this->input->post();
        $this->NAMA_KELAS=$post['NAMA_KELAS'];
        $this->db->insert($this->table, $this); 
    }
}
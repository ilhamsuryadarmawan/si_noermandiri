<?php

class M_Jenjang_Kelas extends CI_Model {
	//nama tabel dan primary key
    private $table = 'jenjang_kelas';
    private $pk = 'ID_JENJANG';

	//tampilkan semua data
    public function tampilkanSemua() {
        $q = $this->db->order_by($this->pk);
        $q = $this->db->get($this->table);
        return $q;
    }

    function rules(){
        return[
            ['field' => 'NAMA_JENJANG','label' => 'NAMA_JENJANG','rules' => 'required'],
            ['field' => 'BIAYA','label' => 'BIAYA','rules' => 'required']
        ];
    }

    function simpan(){ 
        $post = $this->input->post();
        $this->ID_JENJANG=$post['NAMA_JENJANG'];
        $this->NAMA_KELAS=$post['BIAYA'];
        $this->db->insert($this->table, $this); 
    }
}
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

    function rules(){
        return[
            ['field' => 'ID_JABATAN','label' => 'ID_JABATAN','rules' => 'required'],
            ['field' => 'JABATAN','label' => 'JABATAN','rules' => 'required']
        ];
    }

    function simpan(){ 
        $post = $this->input->post();
        $this->ID_JABATAN=$post['ID_JABATAN'];
        $this->JABATAN=$post['JABATAN'];
        $this->db->insert($this->table, $this); 
    }
}
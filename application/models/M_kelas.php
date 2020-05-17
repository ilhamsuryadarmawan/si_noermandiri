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
            ['field' => 'ID_KELAS','label' => 'ID_KELAS','rules' => 'required'],
            ['field' => 'ID_JENJANG','label' => 'ID_JENJANG','rules' => 'required'],
            ['field' => 'NAMA_KELAS','label' => 'NAMA_KELAS','rules' => 'required']
        ];
    }

    function simpan(){ 
        $post = $this->input->post();
        $this->ID_KELAS=$post['ID_KELAS'];
        $this->ID_JENJANG=$post['ID_JENJANG'];
        $this->NAMA_KELAS=$post['NAMA_KELAS'];
        $this->db->insert($this->table, $this); 
    }

    public function getKelas($tanggal)
    {
        $query=$this->db->query("SELECT distinct k.ID_KELAS, k.NAMA_KELAS
                                FROM kelas K
                                WHERE k.ID_KELAS NOT in (SELECT j.ID_KELAS FROM jadwal_les j
                                WHERE j.TANGGAL = '$tanggal')");
        return $query;
    }

    public function tambah($data)
    {
        $this->db->insert($this->table, $data);
    }

    public function getKelass($jenjang)
    {
        $query=$this->db->query("SELECT *
                                FROM kelas
                                WHERE ID_JENJANG = '$jenjang'");
        return $query;
    }

    function update($data , $id){
        $this->db->where('ID_KELAS', $id);
        $this->db->update($this->table, $data);
    }

    function getById($id){
        $this->db->select('*');
        $this->db->from('kelas');
        $this->db->where('ID_KELAS', $id);
        return $this->db->get();
    }
}
<?php

class M_mapel extends CI_Model {
	//nama tabel dan primary key
    private $table = 'mata_pelajaran';
    private $pk = 'ID_MAPEL';

	//tampilkan semua data
    public function tampilkanSemua($limit,$start) {
        $this->db->SELECT('*');
        $this->db->FROM ('mata_pelajaran');
        $this->db->limit($limit,$start);
        $query = $this->db->get();
        return $query;
    }

    public function tampilMapel() {
        $query=$this->db->query("SELECT *FROM mata_pelajaran WHERE ID_MAPEL!='EMP'");
    	return $query;
    }

    // function rules(){
    //     return[
    //         ['field' => 'NAMA_MAPEL','label' => 'NAMA_MAPEL','rules' => 'required']
    //     ];
    // }

    // function simpan(){ 
    //     $post = $this->input->post();
    //     $this->NAMA_MAPEL=$post['NAMA_MAPEL'];
    //     $this->db->insert($this->table, $this); 
    // }

    public function tambah($data){
        $this->db->insert($this->table, $data);
    }

    function editMapel($WHERE,$table){
        return $this->db->get_where($table,$WHERE);
    }

    function hapusMapel($id){
        $post=$this->db->query("DELETE FROM mata_pelajaran WHERE ID_MAPEL='$id'");
        return $post;
    }

    public function hitung_mapel(){
        $this->db->select('*');
        $this->db->from('mata_pelajaran');
        return $this->db->get()->num_rows();
    }

}
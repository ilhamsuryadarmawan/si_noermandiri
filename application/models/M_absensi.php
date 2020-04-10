<?php

class M_absensi extends CI_Model {
	//nama tabel dan primary key
    private $table = 'absensi_siswa';
    private $pk = 'ID_ABSENSI';

	//tampilkan semua data
    public function tampilkanSemua() {
        $q = $this->db->order_by($this->pk);
        $q = $this->db->get($this->table);
        return $q;
    }

    // function rules(){
    //     return[
    //         // ['field' => 'ID_ABSENSI','label' => 'ID_ABSENSI','rules' => 'required'],
    //         // ['field' => 'NOINDUK','label' => 'NOINDUK','rules' => 'required'],
    //         // ['field' => 'ID_JADWAL','label' => 'ID_JADWAL','rules' => 'required'],
    //         // ['field' => 'TANGGAL_ABSEN','label' => 'TANGGAL_ABSEN','rules' => 'required']
    //         // // ['field' => 'MATERI','label' => 'MATERI','rules' => 'required'],
    //         // // // ['field' => 'STATUS_ABSEN','label' => 'STATUS_ABSEN','rules' => 'required'],
    //         // // ['field' => 'KETERANGAN_ABSEN','label' => 'KETERANGAN_ABSEN','rules' => 'required'],
    //         // ['field' => 'TGL_ABSEN_DIBUAT','label' => 'TGL_ABSEN_DIBUAT','rules' => 'required']
    //     ];
    // }

    function simpan($nis, $status, $materi, $ket){ 
        $post = $this->input->post();

        $this->NOINDUK=$nis;
        $this->ID_JADWAL="JDWL001";
        $this->TANGGAL_ABSEN=date('Y-m-d');
        $this->MATERI=$materi;
        $this->STATUS_ABSEN=$status;
        $this->KETERANGAN_ABSEN=$ket;
        $this->TGL_ABSEN_DIBUAT=date('Y-m-d H:i:s');

        $this->db->insert($this->table, $this); 
    }

    function tampilKehadiran(){
        $query=$this->db->query("SELECT COUNT(ID_ABSENSI) as jmlKehadiran, a.NOINDUK, s.NAMA_SISWA FROM absensi_siswa a
        JOIN siswa s on a.NOINDUK = s.NOINDUK  WHERE STATUS_ABSEN = 'H' GROUP BY NOINDUK");
        return $query;
    }

    function tampilPertemuan(){
        $query=$this->db->query('SELECT COUNT(ID_ABSENSI) as pertemuan FROM absensi_siswa');
    }
}
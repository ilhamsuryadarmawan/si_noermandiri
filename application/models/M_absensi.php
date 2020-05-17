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
        $query=$this->db->query("SELECT COUNT(ID_ABSENSI) as jmlKehadiran, a.NOINDUK, s.NAMA_SISWA
                                FROM absensi_siswa a
                                JOIN siswa s ON s.NOINDUK = a.NOINDUK
                                WHERE STATUS_ABSEN = 'H' GROUP BY NOINDUK");
        return $query;
    } 

    function tampilPertemuan(){
        $query=$this->db->query('SELECT COUNT(ID_ABSENSI) as jmlPertemuan FROM absensi_siswa');

        return $query;
    }
}
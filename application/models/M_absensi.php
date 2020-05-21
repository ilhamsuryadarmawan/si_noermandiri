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

    public function getAll($kelas=null,$periode=null) {

        if ($kelas && $periode) {
            $this->db->where('j.ID_KELAS',$kelas);
            $this->db->where('date_format(j.TANGGAL,"%m-%Y")',$periode);
        }elseif (strlen($kelas)>0) {
            $this->db->where('j.ID_KELAS',$kelas);
        }elseif (strlen($periode)>0) {
            $this->db->where('date_format(j.TANGGAL,"%m-%Y")',$periode);
        }
        $this->db->select('*');
        $this->db->from('absensi_siswa abs');
        $this->db->join('jadwal_les j','abs.ID_JADWAL = j.ID_JADWAL');
        $this->db->join('kelas k','j.ID_KELAS = k.ID_KELAS');
        $this->db->join('mata_pelajaran mp','j.ID_MAPEL = mp.ID_MAPEL');
        $this->db->join('ruangan r','j.ID_RUANGAN = r.ID_RUANGAN');
        $this->db->join('pegawai t','j.ID_PEGAWAI = t.ID_PEGAWAI');
        $this->db->join('siswa sis','abs.NOINDUK = sis.NOINDUK');
        $this->db->join('sesi s','j.ID_SESI = s.ID_SESI');
        return $this->db->get();
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
        $query=$this->db->query("
                            SELECT a.NOINDUK, s.NAMA_SISWA, SUM(case when STATUS_ABSEN = 'H' then 1 ELSE 0 end) as kehadiran, SUM(CASE WHEN STATUS_ABSEN = 'A' then 1 else 0 end) as alfa, SUM(CASE WHEN STATUS_ABSEN = 'H' then 1 when STATUS_ABSEN = 'A' THEN 1 else 0 END) as pertemuan 
                            FROM absensi_siswa a
                            LEFT JOIN siswa s ON s.NOINDUK = a.NOINDUK
                            GROUP BY NOINDUK
                            ");
        return $query;
    } 

    function tampilAlfa(){
        $query=$this->db->query("SELECT COUNT(ID_ABSENSI) as jmlAlfa, a.NOINDUK, s.NAMA_SISWA
                                FROM absensi_siswa a
                                JOIN siswa s ON s.NOINDUK = a.NOINDUK
                                WHERE STATUS_ABSEN = 'A' GROUP BY NOINDUK");
        return $query;
    } 
}
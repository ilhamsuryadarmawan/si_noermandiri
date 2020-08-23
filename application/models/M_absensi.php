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

    public function getAll() {

        $this->db->select('*');
        $this->db->from('absensi_siswa abs');
        $this->db->join('jadwal_les j','abs.ID_JADWAL = j.ID_JADWAL');
        $this->db->join('kelas k','j.ID_KELAS = k.ID_KELAS');
        $this->db->join('mata_pelajaran mp','j.ID_MAPEL = mp.ID_MAPEL');
        $this->db->join('ruangan r','j.ID_RUANGAN = r.ID_RUANGAN');
        $this->db->join('pegawai t','j.ID_PEGAWAI = t.ID_PEGAWAI');
        $this->db->join('siswa sis','abs.NOINDUK = sis.NOINDUK');
        $this->db->join('sesi s','j.ID_SESI = s.ID_SESI');
        $this->db->join('semester se','j.ID_SEMESTER = se.ID_SEMESTER');
        return $this->db->get();
    }

    public function getId($id) {
        $this->db->select('*');
        $this->db->from('absensi_siswa');
        $this->db->where('ID_ABSENSI',$id);
        return $this->db->get();
    }

    public function cekAbsensi($id) {
        $this->db->select('*');
        $this->db->from('absensi_siswa');
        $this->db->where('ID_JADWAL',$id);
        return $this->db->get();
    }

    function simpan( $id_jadwal, $nis, $status){ 
        $post = $this->input->post();
        $this->ID_JADWAL=$id_jadwal;
        $this->NOINDUK=$nis;
        // $this->TANGGAL_ABSEN=$tgl;
        $this->STATUS_ABSEN=$status;
        $this->TGL_ABSEN_DIBUAT=date('Y-m-d H:i:s');

        $this->db->insert($this->table, $this); 
    }


    public function rekap_absen($periode,$kls)
    {
        return $this->db->query("
            SELECT NOINDUK as nis,NAMA_SISWA, ID_KELAS as kls ,
                (SELECT COUNT(NOINDUK) 
                FROM absensi_siswa 
                JOIN jadwal_les ON absensi_siswa.ID_JADWAL=jadwal_les.ID_JADWAL 
                WHERE absensi_siswa.NOINDUK = nis AND jadwal_les.ID_SEMESTER ='$periode' AND absensi_siswa.STATUS_ABSEN='H') hadir, 
                (SELECT COUNT(NOINDUK) 
                FROM absensi_siswa 
                JOIN jadwal_les ON absensi_siswa.ID_JADWAL=jadwal_les.ID_JADWAL 
                WHERE absensi_siswa.NOINDUK = nis AND jadwal_les.ID_SEMESTER ='$periode' AND absensi_siswa.STATUS_ABSEN='A') alpha, 
                (SELECT COUNT(ID_JADWAL) 
                FROM jadwal_les 
                WHERE ID_KELAS=kls AND jadwal_les.ID_SEMESTER ='$periode') pertemuan
            FROM siswa
            WHERE ID_KELAS = '$kls'");
    }

    public function laporan_absen($periode,$kls)
    {
        return $this->db->query("
            SELECT NOINDUK as nis,NAMA_SISWA,ID_KELAS as kls ,(SELECT COUNT(NOINDUK) FROM absensi_siswa JOIN jadwal_les ON absensi_siswa.ID_JADWAL=jadwal_les.ID_JADWAL WHERE absensi_siswa.NOINDUK = nis AND date_format(jadwal_les.TANGGAL,'%Y-%m')='$periode' AND absensi_siswa.STATUS_ABSEN='H') hadir, (SELECT COUNT(NOINDUK) FROM absensi_siswa JOIN jadwal_les ON absensi_siswa.ID_JADWAL=jadwal_les.ID_JADWAL WHERE absensi_siswa.NOINDUK = nis AND date_format(jadwal_les.TANGGAL,'%Y-%m')='$periode' AND absensi_siswa.STATUS_ABSEN='A') alpha, (SELECT COUNT(ID_JADWAL) FROM jadwal_les WHERE ID_KELAS=kls AND date_format(TANGGAL,'%Y-%m')='$periode') pertemuan
            FROM siswa
            WHERE ID_KELAS = '$kls'");
    }

    public function histori_absen($noinduk,$periode)
    {
        return $this->db->query("
            SELECT NOINDUK, NAMA_SISWA, ID_KELAS as kelas,
                (SELECT COUNT(NOINDUK) 
                FROM absensi_siswa 
                JOIN jadwal_les ON absensi_siswa.ID_JADWAL=jadwal_les.ID_JADWAL 
                WHERE absensi_siswa.NOINDUK = $noinduk AND jadwal_les.ID_SEMESTER='$periode' AND absensi_siswa.STATUS_ABSEN='H') hadir, 
                (SELECT COUNT(NOINDUK) 
                FROM absensi_siswa 
                JOIN jadwal_les ON absensi_siswa.ID_JADWAL=jadwal_les.ID_JADWAL 
                WHERE absensi_siswa.NOINDUK = $noinduk AND jadwal_les.ID_SEMESTER='$periode' AND absensi_siswa.STATUS_ABSEN='A') alpha, 
                (SELECT COUNT(ID_JADWAL)                     
                FROM jadwal_les 
                WHERE ID_KELAS=kelas AND ID_SEMESTER='$periode') pertemuan
            FROM siswa
            WHERE NOINDUK = '$noinduk'
        ");
    }

        public function get_by_id_jadwal($id)
    {
        $this->db->SELECT('*');
        $this->db->FROM('absensi_siswa');
        $this->db->WHERE('ID_JADWAL',$id); 
        $query = $this->db->get();
        return $query;
    }
}
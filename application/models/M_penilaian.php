<?php

class M_penilaian extends CI_Model {
    //nama tabel dan primary key
    private $table = 'nilai_siswa';
    private $pk = 'ID_NILAI';

    //tampilkan semua data
    public function tampilkanSemua() {
        $q = $this->db->order_by($this->pk);
        $q = $this->db->get($this->table);
        return $q;
    }

    public function getById($id)
    {
        $this->db->select('*');
        $this->db->from('nilai_siswa ns');
        $this->db->join('kelas k','ns.ID_KELAS = k.ID_KELAS');
        $this->db->join('mata_pelajaran mp','ns.ID_MAPEL = mp.ID_MAPEL');
        $this->db->join('pegawai t','ns.ID_PEGAWAI = t.ID_PEGAWAI');
        $this->db->where('ns.ID_NILAI',$id);
        return $this->db->get();
    }

    public function getAll($kelas=null,$mapel=null,$ujian=null) {

        if ($kelas && $mapel && $ujian) {
            $this->db->where('nil.ID_KELAS',$kelas);
            $this->db->where('nil.ID_MAPEL',$mapel);
            $this->db->where('nil.ID_JENIS_UJIAN',$ujian);
        }

        $this->db->select('*');
        $this->db->from('nilai_siswa nil');
        $this->db->join('jenis_ujian j','nil.ID_JENIS_UJIAN = j.ID_JENIS_UJIAN');
        $this->db->join('kelas k','nil.ID_KELAS = k.ID_KELAS');
        $this->db->join('mata_pelajaran mp','nil.ID_MAPEL = mp.ID_MAPEL');
        // $this->db->join('ruangan r','j.ID_RUANGAN = r.ID_RUANGAN');
        $this->db->join('pegawai t','nil.ID_PEGAWAI = t.ID_PEGAWAI');
        $this->db->join('siswa sis','nil.NOINDUK = sis.NOINDUK');
        // $this->db->join('sesi s','j.ID_SESI = s.ID_SESI');
        return $this->db->get();
    }

    public function getId($id) {
        $this->db->select('*');
        $this->db->from('absensi_siswa');
        $this->db->where('ID_ABSENSI',$id);
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

    public function tambah($data)
    {
        $this->db->insert($this->table, $data); 
    }
 

    public function tampilKelas($id)
    {
        $this->db->select('*');
        $this->db->from('nilai_siswa ns');
        $this->db->join('kelas k','k.ID_KELAS = ns.ID_KELAS');
        return $this->db->get();
    }

    public function rekap_nilai($kelas)
    {
        $query = $this->db->query("SELECT NOINDUK as nis, NAMA_SISWA, kelas.NAMA_KELAS, (select nilai_siswa.JUMLAH_NILAI from nilai_siswa JOIN jenis_ujian on nilai_siswa.ID_JENIS_UJIAN = jenis_ujian.ID_JENIS_UJIAN WHERE nilai_siswa.NOINDUK = nis AND jenis_ujian.ID_JENIS_UJIAN ='UJI001') tryout, (select nilai_siswa.JUMLAH_NILAI from nilai_siswa JOIN jenis_ujian on nilai_siswa.ID_JENIS_UJIAN = jenis_ujian.ID_JENIS_UJIAN WHERE nilai_siswa.NOINDUK = nis AND jenis_ujian.ID_JENIS_UJIAN ='UJI002') tugas1
            from siswa
            JOIN kelas ON siswa.ID_KELAS = kelas.ID_KELAS
            WHERE siswa.ID_KELAS = '$kelas'");   
        return $query; 
    }

    public function histori_nilai($noinduk)
    {
        $query = $this->db->query("SELECT NOINDUK as nis, NAMA_SISWA, kelas.NAMA_KELAS, (select nilai_siswa.JUMLAH_NILAI from nilai_siswa JOIN jenis_ujian on nilai_siswa.ID_JENIS_UJIAN = jenis_ujian.ID_JENIS_UJIAN WHERE nilai_siswa.NOINDUK = nis AND jenis_ujian.ID_JENIS_UJIAN ='UJI001') tryout, (select nilai_siswa.JUMLAH_NILAI from nilai_siswa JOIN jenis_ujian on nilai_siswa.ID_JENIS_UJIAN = jenis_ujian.ID_JENIS_UJIAN WHERE nilai_siswa.NOINDUK = nis AND jenis_ujian.ID_JENIS_UJIAN ='UJI002') tugas1
            from siswa
            JOIN kelas ON siswa.ID_KELAS = kelas.ID_KELAS
            WHERE siswa.NOINDUK = '$noinduk'");   
        return $query; 
    }
}
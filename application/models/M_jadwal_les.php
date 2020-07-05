<?php

class M_jadwal_les extends CI_Model {
	//nama tabel dan primary key
    private $table = 'jadwal_les';
    private $pk = 'ID_JADWAL';

	//tampilkan semua data les untuk admin

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
        $this->db->from('jadwal_les j');
        $this->db->join('kelas k','j.ID_KELAS = k.ID_KELAS');
        $this->db->join('mata_pelajaran mp','j.ID_MAPEL = mp.ID_MAPEL');
        $this->db->join('ruangan r','j.ID_RUANGAN = r.ID_RUANGAN');
        $this->db->join('pegawai t','j.ID_PEGAWAI = t.ID_PEGAWAI');
        $this->db->join('sesi s','j.ID_SESI = s.ID_SESI');
        return $this->db->get();
    }

    public function tampilkanSemua() {
        $this->db->select('*');
        $this->db->from('jadwal_les j');
        $this->db->join('kelas k','j.ID_KELAS = k.ID_KELAS');
        $this->db->join('mata_pelajaran mp','j.ID_MAPEL = mp.ID_MAPEL');
        $this->db->join('ruangan r','j.ID_RUANGAN = r.ID_RUANGAN');
        $this->db->join('pegawai t','j.ID_PEGAWAI = t.ID_PEGAWAI');
        $this->db->join('sesi s','j.ID_SESI = s.ID_SESI');
        return $this->db->get();
    }

    public function getByBulan() {
        $query=$this->db->query("SELECT j.TANGGAL, k.NAMA_KELAS, mp.NAMA_MAPEL, r.NAMA_RUANGAN, t.NAMA_PEGAWAI, s.JAM_MULAI, s.JAM_SELESAI
                                FROM jadwal_les j
                                LEFT JOIN kelas k ON k.ID_KELAS = j.ID_KELAS
                                LEFT JOIN mata_pelajaran mp ON mp.ID_MAPEL = j.ID_MAPEL
                                LEFT JOIN ruangan r ON r.ID_RUANGAN = j.ID_RUANGAN
                                LEFT JOIN pegawai t ON t.ID_PEGAWAI = j.ID_PEGAWAI
                                LEFT JOIN sesi s on s.ID_SESI = j.ID_SESI
                                ORDER BY j.TANGGAL ASC");
        return $query;
    }

    public function getByFilter($periode,$kelas) {
        $query=$this->db->query("SELECT date_format(j.TANGGAL,'%d-%m-%Y') as tanggal, k.NAMA_KELAS, mp.NAMA_MAPEL, r.NAMA_RUANGAN, t.NAMA_PEGAWAI, CONCAT_WS(' - ',date_format(s.JAM_MULAI,'%H:%i'), date_format(s.JAM_SELESAI,'%H:%i'))as jam
                                FROM jadwal_les j
                                LEFT JOIN kelas k ON k.ID_KELAS = j.ID_KELAS
                                LEFT JOIN mata_pelajaran mp ON mp.ID_MAPEL = j.ID_MAPEL
                                LEFT JOIN ruangan r ON r.ID_RUANGAN = j.ID_RUANGAN
                                LEFT JOIN pegawai t ON t.ID_PEGAWAI = j.ID_PEGAWAI
                                LEFT JOIN sesi s on s.ID_SESI = j.ID_SESI
                                WHERE  date_format(j.TANGGAL, '%m-%Y')= '$periode' and j.ID_KELAS = '$kelas'
                                ORDER BY j.TANGGAL ASC");
        return $query;
    }

    public function JadwalSiswa($kelas) {
        $query=$this->db->query("SELECT *
                                FROM jadwal_les j
                                LEFT JOIN kelas k ON j.ID_KELAS = k.ID_KELAS
                                LEFT JOIN mata_pelajaran mp ON j.ID_MAPEL = mp.ID_MAPEL
                                LEFT JOIN ruangan r ON j.ID_RUANGAN = r.ID_RUANGAN
                                LEFT JOIN pegawai t ON j.ID_pegawai = t.ID_pegawai
                                LEFT JOIN sesi w on j.ID_sesi = w.ID_sesi
                                WHERE k.ID_KELAS='$kelas'");
        return $query;
    }    

    public function jadwal_siswa_hari_ini($kelas,$today) {
        $query=$this->db->query("SELECT *
                                FROM jadwal_les j
                                LEFT JOIN kelas k ON j.ID_KELAS = k.ID_KELAS
                                LEFT JOIN mata_pelajaran mp ON j.ID_MAPEL = mp.ID_MAPEL
                                LEFT JOIN ruangan r ON j.ID_RUANGAN = r.ID_RUANGAN
                                LEFT JOIN pegawai t ON j.ID_pegawai = t.ID_pegawai
                                LEFT JOIN sesi s on j.ID_SESI = s.ID_SESI
                                WHERE j.ID_KELAS='$kelas' and j.TANGGAL = '$today'");
        return $query;
    }   

    public function jadwal_pegawai_hari_ini($pegawai,$today) {
        $query=$this->db->query("SELECT *
                                FROM jadwal_les j
                                LEFT JOIN kelas k ON j.ID_KELAS = k.ID_KELAS
                                LEFT JOIN mata_pelajaran mp ON j.ID_MAPEL = mp.ID_MAPEL
                                LEFT JOIN ruangan r ON j.ID_RUANGAN = r.ID_RUANGAN
                                LEFT JOIN pegawai t ON j.ID_pegawai = t.ID_pegawai
                                LEFT JOIN sesi s on j.ID_SESI = s.ID_SESI
                                WHERE j.ID_pegawai='$pegawai' and j.TANGGAL = '$today'
                                ORDER BY j.ID_SESI");
        return $query;
    }     

    public function getJadwalSiswaByBulan($kelas) {
        $periode = date('m-Y');
        $query=$this->db->query("SELECT j.TANGGAL, s.JAM_MULAI,s.JAM_SELESAI, mp.NAMA_MAPEL, r.NAMA_RUANGAN, t.NAMA_pegawai
                                FROM jadwal_les j
                                LEFT JOIN kelas k ON j.ID_KELAS = k.ID_KELAS
                                LEFT JOIN mata_pelajaran mp ON j.ID_MAPEL = mp.ID_MAPEL
                                LEFT JOIN ruangan r ON j.ID_RUANGAN = r.ID_RUANGAN
                                LEFT JOIN pegawai t ON j.ID_pegawai = t.ID_pegawai
                                LEFT JOIN sesi s on j.ID_SESI = s.ID_SESI
                                WHERE k.ID_KELAS='$kelas'");
        return $query;

    }

    public function getJadwalpegawaiByFilter($periode,$id) {
        $query=$this->db->query("SELECT date_format(j.TANGGAL,'%d-%m-%Y') as tanggal, CONCAT_WS(' - ',date_format(s.JAM_MULAI,'%H:%i'), date_format(s.JAM_SELESAI,'%H:%i'))as jam, mp.NAMA_MAPEL, r.NAMA_RUANGAN
                                FROM jadwal_les j
                                LEFT JOIN kelas k ON j.ID_KELAS = k.ID_KELAS
                                LEFT JOIN mata_pelajaran mp ON j.ID_MAPEL = mp.ID_MAPEL
                                LEFT JOIN ruangan r ON j.ID_RUANGAN = r.ID_RUANGAN
                                LEFT JOIN sesi s on j.ID_SESI = s.ID_SESI
                                WHERE j.ID_pegawai ='$id' AND date_format(j.TANGGAL, '%m-%Y')= '$periode'
                                ORDER BY j.TANGGAL ASC");
        return $query;

    }

    public function getJadwalSiswaByFilter($periode,$kelas) {
        $query=$this->db->query("SELECT date_format(j.TANGGAL,'%d-%m-%Y') as tanggal, mp.NAMA_MAPEL, r.NAMA_RUANGAN, t.NAMA_pegawai, CONCAT_WS(' - ',date_format(s.JAM_MULAI,'%H:%i'), date_format(s.JAM_SELESAI,'%H:%i'))as jam
                                FROM jadwal_les j
                                LEFT JOIN mata_pelajaran mp ON mp.ID_MAPEL = j.ID_MAPEL
                                LEFT JOIN ruangan r ON r.ID_RUANGAN = j.ID_RUANGAN
                                LEFT JOIN pegawai t ON t.ID_pegawai = j.ID_pegawai
                                LEFT JOIN sesi s on s.ID_SESI = j.ID_SESI
                                WHERE  date_format(j.TANGGAL, '%m-%Y')= '$periode' and j.ID_KELAS = '$kelas'
                                ORDER BY j.TANGGAL ASC");
        return $query;
    }

    public function tambah($data){
        $this->db->insert($this->table, $data);
    }

    public function hapus($id)
    {
        $this->db->where('ID_JADWAL', $id);
        $this->db->delete('jadwal_les');
        redirect(site_url('Jadwal'));
    }

    public function getById($id)
    {
        $this->db->select('*');
        $this->db->from('jadwal_les j');
        $this->db->join('kelas k','j.ID_KELAS = k.ID_KELAS');
        $this->db->join('mata_pelajaran mp','j.ID_MAPEL = mp.ID_MAPEL');
        $this->db->join('ruangan r','j.ID_RUANGAN = r.ID_RUANGAN');
        $this->db->join('pegawai t','j.ID_PEGAWAI = t.ID_PEGAWAI');
        $this->db->join('sesi s','j.ID_SESI = s.ID_SESI');
        $this->db->where('j.ID_JADWAL',$id);
        return $this->db->get();
    }


}
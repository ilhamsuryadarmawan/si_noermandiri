<?php

class M_pegawai extends CI_Model {
	//nama tabel dan primary key
    private $table_pegawai  = 'pegawai';
    private $pkPegawai      = 'ID_PEGAWAI';

	//tampilkan semua data
    public function tampilkanSemua() {
        $q = $this->db->order_by($this->pkPegawai);
        $q = $this->db->get($this->table_pegawai);
        return $q;
    }

    public function tampilTentor(){
        // $query=$this->db->query("SELECT p.ID_PEGAWAI, p.NAMA_PEGAWAI, p.ID_MAPEL, mp.NAMA_MAPEL FROM pegawai p INNER JOIN mata_pelajaran mp on p.ID_MAPEL = mp.ID_MAPEL WHERE p.ID_MAPEL!='EMP'");
        // return $query;

        $this->db->SELECT('*');
        $this->db->FROM('pegawai');
        $this->db->join('mata_pelajaran','mata_pelajaran.ID_MAPEL=pegawai.ID_MAPEL');
        $this->db->WHERE("pegawai.ID_MAPEL!='EMP'");
        $query = $this->db->get();
        return $query;
    }

    public function getPegawaiByIdMapel($kode){
        $mapel = $this->db->query("SELECT * FROM pegawai WHERE ID_MAPEL='$kode'");
        if($mapel->num_rows()>0){
            foreach ($mapel->result() as $data){
                $hasil=array(
                'id_mapel'      => $data->ID_MAPEL,
                'nama_mapel'    => $data->NAMA_MAPEL,
                );
            }
        }
        return $hasil;
    }

    public function getTentorTersedia($tgl, $waktu){
        $query=$this->db->query("SELECT ID_PEGAWAI,NAMA_PEGAWAI
            FROM pegawai
            WHERE ID_PEGAWAI != (SELECT ID_PEGAWAI
            FROM jadwal_les
            WHERE TANGGAL = '$tgl' AND ID_WAKTU = '$waktu') AND ID_JABATAN = 'TNTR'");

        if($query->num_rows()>0){
            foreach ($query->result_array() as $row) {
                $result[$row['ID_PEGAWAI']] = $row['NAMA_PEGAWAI'];
            }
        }else{
            $result['-'] = '- Tentor Tidak Tersedia -';
        }
        return $result;
    }
}
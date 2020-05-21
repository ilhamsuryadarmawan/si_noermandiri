<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Input Data Absensi</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row">
                <div class="col-md-12">
                <?php if (validation_errors()) : ?>
                                        <div class="alert alert-danger">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <?php echo validation_errors(); ?>
                                        </div>
                            <?php endif; ?>
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title"><?php echo $judul?></div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form action="<?php echo base_url('C_penilaian')?>" enctype="multipart/form-data" method="POST">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-2 mt-4">
                                                    <label>Tgl Absen dibuat</label>
                                                </div>
                                                <div class="col-lg-6 mt-3">
                                                    <input type="hidden" class="form-control" id="TGL_ABSEN_DIBUAT" name="TGL_ABSEN_DIBUAT" value="<?php echo date('Y-m-d')?>" readonly>
                                                </div>
                                            </div>
                                        </div>
<!--                                         <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-1">
                                                </div>
                                                <div class="col-lg-3">
                                                    <label>ID Jadwal</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="hidden" class="form-control" id="ID_JADWAL" name="ID_JADWAL" value="<?php echo $ID_JADWAL ?>" readonly>
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-2 mt-4">
                                                    <label>Pengajar</label>
                                                </div>
                                                <div class="col-lg-6 mt-3">
                                                    <input type="text" class="form-control" id="pengajar" name="pengajar" value="<?php echo $this->session->userdata('ses_id'); ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-2 mt-4">
                                                    <label>Kelas</label>
                                                </div>
                                                <div class="col-lg-6 mt-3">
                                                    <input type="text" class="form-control" id="kelas" name="kelas" value="<?php echo $kelas?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-2 mt-4">
                                                    <label>Mata Pelajaran</label>
                                                </div>
                                                <div class="col-lg-6 mt-3">
                                                    <input type="text" class="form-control" id="mapel" name="mapel" value="<?php echo $mapel?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
<!--                                         <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-2 mt-4">
                                                    <label>Keterangan Absensi</label>
                                                </div>
                                                <div class="col-lg-6 mt-3">
                                                    <input type="text" class="form-control" id="KETERANGAN_ABSEN" name="keterangan">
                                                </div>
                                            </div>
                                        </div> -->
                                        <table class="table sparkle-table" id="table" data-toggle="table" data-pagination="false" data-search="false" data-cookie-id-table="saveId" data-click-to-select="false" data-toolbar="#toolbar">
                                            <thead>
                                                <tr>
                                                    <th data-field="no">No</th>
                                                    <th data-field="noinduk">NIS</th>
                                                    <th data-field="nama">Nama Siswa</th>
                                                    <th data-field="status">Status Absen</th>                                                
                                                </tr>
                                            </thead>
                                            
                                             <tbody>
                                                <?php
                                                $nourut = 1;
                                                foreach ($siswa as $sis) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $nourut++;?></td>
                                                    <td><?php echo $sis->NOINDUK; ?></td>
                                                    <td><?php echo $sis->NAMA_SISWA; ?></td>
                                                    <td>
                                                        <input type="hidden" class="form-control" id="NOINDUK" name="noinduk[]" value="<?php echo $sis->NOINDUK?>" readonly>
                                                        <label>
<!--                                                             <input type="checkbox" class="check" value="<?php echo $sis->NOINDUK ?>" name="hadir[]" checked> Hadir -->
                                                            <input type="text" class="form-control" id="nilai" name="nilai[]">
                                                        </label>
                                                    </td>
                                                <?php
                                                }
                                                ?>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-4"></div>
                                                <div class="col-lg-6">
                                                    <div class="login-horizental cancel-wp pull-left">
                                                        <button type="reset" class="btn btn-danger btn-sm" name="Batal">Batal</button>&nbsp;
                                                        <button type="submit" class="btn btn-primary btn-sm" name="Tambah" onclick="absensi()">Simpan Absensi</button> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 


<script type="text/javascript">
function absensi(){
    var nis =[] ;
    var hadirValue = [];
    var cboxes = document.getElementsByName('hadir[]');
    var mat = document.getElementById('MATERI').value;
    var ket = document.getElementById('KETERANGAN_ABSEN').value;
    var noinduk= document.getElementsByName('noinduk[]');
    var len = cboxes.length;

    for(var i=0; i<len; ++i){
          if(cboxes[i].checked){
               hadirValue[i] = cboxes[i].value;
          }
    }

    var lenDen= noinduk.length;
    for(var i=0; i<lenDen; ++i){
        nis[i] = noinduk[i].value;  
    }

    var daftarHadir= JSON.stringify(hadirValue);
    var nosis= JSON.stringify(nis);
    //var keterangan = JSON.stringify(ket);
    //var materi = JSON.stringify(mat);  

    console.log(mat);
    console.log(ket);
    console.log(daftarHadir);
    console.log(nosis);

    url = '<?php echo base_url().'C_absensi/simpan';?>';
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function(){
              //jika berhasil
              if(this.readyState==4 && this.status == 200)
              {
                 console.log(this.responseText);
                
                if(this.responseText==0)
                {

                  
                  console.log(this.responseText);
                  
                }
                else
                {
                  alert("Connection Error, try again");                  
                }
                
              } alert("Data Tersimpan, Success");

            }
      //console.log("data="+jsonData+"&peminjaman="+jsonData2);
      xhttp.open("POST", url, true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("hadir="+daftarHadir+"&nosiswa="+nosis+"&materi="+mat+"&keterangan="+ket);
      
}

// function selectall() {
//   let checkboxs = document.getElementsByName(hadir[]);
//   for(let i = 1; i < checkboxs.length ; i++) {
//     checkboxs[i].checked = !checkboxs[i].checked;
//   }
// }
</script>


<!--     case "form":
    $kelas = explode("*", $_GET['kelas']);
    $data_mhs = $db->database_fetch_array($db->database_prepare("SELECT * FROM as_jadwal_kuliah A INNER JOIN as_kelas B ON A.kelas_id=B.kelas_id
                                                        INNER JOIN as_angkatan C ON C.angkatan_id=B.angkatan_id 
                                                        INNER JOIN mspst D ON D.IDPSTMSPST=B.prodi_id
                                                        INNER JOIN msdos E ON E.IDDOSMSDOS=A.dosen_id
                                                        INNER JOIN as_ruang F ON F.ruang_id=A.ruang_id
                                                        WHERE   A.makul_id=? AND
                                                                A.kelas_id=? AND
                                                                B.angkatan_id = ? LIMIT 1")->execute($_GET['makul'],$kelas[0],$kelas[2]));
    $data_makul = $db->database_fetch_array($db->database_prepare("SELECT kode_mata_kuliah,nama_mata_kuliah_eng FROM as_makul WHERE mata_kuliah_id = ?")->execute($_GET['makul']));
    if ($data_mhs['KDJENMSPST'] == 'A'){
        $kd_jenjang_studi = "S3";
    }
    elseif ($data_mhs['KDJENMSPST'] == 'B'){
        $kd_jenjang_studi = "S2";
    }
    elseif ($data_mhs['KDJENMSPST'] == 'C'){
        $kd_jenjang_studi = "S1";
    }
    elseif ($data_mhs['KDJENMSPST'] == 'D'){
        $kd_jenjang_studi = "D4";
    }
    elseif ($data_mhs['KDJENMSPST'] == 'E'){
        $kd_jenjang_studi = "D3";
    }
    elseif ($data_mhs['KDJENMSPST'] == 'F'){
        $kd_jenjang_studi = "D2";
    }
    elseif ($data_mhs['KDJENMSPST'] == 'G'){
        $kd_jenjang_studi = "D1";
    }
    elseif ($data_mhs['KDJENMSPST'] == 'H'){
        $kd_jenjang_studi = "Sp-1";
    }
    elseif ($data_mhs['KDJENMSPST'] == 'I'){
        $kd_jenjang_studi = "Sp-2";
    }
    else{
        $kd_jenjang_studi = "Profesi";
    }
    echo "<a href='index.php?mod=nilai_semester'><img src='../images/back.png'></a>
        <h5>Entri Data Nilai Semester</h5>
        <form method='POST' action='modul/mod_nilai/aksi_nilai.php?mod=nilai_semester&act=input'>
        <div class='well'>
            <div class='box round first fullpage'>
                <div class='block '>
                    <table class='form'>
                    <tr>
                        <td width='100'>Program Studi</td>
                        <td width='5'>:</td>
                        <td><b><input type='hidden' name='sms' value='$data_mhs[semester]'> $kd_jenjang_studi - $data_mhs[NMPSTMSPST] <input type='hidden' name='kelas' value='$_GET[kelas]'><input type='hidden' name='prodi' value='$_GET[prodi]'><input type='hidden' name='makul' value='$_GET[makul]'></b></td>
                    </tr>
                    <tr valign='top'>
                        <td>Kelas/Semester</td>
                        <td>:</td>
                        <td><b>$data_mhs[nama_kelas] - $data_mhs[semester] <input type='hidden' name='kelas_id' value='$data_mhs[kelas_id]'></b></td>
                    </tr>
                    <tr valign='top'>
                        <td>Mata Kuliah</td>
                        <td>:</td>
                        <td><b>$data_makul[kode_mata_kuliah] - $data_makul[nama_mata_kuliah_eng]</b></td>
                    </tr>
                    <tr valign='top'>
                        <td>Dosen</td>
                        <td>:</td>
                        <td><b>$data_mhs[NMDOSMSDOS] $data_mhs[GELARMSDOS]</b></td>
                    </tr>
                    <tr valign='top'>
                        <td>Ruang</td>
                        <td>:</td>
                        <td><b>$data_mhs[nama_ruang]</b></td>
                    </tr>
                </table>
            </div>
        </div>
            
        <table class='data display datatable' id='example'>
            <thead>
            <tr>
                <th width='30'>No</th>
                <th width='140'>NIM</th>
                <th width='250'>Nama Mahasiswa</th>
                <th width='100'>Absensi (10%)</th>
                <th width='90'>Tugas (40%)</th>
                <th width='80'>UTS (20%)</th>
                <th width='80'>UAS (30%)</th>
            </tr>
            </thead><tbody>";
            $i = 1;
        $sql_data = $db->database_prepare("SELECT * FROM as_jadwal_kuliah A INNER JOIN as_krs B ON B.jadwal_id=A.jadwal_id
                                                    INNER JOIN as_kelas C ON C.kelas_id=A.kelas_id
                                                    INNER JOIN as_angkatan D ON C.angkatan_id=C.angkatan_id
                                                    INNER JOIN as_mahasiswa E ON E.id_mhs=B.id_mhs
                                                    WHERE   A.makul_id=? AND
                                                            A.kelas_id=? AND
                                                            C.angkatan_id = ? AND
                                                            A.semester = ? GROUP BY B.id_mhs")->execute($_GET['makul'],$kelas[0],$kelas[2],$kelas[1]);
        while ($data_data = $db->database_fetch_array($sql_data)){
            $nums = $db->database_num_rows($db->database_prepare("SELECT * FROM as_nilai_semester_mhs WHERE id_mhs = ? AND makul_id = ?")->execute($data_data["id_mhs"],$_GET["makul"]));
            
            if ($nums == 0){
                $abs_hadir = $db->database_num_rows($db->database_prepare("SELECT * FROM as_absensi_mhs WHERE jadwal_id = ? AND id_mhs = ? AND paraf = 'H'")->execute($data_data['jadwal_id'],$data_data['id_mhs']));
                $abs_total = $db->database_num_rows($db->database_prepare("SELECT * FROM as_absensi_mhs WHERE jadwal_id = ? AND id_mhs = ?")->execute($data_data['jadwal_id'],$data_data['id_mhs']));
                $nilai_abs = ($abs_hadir / $abs_total) * 10;
                
                echo "<tr>
                        <td>$i</td>
                        <td>$data_data[NIM] <input type='hidden' name='id_mhs[]' value='$data_data[id_mhs]'></td>
                        <td>$data_data[nama_mahasiswa]</td>
                        <td><input type='text' name='absensi[]' size='5' value='$nilai_abs' DISABLED><input type='hidden' name='absensi[]' size='5' value='$nilai_abs'></td>
                        <td><input type='text' name='tugas[]' value='0' size='5'></td>
                        <td><input type='text' name='uts[]' value='0' size='5'></td>
                        <td><input type='text' name='uas[]' value='0' size='5'></td>
                    </tr>";
            }
            $i++;
        }
    echo "</tbody></table><p>&nbsp;</p><p>&nbsp;</p>";
    if ($nums == 0){
        echo "  <div>
                <button type='submit' class='btn btn-primary'>Simpan Nilai</button>
            </div>";
    }
    echo "  </div>
    </form>
    ";
    break; -->
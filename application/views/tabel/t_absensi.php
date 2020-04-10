<div class="data-table-area mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sparkline13-list shadow-reset">
                            </div>
                                <div class="sparkline13-hd">
                                    <div class="main-sparkline13-hd">
                                        <h1><?php echo $judul;?></h1>
                                    </div>
                                </div>
                                <div class="sparkline13-graph">
                                    <div class="datatable-dashv1-list custom-datatable-overright">
                                        <div id="toolbar">

                                        </div>
                                        
<!--                                             <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-2">
                                                        <label class="login2 pull-left pull-left-pro">ID_JADWAL</label>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <input type="hidden" class="form-control" id="ID_JADWAL" name="ID_JADWAL" readonly value="<?php echo $ID_JADWAL ?>">
                                                    </div>
                                                </div>
                                            </div> -->
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-2">
                                                        <label class="login2 pull-left pull-left-pro">Pengajar</label>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <input type="text" class="form-control" id="pengajar" name="pengajar" value="<?php echo $this->session->userdata('ses_id'); ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-2">
                                                        <label class="login2 pull-left pull-left-pro">Kelas</label>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <input type="text" class="form-control" id="kelas" name="kelas" value="<?php echo $kelas?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
<!--                                             <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-2">
                                                        <label class="login2 pull-left pull-left-pro">Tanggal Absensi</label>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <input type="date" class="form-control" id="TANGGAL_ABSEN" name="TANGGAL_ABSEN" value="<?php echo date('Y-m-d')?>">
                                                    </div>
                                                </div>
                                            </div> -->
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-2">
                                                        <label class="login2 pull-left pull-left-pro">Materi</label>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <input type="text" class="form-control" id="MATERI" name="materi">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-2">
                                                        <label class="login2 pull-left pull-left-pro">Keterangan Absen</label>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <input type="text" class="form-control" id="KETERANGAN_ABSEN" name="keterangan">
                                                    </div>
                                                </div>
                                            </div>

                                        <table class="table sparkle-table" id="table" data-toggle="table" data-pagination="false" data-search="false" data-cookie-id-table="saveId" data-click-to-select="false" data-toolbar="#toolbar">
                                            <thead>
                                                <tr>
                                                    <th data-field="no">No</th>
                                                    <th data-field="noinduk">NIS</th>
                                                    <th data-field="kelas">Nama Siswa</th>
                                                    <th data-field="tglAbsen">Status Absen</th>

                                                    
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
                                                            <input type="checkbox" value="<?php echo $sis->NOINDUK ?>" name="hadir[]"> Hadir
                                                        </label>
<!--                                                         <label>
                                                            <input type="checkbox" value="<?php echo $sis->NOINDUK ?>" name="alpha[]"> Alpha
                                                        </label> -->
                                                    </td>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>

                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <input type="hidden" class="form-control" id="TGL_ABSEN_DIBUAT" name="TGL_ABSEN_DIBUAT" value="<?php echo date('Y-m-d')?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            

                                        <div class="form-group-inner">
                                            <div class="login-btn-inner">
                                                <div class="row">
                                                        <div class="col-lg-9">
                                                            <div class="login-horizental cancel-wp pull-left">
                                                                <button type="reset" class="btn btn-danger btn-fill pull-left" name="Batal">Batal</button>&nbsp;
                                                                <button type="submit" class="btn btn-primary btn-fill pull-right" name="Tambah" onclick="absensi()">Simpan Data</button> 
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    
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

                  // history.go(0);
                  
                  console.log(this.responseText);
                }
                else
                {
                  alert("Connection Error, try again");
                }
                

              }
            }
      //console.log("data="+jsonData+"&peminjaman="+jsonData2);
      xhttp.open("POST", url, true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("hadir="+daftarHadir+"&nosiswa="+nosis+"&materi="+mat+"&keterangan="+ket);

}


</script>
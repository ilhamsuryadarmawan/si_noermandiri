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
                                <form action="<?php echo base_url('Jadwal')?>" enctype="multipart/form-data" method="POST">           
                                <div class="row row-card-no-pd mt--2">
                                    <div class="col-sm-6 col-md-3">
                                        <div class="card card-stats card-round">
                                            <div class="card-body ">
                                                <div class="row">
                                                    <div class="col-7 col-stats">
                                                        <div class="numbers">
                                                            <p class="card-category">Semester</p>
                                                            <h4 class="card-title"><?php echo $jadwal->SEMESTER?></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="card card-stats card-round">
                                            <div class="card-body ">
                                                <div class="row">
                                                    <div class="col-7 col-stats">
                                                        <div class="numbers">
                                                            <p class="card-category">Tentor</p>
                                                            <h4 class="card-title"><?php echo $this->session->userdata('ses_nama'); ?></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="card card-stats card-round">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-7 col-stats">
                                                        <div class="numbers">
                                                            <p class="card-category">Kelas</p>
                                                            <h4 class="card-title"><?php echo $jadwal->NAMA_KELAS?></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="card card-stats card-round">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-7 col-stats">
                                                        <div class="numbers">
                                                            <p class="card-category">Mata Pelajaran</p>
                                                            <h4 class="card-title"><?php echo $jadwal->NAMA_MAPEL?></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                 
                                        <input type="hidden" class="form-control" id="id_jadwal" name="id_jadwal" value="<?php echo $jadwal->ID_JADWAL?>" readonly>
                                        <br>
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
                                                            <input type="checkbox" class="check" value="<?php echo $sis->NOINDUK ?>" name="hadir[]" checked> Hadir
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
    var id = document.getElementById('id_jadwal').value;
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

    console.log(id);
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
                
              } alert("Data Sudah Tersimpan, Success");

            }
      //console.log("data="+jsonData+"&peminjaman="+jsonData2);
      xhttp.open("POST", url, true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("&id_jadwal="+id+"&hadir="+daftarHadir+"&nosiswa="+nosis);
      
}

// function selectall() {
//   let checkboxs = document.getElementsByName(hadir[]);
//   for(let i = 1; i < checkboxs.length ; i++) {
//     checkboxs[i].checked = !checkboxs[i].checked;
//   }
// }
</script>
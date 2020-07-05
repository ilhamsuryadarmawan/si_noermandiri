<!DOCTYPE html>
<html><head>
	<title>Laporan Absensi</title>
    <style type="text/css">
    #outtable{
      padding: 20px;
      border:1px solid #e3e3e3;
      width:650px;
      border-radius: 5px;
      margin-top: 15px
    }
 
    .short{
      width: 50px;
    }
 
    .normal{
      width: 150px;
    }
 
    table{
      border-collapse: collapse;
      font-family: arial;
      font-size: 10;
      font-color:#00000;
    }
 
    thead th{
      text-align: left;
      padding: 10px;
    }
 
    tbody td{
      border-top: 1px solid #e3e3e3;
      padding: 10px;
    }
 
    tbody tr:nth-child(even){
      background: #F6F5FA;
    }
 
    tbody tr:hover{
      background: #00000
    }
  </style>
</head><body>
    <div class="row">
        <div class="col-md-12">
            <center><img src="<?php echo $_SERVER['DOCUMENT_ROOT']."./LBBNoermandiri/assets/img/header_invoice1.png";?>" width="650" height="125"></center>
        </div>
    </div><hr>
    <div class="row">
        <div class="col-md-12">
            <center><h3 style="text-decoration: underline">Laporan Absensi</h3></center>
        </div>
    </div>
    <table>
      <thead>
          <th>Periode</th><th>: 
            <?php if(substr($periode, 5,2)=='01'):?>
              <?php echo "Januari ". substr($periode,0,4)?>
            <?php elseif(substr($periode, 5,2)=='02'):?>
              <?php echo "Februari ". substr($periode,0,4)?>
            <?php elseif(substr($periode, 5,2)=='03'):?>
              <?php echo "Maret ". substr($periode,0,4)?>
            <?php elseif(substr($periode, 5,2)=='04'):?>
              <?php echo "April ". substr($periode,0,4)?>
            <?php elseif(substr($periode, 5,2)=='05'):?>
              <?php echo "Mei ". substr($periode,0,4)?>
            <?php elseif(substr($periode, 5,2)=='06'):?>
              <?php echo "Juni ". substr($periode,0,4)?>
            <?php elseif(substr($periode, 5,2)=='07'):?>
              <?php echo "Juli ". substr($periode,0,4)?>
            <?php elseif(substr($periode, 5,2)=='08'):?>
              <?php echo "Agustus ". substr($periode,0,4)?>
            <?php elseif(substr($periode, 5,2)=='09'):?>
              <?php echo "September ". substr($periode,0,4)?>
            <?php elseif(substr($periode, 5,2)=='10'):?>
              <?php echo "Oktober ". substr($periode,0,4)?>
            <?php elseif(substr($periode, 5,2)=='11'):?>
              <?php echo "November ". substr($periode,0,4)?>
            <?php else:?>
              <?php echo "Desember ". substr($periode,0,4)?>
            <?php endif;?>
          </th>
      </thead>
    </table>
    <div id="outtable">
    	<table>
            <thead>
                <tr>
                    <th width="10px">#</th>
                    <th width="70px">No. Induk</th>
                    <th width="120px">Nama Siswa</th>
                    <th width="80px">Kelas</th>
                    <th width="50px">Hadir</th>
                    <th width="50px">Alpha</th>
                    <th width="50px">Jumlah Pertemuan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $nourut = 1;
                    foreach ($absen as $a) {
                    ?>

                    <tr>
                        <td><?php echo $nourut++?></td>
                        <td><?php echo $a->nis?></td>
                        <td><?php echo $a->NAMA_SISWA?></td>
                        <td><?php echo $a->kls?></td>
                        <td><?php echo $a->hadir?></td>
                        <td><?php echo $a->alpha?></td>
                        <td><?php echo $a->pertemuan?></td>
                    </tr>
                    <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</body></html>
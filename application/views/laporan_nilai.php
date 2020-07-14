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
            <center><img src="<?php echo $_SERVER['DOCUMENT_ROOT']."./si_noermandiri/assets/img/header_invoice1.png";?>" width="650" height="125"></center>
        </div>
    </div><hr>
    <div class="row">
        <div class="col-md-12">
            <center><h3 style="text-decoration: underline">Laporan Nilai Siswa</h3></center>
        </div>
    </div>
    <table>
      <thead>
          <th>Kelas </th><th>: <?php echo $kelas?></th>
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
                    <th width="50px">Try Out</th>
                    <th width="50px">Tugas 1</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $nourut = 1;
                    foreach ($nilai as $nilai) {
                    ?>
                    <tr>
                        <td><?php echo $nourut++?></td>
                        <td><?php echo $nilai->nis?></td>
                        <td><?php echo $nilai->NAMA_SISWA?></td>
                        <td><?php echo $nilai->NAMA_KELAS?></td>
                        <?php if($nilai->tryout == null):?>
                            <td>-</td>
                        <?php else:?>
                            <td><?php echo $nilai->tryout?></td>
                        <?php endif;?>
                        <?php if($nilai->tugas1 == null):?>
                            <td>-</td>
                        <?php else:?>
                            <td><?php echo $nilai->tugas1?></td>
                        <?php endif;?>
                    </tr>
                    <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</body></html>
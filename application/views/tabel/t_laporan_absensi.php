<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Laporan Absensi</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-2">
                                    <!-- <select class="form-control" id="kelas" name="kelas">
                                        <option value="">- Kelas -</option>
                                        <?php foreach($kelas as $k):?>
                                            <option value="<?php echo $k->ID_KELAS?>"><?php echo $k->NAMA_KELAS?></option>
                                        <?php endforeach;?>
                                    </select> -->
                                </div>
                                <div class="col-md-2">
                                    <select class="form-control" id="bulan" name="bulan">
                                        <option value="">- Bulan -</option>
                                        <option value="01">Januari</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maret</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08">Agustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select class="form-control" id="tahun" name="tahun">
                                        <option value="">- Tahun -</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                    </select>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-primary" onclick="get_laporan_absensi()">Cari</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-8">
                                    <form action="<?php echo base_url('Laporan/cetak_laporan_absensi')?>" method="POST" target="_blank">    
                                        <input type="hidden" name="periode" id="periode">
                                        <button type="submit" class="btn btn-primary btn-round" id="btncetak" disabled><i class="fa fa-print"> Cetak</i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                            <table id="" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>NIS</th>
                                        <th>Nama Siswa</th>
                                        <th>Kelas</th>
                                        <th>Hadir</th>
                                        <th>Alpha</th>
                                        <th>Jumlah Pertemuan</th>
                                    </tr>
                                </thead>
                                <tbody id="show_data">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
    function get_laporan_absensi() {
        // $("#show_data tr").detach();
        var bulan = document.getElementById('bulan').value;
        var tahun = document.getElementById('tahun').value;
        var periode = tahun+'-'+bulan;
        var btn = document.getElementById('btncetak');
        console.log(periode);
        $('#periode').val(periode);
        $.ajax({
            url : "<?php echo base_url('C_absensi/get_laporan')?>",
            method: "POST",
            dataType :"json",
            data: {
            periode : periode
            },
            success : function(data){                console.log(data);
                var html = '';
                    if (data.length > 0) {
                        var i;
                        var nourut = 0;
                        for(i=0; i<data.length; i++){
                            nourut += 1;
                            html += '<tr>'+
                                    '<td>'+nourut+'</td>'+
                                    '<td>'+data[i].nis+'</td>'+
                                    '<td>'+data[i].NAMA_SISWA+'</td>'+
                                    '<td>'+data[i].kls+'</td>'+
                                    '<td>'+data[i].hadir+'</td>'+
                                    '<td>'+data[i].alpha+'</td>'+
                                    '<td>'+data[i].pertemuan+'</td>'+
                                    '</tr>';
                        }
                        btn.disabled = false;
                    }else{
                        html += '<tr>'+
                                    '<td colspan = "6">'+'<center>'+"Data tidak ditemukan"+'</center>'+'</td>'+
                                '</tr>';
                        btn.disabled = true;
                    }
                    $('#show_data').html(html);
            }
        });
    }
</script>
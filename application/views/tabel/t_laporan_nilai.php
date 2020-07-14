<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold"><?php echo $judul?></h2>
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
                                <div class="col-md-8"></div>
                                <div class="col-md-2">
                                    <select class="form-control" id="kelas" name="kelas">
                                        <option value="">- Kelas -</option>
                                        <?php foreach($kelas as $k):?>
                                            <option value="<?php echo $k->ID_KELAS?>"><?php echo $k->NAMA_KELAS?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-primary" onclick="get_laporan_nilai()">Cari</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-8">
                                    <form action="<?php echo base_url('Laporan/cetak_laporan_nilai')?>" method="POST" target="_blank">
                                        <input type="hidden" name="kls" id="kls">
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
                                        <th>Nilai TryOut</th>
                                        <th>Nilai Tugas 1</th>                                     
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
    function get_laporan_nilai() {
        var kls = document.getElementById('kelas').value;
        var btn = document.getElementById('btncetak');
        $('#kls').val(kls);
        $.ajax({
            url : "<?php echo base_url('C_penilaian/get_laporan')?>",
            method: "POST",
            dataType :"json",
            data: {
            kls : kls
            },
            success : function(data){
                var html = '';
                    if (data.length > 0) {
                        var i;
                        var nourut = 0;
                        var nilaitryout;
                        var nilai_tugas;
                        for(i=0; i<data.length; i++){
                            if (data[i].tryout == null) {
                                nilaitryout = '-';
                            }else{
                                nilaitryout = data[i].tryout
                            }

                            if (data[i].tugas1 == null) {
                                nilai_tugas = '-';
                            }else{
                                nilai_tugas = data[i].tugas1
                            }

                            nourut += 1;
                            html += '<tr>'+
                                    '<td>'+nourut+'</td>'+
                                    '<td>'+data[i].nis+'</td>'+
                                    '<td>'+data[i].NAMA_SISWA+'</td>'+
                                    '<td>'+data[i].NAMA_KELAS+'</td>'+
                                    '<td>'+nilaitryout+'</td>'+
                                    '<td>'+nilai_tugas+'</td>'+
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
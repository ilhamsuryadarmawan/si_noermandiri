            <div class="basic-form-area mg-b-15">
                <div class="container-fluid">    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sparkline12-list shadow-reset mg-t-30">
                                <div class="sparkline12-hd">
                                    <div class="main-sparkline12-hd">
                                        <h1><?php echo $judul;?></h1>
                                    </div>
                                </div>
                                <div class="sparkline12-graph">
                                    <div class="basic-login-form-ad">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="all-form-element-inner">
                                                    <form method="post" action="<?php echo base_url('C_absensi/tampilSiswa')?>" enctype="multipart/form-data">
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Kelas</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <div class="form-select-list">
                                                                        <select class="form-control custom-select-value" name="kelas" id="kelas" required>
                                                                            <option value="">- Pilih Kelas -</option>
                                                                            <?php
                                                                            foreach ($kelombel as $kelas) { ?>
                                                                                <option value="<?php echo $kelas->ID_KELAS;?>"><?php echo $kelas->NAMA_KELAS;?></option>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

<!--                                                         
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Materi</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" class="form-control" id="MATERI" name="MATERI">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Tanggal Hari Ini</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" class="form-control" id="TGL_ABSEN_DIBUAT" name="TGL_ABSEN_DIBUAT" value="<?php echo date('Y-m-d')?>" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Keterangan Absen</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" class="form-control" id="KETERANGAN_ABSEN" name="KETERANGAN_ABSEN">
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <div class="form-group-inner">
                                                            <div class="login-btn-inner">
                                                                <div class="row">
                                                                    <div class="col-lg-3"></div>
                                                                    <div class="col-lg-9">
                                                                        <div class="login-horizental cancel-wp pull-left">
                                                                            <button type="reset" class="btn btn-danger btn-fill pull-left" name="Batal">Batal</button>&nbsp;
                                                                            <button type="submit" class="btn btn-primary btn-fill pull-right" name="Tambah">Buka Data</button> 
                                                                        </div>
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
                    </div>
                </div>
            </div>
<? } ?>
            <!-- <script type="text/javascript" src=""></script>
            <script type="text/javascript">
                $(document).ready(function(){
                    $('#kode').on('input',function(){

                        var kode = $(this).val()
                        $.ajax({
                            type     : "POST",
                            url      : ",
                            dataType : "JSON",
                            data     : {kode: kode_mapel},
                            cache    : false,

                            success  : function(data){
                                $.each(data,function(data){
                                    $('[name="id"]')
                                });
                            }
                        });
                    });
                });
            </script> -->
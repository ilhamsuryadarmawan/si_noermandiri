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
                                                    <form method="post" enctype="multipart/form-data">
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
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Mata Pelajaran</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <div class="form-select-list">
                                                                        <select class="form-control custom-select-value" name="mapel" id="mapel" required>
                                                                            <option value="">- Pilih Mata Pelajaran -</option>
                                                                            <?php
                                                                            foreach ($matapel as $mapel) { ?>
                                                                                <option value="<?php echo $mapel->ID_MAPEL;?>"><?php echo $mapel->NAMA_MAPEL;?></option>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Jenis Ujian</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <div class="form-select-list">
                                                                        <select class="form-control custom-select-value" name="mapel" id="mapel" required>
                                                                            <option value="">- Pilih Jenis Ujian -</option>
                                                                            <?php
                                                                            foreach ($jenis as $ju) { ?>
                                                                                <option value="<?php echo $ju->NAMA_JENIS_UJIAN;?>"><?php echo $ju->NAMA_JENIS_UJIAN;?></option>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
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
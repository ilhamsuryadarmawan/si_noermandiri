<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Input Data Penilaian</h2>
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
                                    <form action="<?php echo base_url('C_penilaian/tampilSiswa')?>" enctype="multipart/form-data" method="POST">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-1">
                                                </div>
                                                <div class="col-lg-3">
                                                    <label>Kelas</label>
                                                </div>
                                                <div class="col-lg-6">
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
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-1">
                                                </div>
                                                <div class="col-lg-3">
                                                    <label>Mata Pelajaran</label>
                                                </div>
                                                <div class="col-lg-6">
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
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-4"></div>
                                                <div class="col-lg-6">
                                                    <div class="login-horizental cancel-wp pull-left">
                                                        <button type="reset" class="btn btn-danger btn-sm" name="Batal">Batal</button>&nbsp;
                                                        <button type="submit" class="btn btn-primary btn-sm" name="Tambah">Buka</button> 
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
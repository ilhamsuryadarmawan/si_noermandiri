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
                                                    <form action="<?php echo base_url('Jadwal/aksiTambah')?>" method="post">
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Kelas</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <div class="form-select-list">
                                                                        <select class="form-control custom-select-value" name="kelas" id="kelas" required>
                                                                            <option value="">-Pilih Kelas-</option>
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
                                                                    <label class="login2 pull-right pull-right-pro">Tanggal</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="date" class="form-control" name="tanggal" id="tanggal" required/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Jam</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <div class="form-select-list">
                                                                        <select class="form-control custom-select-value" name="waktu" id="waktu" onchange="getTentor()">
                                                                            <option>-Pilih Jam-</option>
                                                                            <?php
                                                                            foreach($waktu as $jam) { ?>
                                                                            <option value="<?php echo $jam->ID_WAKTU;?>"><?php echo $jam->WAKTU; ?></option>
                                                                            <?php
                                                                            } ?>
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
                                                                            <option value="">-Pilih Mata Pelajaran-</option>
                                                                            <?php
                                                                            foreach ($mata_ajar as $mapel) { ?>
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
                                                                    <label class="login2 pull-right pull-right-pro">Tentor</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <div class="form-select-list">
                                                                        <select class="form-control custom-select-value" name="tentor" id="tentor" required>
                                                                            <option value="">-Pilih Tentor-</option>
                                                                            <?php
                                                                            foreach($pengajar as $tentor) { ?>
                                                                            <option value="<?php echo $tentor->ID_PEGAWAI;?>"><?php echo $tentor->NAMA_PEGAWAI;?> - <?php echo $tentor->NAMA_MAPEL;?></option>
                                                                            <?php
                                                                            } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Ruangan</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <div class="form-select-list">
                                                                        <select class="form-control custom-select-value" name="ruangan" id="ruangan" required>
                                                                            <option value="">-Pilih Ruangan-</option>
                                                                            <?php
                                                                            foreach($ruangan as $room) { ?>
                                                                            <option value="<?php echo $room->ID_RUANGAN;?>"><?php echo $room->NAMA_RUANGAN; ?></option>
                                                                            <?php
                                                                            } ?>
                                                                        </select>
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
                                                                            <button type="submit" class="btn btn-primary btn-fill pull-right">Simpan</button> 
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

<script type="text/javascript">
    // window.onload=function(){
    //     var tgl = document.getElementById('tanggal').value;
    //     var waktu = document.getElementById('waktu').value;
    //     getTentor(tgl,waktu);
    // }

    function getTentor(){
        var tgl = document.getElementById('tanggal').value;
        var time = document.getElementById('waktu').value;
        $.ajax({
            url : "<?php echo base_url('Jadwal/cekTentor')?>",
            contentType: "application/json; charset=utf-8",
            dataType :"json",
            data: {
            time : time,
            tgl : tgl,
            },
            success : function(data){
                alert(data.d);
            },
            error: function(data){
                console.log(JSON.stringify(error));
            }
        });
    }
</script>


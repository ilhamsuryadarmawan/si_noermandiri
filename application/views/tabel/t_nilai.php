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
                                    <form action="<?php echo base_url('C_penilaian/tambahNilai')?>" enctype="multipart/form-data" method="POST">
                                <div class="row row-card-no-pd mt--2">
                                    <div class="col-sm-6 col-md-3">
                                        <div class="card card-stats card-round">
                                            <div class="card-body ">
                                                <div class="row">
                                                    <div class="col-7 col-stats">
                                                        <div class="numbers">
                                                            <p class="card-category">Nama Tentor</p>
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
                                                            <h4 class="card-title"><input type="text" class="form-control" id="kelas" name="kelas" value="<?php echo str_replace("%20"," ",$id) ?>" readonly></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row row-card-no-pd mt--2">
                                    <div class="col-sm-6 col-md-3">
                                        <div class="card card-stats card-round">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-7 col-stats">
                                                        <div class="numbers">
                                                            <p class="card-category">Mata Pelajaran</p>
                                                            <h4 class="card-title">                                            
                                                                <select class="form-control input-border-bottom" name="mapel" id="mapel" required>
                                                                    <option value="">- Pilih Mapel -</option>
                                                                    <?php
                                                                    foreach ($matapel as $mapel) { ?>
                                                                        <option value="<?php echo $mapel->ID_MAPEL;?>"><?php echo $mapel->NAMA_MAPEL;?></option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </h4>
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
                                                            <p class="card-category">Jenis Ujian</p>
                                                            <h4 class="card-title">                                            
                                                                <select class="form-control input-border-bottom" name="ujian" id="ujian" required>
                                                                    <option value="">- Pilih Jenis Ujian -</option>
                                                                    <?php
                                                                    foreach ($jenis as $ujian) { ?>
                                                                        <option value="<?php echo $ujian->ID_JENIS_UJIAN;?>"><?php echo $ujian->NAMA_JENIS_UJIAN;?></option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </h4>
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
                                                            <p class="card-category">Semester</p>
                                                            <h4 class="card-title">                                            
                                                                <select class="form-control input-border-bottom" name="semester" id="semester" required>
                                                                    <option value="">- Pilih Semester -</option>
                                                                    <?php
                                                                    foreach ($semester as $sms) { ?>
                                                                        <option value="<?php echo $sms->ID_SEMESTER;?>"><?php echo $sms->SEMESTER;?></option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </h4>
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
                                                            <p class="card-category">Topik Pembahasan</p>
                                                            <h4 class="card-title"><input type="text" class="form-control" id="topik" name="topik" placeholder="Topik/Materi"></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                        <br>
                                        <table class="table sparkle-table" id="table" data-toggle="table" data-pagination="false" data-search="false" data-cookie-id-table="saveId" data-click-to-select="false" data-toolbar="#toolbar">
                                            <thead>
                                                <tr>
                                                    <th data-field="no">No</th>
                                                    <th data-field="noinduk">NIS</th>
                                                    <th data-field="nama">Nama Siswa</th>
                                                    <th data-field="status">Nilai</th>                                                
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
                                                            <input type="text" class="form-control" name="nilai[]">
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
                                                        <button type="submit" class="btn btn-primary btn-sm" name="submit">Simpan Absensi</button>
<!--                                                         <?php if($j->STATUS_JADWAL == 1){?>
                                                            <button type="submit" class="btn btn-primary btn-sm" name="submit" disabled>Simpan Absensi</button>
                                                        <?php } else {?>
                                                            <a href="<?php echo base_url('C_absensi/inputAbsen/'.$j->ID_JADWAL)?>"><button type="submit" class="btn btn-primary btn-sm" name="submit">Simpan Absensi</button></a>
                                                        <?php }?>    -->                                                      
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
 


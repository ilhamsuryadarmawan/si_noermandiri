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
                                                    <form action="<?php echo base_url('C_kelas/simpan')?>" method="post">
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">ID Kelas</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" class="form-control" id="ID_KELAS" name="ID_KELAS" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Jenjang Kelas</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <div class="form-select-list">
                                                                        <select class="form-control custom-select-value" name="kelas" id="kelas" required>
                                                                            <option value="">- Pilih Jenjang Kelas -</option>
                                                                            <?php
                                                                            foreach ($jenjang as $jnj) { ?>
                                                                                <option value="<?php echo $jnj->ID_JENJANG;?>"><?php echo $jnj->NAMA_JENJANG;?></option>
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
                                                                    <label class="login2 pull-right pull-right-pro">Nama Kelas</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" class="form-control" id="NAMA_KELAS" name="NAMA_KELAS" />
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
                                                                            <button type="submit" class="btn btn-primary btn-fill pull-right" name="Tambah">Simpan</button> 
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
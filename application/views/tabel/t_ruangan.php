<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash')?>">
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
                                <div class="col-md-12">
                                    <div class="col-lg-12">
                                        <?php if (validation_errors()) : ?>
                                            <div class="alert alert-danger">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <?php echo validation_errors(); ?>
                                            </div>
                                        <?php endif; ?>
                                        <a href="#"><button type="button" class="btn btn-primary btn-box" >Tambah Data Ruangan Kelas</button></a>
                                        <form action="<?php echo base_url('Ruangan/aksiTambah')?>" method="POST">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <label>Nama Ruangan</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="nama" name="nama"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-3"></div>
                                                <div class="col-lg-4">
                                                    <div class="login-horizental cancel-wp pull-left">
                                                        <button type="reset" class="btn btn-danger btn-sm" name="Batal">Batal</button>&nbsp;
                                                        <button type="submit" class="btn btn-primary btn-sm" name="Tambah">Simpan</button> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                            <table id="multi-filter-select" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Ruangan</th>
                                        <th>Nama Ruangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $nourut = 1;
                                    foreach ($ruangan as $room) {
                                    ?>
                                    <tr>
                                        <td><?php echo $nourut++?></td>
                                        <td><?php echo $room->ID_RUANGAN; ?></td>
                                        <td><?php echo $room->NAMA_RUANGAN; ?></td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
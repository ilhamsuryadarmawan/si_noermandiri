<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash')?>">
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Noermandiri</h4>
                    <ul class="breadcrumbs">
                        <li class="nav-home">
                            <a href="#">
                                <i class="flaticon-home"></i>
                            </a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Data Master</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Sesi</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tambah Sesi</h4>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-lg-12">
                                        <?php if (validation_errors()) : ?>
                                            <div class="alert alert-danger">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <?php echo validation_errors(); ?>
                                            </div>
                                        <?php endif; ?>
                                        <form action="<?php echo base_url('C_sesi/tambah')?>" method="POST">
                                            <div class="form-group form-floating-label">
                                                <input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" id="nama" name="nama" required>
                                                <label for="inputFloatingLabel" class="placeholder">Nama Sesi</label>
                                            </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <label>Jam Mulai</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="time" class="form-control" id="jam_mulai" name="jam_mulai"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <label>Jam Selesai</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="time" class="form-control" id="jam_selesai" name="jam_selesai"/>
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
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Sesi</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="multi-filter-select" class="display table table-striped table-hover" >
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Sesi</th>
                                                <th><center>Status</center></th>
                                                <th>Jam</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $nourut = 1;
                                            foreach ($sesi as $ses) {
                                                $id = $ses->ID_SESI;
                                            ?>
                                            <tr>
                                                <td><?php echo $nourut++;?></td>
                                                <td><?php echo $ses->NAMA_SESI; ?></td>
                                                <td><?php echo date("H:i",strtotime($ses->JAM_MULAI))?> - <?php echo date("H:i",strtotime($ses->JAM_SELESAI))?></td>
                                                <td><?php if($ses->STATUS_SESI == 1){?>
                                                    <br><center><p style="color: green"><i class="fa fa-check-circle fa-2x"> Aktif</i></p></center>
                                                    <?php } else {?>
                                                    <br><center><p style="color: red"><i class="fa fa-times-circle fa-2x"> Nonaktif</i></p></center>
                                                    <?php }?>
                                                </td>
                                                <td><button class="btn btn-primary btn-sm" id="btnEdit" data-toggle="modal" data-target="#modal_edit<?php echo $id?>"><i class="fa fa-edit"></i></button>
                                                <!--     <a href="<?php echo base_url('Sesi/hapus/'.$id)?>" class="tombol_hapus">&nbsp<button class="btn btn-warning btn-sm"><i class="fa fa-trash"></i></button>
                                                    </a> -->
                                                </td>
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
        </div>

<!-- MODAL EDIT -->

<?php
    foreach($sesi as $s):
        $id = $s->ID_SESI;
        $nama = $s->NAMA_SESI;
        $jam_mulai = $s->JAM_MULAI;
        $jam_selesai = $s->JAM_SELESAI;
        $status = $s->STATUS_SESI;
?>


<div class="modal fade" id="modal_edit<?php echo $id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLongTitle" align="center">Form Edit Sesi</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('updatesesi')?>" method="POST">
                    <div class="form-group form-inline">
                        <label for="inlineinput" class="col-md-3 col-form-label">ID Sesi</label>
                        <div class="col-md-9 p-0">
                            <input type="text" class="form-control input-full" placeholder="Enter Input" name="id_edit" id="id_edit" value="<?php echo $id?>" readonly>
                        </div>
                    </div>
                    <div class="form-group form-inline">
                        <label for="inlineinput" class="col-md-3 col-form-label">Nama Sesi</label>
                        <div class="col-md-9 p-0">
                            <input type="text" class="form-control input-full" placeholder="Enter Input" name="nama_edit" id="nama_edit" value="<?php echo $nama?>" required>
                        </div>
                    </div>
                    <div class="form-group form-inline">
                        <label for="inlineinput" class="col-md-3 col-form-label">Jam Mulai</label>
                        <div class="col-md-9 p-0">
                            <input type="time" class="form-control" name="jam_mulai_edit" id="jam_mulai_edit" value="<?php echo $jam_mulai?>" required/>
                        </div>
                    </div>
                    <div class="form-group form-inline">
                        <label for="inlineinput" class="col-md-3 col-form-label">Jam Selesai</label>
                        <div class="col-md-9 p-0">
                            <input type="time" class="form-control" name="jam_selesai_edit" id="jam_selesai_edit" value="<?php echo $jam_selesai?>" required/>
                        </div>
                    </div>
                    <div class="form-group form-inline">
                        <label for="inlineinput" class="col-md-3 col-form-label">Status Jabatan</label>
                        <div class="col-md-9 p-0">
                                <select class="form-control" name="status_edit" id="status_edit" value="<?php echo $status?>">
                                    <?php if($status == 1){?>
                                        <option value="0">Nonaktif</option>
                                        <option value="1" selected>Aktif</option>
                                    <?php }else{ ?>
                                        <option value="0" selected>Nonaktif</option>
                                        <option value="1" >Aktif</option>
                                    <?php } ?>
                                </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-8">
                                <div class="login-horizental cancel-wp pull-left">
                                    <button type="reset" class="btn btn-danger btn-sm" class="close" data-dismiss="modal" aria-label="Close" name="Batal">Batal</button>&nbsp;
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
<?php endforeach;?>
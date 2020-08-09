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
                            <a href="#">Ruang Kelas</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tambah Jenjang Kelas</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-lg-12">
                                            <?php if (validation_errors()) : ?>
                                                <div class="alert alert-danger">
                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                    <?php echo validation_errors(); ?>
                                                </div>
                                            <?php endif; ?>
                                            <form action="<?php echo base_url('C_jenjang_kelas/aksiTambah')?>" method="POST">
                                            <br>
                                                <div class="form-group form-floating-label">
                                                    <input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" id="nama" name="nama" required>
                                                    <label for="inputFloatingLabel" class="placeholder">Nama Jenjang Kelas</label>
                                                </div>
                                            <br>
                                                <div class="form-group form-floating-label">
                                                    <input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" id="biaya" name="biaya" required>
                                                    <label for="inputFloatingLabel" class="placeholder">Biaya Per Semester</label>
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
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Jenjang Kelas</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="multi-filter-select" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Jenjang Kelas</th>
                                                <th>Biaya</th>
                                                <th><center>Status</center></th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $nourut = 1;
                                            foreach ($jenjang as $jk) {
                                                $id = $jk->ID_JENJANG;
                                            ?>
                                            <tr>
                                                <td><?php echo $nourut++?></td>
                                                <td><?php echo $jk->NAMA_JENJANG; ?></td>
                                                <td><?php echo $jk->BIAYA; ?></td>
                                                <td><?php if($jk->STATUS_JENJANG == 1){?>
                                                    <br><center><p style="color: green"><i class="fa fa-check-circle fa-2x"> Aktif</i></p></center>
                                                    <?php } else {?>
                                                    <br><center><p style="color: red"><i class="fa fa-times-circle fa-2x"> Nonaktif</i></p></center>
                                                    <?php }?>
                                                </td>
                                                <td><button class="btn btn-primary btn-sm" id="btnEdit" data-toggle="modal" data-target="#modal_edit<?php echo $id?>"><i class="fa fa-edit"></i></button>
                                                 <!--    <a href="<?php echo base_url('C_jenjang_kelas/hapus/'.$id)?>" class="tombol_hapus">&nbsp<button class="btn btn-warning btn-sm"><i class="fa fa-trash"></i></button></a> -->
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


<?php
    foreach($jenjang as $jnj):
    $id = $jnj->ID_JENJANG;
    $nama = $jnj->NAMA_JENJANG;
    $biaya = $jnj->BIAYA;
    $status = $jnj->STATUS_JENJANG;
?>

<div class="modal fade" id="modal_edit<?php echo $id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLongTitle" align="center">Form Edit Data Jenjang Kelas</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('updatejenjang')?>" method="POST">
                    <div class="form-group form-inline">
                        <label for="inlineinput" class="col-md-4 col-form-label">ID Jenjang Kelas</label>
                        <div class="col-md-8 p-0">
                            <input type="text" class="form-control input-full" placeholder="Enter Input" name="id_edit" id="id_edit" value="<?php echo $id?>" readonly>
                        </div>
                    </div>
                    <div class="form-group form-inline">
                        <label for="inlineinput" class="col-md-4 col-form-label">Nama Jenjang Kelas</label>
                        <div class="col-md-8 p-0">
                            <input type="text" class="form-control input-full" placeholder="Enter Input" name="nama_edit" id="nama_edit" value="<?php echo $nama?>" required>
                        </div>
                    </div>
                    <div class="form-group form-inline">
                        <label for="inlineinput" class="col-md-4 col-form-label">Biaya</label>
                        <div class="col-md-8 p-0">
                            <input type="text" class="form-control input-full" placeholder="Enter Input" name="biaya_edit" id="biaya_edit" value="<?php echo $biaya?>" required>
                        </div>
                    </div>
                    <div class="form-group form-inline">
                        <label for="inlineinput" class="col-md-4 col-form-label">Status Jenjang Kelas</label>
                        <div class="col-md-8 p-0">
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

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
                            <a href="#">Skala Nilai</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tambah Skala Nilai</h4>
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
                                        <form action="<?php echo base_url('tambahskala')?>" method="POST">
                                        <br>
                                            <div class="form-group form-floating-label">
                                                <input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" id="batas_atas" name="batas_atas" required>
                                                <label for="inputFloatingLabel" class="placeholder">Batas Atas</label>
                                            </div>
                                            <div class="form-group form-floating-label">
                                                <input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" id="batas_bawah" name="batas_bawah" required>
                                                <label for="inputFloatingLabel" class="placeholder">Batas Bawah</label>
                                            </div>
                                            <div class="form-group form-floating-label">
                                                <input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" id="grade" name="grade" required>
                                                <label for="inputFloatingLabel" class="placeholder">Grade</label>
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
                                                <th>ID Skala</th>
                                                <th>Nilai</th>
                                                <th>Grade</th>
                                                <th><center>Status</center></th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $nourut = 1;
                                            foreach ($skala as $sk) {
                                                $id = $sk->ID_SKALA;
                                            ?>
                                            <tr>
                                                <td><?php echo $nourut++;?></td>
                                                <td><?php echo $sk->ID_SKALA; ?></td>
                                                <td><?php echo ($sk->BATAS_BAWAH);?> - <?php echo ($sk->BATAS_ATAS);?></td>
                                                <td><?php echo $sk->GRADE; ?></td>
                                                <td><?php if($sk->STATUS_SKALA == 1){?>
                                                    <br><center><p style="color: green"><i class="fa fa-check-circle fa-2x"> Aktif</i></p></center>
                                                    <?php } else {?>
                                                    <br><center><p style="color: red"><i class="fa fa-times-circle fa-2x"> Nonaktif</i></p></center>
                                                    <?php }?>
                                                </td>
                                                <td><button class="btn btn-primary btn-sm" id="btnEdit" data-toggle="modal" data-target="#modal_edit<?php echo $id?>"><i class="fa fa-edit"></i></button>
                                                <!--     <a href="<?php echo base_url('c_skala/hapus/'.$id)?>" class="tombol_hapus">&nbsp<button class="btn btn-warning btn-sm"><i class="fa fa-trash"></i></button></a> -->
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
    foreach($skala as $s):
        $id = $s->ID_SKALA;
        $bb = $s->BATAS_BAWAH;
        $ba = $s->BATAS_ATAS;
        $grade = $s->GRADE;
?>
<div class="modal fade" id="modal_edit<?php echo $id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle" align="center">Form Edit Skala Nilai</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <form action="<?php echo base_url('c_skala/update')?>" method="POST">
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-4">
                        <label>ID skala</label>
                    </div>
                    <div class="col-lg-7">
                        <input type="text" class="form-control" name="id_edit" id="id_edit" value="<?php echo $id?>" readonly/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-4">
                        <label>batas bawah</label>
                    </div>
                    <div class="col-lg-7">
                        <input type="text" class="form-control" name="jam_mulai_edit" id="jam_mulai_edit" value="<?php echo $bb?>" required/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-4">
                        <label>batas atas</label>
                    </div>
                    <div class="col-lg-7">
                        <input type="text" class="form-control" name="jam_selesai_edit" id="jam_selesai_edit" value="<?php echo $ba?>" required/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-4">
                        <label>grade</label>
                    </div>
                    <div class="col-lg-7">
                        <input type="text" class="form-control" name="jam_selesai_edit" id="jam_selesai_edit" value="<?php echo $grade?>" required/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-8">
                        <button type="reset" class="btn btn-danger btn-sm" name="Batal">Batal</button>&nbsp;
                        <button type="submit" class="btn btn-primary btn-sm" name="Tambah">Simpan</button> 
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
    </div>
</div>
<?php endforeach;?>
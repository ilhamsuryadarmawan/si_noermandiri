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
                                <a href="#">Mata Pelajaran</a>
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Tambah Mata Pelajaran</h4>
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
                                            <form action="<?php echo base_url('tambahmapel')?>" method="POST">
                                                <br>
                                                <div class="form-group form-floating-label">
                                                    <input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" name="nama_mapel" id="nama_mapel" required>
                                                    <label for="inputFloatingLabel" class="placeholder">Nama Mata Pelajaran</label>
                                                </div>
                                            <br>
                                                <div class="form-group form-floating-label">
                                                    <select class="form-control input-border-bottom" name="pegawai" id="pegawai" required>
                                                        <option value="">&nbsp;</option>
                                                        <?php
                                                        foreach ($pegawai as $peg) { ?>
                                                            <option value="<?php echo $peg->ID_PEGAWAI;?>"><?php echo $peg->NAMA_PEGAWAI;?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                    <label for="selectFloatingLabel" class="placeholder">Tentor</label>
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
                                    <h4 class="card-title"><?php echo $judul; ?></h4>
                                </div>
                                <div class="card-body">
                                <div class="table-responsive">
                                    <table id="multi-filter-select" class="display table table-striped table-hover" >
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Mata Pelajaran</th>
                                                <th><center>Status</center></th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead> 
                                        <tbody>
                                            <?php
                                            $nourut = 1;
                                            foreach ($mapel as $mpl) {
                                                $id = $mpl->ID_MAPEL;
                                            ?>
                                            <tr>
                                                <td><?php echo $nourut++;?></td>
                                                <td><?php echo $mpl->NAMA_MAPEL; ?></td>
                                                <td><?php if($mpl->STATUS_MAPEL == 1){?>
                                                    <br><center><p style="color: green"><i class="fa fa-check-circle fa-2x"> Aktif</i></p></center>
                                                    <?php } else {?>
                                                    <br><center><p style="color: red"><i class="fa fa-times-circle fa-2x"> Nonaktif</i></p></center>
                                                    <?php }?>
                                                </td>
                                                <td><button class="btn btn-primary btn-sm" id="btnEdit" data-toggle="modal" data-target="#modal_edit<?php echo $id?>"><i class="fa fa-edit"></i></button>
                                                <!--     <a href="<?php echo base_url('C_mapel/hapus/'.$id)?>" class="tombol_hapus">&nbsp<button class="btn btn-warning btn-sm"><i class="fa fa-trash"></i></button></a> -->
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
    foreach($mapel as $mp):
    $id = $mp->ID_MAPEL;
    $peg = $mp->ID_PEGAWAI;
    $nama = $mp->NAMA_MAPEL;
    $status = $mp->STATUS_MAPEL;

?>

<div class="modal fade" id="modal_edit<?php echo $id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLongTitle" align="center">Form Edit Data Mata Pelajaran</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('updatemapel')?>" method="POST">
                    <div class="form-group form-inline">
                        <label for="inlineinput" class="col-md-4 col-form-label">ID Mata Pelajaran</label>
                        <div class="col-md-8 p-0">
                            <input type="text" class="form-control input-full" placeholder="Enter Input" name="id_edit" id="id_edit" value="<?php echo $id?>" readonly>
                        </div>
                    </div>
                    <div class="form-group form-inline">
                        <label for="inlineinput" class="col-md-4 col-form-label">ID Pegawai</label>
                        <div class="col-md-8 p-0">
                            <input type="text" class="form-control input-full" placeholder="Enter Input" name="pegawai_edit" id="pegawai_edit" value="<?php echo $peg?>" readonly>
                        </div>
                    </div>
                    <div class="form-group form-inline">
                        <label for="inlineinput" class="col-md-4 col-form-label">Nama Mata Pelajaran</label>
                        <div class="col-md-8 p-0">
                            <input type="text" class="form-control input-full" placeholder="Enter Input" name="nama_edit" id="nama_edit" value="<?php echo $nama?>" required>
                        </div>
                    </div>
                    <div class="form-group form-inline">
                        <label for="inlineinput" class="col-md-4 col-form-label">Status Mapel</label>
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
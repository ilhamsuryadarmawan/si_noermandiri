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
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label>Mata Pelajaran</label>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control" name="nama_mapel" id="nama_mapel" />
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
                                    <h4 class="card-title"><?php echo $judul; ?></h4>
                                </div>
                                <div class="card-body">
                                <div class="table-responsive">
                                    <table id="multi-filter-select" class="display table table-striped table-hover" >
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID Mapel</th>
                                                <th>Mata Pelajaran</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $nourut = 1;
                                            foreach ($mapel as $mpl) {
                                            ?>
                                            <tr>
                                                <td><?php echo $nourut++;?></td>
                                                <td><?php echo $mpl->ID_MAPEL; ?></td>
                                                <td><?php echo $mpl->NAMA_MAPEL; ?></td>
                                                <td><button type="button" class="btn btn-primary btn-sm" id="btnEdit" data-toggle="modal" data-target="#modal_edit<?php echo $mpl->ID_MAPEL;?>"><i class="fa fa-pencil-alt"></i></button></td>
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
    $nama = $mp->NAMA_MAPEL;
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
                <form action="<?php echo base_url('update_mapel')?>" method="POST">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-4">
                                <label>ID MAPEL</label>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="id_edit" id="id_edit" value="<?php echo $id?>" readonly/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-4">
                                <label>Nama Mata Pelajaran</label>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="nama_edit" id="nama_edit" value="<?php echo $nama?>" required/>
                            </div>
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
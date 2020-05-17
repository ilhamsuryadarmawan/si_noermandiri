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
                            <a href="#">Data Siswa</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Siswa</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Basic</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="multi-filter-select" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nomer Induk</th>
                                                <th>Kelas</th>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Telepon</th>
                                                <th>Telepon Ortu</th>
                                                <th><center>Status</center></th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($murid as $sis) {
                                                $id = $sis->NOINDUK;
                                            ?>
                                            <tr>
                                                <td><?php echo ++$start;?></td>
                                                <td><?php echo $sis->NOINDUK; ?></td>
                                                <td><?php echo $sis->NAMA_KELAS; ?></td>
                                                <td><?php echo $sis->NAMA_SISWA; ?></td>
                                                <td><?php echo $sis->ALAMAT_SISWA; ?></td>
                                                <td><?php echo $sis->TGL_LAHIR_SISWA; ?></td>
                                                <td><?php echo $sis->NOTELP_SISWA; ?></td>
                                                <td><?php echo $sis->NOTELP_ORTU_SISWA; ?></td>
                                                <td><?php if($sis->STATUS_SISWA == 1){?>
                                                        <br><center><p style="color: green"><i class="fa fa-check-circle fa-2x"></i></p></center>
                                                    <?php } else {?>
                                                        <br><center><p style="color: red"><i class="fa fa-times-circle fa-2x"></i></p></center>
                                                    <?php }?>
                                                </td>
                                                <td>
                                                    <button class="btn btn-primary btn-sm" id="btnEdit" data-toggle="modal" data-target="#modal_edit<?php echo $id?>"><i class="fa fa-pencil-alt"></i></button>
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
    <!-- End Content-->  


<!-- Modal Edit-->
<?php
    foreach($murid as $s):
        $id = $s->NOINDUK;
        $nama = $s->NAMA_SISWA;
        $alamat = $s->ALAMAT_SISWA;
        $notelp = $s->NOTELP_SISWA;
        $telportu = $s->NOTELP_ORTU_SISWA;
        $email = $s->EMAIL_SISWA;
        $status = $s->STATUS_SISWA;
        $tgl_lahir = $s->TGL_LAHIR_SISWA;
?>

<div class="modal fade" id="modal_edit<?php echo $id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLongTitle" align="center">Form Edit Siswa</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('updatesiswa')?>" method="POST">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-4">
                                <label>No Induk</label>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="noinduk_edit" id="noinduk_edit" value="<?php echo $id?>" readonly/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-4">
                                <label>Nama Siswa</label>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="nama_edit" id="nama_edit" value="<?php echo $nama?>" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-4">
                                <label>Alamat Lengkap</label>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="alamat_edit" id="alamat_edit" value="<?php echo $alamat?>" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-4">
                                <label>Tanggal Lahir</label>
                            </div>
                            <div class="col-lg-7">
                                <input type="date" class="form-control" name="tgl_lahir_edit" id="tgl_lahir_edit" value="<?php echo $tgl_lahir?>" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-4">
                                <label>Nomor Telepon</label>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="notelp_edit" id="notelp_edit" value="<?php echo $notelp?>" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-4">
                                <label>Telepon Orang Tua</label>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="notelp_ortu_edit" id="notelp_ortu_edit" value="<?php echo $telportu?>" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-4">
                                <label>Email</label>
                            </div>
                            <div class="col-lg-7">
                                <input type="email" class="form-control" name="email_edit" id="email_edit" value="<?php echo $email?>" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-4">
                                <label>Status</label>
                            </div>
                            <div class="col-lg-7">
                                <select class="form-control" name="status_edit" id="status_edit">
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
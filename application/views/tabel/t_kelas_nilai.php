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
                            <a href="#">Data Penilaian</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Daftar Kelas</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
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
                                                <th>Nama Kelas</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $nourut = 1;
                                            foreach ($kelas as $kls) {
                                                $id = $kls->ID_KELAS;
                                            ?>
                                            <tr>
                                                <td><?php echo $nourut++?></td>
                                                <td><?php echo $kls->NAMA_KELAS; ?></td>
                                                <td><a href="<?php echo base_url('C_penilaian/tampilSiswa/'.$kls->ID_KELAS)?>"><button class="btn btn-primary btn-sm">Input Nilai</button></a></td>  
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


    <!-- Modal Edit -->
<?php
    foreach($kelas as $k):
    $id = $k->ID_KELAS;
    $nama = $k->NAMA_KELAS;
?>
            <div class="modal fade" id="modal_edit<?php echo $id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLongTitle" align="center">Form Edit Data Kelas</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="<?php echo base_url('updatekelas')?>" method="POST">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label>ID Kelas</label>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control" name="id_edit" id="id_edit" value="<?php echo $id?>" readonly/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label>Jenjang Kelas</label>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-select-list">
                                        <select class="form-control" name="jenjang" id="jenjang">
                                            <option value="">-Pilih Jenjang Kelas-</option>
                                            <?php 
                                            foreach ($jenjang as $jjg) { ?>
                                                <option value="<?php echo $jjg->ID_JENJANG;?>"><?php echo $jjg->NAMA_JENJANG;?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label>Nama Kelas</label>
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
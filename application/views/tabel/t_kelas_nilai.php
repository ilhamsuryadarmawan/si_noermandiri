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
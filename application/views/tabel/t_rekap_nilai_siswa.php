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
                                <div class="col-md-6">
                                    <form action="<?php echo base_url('C_penilaian/index')?>" method="POST">
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-4 mt-2">
                                            <select class="form-control" name="kelas" id="kelas">
                                                <option value="">-Pilih Kelas-</option>
                                                <?php
                                                foreach ($kelombel as $kelas) { ?>
                                                    <option value="<?php echo $kelas->ID_KELAS;?>"><?php echo $kelas->NAMA_KELAS;?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <select class="form-control" name="mapel" id="mapel">
                                                <option value="">-Pilih Mata Pelajaran-</option>
                                                <?php
                                                foreach ($mapel as $mp) { ?>
                                                    <option value="<?php echo $mp->ID_KELAS;?>"><?php echo $mp->NAMA_KELAS;?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-2 mt-2">
                                            <input type="submit" class="btn btn-primary" name="submit"/> 
                                        </div>
                                    </div>
                                    </form>
                                </div>
<!--                                 <div class="col-md-2 mt-3">
                                    <a href="#" class="btn btn-info btn-border btn-round btn-sm mr-2">
                                        <span class="btn-label">
                                            <i class="fa fa-pencil"></i>
                                        </span>
                                        Export
                                    </a>
                                    <a href="#" class="btn btn-info btn-border btn-round btn-sm">
                                        <span class="btn-label">
                                            <i class="fa fa-print"></i>
                                        </span>
                                        Print
                                    </a>
                                </div> -->
                                <div class="col-md-2 mt-2">
                                    <a href="<?php echo base_url('laporan_penilaian')?>"><button type="button" class="btn btn-info btn-border btn-round fas fa-file-export" > Export PDF</button></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                            <table class="display table table-striped table-hover" id="multi-filter-select">
                                <thead>
                                    <tr>
                                        <th data-field="no">No</th>
                                        <th data-field="noinduk">NIS</th>
                                        <th data-field="kelas">Nama Siswa</th>
                                        <th data-field="nilai">Nilai</th>
                                        <th data-field="skala">Skala Nilai</th>
                                        
                                    </tr>
                                </thead>           
                                <tbody id="show_data">
                                <?php if($jumlah > 0):?>
                                    <?php
                                    $nourut = 1;
                                    foreach ($absensi as $absen) {
                                    ?>
                                    <tr>
                                        <td><?php echo $nourut++;?></td>
                                        <td><?php echo $absen->NOINDUK; ?></td>
                                        <td><?php echo $absen->NAMA_SISWA; ?></td>
                                        <td><?php echo $absen->kehadiran; ?></td>
                                        <td><?php echo $absen->alfa; ?></td>
                                        <td><?php echo $absen->pertemuan; ?></td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                    <?php else:?>
                                        <tr>
                                            <td colspan="8"><center>Absensi Belum Tersedia</center></td>
                                        </tr>
                                    <?php endif;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#tabel_absensi').DataTable({
                responsive: true
            });
        });
    </script>
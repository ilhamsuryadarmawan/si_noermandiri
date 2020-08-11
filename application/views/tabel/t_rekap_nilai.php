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
                                <div class="col-md-4">
                                    <a href="<?php echo base_url('C_penilaian/tampilKelas')?>"><button type="button" class="btn btn-primary btn-round" >Tambah data</button></a>
                                </div>
                                <div class="col-md-8">
                                    <form action="<?php echo base_url('C_penilaian/index')?>" method="POST">
                                    <div class="row">
                                        <div class="col-md-3 mt-2">
                                            <select class="form-control" name="kelas" id="kelas">
                                                <option value="">-Pilih Kelas-</option>
                                                <?php
                                                foreach ($kelas as $kls) { ?>
                                                    <option value="<?php echo $kls->ID_KELAS;?>"><?php echo $kls->NAMA_KELAS;?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            <select class="form-control" name="mapel" id="mapel">
                                                <option value="">-Pilih Mapel-</option>
                                                <?php
                                                foreach ($matapel as $mapel) { ?>
                                                    <option value="<?php echo $mapel->ID_MAPEL;?>"><?php echo $mapel->NAMA_MAPEL;?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            <select class="form-control" name="ujian" id="ujian">
                                                <option value="">-Pilih Jenis Ujian-</option>
                                                <?php
                                                foreach ($ujian as $ju) { ?>
                                                    <option value="<?php echo $ju->ID_JENIS_UJIAN;?>"><?php echo $ju->NAMA_JENIS_UJIAN;?></option>
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
                            </div>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                            <table class="display table table-striped table-hover" id="multi-filter-select">
                                <thead>
                                    <tr>
                                        <th data-field="no">No</th>
                                        <th data-field="noinduk">NIS</th>
                                        <th data-field="nama">Nama Siswa</th>
                                        <th data-field="kelas">Kelas</th>
                                        <th data-field="mapel">Mapel</th>
                                        <th data-field="ujian">Jenis Ujian</th>                                        
                                        <th data-field="topik">Topik</th>
                                        <th data-field="nilai">Nilai</th>
                                    </tr>
                                </thead>           
                                <tbody id="show_data">
                                <?php if($jumlah > 0):?>
                                    <?php
                                    $nourut = 1;
                                    foreach ($nilai as $nil) {
                                    ?>
                                    <tr>
                                        <td><?php echo $nourut++;?></td>
                                        <td><?php echo $nil->NOINDUK; ?></td>
                                        <td><?php echo $nil->NAMA_SISWA; ?></td>
                                        <td><?php echo $nil->NAMA_KELAS;?></td>
                                        <td><?php echo $nil->NAMA_MAPEL;?></td>
                                        <td><?php echo $nil->NAMA_JENIS_UJIAN; ?></td>
                                        <td><?php echo $nil->TOPIK_UJIAN; ?></td>
                                        <td><?php echo $nil->JUMLAH_NILAI; ?></td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                    <?php else:?>
                                        <tr>
                                            <td colspan="8"><center>Nilai Belum Tersedia</center></td>
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
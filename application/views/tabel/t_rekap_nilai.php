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
                                    <a href="<?php echo base_url('jadwal')?>"><button type="button" class="btn btn-primary btn-round" >Tambah data</button></a>
                                </div>
                                <div class="col-md-8">
                                    <form action="<?php echo base_url('C_absensi/index')?>" method="POST">
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
                                            <select class="form-control" name="periode" id="periode">
                                                <?php
                                                    date_default_timezone_set('Asia/Jakarta');
                                                    $tahun = date("Y");
                                                ?>
                                                <option value="">-Pilih Bulan-</option>
                                                <option value="01-<?php echo $tahun?>">Januari</option>
                                                <option value="02-<?php echo $tahun?>">Februari</option>
                                                <option value="03-<?php echo $tahun?>">Maret</option>
                                                <option value="04-<?php echo $tahun?>">April</option>
                                                <option value="05-<?php echo $tahun?>">Mei</option>
                                                <option value="06-<?php echo $tahun?>">Juni</option>
                                                <option value="07-<?php echo $tahun?>">Juli</option>
                                                <option value="08-<?php echo $tahun?>">Agustus</option>
                                                <option value="09-<?php echo $tahun?>">September</option>
                                                <option value="10-<?php echo $tahun?>">Oktober</option>
                                                <option value="11-<?php echo $tahun?>">November</option>
                                                <option value="12-<?php echo $tahun?>">Desember</option>
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
                                        <th data-field="kelas">Nama Siswa</th>
                                        <th data-field="tglAbsen">Jumlah Kehadiran</th>
                                        <th data-field="tglAbsen">Jumlah Tidak Hadir</th>
                                        <th data-field="Pertemuan">Jumlah Pertemuan</th>
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
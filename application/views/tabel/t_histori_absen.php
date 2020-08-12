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
                                    <form action="<?php echo base_url('C_absensi')?>" method="POST">
                                    <div class="row">
                                        <div class="col-md-4 mt-2">
                                            <select class="form-control" name="periode" id="periode">
                                                <?php
                                                    date_default_timezone_set('Asia/Jakarta');
                                                    $tahun = date("Y");
                                                ?>
                                                <option value="">-Pilih Bulan-</option>
                                                <option value="<?php echo $tahun?>-01">Januari</option>
                                                <option value="<?php echo $tahun?>-02">Februari</option>
                                                <option value="<?php echo $tahun?>-03">Maret</option>
                                                <option value="<?php echo $tahun?>-04">April</option>
                                                <option value="<?php echo $tahun?>-05">Mei</option>
                                                <option value="<?php echo $tahun?>-06">Juni</option>
                                                <option value="<?php echo $tahun?>-07">Juli</option>
                                                <option value="<?php echo $tahun?>-08">Agustus</option>
                                                <option value="<?php echo $tahun?>-09">September</option>
                                                <option value="<?php echo $tahun?>-10">Oktober</option>
                                                <option value="<?php echo $tahun?>-11">November</option>
                                                <option value="<?php echo $tahun?>-12">Desember</option>
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
                        <div class="card-header">
                            <div class="row row-card-no-pd mt--2">
                            <div class="col-sm-6 col-md-3">
                                <div class="card card-stats card-round">
                                    <div class="card-body ">
                                        <div class="row">
                                            <div class="col-7 col-stats">
                                                <div class="numbers">
                                                    <p class="card-category">Siswa</p>
                                                    <h4 class="card-title"><?php echo $this->session->userdata('ses_nama'); ?></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="card card-stats card-round">
                                    <div class="card-body ">
                                        <div class="row">
                                            <div class="col-7 col-stats">
                                                <div class="numbers">
                                                    <p class="card-category">Kelas</p>
                                                    <h4 class="card-title"><?php echo $this->session->userdata('ses_kelas'); ?></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="card card-stats card-round">
                                    <div class="card-body ">
                                        <div class="row">
                                            <div class="col-7 col-stats">
                                                <div class="numbers">
                                                    <p class="card-category">Tahun - Bulan</p>
                                                    <h4 class="card-title"><?php echo $this->input->post('periode'); ?></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div> 
                        <div class="card-body">
                        <div class="table-responsive">
                            <table class="display table table-striped table-hover" id="multi-filter-select">
                                <thead>
                                    <tr>
                                        <th data-field="no">No</th>
                                        <th data-field="hadir">Kehadiran</th>
                                        <th data-field="alpha">Tidak Hadir</th>
                                        <th data-field="pertemuan">Pertemuan</th>
                                    </tr>
                                </thead>           
                                <tbody id="show_data">
                                <?php if($riwayat > 0):?>
                                    <?php
                                    $nourut = 1;
                                    foreach ($riwayat as $absen) {
                                    ?>
                                    <tr>
                                        <td><?php echo $nourut++;?></td>
                                        <td><?php echo $absen->hadir; ?></td>
                                        <td><?php echo $absen->alpha; ?></td>
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


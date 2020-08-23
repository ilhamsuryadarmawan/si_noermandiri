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
                                    <form action="<?php echo base_url('C_absensi/index')?>" method="POST">
                                    <div class="row">
                                        <div class="col-md-4 mt-2">
                                            <select class="form-control" name="periode" id="periode">
                                                <option value="">-Pilih Semester-</option>
                                                <?php
                                                foreach ($semester as $sms) { ?>
                                                    <option value="<?php echo $sms->ID_SEMESTER;?>"><?php echo $sms->SEMESTER;?></option>
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
                                                    <p class="card-category">Periode</p>
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
                                        <th data-field="pertemuan">Jumlah Pertemuan</th>
                                        <th data-field="hadir">Jumlah Kehadiran</th>
                                        <th data-field="alpha">Jumlah Ketidakhadiran</th>
                                        
                                    </tr>
                                </thead>           
                                <tbody id="show_data">
                                <?php if($absensi > 0):?>
                                    <?php
                                    $nourut = 1;
                                    foreach ($absensi as $absen) {
                                    ?>
                                    <tr>
                                        <td><?php echo $absen->pertemuan; ?></td>
                                        <td><?php echo $absen->hadir; ?></td>
                                        <td><?php echo $absen->alpha; ?></td> 
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                    <?php else:?>
                                        <tr>
                                            <td colspan="8"><center>Data Absensi Belum Tersedia</center></td>
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


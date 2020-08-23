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
                                <div class="col-md-8">
                                    <form action="<?php echo base_url('C_penilaian/index')?>" method="POST">
                                    <div class="row">
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
                                                    <p class="card-category">Jenis Ujian</p>
                                                    <h4 class="card-title"><?php echo $this->input->post('ujian'); ?></h4>
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
                                        <th data-field="no">Semester</th>
                                        <th data-field="mapel">Mata Pelajaran</th>
                                        <th data-field="nilai">Nilai Angka</th>
                                        <!-- <th data-field="grade">Nilai Huruf</th> -->
                                    </tr>
                                </thead>           
                                <tbody id="show_data">
                                <?php if($nilai > 0):?>
                                    <?php
                                    $nourut = 1;
                                    foreach ($nilai as $nil) {
                                    ?>
                                    <tr>
                                        <td><?php echo $nil->SEMESTER ?>;</td>
                                        <td><?php echo $nil->NAMA_MAPEL ?>;</td>
                                        <td><?php echo $nil->RATA_RATA ?>;</td>
                                        <!-- <td></td> -->
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                    <?php else:?>
                                        <tr>
                                            <td colspan="8"><center>Data Nilai Belum Tersedia</center></td>
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
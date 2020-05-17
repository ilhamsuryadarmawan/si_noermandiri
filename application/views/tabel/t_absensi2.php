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
                                <div class="col-md-5">
                                    <a href="<?php echo base_url('forminput')?>"><button type="button" class="btn btn-primary btn-round" >Tambah data</button></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="tabel_absensi">
                                <thead>
                                    <tr>
                                        <th data-field="no">No</th>
                                        <th data-field="noinduk">NIS</th>
                                        <th data-field="kelas">Nama Siswa</th>
                                        <th data-field="tglAbsen">Jumlah Kehadiran</th>
                                        <th data-field="Pertemuan">Jumlah Pertemuan</th>
                                    </tr>
                                </thead>           
                                <tbody>
                                    <?php
                                    $nourut = 1;
                                    $jumlah;
                                    foreach ($absensi as $absen) {
                                    ?>
                                    <tr>
                                        <td><?php echo $nourut++;?></td>
                                        <td><?php echo $absen->NOINDUK; ?></td>
                                        <td><?php echo $absen->NAMA_SISWA; ?></td>
                                        <td><?php echo $absen->jmlKehadiran; ?></td>
                                        <!-- <td><?php echo $jumlah->jmlPertemuan; ?></td> -->

                                    <?php
                                    }
                                    ?>
                                    </tr>
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
<div class="data-table-area mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sparkline13-list shadow-reset">
                            </div>
                                <div class="sparkline13-hd">
                                    <div class="main-sparkline13-hd">
                                        <h1><?php echo $judul;?></h1>
                                    </div>
                                </div>
                                <div class="sparkline13-graph">
                                    <div class="datatable-dashv1-list custom-datatable-overright">
<!--                                         <div id="toolbar">
                                            <?php if($this->session->userdata('akses')=='admin'):?>
                                            <a href="<?php echo base_url('Siswa/tambah')?>"><button type="button" class="btn btn-info btn-fill pull-right" name="Tambah">Tambah data</button></a>
                                            <?php endif;?>
                                        </div> -->
                                        <table class="table sparkle-table" id="table" data-toggle="table" data-pagination="false" data-search="false" data-cookie-id-table="saveId" data-click-to-select="false" data-toolbar="#toolbar">
                                            <thead>
                                                <tr>
                                                    <th data-field="no">No</th>
                                                    <th data-field="nama">Nama</th>
                                                    <th data-field="alamat">alamat</th>
                                                    <th data-field="telpOrtu">Telp Ortu</th>
                                                    <th data-field="telpSiswa">Telp Siswa</th>
                                                    <th data-field="asalSekolah">Asal Sekolah</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $nourut = 1;
                                                foreach ($murid as $siswa) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $nourut++;?></td>
                                                    <td><?php echo $siswa->NAMA_SISWA; ?></td>
                                                    <td><?php echo $siswa->ALAMAT_SISWA; ?></td>
                                                    <td><?php echo $siswa->NOTELP_ORTU_SISWA; ?></td>
                                                    <td><?php echo $siswa->NOTELP_SISWA; ?></td>
                                                    <td><?php echo $siswa->ASAL_SEKOLAH; ?></td>
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
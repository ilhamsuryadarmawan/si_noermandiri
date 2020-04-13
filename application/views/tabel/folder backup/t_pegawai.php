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
                                            <a href="<?php echo base_url('C_pegawai/tambah')?>"><button type="button" class="btn btn-info btn-fill pull-right" name="Tambah">Tambah data</button></a>
                                            <?php endif;?>
                                        </div> -->
                                        
                                        <table class="table sparkle-table" id="table" data-toggle="table" data-pagination="false" data-search="false" data-cookie-id-table="saveId" data-click-to-select="false" data-toolbar="#toolbar">
                                            <thead>
                                                <tr>
                                                    <th data-field="no">No</th>
                                                    <th data-field="nama">Nama</th>
                                                    <th data-field="nama">Jabatan</th>
                                                    <th data-field="alamat">Alamat</th>
                                                    <th data-field="tglLahir">Tanggal Lahir</th>
                                                    <th data-field="telepon">Telepon</th>
                                                    <th data-field="email">Email</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $nourut = 1;
                                                foreach ($peg as $pegawai) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $nourut++;?></td>
                                                    <td><?php echo $pegawai->NAMA_PEGAWAI; ?></td>
                                                    <td><?php echo $pegawai->ID_JABATAN; ?></td>
                                                    <td><?php echo $pegawai->ALAMAT_PEGAWAI; ?></td>
                                                    <td><?php echo $pegawai->TGL_LAHIR_PEG; ?></td>
                                                    <td><?php echo $pegawai->ALAMAT_PEGAWAI; ?></td>
                                                    <td><?php echo $pegawai->EMAIL; ?></td>
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
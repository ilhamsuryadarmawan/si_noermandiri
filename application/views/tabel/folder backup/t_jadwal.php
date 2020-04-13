<!-- Static Table Start -->
            <div class="data-table-area mg-b-15">
                <div class="container-fluid">
                    <?php if ($this->load->session->flashdata('success')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $this->session->flashdata('success')?>
                        </div>   
                    <?php endif;?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sparkline13-list shadow-reset">
                            </div>
                                <div class="sparkline13-hd">
                                    <div class="main-sparkline13-hd">
                                        <h1><?php echo $judul.$bln;?></h1>
                                    </div>
                                </div>
                                <div class="sparkline13-graph">
                                    <div class="datatable-dashv1-list custom-datatable-overright">
                                        <div id="toolbar">
                                        <form method="POST" action="<?php echo base_url('Jadwal/getJadwalByKelas')?>">
                                            <select class="form-control custom-select-value" name="kelas" id="kelas" required>
                                                <option value="">-Pilih Kelas-</option>
                                                <?php
                                                foreach ($kelombel as $kelas) { ?>
                                                    <option value="<?php echo $kelas->ID_KELAS;?>"><?php echo $kelas->NAMA_KELAS;?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <a><button type="submit" class="btn btn-info btn-fill pull-left" name="Tambah">Cari</button></a>
                                        </form>
                                        </div>
                                        <a href="<?php echo base_url('Jadwal/tambah')?>"><button type="button" class="btn btn-info btn-fill pull-right" name="Tambah">Tambah jadwal</button></a>
                                        <table class="table sparkle-table" id="table" data-toggle="table" data-pagination="false" data-search="false" data-cookie-id-table="saveId" data-click-to-select="false" data-toolbar="#toolbar">
                                            <thead>
                                                <tr>
                                                    <th>Tanggal</th>
                                                    <th>Waktu</th>
                                                    <th>Kelas </th>
                                                    <th>Mata Pelajaran</th>
                                                    <th>Ruangan</th>
                                                    <th>Tentor</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($jdwl as $jadwal) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $jadwal->TANGGAL; ?></td>
                                                    <td><?php echo $jadwal->WAKTU;?></td>
                                                    <td><?php echo $jadwal->NAMA_KELAS; ?></td>
                                                    <td><?php echo $jadwal->NAMA_MAPEL; ?></td>
                                                    <td><?php echo $jadwal->NAMA_RUANGAN; ?></td>
                                                    <td><?php echo $jadwal->NAMA_PEGAWAI; ?></td>
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
            </div>
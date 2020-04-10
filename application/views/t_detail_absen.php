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
                                        <div id="toolbar">

                                        </div>
                                    
                                        
                                        <table class="table sparkle-table" id="table" data-toggle="table" data-pagination="false" data-search="false" data-cookie-id-table="saveId" data-click-to-select="false" data-toolbar="#toolbar">
                                            <thead>
                                                <tr>
                                                    <th data-field="no">No</th>
                                                    <th data-field="noinduk">NIS</th>
                                                    <th data-field="kelas">Nama Siswa</th>
                                                    <th data-field="tglAbsen">Jumlah Kehadiran</th>
                                                </tr>
                                            </thead>
                                            
                                             <tbody>
                                                <?php
                                                $nourut = 1;
                                                foreach ($absensi as $absen) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $nourut++;?></td>
                                                    <td><?php echo $absen->NOINDUK; ?></td>
                                                    <td><?php echo $absen->NAMA_SISWA; ?></td>
                                                    <td><?php echo $absen->jmlKehadiran; ?></td>
                                                <?php
                                                }
                                                ?>
                                            <!--  -->
                                            </tr>
                                            </tbody>
                                        </table>

<!--                                         <div class="form-group-inner">
                                            <div class="login-btn-inner">
                                                <div class="row">
                                                        <div class="col-lg-9">
                                                            <div class="login-horizental cancel-wp pull-left">
                                                                <button type="reset" class="btn btn-danger btn-fill pull-left" name="Batal">Batal</button>&nbsp;
                                                                <button type="submit" class="btn btn-primary btn-fill pull-right" name="Tambah" onclick="absensi()">Simpan Data</button> 
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div> -->
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
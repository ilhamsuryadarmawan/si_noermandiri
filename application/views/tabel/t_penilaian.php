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
                                        <form>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-1">
                                                        <label class="login2 pull-right pull-right-pro">KELAS</label>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <input type="text" class="form-control" id="kelas" name="kelas" value="<?php echo $kelas?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-1">
                                                        <label class="login2 pull-right pull-right-pro">MAPEL</label>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <input type="text" class="form-control" id="mapel" name="mapel" value="<?php echo $mapel?>" readonly>
                                                    </div>
                                                </div>
                                            </div>  
                                        
                                        <table class="table sparkle-table" id="table" data-toggle="table" data-pagination="false" data-search="false" data-cookie-id-table="saveId" data-click-to-select="false" data-toolbar="#toolbar">
                                            <thead>
                                                <tr>
                                                    <th data-field="no">No</th>
                                                    <th data-field="NOINDUK">NIS</th>
                                                    <th data-field="kelas">Nama Siswa</th>
                                                    <th data-field="nilai">Nilai</th>

                                                    
                                                </tr>
                                            </thead>
                                             <tbody>
                                                <?php
                                                $nourut = 1;
                                                foreach ($siswa as $sis) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $nourut++;?></td>
                                                    <td><?php echo $sis->NOINDUK; ?></td>
                                                    <td><?php echo $sis->NAMA_SISWA; ?></td>
                                                    <td><input type="" name=""></td>

                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
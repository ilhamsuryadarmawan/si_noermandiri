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
                                            <a href="<?php echo base_url('C_kelas/tambah')?>"><button type="button" class="btn btn-info btn-fill pull-right" name="Tambah">Tambah data</button></a>
                                            <?php endif;?>
                                        </div> -->
                                        
                                        <table class="table sparkle-table" id="table" data-toggle="table" data-pagination="false" data-search="false" data-cookie-id-table="saveId" data-click-to-select="false" data-toolbar="#toolbar">
                                            <thead>
                                                <tr>
                                                    <th data-field="no">No</th>
                                                    <th data-field="id">Nama Kelas</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $nourut = 1;
                                                foreach ($kelas as $kelombel) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $nourut++?></td>
                                                    <td><?php echo $kelombel->NAMA_KELAS; ?></td>
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
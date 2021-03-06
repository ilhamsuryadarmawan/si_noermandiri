<!-- <?php 
if ($_GET['code'] == 1){
?>
    <div class='message success'>
        <h5>Success!</h5>
        <p>Data absensi Mahasiswa berhasil disimpan.</p>
    </div>
<?php
}
if ($_GET['code'] == 2){
?>
    <div class='message success'>
        <h5>Success!</h5>
        <p>Data absensi Mahasiswa berhasil diubah.</p>
    </div>
<?php
}
if ($_GET['code'] == 3){
?>
    <div class='message success'>
        <h5>Success!</h5>
        <p>Data absensi Mahasiswa berhasil dihapus.</p>
    </div>
<?php
}
if ($_GET['code'] == 4){
?>
    <div class='message error'>
        <h5>Failed!</h5>
        <p>Absensi mahasiswa gagal disimpan, absensi sudah pernah disimpan pada tanggal ini sebelumnya</p>
    </div>
<?php
}
?> -->

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
                                            <?php if($this->session->userdata('akses')=='admin'):?>
                                            <a href="<?php echo base_url('C_jabatan/tambah')?>"><button type="button" class="btn btn-info btn-fill pull-left" name="Tambah">Tambah data</button></a>
                                            <?php endif;?>
                                        </div>
                                        
                                        <table class="table sparkle-table" id="table" data-toggle="table" data-pagination="false" data-search="false" data-cookie-id-table="saveId" data-click-to-select="false" data-toolbar="#toolbar">
                                            <thead>
                                                <tr>
                                                    <th data-field="no">No</th>
                                                    <th data-field="id">ID Jabatan</th>
                                                    <th data-field="namaJabatan">Jabatan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $nourut = 1;
                                                foreach ($jabatan as $jab) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $nourut++;?></td>
                                                    <td><?php echo $jab->ID_JABATAN; ?></td>
                                                    <td><?php echo $jab->JABATAN; ?></td>
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
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $title;?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
        ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/img/logo/logo1.ico')?>">
    <!-- Google Fonts
        ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i,800" rel="stylesheet">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/adm/css/bootstrap.min.css')?>">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/adm/css/font-awesome.min.css')?>">
    <!-- adminpro icon CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/adm/css/adminpro-custon-icon.css')?>">
    <!-- meanmenu icon CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/adm/css/meanmenu.min.css')?>">
    <!-- mCustomScrollbar CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/adm/css/jquery.mCustomScrollbar.min.css')?>">
    <!-- animate CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/adm/css/animate.css')?>">
    <!-- data-table CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/adm/css/data-table/bootstrap-table.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/adm/css/data-table/bootstrap-editable.css')?>">
    <!-- normalize CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/adm/css/normalize.css')?>">
    <!-- charts C3 CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/adm/css/c3.min.css')?>">
    <!-- forms CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/adm/css/form/all-type-forms.css')?>">
    <!-- style CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/adm/css/style.css')?>">
    <!-- responsive CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/adm/css/responsive.css')?>">
    <!-- modernizr JS
        ============================================ -->
    <script src="<?php echo base_url('assets/adm/js/vendor/modernizr-2.8.3.min.js')?>"></script>
</head>

<body class="materialdesign">
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <!-- Header top area start-->
    <div class="wrapper-pro">
        <div class="left-sidebar-pro">
            <nav id="sidebar">
                <div class="sidebar-header">
                    <a href="<?php echo base_url('Home')?>"><img src="<?php echo base_url('assets/adm/img/message/1.jpg')?>" alt=""/>
                    </a>
                    <h3><?php echo $this->session->userdata('ses_nama'); ?></h3>
                    <h5><?php echo $this->session->userdata('akses'); ?></h5>
                </div>
                <div class="left-custom-menu-adp-wrap">
                    <ul class="nav navbar-nav left-sidebar-menu-pro">
                        <?php if($this->session->userdata('akses')=='admin'):?>
                        <li class="nav-item">
                            <a data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                <i class="fa big-icon fa-database"></i>
                                <span class="mini-dn">Data Master</span>
                                <span class="indicator-right-menu mini-dn">
                                    <i class="fa indicator-mn fa-angle-left"></i>
                                </span>
                            </a>
                            <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
                                <a href="<?php echo base_url('Pegawai')?>" class="dropdown-item">Data Pegawai</a>
                                <a href="<?php echo base_url('Siswa')?>" class="dropdown-item">Data Siswa</a>
                                <a href="<?php echo base_url('Jabatan')?>" class="dropdown-item">Data Jabatan</a>                         
                                <a href="<?php echo base_url('C_mapel')?>" class="dropdown-item">Data Mata Pelajaran</a>
                                <a href="<?php echo base_url('Ruangan')?>" class="dropdown-item">Data Ruangan</a>
                                <a href="<?php echo base_url('C_kelas')?>" class="dropdown-item">Data Kelas</a>
                                <a href="<?php echo base_url('Jenjang_Kelas')?>" class="dropdown-item">Data Jenjang Kelas</a>

                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="#" role="button" aria-expanded="false" class="nav-link data-toggle">
                                <i class="fa big-icon fa-book"></i>
                                <span class="mini-dn">Penilaian Siswa</span>
                                <span class="indicator-right-menu mini-dn"></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" role="button" aria-expanded="false" class="nav-link data-toggle">
                                <i class="fa big-icon fa-pencil"></i>
                                <span class="mini-dn">Absensi Siswa</span>
                                <span class="indicator-right-menu mini-dn"></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Jadwal')?>" role="button" aria-expanded="false" class="nav-link data-toggle">
                                <i class="fa big-icon fa-calendar calendar-alt"></i>
                                <span class="mini-dn">Jadwal Les</span>
                                <span class="indicator-right-menu mini-dn"></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                <i class="fa big-icon fa-files-o"></i>
                                <span class="mini-dn">Laporan</span>
                                <span class="indicator-right-menu mini-dn">
                                    <i class="fa indicator-mn fa-angle-left"></i>
                                </span>
                            </a>
                            <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
                                <a href="inbox.html" class="dropdown-item">Laporan Pendaftaran</a>
                                <a href="view-mail.html" class="dropdown-item">Laporan Pembayaran</a>
                            </div>
                        </li>
                        <?php elseif($this->session->userdata('akses')=='pemilik'):?>
                        <li class="nav-item">
                            <a data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                <i class="fa big-icon fa-files-o"></i>
                                <span class="mini-dn">Laporan</span>
                                <span class="indicator-right-menu mini-dn">
                                    <i class="fa indicator-mn fa-angle-left"></i>
                                </span>
                            </a>
                            <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
                                <a href="inbox.html" class="dropdown-item">Laporan Pendaftaran</a>
                                <a href="view-mail.html" class="dropdown-item">Laporan Pembayaran</a>
                            </div>
                        </li>
                        <?php elseif($this->session->userdata('akses')=='tentor'):?>
                            <li class="nav-item">
                            <a href="<?php echo base_url('Jadwal')?>" role="button" aria-expanded="false" class="nav-link data-toggle">
                                <i class="fa big-icon fa-calendar calendar-alt"></i>
                                <span class="mini-dn">Jadwal Les</span>
                                <span class="indicator-right-menu mini-dn"></span>
                            </a>
                        </li>
                        <?php else:?>
                            <li class="nav-item">
                            <a href="<?php echo base_url('Jadwal')?>" role="button" aria-expanded="false" class="nav-link data-toggle">
                                <i class="fa big-icon fa-calendar calendar-alt"></i>
                                <span class="mini-dn">Jadwal Les</span>
                                <span class="indicator-right-menu mini-dn"></span>
                            </a>
                        </li>
                        <?php endif;?>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="content-inner-all">
            <div class="header-top-area">
                <div class="fixed-header-top">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-1 col-md-6 col-sm-6 col-xs-12">
                                <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <div class="admin-logo logo-wrap-pro">
                                    <a href="<?php echo base_url('Home')?>">
                                        <img src="<?php echo base_url('assets/img/logo1.png')?>" width="50px" height="50px" alt=""/>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-11 col-md-5 col-sm-6 col-xs-12">
                                <div class="header-right-info">
                                    <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                        <li class="nav-item">
                                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                <span class="fa fa-user"></span>
                                                <span class="admin-name"><?php echo $this->session->userdata('ses_nama'); ?></span>
                                                <span class="fa fa-angle-down"></span>
                                            </a>
                                            <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated flipInX">
                                                <li><a href="<?php echo base_url('Auth/logout')?>"><span class="fa fa-sign-out"></span>Log Out</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header top area end-->
            <!-- Breadcome start-->
            <div class="breadcome-area mg-b-30 small-dn">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Breadcome End-->
            <!-- Mobile Menu start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                        <?php if($this->session->userdata('akses')=='admin'):?>
                                        <li><a data-toggle="collapse" data-target="#demo">Data Master</a>
                                            <ul id="demo" class="collapse dropdown-header-top">
                                                <li><a href="<?php echo base_url('Pegawai')?>">Data Pegawai</a></li>
                                                <li><a href="<?php echo base_url('Siswa')?>">Data Siswa</a></li>
                                                <li><a href="<?php echo base_url('Mata_Pelajaran')?>">Data Mata Pelajaran</a></li>
                                                <li><a href="<?php echo base_url('Ruangan')?>">Data Ruangan</a></li>
                                                <li><a href="<?php echo base_url('C_kelas')?>">Data Kelas Kelompok Belajar</a></li>
                                                <li><a href="<?php echo base_url('Jenjang_Kelas')?>">Data Jenjang Kelas</a></li>
                                                <li><a href="<?php echo base_url('Jabatan')?>">Data Jabatan</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a data-toggle="collapse" data-target="#others" href="">Pendaftaran Les</a>
                                        </li>
                                        <li>
                                            <a data-toggle="collapse" data-target="<?php echo base_url('Pegawai')?>" href="<?php echo base_url('Pegawai')?>">Pembayaran Registrasi</a>
                                        </li>
                                        <li>
                                            <a data-toggle="collapse" data-target="<?php echo base_url('Jadwal')?>" href="<?php echo base_url('Jadwal')?>">Jadwal Les</a>
                                        </li>
                                        <?php elseif($this->session->userdata('akses')=='pemilik'):?>
                                        <li><a data-toggle="collapse" data-target="#demo" href="#">Laporan</a>
                                            <ul id="demo" class="collapse dropdown-header-top">
                                                <li><a href="">Laporan Pendaftaran</a></li>
                                                <li><a href="">Laporan Pembayaran</a></li>
                                            </ul>
                                        </li>
                                        <?php elseif($this->session->userdata('akses')=='tentor'):?>
                                        <li>
                                            <a data-toggle="collapse" data-target="#Chartsmob" href="#">Jadwal Les</a>
                                        </li>
                                        <?php else:?>
                                        <li>
                                            <a data-toggle="collapse" data-target="#Chartsmob" href="#">Jadwal Les</a>
                                        </li>
                                        <?php endif;?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu end -->
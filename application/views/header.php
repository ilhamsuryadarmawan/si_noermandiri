<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title><?php echo $title?></title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?php echo base_url('assets/img/logo/logo1.ico')?>" type="image/x-icon"/>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
	<!-- Fonts and icons -->
	<script src="<?php echo base_url('assets/adm/js/plugin/webfont/webfont.min.js')?>"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?php echo base_url('assets/adm/css/fonts.min.css')?>']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="<?php echo base_url('assets/adm/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/adm/css/atlantis.min.css')?>">
   	<link href="<?php echo base_url('assets/adm/styles.css')?>" rel="stylesheet" />
	<link href="<?php echo base_url('assets/adm/prism.css')?>" rel="stylesheet" />
</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">
				<a href="#index.html" class="logo">
                    <img src="<?php echo base_url('assets/img/logo/logo1.ico')?>" width="30" weight="30" alt="navbar brand" class="navbar-brand">
                    <font color="#FFFFF" size="2">&nbsp LBB Noermandiri</font>
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">	
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div>
						</form>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>

						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="<?php echo base_url('assets/adm/img/profile.jpg')?>" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="<?php echo base_url('assets/adm/img/profile.jpg')?>" alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4><?php echo $this->session->userdata('ses_nama'); ?></h4>
												<p class="text-muted"><?php echo $this->session->userdata('akses'); ?></p>
												<a href="<?php echo base_url('Profil')?>" class="btn btn-xs btn-secondary btn-sm">Ubah Profil</a>
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="<?php echo base_url('logout')?>">Logout</a>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>
		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="<?php echo base_url('assets/adm/img/profile.jpg')?>" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
                                    <?php echo $this->session->userdata('ses_nama'); ?>
									<span class="user-level"><?php echo $this->session->userdata('akses'); ?></span>
								</span>
							</a>
							<div class="clearfix"></div>
						</div>
					</div>
					<ul class="nav nav-primary">
                    <?php if($this->session->userdata('akses')=='Administrator'):?>
						<li <?=$this->uri->segment(1) == 'C_Home' ? 'class="nav-item active"' : 'class="nav-item"'?>>
							<a href="<?php echo base_url('C_Home')?>" class="collapsed" aria-expanded="false">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li <?=$this->uri->segment(1) == 'C_Pegawai' || $this->uri->segment(1) == 'C_jabatan' || $this->uri->segment(1) == 'C_siswa' || $this->uri->segment(1) == 'C_mapel' || $this->uri->segment(1) == 'C_ruangan' || $this->uri->segment(1) == 'C_kelas' || $this->uri->segment(1) == 'C_jenjang_kelas' || $this->uri->segment(1) == 'C_sesi' || $this->uri->segment(1) == 'C_skala' || $this->uri->segment(1) == 'C_jenis_ujian' ? 'class="nav-item active submenu"' : 'class="nav-item"'?>>
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-database"></i>
								<p>Data Master</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?php echo base_url('C_jabatan')?>">
											<span class="sub-item">Jabatan</span>
										</a>
									</li>
									<li>
										<a href="<?php echo base_url('C_jenis_ujian')?>">
											<span class="sub-item">Jenis Ujian</span>
										</a>
									</li>
									<li>
										<a href="<?php echo base_url('C_jenjang_kelas')?>">
											<span class="sub-item">Jenjang Kelas</span>
										</a>
									</li>
									<li>
										<a href="<?php echo base_url('C_kelas')?>">
											<span class="sub-item">Kelas</span>
										</a>
									</li>
									<li>
										<a href="<?php echo base_url('C_mapel')?>">
											<span class="sub-item">Mata Pelajaran</span>
										</a>
                                    </li>
                                    <li>
										<a href="<?php echo base_url('C_ruangan')?>">
											<span class="sub-item">Ruang Kelas</span>
										</a>
                                    </li>
									<li>
										<a href="<?php echo base_url('C_sesi')?>">
											<span class="sub-item">Sesi Les</span>
										</a>
									</li>
									<li>
										<a href="<?php echo base_url('C_skala')?>">
											<span class="sub-item">Skala Nilai</span>
										</a>
									</li>

								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#siswa">
								<i class="fas fa-users"></i>
								<p>Data Siswa</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="siswa">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?php echo base_url('daftarsiswa')?>">
											<span class="sub-item">Siswa
                                            </span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#pegawai">
								<i class="fas fa-user-tie"></i>
								<p>Data Pegawai</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="pegawai">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?php echo base_url('daftarpegawai')?>">
											<span class="sub-item">Semua
                                            </span>
										</a>
									</li>
									<li>
										<a href="#">
											<span class="sub-item">Admin
                                            </span>
										</a>
									</li>
									<li>
										<a href="#">
											<span class="sub-item">Pengajar
                                            </span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li <?=$this->uri->segment(1) == 'C_penilaian' ? 'class="nav-item active"' : 'class="nav-item"'?>>
							<a data-toggle="collapse" href="#nilai">
								<i class="fas fa-pencil-alt"></i>
								<p>Data Penilaian Siswa</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="nilai">
								<ul class="nav nav-collapse">
<!-- 									<li>
										<a href="<?php echo base_url('C_penilaian/tampilKelas')?>">
											<span class="sub-item">Tambah Data Nilai</span>
										</a>
									</li> -->
<!-- 									<li>
										<a href="#">
											<span class="sub-item">Ubah Data Nilai</span>
										</a>
									</li> -->
									<li>
										<a href="<?php echo base_url('C_penilaian')?>">
											<span class="sub-item">Laporan Kumulatif Nilai</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li <?=$this->uri->segment(1) == 'C_absensi' ? 'class="nav-item active"' : 'class="nav-item"'?>>
							<a data-toggle="collapse" href="#absensi">
								<i class="fas fa-clipboard-list"></i>
								<p>Data Absensi Siswa</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="absensi">
								<ul class="nav nav-collapse">
<!-- 									<li>
										<a href="<?php echo base_url('Jadwal')?>">
											<span class="sub-item">Tambah Data Absensi</span>
										</a>
									</li> -->
									<li>
										<a href="<?php echo base_url('C_Absensi')?>">
											<span class="sub-item">Laporan Kumulatif Absensi</span> 
										</a>
									</li>
<!-- 									<li>
										<a href="<?php echo base_url('Laporan/siswa')?>">
											<span class="sub-item">Laporan Absensi</span> 
										</a>
									</li> -->
								</ul>
							</div>
						</li>
						<li <?=$this->uri->segment(1) == 'Jadwal' ? 'class="nav-item active"' : 'class="nav-item"'?>>
							<a href="<?php echo base_url('Jadwal')?>">
								<i class="fas fa-calendar-alt"></i>
								<p>Jadwal Les</p>
							</a>
                        </li>

                    <?php elseif($this->session->userdata('akses')=='Pemilik'):?>
                        <li <?=$this->uri->segment(1) == 'C_home' ? 'class="nav-item active"' : 'class="nav-item"'?>>
							<a href="<?php echo base_url('C_home')?>" class="collapsed" aria-expanded="false">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li <?=$this->uri->segment(1) == 'Laporan' ? 'class="nav-item active"' : 'class="nav-item"'?>>
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-database"></i>
								<p>Laporan</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?php echo base_url('Laporan/absensi')?>">
											<span class="sub-item">Laporan Absensi Siswa</span>
										</a>
									</li>
									<li>
										<a href="<?php echo base_url('Laporan/nilai')?>">
											<span class="sub-item">Laporan Penilaian Siswa</span>
										</a>
                                    </li>
                                    <li>
										<a href="<?php echo base_url('Laporan/siswa')?>">
											<span class="sub-item">Laporan Data Siswa Les</span>
										</a>
									</li>
								</ul>
							</div>
						</li>

                    <?php elseif($this->session->userdata('akses')=='Tentor'):?>
                        <li <?=$this->uri->segment(1) == 'C_home' ? 'class="nav-item active"' : 'class="nav-item"'?>>
							<a href="<?php echo base_url('C_home')?>" class="collapsed" aria-expanded="false">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li <?=$this->uri->segment(1) == 'Jadwal' ? 'class="nav-item active"' : 'class="nav-item"'?>>
							<a href="<?php echo base_url('Jadwal')?>">
								<i class="fas fa-calendar-alt"></i>
								<p>Jadwal Mengajar</p>
							</a>
                        </li>
                       	<li <?=$this->uri->segment(1) == 'C_penilaian' ? 'class="nav-item active"' : 'class="nav-item"'?>>
							<a data-toggle="collapse" href="#nilai">
								<i class="fas fa-pencil-alt"></i>
								<p>Data Penilaian Siswa</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="nilai">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?php echo base_url('C_penilaian/tampilKelas')?>">
											<span class="sub-item">Tambah Data Nilai</span>
										</a>
									</li>
<!-- 									<li>
										<a href="#">
											<span class="sub-item">Ubah Data Nilai</span>
										</a>
									</li> -->
									<li>
										<a href="<?php echo base_url('C_penilaian')?>">
											<span class="sub-item">Laporan Rekap Nilai</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li <?=$this->uri->segment(1) == 'C_absensi' ? 'class="nav-item active"' : 'class="nav-item"'?>>
							<a data-toggle="collapse" href="#absensi">
								<i class="fas fa-clipboard-list"></i>
								<p>Data Absensi Siswa</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="absensi">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?php echo base_url('Jadwal')?>">
											<span class="sub-item">Tambah Data Absensi</span>
										</a>
									</li>
<!-- 									<li>
										<a href="#">
											<span class="sub-item">Ubah Data Absensi</span>
										</a>
									</li> -->
									<li>
										<a href="<?php echo base_url('C_Absensi')?>">
											<span class="sub-item">Laporan Rekap Absensi</span> 
										</a>
									</li>
								</ul>
							</div>
						</li>
                        
                       	<?php elseif($this->session->userdata('akses')=='Siswa'):?>
                        <li class="nav-item active">
							<a href="<?php echo base_url('Home')?>" class="collapsed" aria-expanded="false">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
                        <li class="nav-item">
							<a href="<?php echo base_url('C_penilaian')?>">
								<i class="fas fa-history"></i>
								<p>Histori Nilai</p>
							</a>
                        </li>
                        <li class="nav-item">
							<a href="<?php echo base_url('C_Absensi')?>">
								<i class="fas fa-history"></i>
								<p>Histori Absensi</p>
							</a>
                        </li>


                        <?php else:?>
                        <?php endif;?>    
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->
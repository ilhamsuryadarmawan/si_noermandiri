-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Agu 2020 pada 23.55
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `noermandiri`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi_siswa`
--

CREATE TABLE `absensi_siswa` (
  `ID_ABSENSI` varchar(10) NOT NULL,
  `NOINDUK` varchar(15) NOT NULL,
  `ID_JADWAL` varchar(12) NOT NULL,
  `STATUS_ABSEN` varchar(2) NOT NULL,
  `TGL_ABSEN_DIBUAT` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `absensi_siswa`
--

INSERT INTO `absensi_siswa` (`ID_ABSENSI`, `NOINDUK`, `ID_JADWAL`, `STATUS_ABSEN`, `TGL_ABSEN_DIBUAT`) VALUES
('ABS001', '200809001', 'JDWL001', 'H', '2020-08-11 01:50:07'),
('ABS002', '200809001', 'JDWL002', 'H', '2020-08-11 01:50:13'),
('ABS003', '200809002', 'JDWL003', 'H', '2020-08-11 13:23:15'),
('ABS004', '200809003', 'JDWL003', 'H', '2020-08-11 13:23:15');

--
-- Trigger `absensi_siswa`
--
DELIMITER $$
CREATE TRIGGER `auto_absen` BEFORE INSERT ON `absensi_siswa` FOR EACH ROW BEGIN
DECLARE nr integer DEFAULT 0;

SELECT count(*) INTO @id from absensi_siswa;
set new.id_absensi=concat("ABS",LPAD(@id+1,3,'0'));

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `ID_JABATAN` varchar(6) NOT NULL,
  `JABATAN` varchar(15) NOT NULL,
  `STATUS_JABATAN` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`ID_JABATAN`, `JABATAN`, `STATUS_JABATAN`) VALUES
('JAB001', 'Admin', 1),
('JAB002', 'Pengajar', 1),
('JAB003', 'Pemilik', 1);

--
-- Trigger `jabatan`
--
DELIMITER $$
CREATE TRIGGER `auto_jab` BEFORE INSERT ON `jabatan` FOR EACH ROW BEGIN
DECLARE nr integer DEFAULT 0;

SELECT count(*) INTO @id from jabatan;
set new.id_jabatan=concat("JAB",LPAD(@id+1,3,'0'));

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_les`
--

CREATE TABLE `jadwal_les` (
  `ID_JADWAL` varchar(12) NOT NULL,
  `ID_PEGAWAI` varchar(12) NOT NULL,
  `ID_MAPEL` varchar(6) NOT NULL,
  `ID_KELAS` varchar(8) NOT NULL,
  `ID_RUANGAN` varchar(6) NOT NULL,
  `ID_SESI` varchar(6) NOT NULL,
  `TANGGAL` date NOT NULL,
  `STATUS_JADWAL` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal_les`
--

INSERT INTO `jadwal_les` (`ID_JADWAL`, `ID_PEGAWAI`, `ID_MAPEL`, `ID_KELAS`, `ID_RUANGAN`, `ID_SESI`, `TANGGAL`, `STATUS_JADWAL`) VALUES
('JDWL001', 'iyus', 'MPL001', '9SMA-A', 'RK001', 'SES1', '2020-08-11', 1),
('JDWL002', 'iyus', 'MPL002', '9SMA-A', 'RK001', 'SES2', '2020-08-12', 1),
('JDWL003', 'iyus', 'MPL003', '10SMA-A', 'RK002', 'SES2', '2020-08-12', 1);

--
-- Trigger `jadwal_les`
--
DELIMITER $$
CREATE TRIGGER `auto_jadwal` BEFORE INSERT ON `jadwal_les` FOR EACH ROW BEGIN
DECLARE nr integer DEFAULT 0;

SELECT count(*) INTO @id from jadwal_les;
set new.id_jadwal=concat("JDWL",LPAD(@id+1,3,'0'));

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_ujian`
--

CREATE TABLE `jenis_ujian` (
  `ID_JENIS_UJIAN` varchar(8) NOT NULL,
  `NAMA_JENIS_UJIAN` varchar(20) NOT NULL,
  `STATUS_JENIS_UJIAN` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_ujian`
--

INSERT INTO `jenis_ujian` (`ID_JENIS_UJIAN`, `NAMA_JENIS_UJIAN`, `STATUS_JENIS_UJIAN`) VALUES
('UJI001', 'Try Out', 1),
('UJI002', 'Tugas', 1);

--
-- Trigger `jenis_ujian`
--
DELIMITER $$
CREATE TRIGGER `auto_ju` BEFORE INSERT ON `jenis_ujian` FOR EACH ROW BEGIN
DECLARE nr integer DEFAULT 0;

SELECT count(*) INTO @id from jenis_ujian;
set new.id_jenis_ujian=concat("UJI",LPAD(@id+1,3,'0'));

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenjang_kelas`
--

CREATE TABLE `jenjang_kelas` (
  `ID_JENJANG` varchar(6) NOT NULL,
  `NAMA_JENJANG` varchar(15) NOT NULL,
  `BIAYA` int(11) NOT NULL,
  `STATUS_JENJANG` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenjang_kelas`
--

INSERT INTO `jenjang_kelas` (`ID_JENJANG`, `NAMA_JENJANG`, `BIAYA`, `STATUS_JENJANG`) VALUES
('JNJ001', '9 SMP', 1000000, 1),
('JNJ002', '10 SMA', 1000000, 1),
('JNJ003', '11 SMA', 1000000, 1),
('JNJ004', '12 SMA', 1200000, 1);

--
-- Trigger `jenjang_kelas`
--
DELIMITER $$
CREATE TRIGGER `auto_jenjang` BEFORE INSERT ON `jenjang_kelas` FOR EACH ROW BEGIN
DECLARE nr integer DEFAULT 0;

SELECT count(*) INTO @id from jenjang_kelas;
set new.id_jenjang=concat("JNJ",LPAD(@id+1,3,'0'));

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `ID_KELAS` varchar(8) NOT NULL,
  `ID_JENJANG` varchar(6) NOT NULL,
  `NAMA_KELAS` varchar(10) NOT NULL,
  `STATUS_KELAS` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`ID_KELAS`, `ID_JENJANG`, `NAMA_KELAS`, `STATUS_KELAS`) VALUES
('10SMA-A', 'JNJ002', '10 SMA - A', 1),
('10SMA-B', 'JNJ002', '10 SMA - B', 1),
('11SMA-A', 'JNJ003', '11 SMA - A', 1),
('12SMA-A', 'JNJ004', '12 SMA - A', 1),
('12SMA-B', 'JNJ004', '12 SMA - B', 1),
('9SMA-A', 'JNJ001', '9 SMA - A', 1),
('9SMA-B', 'JNJ001', '9 SMA - B', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `ID_MAPEL` varchar(6) NOT NULL,
  `ID_PEGAWAI` varchar(12) DEFAULT NULL,
  `NAMA_MAPEL` varchar(25) NOT NULL,
  `STATUS_MAPEL` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`ID_MAPEL`, `ID_PEGAWAI`, `NAMA_MAPEL`, `STATUS_MAPEL`) VALUES
('MPL001', 'iyus', 'Matematika', 1),
('MPL002', 'iyus', 'Biologi', 1),
('MPL003', 'iyus', 'Kimia', 1),
('MPL004', 'iyus', 'Bahasa Indonesia', 1),
('MPL005', 'iyus', 'Bahasa Inggris', 1),
('MPL006', 'iyus', 'Ilmu Pengetahuan Alam', 1);

--
-- Trigger `mata_pelajaran`
--
DELIMITER $$
CREATE TRIGGER `auto_mapel` BEFORE INSERT ON `mata_pelajaran` FOR EACH ROW BEGIN
DECLARE nr integer DEFAULT 0;

SELECT count(*) INTO @id from mata_pelajaran;
set new.id_mapel=concat("MPL",LPAD(@id+1,3,'0'));

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_siswa`
--

CREATE TABLE `nilai_siswa` (
  `ID_NILAI` varchar(10) NOT NULL,
  `ID_PEGAWAI` varchar(12) NOT NULL,
  `ID_MAPEL` varchar(6) NOT NULL,
  `ID_JENIS_UJIAN` varchar(6) NOT NULL,
  `NOINDUK` varchar(13) NOT NULL,
  `ID_KELAS` varchar(8) NOT NULL,
  `TGL_PENILAIAN` date NOT NULL,
  `JUMLAH_NILAI` int(11) NOT NULL,
  `TOPIK_UJIAN` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai_siswa`
--

INSERT INTO `nilai_siswa` (`ID_NILAI`, `ID_PEGAWAI`, `ID_MAPEL`, `ID_JENIS_UJIAN`, `NOINDUK`, `ID_KELAS`, `TGL_PENILAIAN`, `JUMLAH_NILAI`, `TOPIK_UJIAN`) VALUES
('NIL001', 'iyus', 'MPL001', 'UJI001', '200809002', '10SMA-A', '2020-08-10', 80, 'Integral'),
('NIL002', 'iyus', 'MPL001', 'UJI001', '200809003', '10SMA-A', '2020-08-10', 90, 'Integral'),
('NIL003', 'iyus', 'MPL001', 'UJI002', '200809002', '10SMA-A', '2020-08-10', 75, 'Algoritma'),
('NIL004', 'iyus', 'MPL001', 'UJI002', '200809003', '10SMA-A', '2020-08-10', 90, 'Algoritma'),
('NIL005', 'iyus', 'MPL002', 'UJI001', '200809002', '10SMA-A', '2020-08-10', 75, 'Makhluk Hidup'),
('NIL006', 'iyus', 'MPL002', 'UJI001', '200809003', '10SMA-A', '2020-08-10', 75, 'Makhluk Hidup'),
('NIL007', 'iyus', 'MPL003', 'UJI002', '200809004', '10SMA-B', '2020-08-10', 80, 'Zat Terlarut');

--
-- Trigger `nilai_siswa`
--
DELIMITER $$
CREATE TRIGGER `auto_nilai` BEFORE INSERT ON `nilai_siswa` FOR EACH ROW BEGIN
DECLARE nr integer DEFAULT 0;

SELECT count(*) INTO @id from nilai_siswa;
set new.id_nilai=concat("NIL",LPAD(@id+1,3,'0'));

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `ID_PEGAWAI` varchar(12) NOT NULL,
  `ID_JABATAN` varchar(6) NOT NULL,
  `NAMA_PEGAWAI` varchar(30) NOT NULL,
  `ALAMAT_PEGAWAI` varchar(50) NOT NULL,
  `TGL_LAHIR_PEG` date NOT NULL,
  `JK_PEGAWAI` char(1) NOT NULL,
  `NOTELP_PEGAWAI` varchar(13) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PASSWORD_PEGAWAI` varchar(255) NOT NULL,
  `LEVEL` char(1) NOT NULL,
  `STATUS_PEGAWAI` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`ID_PEGAWAI`, `ID_JABATAN`, `NAMA_PEGAWAI`, `ALAMAT_PEGAWAI`, `TGL_LAHIR_PEG`, `JK_PEGAWAI`, `NOTELP_PEGAWAI`, `EMAIL`, `PASSWORD_PEGAWAI`, `LEVEL`, `STATUS_PEGAWAI`) VALUES
('Ilham', 'JAB001', 'Ilham Surya', 'gembong', '1999-04-26', 'L', '085850833635', 'ilham@gmail.com', 'b63d204bf086017e34d8bd27ab969f28', '1', 1),
('iyus', 'JAB002', 'Iyus M', 'gembong', '2020-04-18', 'L', '0851456713', 'tim@gmail.com', '7d0ea7482f842d31aadd256539493ab0', '2', 1),
('maulana', 'JAB003', 'Iyus Maulana Ishak', 'Sidotopo', '2020-04-11', 'L', '085555555', 'admin@gmail.com', 'aff4b352312d5569903d88e0e68d3fbb', '3', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangan`
--

CREATE TABLE `ruangan` (
  `ID_RUANGAN` varchar(6) NOT NULL,
  `NAMA_RUANGAN` varchar(15) NOT NULL,
  `STATUS_RUANGAN` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ruangan`
--

INSERT INTO `ruangan` (`ID_RUANGAN`, `NAMA_RUANGAN`, `STATUS_RUANGAN`) VALUES
('RK001', 'Ruangan 1', 1),
('RK002', 'Ruangan 2', 1),
('RK003', 'Ruangan 3', 1);

--
-- Trigger `ruangan`
--
DELIMITER $$
CREATE TRIGGER `auto_rk` BEFORE INSERT ON `ruangan` FOR EACH ROW BEGIN
DECLARE nr integer DEFAULT 0;

SELECT count(*) INTO @id from ruangan;
set new.id_ruangan=concat("RK",LPAD(@id+1,3,'0'));

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sesi`
--

CREATE TABLE `sesi` (
  `ID_SESI` varchar(6) NOT NULL,
  `NAMA_SESI` varchar(15) NOT NULL,
  `JAM_MULAI` time NOT NULL,
  `JAM_SELESAI` time NOT NULL,
  `STATUS_SESI` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sesi`
--

INSERT INTO `sesi` (`ID_SESI`, `NAMA_SESI`, `JAM_MULAI`, `JAM_SELESAI`, `STATUS_SESI`) VALUES
('SES1', 'Sesi Sore', '16:00:00', '19:00:00', 1),
('SES2', 'Sesi Malam', '19:00:00', '22:00:00', 1),
('SES3', 'Sesi Siang', '13:00:00', '16:00:00', 1);

--
-- Trigger `sesi`
--
DELIMITER $$
CREATE TRIGGER `auto_sesi` BEFORE INSERT ON `sesi` FOR EACH ROW BEGIN
DECLARE nr integer DEFAULT 0;

SELECT count(*) INTO @id from sesi;
set new.id_sesi=concat('SES',@id+1);

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `NOINDUK` varchar(15) NOT NULL,
  `ID_KELAS` varchar(8) NOT NULL,
  `NAMA_SISWA` varchar(30) NOT NULL,
  `ALAMAT_SISWA` varchar(50) NOT NULL,
  `TGL_LAHIR_SISWA` date NOT NULL,
  `NOTELP_ORTU_SISWA` varchar(13) NOT NULL,
  `NOTELP_SISWA` varchar(13) NOT NULL,
  `EMAIL_SISWA` varchar(30) NOT NULL,
  `ASAL_SEKOLAH` varchar(10) NOT NULL,
  `STATUS_SISWA` tinyint(1) NOT NULL,
  `PASSWORD_SISWA` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`NOINDUK`, `ID_KELAS`, `NAMA_SISWA`, `ALAMAT_SISWA`, `TGL_LAHIR_SISWA`, `NOTELP_ORTU_SISWA`, `NOTELP_SISWA`, `EMAIL_SISWA`, `ASAL_SEKOLAH`, `STATUS_SISWA`, `PASSWORD_SISWA`) VALUES
('200809001', '9SMA-A', 'Salsa', 'Surabaya', '2001-02-03', '087828333123', '08585081123', 'salsa@gmail.com', 'SMPN 9', 1, '0143c1e8e97da861c623ff508a441c54'),
('200809002', '10SMA-A', 'Ilham', 'Surabaya', '2001-02-26', '085850833635', '0851', 'ilham@gmail.com', 'SMAN 3', 1, 'b63d204bf086017e34d8bd27ab969f28'),
('200809003', '10SMA-A', 'Ziyad', 'Surabaya', '2000-02-03', '0878283', '0851', 'ziyad@gmail.com', 'SMAN 7', 1, 'ba750f7f6dfdebe0b57046605fb7a2a6'),
('200809004', '10SMA-B', 'Dion', 'Lamongan', '2000-02-03', '087828351', '087123', 'dion@gmail.com', 'SMAN 3', 1, '982c500a206551c665f746cc9e77a961'),
('200809005', '11SMA-A', 'Dody', 'Surabaya', '1999-08-10', '0857456', '0812344', 'dody@gmail.com', 'SMAN 7', 1, '6613c97ad4ade214711f08961d33373e'),
('200809006', '12SMA-A', 'Zidane', 'Sidoarjo', '1999-06-03', '087828333456', '081674', 'zidane@gmail.com', 'SMAN 1', 1, '7c50a2551b0ed04ca7a62cd6a0b6ddc1'),
('200809007', '12SMA-B', 'Hilmi', 'SIdoarjo', '1999-06-10', '089565', '087894', 'hilmi@gmail.com', 'SMAN 1', 1, '54befaa93e2d128272e23714eb37b6a7');

--
-- Trigger `siswa`
--
DELIMITER $$
CREATE TRIGGER `auto_nis` BEFORE INSERT ON `siswa` FOR EACH ROW BEGIN
DECLARE nr integer DEFAULT 0;

SELECT count(*) INTO @id from siswa;
set new.NOINDUK=concat(DATE_FORMAT(CURRENT_DATE, '%y%m%d'), LPAD(@id+1,3,'0'));

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `skala_nilai`
--

CREATE TABLE `skala_nilai` (
  `ID_SKALA` varchar(8) NOT NULL,
  `BATAS_ATAS` int(11) NOT NULL,
  `BATAS_BAWAH` int(11) NOT NULL,
  `GRADE` char(1) NOT NULL,
  `STATUS_SKALA` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `skala_nilai`
--

INSERT INTO `skala_nilai` (`ID_SKALA`, `BATAS_ATAS`, `BATAS_BAWAH`, `GRADE`, `STATUS_SKALA`) VALUES
('SKN1', 100, 76, 'A', 1),
('SKN2', 75, 65, 'B', 1);

--
-- Trigger `skala_nilai`
--
DELIMITER $$
CREATE TRIGGER `skala_auto` BEFORE INSERT ON `skala_nilai` FOR EACH ROW BEGIN
DECLARE nr integer DEFAULT 0;

SELECT count(*) INTO @id from skala_nilai;
set new.id_skala=concat('SKN',@id+1);

END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi_siswa`
--
ALTER TABLE `absensi_siswa`
  ADD PRIMARY KEY (`ID_ABSENSI`),
  ADD KEY `FK_BERDASARKAN1` (`ID_JADWAL`),
  ADD KEY `FK_DIABSEN` (`NOINDUK`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`ID_JABATAN`);

--
-- Indeks untuk tabel `jadwal_les`
--
ALTER TABLE `jadwal_les`
  ADD PRIMARY KEY (`ID_JADWAL`),
  ADD KEY `FK_BERISI` (`ID_MAPEL`),
  ADD KEY `FK_BERTEMPAT` (`ID_RUANGAN`),
  ADD KEY `FK_DILAKUKAN_PADA` (`ID_SESI`),
  ADD KEY `FK_MEMILIKI1` (`ID_KELAS`),
  ADD KEY `FK_MENGAJAR` (`ID_PEGAWAI`);

--
-- Indeks untuk tabel `jenis_ujian`
--
ALTER TABLE `jenis_ujian`
  ADD PRIMARY KEY (`ID_JENIS_UJIAN`);

--
-- Indeks untuk tabel `jenjang_kelas`
--
ALTER TABLE `jenjang_kelas`
  ADD PRIMARY KEY (`ID_JENJANG`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`ID_KELAS`),
  ADD KEY `FK_BERDASARKAN` (`ID_JENJANG`);

--
-- Indeks untuk tabel `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`ID_MAPEL`),
  ADD KEY `FK_MENGAJAR2` (`ID_PEGAWAI`);

--
-- Indeks untuk tabel `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  ADD PRIMARY KEY (`ID_NILAI`),
  ADD KEY `FK_MEMPUNYAI` (`ID_JENIS_UJIAN`),
  ADD KEY `FK_MENDAPAT` (`NOINDUK`),
  ADD KEY `FK_MENGISI` (`ID_PEGAWAI`),
  ADD KEY `FK_MENURUT` (`ID_KELAS`),
  ADD KEY `ID_MAPEL` (`ID_MAPEL`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`ID_PEGAWAI`),
  ADD KEY `FK_MEMILIKI` (`ID_JABATAN`);

--
-- Indeks untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`ID_RUANGAN`);

--
-- Indeks untuk tabel `sesi`
--
ALTER TABLE `sesi`
  ADD PRIMARY KEY (`ID_SESI`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`NOINDUK`),
  ADD KEY `FK_BERANGGOTAKAN` (`ID_KELAS`);

--
-- Indeks untuk tabel `skala_nilai`
--
ALTER TABLE `skala_nilai`
  ADD PRIMARY KEY (`ID_SKALA`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absensi_siswa`
--
ALTER TABLE `absensi_siswa`
  ADD CONSTRAINT `FK_BERDASARKAN1` FOREIGN KEY (`ID_JADWAL`) REFERENCES `jadwal_les` (`ID_JADWAL`),
  ADD CONSTRAINT `FK_DIABSEN` FOREIGN KEY (`NOINDUK`) REFERENCES `siswa` (`NOINDUK`);

--
-- Ketidakleluasaan untuk tabel `jadwal_les`
--
ALTER TABLE `jadwal_les`
  ADD CONSTRAINT `FK_BERISI` FOREIGN KEY (`ID_MAPEL`) REFERENCES `mata_pelajaran` (`ID_MAPEL`),
  ADD CONSTRAINT `FK_BERTEMPAT` FOREIGN KEY (`ID_RUANGAN`) REFERENCES `ruangan` (`ID_RUANGAN`),
  ADD CONSTRAINT `FK_DILAKUKAN_PADA` FOREIGN KEY (`ID_SESI`) REFERENCES `sesi` (`ID_SESI`),
  ADD CONSTRAINT `FK_MEMILIKI1` FOREIGN KEY (`ID_KELAS`) REFERENCES `kelas` (`ID_KELAS`),
  ADD CONSTRAINT `FK_MENGAJAR` FOREIGN KEY (`ID_PEGAWAI`) REFERENCES `pegawai` (`ID_PEGAWAI`);

--
-- Ketidakleluasaan untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `FK_BERDASARKAN` FOREIGN KEY (`ID_JENJANG`) REFERENCES `jenjang_kelas` (`ID_JENJANG`);

--
-- Ketidakleluasaan untuk tabel `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD CONSTRAINT `FK_MENGAJAR2` FOREIGN KEY (`ID_PEGAWAI`) REFERENCES `pegawai` (`ID_PEGAWAI`);

--
-- Ketidakleluasaan untuk tabel `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  ADD CONSTRAINT `FK_MEMPUNYAI` FOREIGN KEY (`ID_JENIS_UJIAN`) REFERENCES `jenis_ujian` (`ID_JENIS_UJIAN`),
  ADD CONSTRAINT `FK_MENDAPAT` FOREIGN KEY (`NOINDUK`) REFERENCES `siswa` (`NOINDUK`),
  ADD CONSTRAINT `FK_MENGISI` FOREIGN KEY (`ID_PEGAWAI`) REFERENCES `pegawai` (`ID_PEGAWAI`),
  ADD CONSTRAINT `FK_MENURUT` FOREIGN KEY (`ID_KELAS`) REFERENCES `kelas` (`ID_KELAS`),
  ADD CONSTRAINT `nilai_siswa_ibfk_1` FOREIGN KEY (`ID_MAPEL`) REFERENCES `mata_pelajaran` (`ID_MAPEL`);

--
-- Ketidakleluasaan untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `FK_MEMILIKI` FOREIGN KEY (`ID_JABATAN`) REFERENCES `jabatan` (`ID_JABATAN`);

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `FK_BERANGGOTAKAN` FOREIGN KEY (`ID_KELAS`) REFERENCES `kelas` (`ID_KELAS`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

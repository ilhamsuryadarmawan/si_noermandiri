-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Bulan Mei 2020 pada 23.14
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
  `TANGGAL_ABSEN` date NOT NULL,
  `MATERI` varchar(50) NOT NULL,
  `STATUS_ABSEN` varchar(2) NOT NULL,
  `KETERANGAN_ABSEN` varchar(50) NOT NULL,
  `TGL_ABSEN_DIBUAT` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `absensi_siswa`
--

INSERT INTO `absensi_siswa` (`ID_ABSENSI`, `NOINDUK`, `ID_JADWAL`, `TANGGAL_ABSEN`, `MATERI`, `STATUS_ABSEN`, `KETERANGAN_ABSEN`, `TGL_ABSEN_DIBUAT`) VALUES
('ABS001', '191220001', 'JDWL001', '2019-12-20', 'IPA', 'H', 'iya', '2019-12-20 00:00:00'),
('ABS002', '191220001', 'JDWL001', '2019-12-20', 'fjdkfd', 'H', 'dkjfkjf', '2019-12-20 04:54:24'),
('ABS003', '191220001', 'JDWL001', '2019-12-20', 'fjdkfd', 'A', 'dkjfkjf', '2019-12-20 04:58:38'),
('ABS004', '191220001', 'JDWL001', '2019-12-20', 'rr', 'H', 'rr', '2019-12-20 05:09:18'),
('ABS005', '191220001', 'JDWL001', '2019-12-20', 'AA', 'A', 'AA', '2019-12-20 05:15:41'),
('ABS006', '191220001', 'JDWL001', '2019-12-20', 'coba', 'A', 'coba', '2019-12-20 06:43:57'),
('ABS007', '191220001', 'JDWL001', '2019-12-20', 'coba', 'H', 'coba', '2019-12-20 06:44:08'),
('ABS008', '191220001', 'JDWL001', '2019-12-20', 'coba2', 'H', 'coba2', '2019-12-20 06:46:20'),
('ABS009', '191220002', 'JDWL001', '2019-12-20', 'coba2', 'H', 'coba2', '2019-12-20 06:46:20'),
('ABS010', '191220003', 'JDWL001', '2019-12-20', 'coba2', 'H', 'coba2', '2019-12-20 06:46:21'),
('ABS011', '191220001', 'JDWL001', '2019-12-20', 'coba2', 'A', 'coba2', '2019-12-20 06:46:40'),
('ABS012', '191220002', 'JDWL001', '2019-12-20', 'coba2', 'H', 'coba2', '2019-12-20 06:46:40'),
('ABS013', '191220003', 'JDWL001', '2019-12-20', 'coba2', 'H', 'coba2', '2019-12-20 06:46:41'),
('ABS014', '191220001', 'JDWL001', '2019-12-20', 'coba coba', 'H', 'coba coba', '2019-12-20 07:47:30'),
('ABS015', '191220002', 'JDWL001', '2019-12-20', 'coba coba', 'A', 'coba coba', '2019-12-20 07:47:30'),
('ABS016', '191220003', 'JDWL001', '2019-12-20', 'coba coba', 'H', 'coba coba', '2019-12-20 07:47:30'),
('ABS017', '191220001', 'JDWL001', '2019-12-20', 'coba coba', 'H', 'coba coba', '2019-12-20 07:47:57'),
('ABS018', '191220002', 'JDWL001', '2019-12-20', 'coba coba', 'H', 'coba coba', '2019-12-20 07:47:57'),
('ABS019', '191220003', 'JDWL001', '2019-12-20', 'coba coba', 'H', 'coba coba', '2019-12-20 07:47:57'),
('ABS020', '191220001', 'JDWL001', '2020-01-02', 'hgjhg', 'H', 'nn,mn', '2020-01-02 07:39:59'),
('ABS021', '191220002', 'JDWL001', '2020-01-02', 'hgjhg', 'H', 'nn,mn', '2020-01-02 07:40:00'),
('ABS022', '191220003', 'JDWL001', '2020-01-02', 'hgjhg', 'H', 'nn,mn', '2020-01-02 07:40:00'),
('ABS023', '191220001', 'JDWL001', '2020-05-07', 'aaa', 'H', 'aaaa', '2020-05-07 19:51:50'),
('ABS024', '191220002', 'JDWL001', '2020-05-07', 'aaa', 'H', 'aaaa', '2020-05-07 19:51:50'),
('ABS025', '191220003', 'JDWL001', '2020-05-07', 'aaa', 'H', 'aaaa', '2020-05-07 19:51:51'),
('ABS026', '191220001', 'JDWL001', '2020-05-07', 'aaa', 'H', 'aaaa', '2020-05-07 19:51:53'),
('ABS027', '191220002', 'JDWL001', '2020-05-07', 'aaa', 'H', 'aaaa', '2020-05-07 19:51:53'),
('ABS028', '191220003', 'JDWL001', '2020-05-07', 'aaa', 'H', 'aaaa', '2020-05-07 19:51:53'),
('ABS029', '191220001', 'JDWL001', '2020-05-07', 'aaa', 'H', 'aaaa', '2020-05-07 19:51:58'),
('ABS030', '191220002', 'JDWL001', '2020-05-07', 'aaa', 'H', 'aaaa', '2020-05-07 19:51:58'),
('ABS031', '191220003', 'JDWL001', '2020-05-07', 'aaa', 'H', 'aaaa', '2020-05-07 19:51:58'),
('ABS032', '191220001', 'JDWL001', '2020-05-07', 'aaa', 'H', 'aaaa', '2020-05-07 19:52:33'),
('ABS033', '191220002', 'JDWL001', '2020-05-07', 'aaa', 'H', 'aaaa', '2020-05-07 19:52:33'),
('ABS034', '191220003', 'JDWL001', '2020-05-07', 'aaa', 'A', 'aaaa', '2020-05-07 19:52:33'),
('ABS035', '191220001', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:04:14'),
('ABS036', '191220002', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:04:14'),
('ABS037', '191220003', 'JDWL001', '2020-05-08', '', 'A', '', '2020-05-08 00:04:14'),
('ABS038', '191220001', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:05:06'),
('ABS039', '191220002', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:05:06'),
('ABS040', '191220003', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:05:06'),
('ABS041', '191220001', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:09:14'),
('ABS042', '191220002', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:09:14'),
('ABS043', '191220003', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:09:14'),
('ABS044', '191220001', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:10:36'),
('ABS045', '191220002', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:10:36'),
('ABS046', '191220003', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:10:36'),
('ABS047', '191220001', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:11:02'),
('ABS048', '191220002', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:11:02'),
('ABS049', '191220003', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:11:02'),
('ABS050', '191220001', 'JDWL001', '2020-05-08', 'a', 'H', '', '2020-05-08 00:12:13'),
('ABS051', '191220002', 'JDWL001', '2020-05-08', 'a', 'H', '', '2020-05-08 00:12:13'),
('ABS052', '191220003', 'JDWL001', '2020-05-08', 'a', 'H', '', '2020-05-08 00:12:13'),
('ABS053', '191220001', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:12:41'),
('ABS054', '191220002', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:12:42'),
('ABS055', '191220003', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:12:42'),
('ABS056', '191220001', 'JDWL001', '2020-05-08', 'b', 'H', '', '2020-05-08 00:14:17'),
('ABS057', '191220002', 'JDWL001', '2020-05-08', 'b', 'H', '', '2020-05-08 00:14:17'),
('ABS058', '191220003', 'JDWL001', '2020-05-08', 'b', 'H', '', '2020-05-08 00:14:18'),
('ABS059', '191220001', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:14:50'),
('ABS060', '191220002', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:14:50'),
('ABS061', '191220003', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:14:50'),
('ABS062', '191220001', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:15:24'),
('ABS063', '191220002', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:15:24'),
('ABS064', '191220003', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:15:24'),
('ABS065', '191220001', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:16:07'),
('ABS066', '191220002', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:16:07'),
('ABS067', '191220003', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:16:07'),
('ABS068', '191220001', 'JDWL001', '2020-05-08', 'c', 'H', '', '2020-05-08 00:17:35'),
('ABS069', '191220002', 'JDWL001', '2020-05-08', 'c', 'H', '', '2020-05-08 00:17:35'),
('ABS070', '191220003', 'JDWL001', '2020-05-08', 'c', 'H', '', '2020-05-08 00:17:35'),
('ABS071', '191220001', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:21:29'),
('ABS072', '191220002', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:21:29'),
('ABS073', '191220003', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:21:29'),
('ABS074', '191220001', 'JDWL001', '2020-05-08', 'abc', 'H', 'abc', '2020-05-08 00:21:40'),
('ABS075', '191220002', 'JDWL001', '2020-05-08', 'abc', 'H', 'abc', '2020-05-08 00:21:40'),
('ABS076', '191220003', 'JDWL001', '2020-05-08', 'abc', 'H', 'abc', '2020-05-08 00:21:40'),
('ABS077', '191220001', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:22:14'),
('ABS078', '191220002', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:22:14'),
('ABS079', '191220003', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:22:14'),
('ABS080', '191220001', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:22:20'),
('ABS081', '191220002', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:22:21'),
('ABS082', '191220003', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:22:21'),
('ABS083', '191220001', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:27:22'),
('ABS084', '191220002', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:27:22'),
('ABS085', '191220003', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:27:22'),
('ABS086', '191220001', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:29:55'),
('ABS087', '191220002', 'JDWL001', '2020-05-08', '', 'A', '', '2020-05-08 00:29:55'),
('ABS088', '191220003', 'JDWL001', '2020-05-08', '', 'A', '', '2020-05-08 00:29:55'),
('ABS089', '191220001', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:31:04'),
('ABS090', '191220002', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:31:04'),
('ABS091', '191220003', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:31:04'),
('ABS092', '191220001', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:31:21'),
('ABS093', '191220002', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:31:21'),
('ABS094', '191220003', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:31:21'),
('ABS095', '191220001', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:36:20'),
('ABS096', '191220002', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:36:20'),
('ABS097', '191220003', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:36:21'),
('ABS098', '191220001', 'JDWL001', '2020-05-08', 'ac', 'H', 'ac', '2020-05-08 00:36:42'),
('ABS099', '191220002', 'JDWL001', '2020-05-08', 'ac', 'H', 'ac', '2020-05-08 00:36:42'),
('ABS100', '191220003', 'JDWL001', '2020-05-08', 'ac', 'H', 'ac', '2020-05-08 00:36:43'),
('ABS101', '191220001', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:45:40'),
('ABS102', '191220001', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:46:58'),
('ABS103', '191220002', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:46:58'),
('ABS104', '191220003', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:46:58'),
('ABS105', '191220001', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:47:09'),
('ABS106', '191220002', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:47:09'),
('ABS107', '191220003', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:47:09'),
('ABS108', '191220001', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:47:34'),
('ABS109', '191220002', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:47:34'),
('ABS110', '191220003', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:47:34'),
('ABS111', '191220001', 'JDWL001', '2020-05-08', 'bc', 'H', '', '2020-05-08 00:47:43'),
('ABS112', '191220002', 'JDWL001', '2020-05-08', 'bc', 'H', '', '2020-05-08 00:47:43'),
('ABS113', '191220003', 'JDWL001', '2020-05-08', 'bc', 'H', '', '2020-05-08 00:47:43'),
('ABS114', '191220001', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:48:56'),
('ABS115', '191220002', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:48:56'),
('ABS116', '191220003', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:48:56'),
('ABS117', '191220001', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:49:56'),
('ABS118', '191220002', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:49:56'),
('ABS119', '191220003', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:49:56'),
('ABS120', '191220001', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:50:13'),
('ABS121', '191220002', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:50:13'),
('ABS122', '191220003', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:50:13'),
('ABS123', '191220001', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:52:08'),
('ABS124', '191220002', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:52:08'),
('ABS125', '191220003', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:52:09'),
('ABS126', '191220001', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:52:12'),
('ABS127', '191220002', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:52:12'),
('ABS128', '191220003', 'JDWL001', '2020-05-08', '', 'H', '', '2020-05-08 00:52:12'),
('ABS129', '191220001', 'JDWL001', '2020-05-08', 'cc', 'H', 'cc', '2020-05-08 00:52:38'),
('ABS130', '191220002', 'JDWL001', '2020-05-08', 'cc', 'H', 'cc', '2020-05-08 00:52:39'),
('ABS131', '191220003', 'JDWL001', '2020-05-08', 'cc', 'H', 'cc', '2020-05-08 00:52:39');

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
  `JABATAN` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`ID_JABATAN`, `JABATAN`) VALUES
('JAB001', 'Admin'),
('JAB002', 'Pengajar'),
('JAB003', 'Pemilik'),
('JAB004', 'coba'),
('JAB005', 'Tentor'),
('JAB006', 'Tentor'),
('JAB007', 'coba lagi'),
('JAB008', 'tes lagi');

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
  `TANGGAL` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `NAMA_JENIS_UJIAN` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_ujian`
--

INSERT INTO `jenis_ujian` (`ID_JENIS_UJIAN`, `NAMA_JENIS_UJIAN`) VALUES
('UJI001', 'Try Out');

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
  `BIAYA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenjang_kelas`
--

INSERT INTO `jenjang_kelas` (`ID_JENJANG`, `NAMA_JENJANG`, `BIAYA`) VALUES
('JNJ001', '9 SMA', 1000000),
('JNJ002', '10 SMA', 1000000),
('JNJ003', '11 SMA', 1000000),
('JNJ004', '12 SMA', 1200000),
('JNJ005', '7 SMA', 1000000);

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
  `NAMA_KELAS` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`ID_KELAS`, `ID_JENJANG`, `NAMA_KELAS`) VALUES
('10 SMA A', 'JNJ002', '10 SMA - A'),
('10 SMA B', 'JNJ002', '10 SMA - B'),
('10SMAC', 'JNJ002', '10 SMA C'),
('11 SMA A', 'JNJ003', '11 SMA - A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `ID_MAPEL` varchar(6) NOT NULL,
  `ID_PEGAWAI` varchar(12) DEFAULT NULL,
  `NAMA_MAPEL` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`ID_MAPEL`, `ID_PEGAWAI`, `NAMA_MAPEL`) VALUES
('MPL001', 'Ilham', 'Biologi'),
('MPL002', NULL, 'coba'),
('MPL003', NULL, 'coba2'),
('MPL004', NULL, 'coba3'),
('MPL005', NULL, 'Matematika'),
('MPL006', NULL, 'tes'),
('MPL007', NULL, 'tes lagi'),
('MPL008', NULL, 'tes 2'),
('MPL009', NULL, 'tes lagi');

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
  `ID_JENIS_UJIAN` varchar(6) NOT NULL,
  `NOINDUK` varchar(13) NOT NULL,
  `ID_KELAS` varchar(6) NOT NULL,
  `TGL_PENILAIAN` date NOT NULL,
  `JUMLAH_NILAI` int(11) NOT NULL,
  `SKALA_NILAI` varchar(2) NOT NULL,
  `KETERANGAN_NILAI` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `JK_PEGAWAI` varchar(1) NOT NULL,
  `NOTELP_PEGAWAI` varchar(13) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PASSWORD_PEGAWAI` varchar(255) NOT NULL,
  `STATUS_PEGAWAI` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`ID_PEGAWAI`, `ID_JABATAN`, `NAMA_PEGAWAI`, `ALAMAT_PEGAWAI`, `TGL_LAHIR_PEG`, `JK_PEGAWAI`, `NOTELP_PEGAWAI`, `EMAIL`, `PASSWORD_PEGAWAI`, `STATUS_PEGAWAI`) VALUES
('Ilham', 'JAB001', 'Ilham Surya', 'gembong', '1999-04-26', '', '085850833635', 'ilham@gmail.com', 'b63d204bf086017e34d8bd27ab969f28', 1),
('peg01', 'JAB002', 'iqbal', 'gembong', '2020-04-18', 'L', '0851456713', 'tim@gmail.com', '2863005f57e419296e6f523aef6a382c', 1),
('peg1', 'JAB001', 'ilham', 'gembong', '2020-04-11', 'L', '085555555', 'admin@gmail.com', '2562960f1ccf1dc872c3ff27e1b2914f', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangan`
--

CREATE TABLE `ruangan` (
  `ID_RUANGAN` varchar(6) NOT NULL,
  `NAMA_RUANGAN` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ruangan`
--

INSERT INTO `ruangan` (`ID_RUANGAN`, `NAMA_RUANGAN`) VALUES
('RK001', 'Ruangan 1'),
('RK002', 'ruangan 2'),
('RK003', 'Ruangan 3'),
('RK004', 'Ruangan 4');

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
  `JAM_MULAI` time NOT NULL,
  `JAM_SELESAI` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sesi`
--

INSERT INTO `sesi` (`ID_SESI`, `JAM_MULAI`, `JAM_SELESAI`) VALUES
('SES2', '16:00:00', '18:30:00'),
('SES3', '19:00:00', '22:00:00');

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
('191220001', '10 SMA A', 'Dody Pramana', 'Simokerto', '1998-12-02', '0818111345', '0833321245', 'dody@gmail.com', 'SMAN 7', 1, '6613c97ad4ade214711f08961d33373e'),
('191220002', '10 SMA A', 'Dion Satryo', 'Lamongan', '1998-02-03', '0878283', '082098901', 'dion@gmail.com', 'SMAN 3', 1, '982c500a206551c665f746cc9e77a961'),
('191220003', '10 SMA A', 'Iqbal Faizi', 'Benowo', '1998-02-03', '0878283', '908098727', 'iqbal@gmail.com', 'SMAN 3', 1, 'eedae20fc3c7a6e9c5b1102098771c70');

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
  ADD KEY `FK_MENURUT` (`ID_KELAS`);

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
  ADD CONSTRAINT `FK_MENURUT` FOREIGN KEY (`ID_KELAS`) REFERENCES `kelas` (`ID_KELAS`);

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

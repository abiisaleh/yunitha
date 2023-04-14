-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2023 at 08:26 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yunita`
--

-- --------------------------------------------------------

--
-- Table structure for table `darah_masuk`
--

CREATE TABLE `darah_masuk` (
  `id_darah_masuk` int(5) UNSIGNED NOT NULL,
  `tgl_masuk` datetime NOT NULL,
  `no_selang` varchar(5) NOT NULL,
  `tempat_donor` varchar(50) NOT NULL,
  `jumlah_kolf` int(5) NOT NULL,
  `donor_ke` int(3) NOT NULL,
  `fk_pendonor` int(5) NOT NULL,
  `fk_gol_darah` int(5) NOT NULL,
  `fk_jenis_darah` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gol_darah`
--

CREATE TABLE `gol_darah` (
  `id_gol_darah` int(5) UNSIGNED NOT NULL,
  `nama` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gol_darah`
--

INSERT INTO `gol_darah` (`id_gol_darah`, `nama`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'AB'),
(4, 'O');

-- --------------------------------------------------------

--
-- Table structure for table `jat_kegiatan`
--

CREATE TABLE `jat_kegiatan` (
  `id_jat_kegiatan` int(5) UNSIGNED NOT NULL,
  `tmpt_keg` varchar(50) NOT NULL,
  `tgl_keg` datetime NOT NULL,
  `lokasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_darah`
--

CREATE TABLE `jenis_darah` (
  `id_jenis_darah` int(5) UNSIGNED NOT NULL,
  `nama` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kelamin`
--

CREATE TABLE `jenis_kelamin` (
  `id_jenis_kelamin` int(5) UNSIGNED NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jenis_kelamin`
--

INSERT INTO `jenis_kelamin` (`id_jenis_kelamin`, `nama`) VALUES
(1, 'laki-laki'),
(2, 'perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2023-04-13-055419', 'App\\Database\\Migrations\\RiwayatDonor', 'default', 'App', 1681369466, 1),
(2, '2023-04-13-060443', 'App\\Database\\Migrations\\Peserta', 'default', 'App', 1681369466, 1),
(3, '2023-04-13-060452', 'App\\Database\\Migrations\\RumahSakit', 'default', 'App', 1681369466, 1),
(23, '2023-04-13-060722', 'App\\Database\\Migrations\\JatKegiatan', 'default', 'App', 1681400838, 2),
(24, '2023-04-13-060746', 'App\\Database\\Migrations\\Pemetaan', 'default', 'App', 1681400838, 2),
(25, '2023-04-13-060803', 'App\\Database\\Migrations\\PenggunaanDarah', 'default', 'App', 1681400838, 2),
(26, '2023-04-13-060859', 'App\\Database\\Migrations\\GolDarah', 'default', 'App', 1681400838, 2),
(27, '2023-04-13-060905', 'App\\Database\\Migrations\\JenisKelamin', 'default', 'App', 1681400839, 2),
(28, '2023-04-13-060916', 'App\\Database\\Migrations\\Pekerjaan', 'default', 'App', 1681400839, 2),
(29, '2023-04-13-060927', 'App\\Database\\Migrations\\Pendonor', 'default', 'App', 1681400839, 2),
(30, '2023-04-13-060941', 'App\\Database\\Migrations\\DarahMasuk', 'default', 'App', 1681400839, 2),
(31, '2023-04-13-061001', 'App\\Database\\Migrations\\StokDarah', 'default', 'App', 1681400839, 2),
(32, '2023-04-13-064732', 'App\\Database\\Migrations\\JenisDarah', 'default', 'App', 1681400839, 2),
(33, '2023-04-13-071015', 'App\\Database\\Migrations\\Relasi', 'default', 'App', 1681400839, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id_pekerjaan` int(5) UNSIGNED NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pemetaan`
--

CREATE TABLE `pemetaan` (
  `id_pemetaan` int(5) UNSIGNED NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `waktu_donor_kembali` datetime NOT NULL,
  `fk_id_pendonor` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pendonor`
--

CREATE TABLE `pendonor` (
  `id_pendonor` int(5) UNSIGNED NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `fk_gol_darah` int(5) NOT NULL,
  `fk_jenis_kelamin` int(5) NOT NULL,
  `fk_pekerjaan` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `penggunaan_darah`
--

CREATE TABLE `penggunaan_darah` (
  `id_penggunaan_darah` int(5) UNSIGNED NOT NULL,
  `tanggal` datetime NOT NULL,
  `fk_peserta` int(5) NOT NULL,
  `fk_rumah_sakit` int(5) NOT NULL,
  `fk_jenis_darah` int(5) NOT NULL,
  `fk_gol_darah` int(5) NOT NULL,
  `jumlah_kolf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id_peserta` int(5) UNSIGNED NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_donor`
--

CREATE TABLE `riwayat_donor` (
  `id_riwayat_donor` int(5) UNSIGNED NOT NULL,
  `tgl_terakhir_donor` datetime NOT NULL,
  `waktu_donor_kembali` datetime DEFAULT NULL,
  `tempat_donor` varchar(50) NOT NULL,
  `jumlah_kolf` int(5) NOT NULL,
  `donor_ke` int(5) NOT NULL,
  `fk_pendonor` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rumah_sakit`
--

CREATE TABLE `rumah_sakit` (
  `id_rumah_sakit` int(5) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stok_darah`
--

CREATE TABLE `stok_darah` (
  `id_stok_darah` int(5) UNSIGNED NOT NULL,
  `jumlah_kolf` varchar(100) NOT NULL,
  `fk_gol_darah` int(5) NOT NULL,
  `fk_jenis_darah` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stok_darah`
--

INSERT INTO `stok_darah` (`id_stok_darah`, `jumlah_kolf`, `fk_gol_darah`, `fk_jenis_darah`) VALUES
(1, '20', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `darah_masuk`
--
ALTER TABLE `darah_masuk`
  ADD PRIMARY KEY (`id_darah_masuk`);

--
-- Indexes for table `gol_darah`
--
ALTER TABLE `gol_darah`
  ADD PRIMARY KEY (`id_gol_darah`);

--
-- Indexes for table `jat_kegiatan`
--
ALTER TABLE `jat_kegiatan`
  ADD PRIMARY KEY (`id_jat_kegiatan`);

--
-- Indexes for table `jenis_darah`
--
ALTER TABLE `jenis_darah`
  ADD PRIMARY KEY (`id_jenis_darah`);

--
-- Indexes for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  ADD PRIMARY KEY (`id_jenis_kelamin`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indexes for table `pemetaan`
--
ALTER TABLE `pemetaan`
  ADD PRIMARY KEY (`id_pemetaan`);

--
-- Indexes for table `pendonor`
--
ALTER TABLE `pendonor`
  ADD PRIMARY KEY (`id_pendonor`);

--
-- Indexes for table `penggunaan_darah`
--
ALTER TABLE `penggunaan_darah`
  ADD PRIMARY KEY (`id_penggunaan_darah`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id_peserta`);

--
-- Indexes for table `riwayat_donor`
--
ALTER TABLE `riwayat_donor`
  ADD PRIMARY KEY (`id_riwayat_donor`);

--
-- Indexes for table `rumah_sakit`
--
ALTER TABLE `rumah_sakit`
  ADD PRIMARY KEY (`id_rumah_sakit`);

--
-- Indexes for table `stok_darah`
--
ALTER TABLE `stok_darah`
  ADD PRIMARY KEY (`id_stok_darah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `darah_masuk`
--
ALTER TABLE `darah_masuk`
  MODIFY `id_darah_masuk` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gol_darah`
--
ALTER TABLE `gol_darah`
  MODIFY `id_gol_darah` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jat_kegiatan`
--
ALTER TABLE `jat_kegiatan`
  MODIFY `id_jat_kegiatan` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_darah`
--
ALTER TABLE `jenis_darah`
  MODIFY `id_jenis_darah` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  MODIFY `id_jenis_kelamin` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id_pekerjaan` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemetaan`
--
ALTER TABLE `pemetaan`
  MODIFY `id_pemetaan` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pendonor`
--
ALTER TABLE `pendonor`
  MODIFY `id_pendonor` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penggunaan_darah`
--
ALTER TABLE `penggunaan_darah`
  MODIFY `id_penggunaan_darah` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id_peserta` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `riwayat_donor`
--
ALTER TABLE `riwayat_donor`
  MODIFY `id_riwayat_donor` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rumah_sakit`
--
ALTER TABLE `rumah_sakit`
  MODIFY `id_rumah_sakit` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stok_darah`
--
ALTER TABLE `stok_darah`
  MODIFY `id_stok_darah` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

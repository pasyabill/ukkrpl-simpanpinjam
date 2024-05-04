-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 04, 2024 at 02:15 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simpan_pinjam`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

DROP TABLE IF EXISTS `anggota`;
CREATE TABLE IF NOT EXISTS `anggota` (
  `id_anggota` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_lhr` date NOT NULL,
  `tmp_lhr` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `j_kel` enum('laki-laki','perempuan') COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `no_tlp` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `ket` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_anggota`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama`, `alamat`, `tgl_lhr`, `tmp_lhr`, `j_kel`, `status`, `no_tlp`, `ket`, `password`) VALUES
('6634ade8b7e03', 'handik', 'tampingan', '2002-12-12', 'Magelang', 'laki-laki', 'menikah', '088216072167', 'asdasd', '$2y$10$n.GO5VzDRNw0VsdN2ePHu.tIGAzThHfK/GJ1idHAamrCLh/w.v95W'),
('6634b9974f884', 'handika', 'tampingan', '2002-12-22', 'Magelang', 'laki-laki', 'menikah', '088216072167', 'HHH', '$2y$10$qfb4POnsIM9ft7/toK0if.FiEJHQ155bhYZgNSsFTxUfvNqPQcdde');

-- --------------------------------------------------------

--
-- Table structure for table `angsuran`
--

DROP TABLE IF EXISTS `angsuran`;
CREATE TABLE IF NOT EXISTS `angsuran` (
  `id_angsuran` int NOT NULL AUTO_INCREMENT,
  `id_kategori` int NOT NULL,
  `id_anggota` int NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `angsuran_ke` int NOT NULL,
  `besar_angsuran` int NOT NULL,
  `ket` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_angsuran`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_angsuran`
--

DROP TABLE IF EXISTS `detail_angsuran`;
CREATE TABLE IF NOT EXISTS `detail_angsuran` (
  `id_angsuran` int NOT NULL AUTO_INCREMENT,
  `tgl_jatuh_tempo` date NOT NULL,
  `besar_angsuran` int NOT NULL,
  `ket` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_angsuran`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_pinjaman`
--

DROP TABLE IF EXISTS `kategori_pinjaman`;
CREATE TABLE IF NOT EXISTS `kategori_pinjaman` (
  `id_kategori_pinjaman` int NOT NULL AUTO_INCREMENT,
  `nama_pinjaman` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_kategori_pinjaman`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `petugas_koperasi`
--

DROP TABLE IF EXISTS `petugas_koperasi`;
CREATE TABLE IF NOT EXISTS `petugas_koperasi` (
  `id_petugas` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `no_tlp` int NOT NULL,
  `tmp_lhr` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_lhr` date NOT NULL,
  `ket` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_petugas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
--

DROP TABLE IF EXISTS `pinjaman`;
CREATE TABLE IF NOT EXISTS `pinjaman` (
  `id_pinjaman` int NOT NULL AUTO_INCREMENT,
  `nama_pinjaman` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_anggota` int NOT NULL,
  `besar_pinjaman` int NOT NULL,
  `tgl_pengajuan_pinjaman` date NOT NULL,
  `tgl_acc_peminjaman` date NOT NULL,
  `tgl_pinjaman` date NOT NULL,
  `tgl_pelunasan` date NOT NULL,
  `id_angsuran` int NOT NULL,
  `ket` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_pinjaman`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `simpanan`
--

DROP TABLE IF EXISTS `simpanan`;
CREATE TABLE IF NOT EXISTS `simpanan` (
  `id_simpanan` int NOT NULL AUTO_INCREMENT,
  `nm_simpanan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_anggota` int NOT NULL,
  `tgl_simpanan` date NOT NULL,
  `besar_simpanan` int NOT NULL,
  `ket` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_simpanan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 11, 2024 at 04:13 PM
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
('6634b9974f884', 'handika', 'tampingan', '2002-12-22', 'Magelang', 'laki-laki', 'menikah', '088216072167', 'HHH', '$2y$10$qfb4POnsIM9ft7/toK0if.FiEJHQ155bhYZgNSsFTxUfvNqPQcdde'),
('663887c3624c8', 'kurdinsalto', 'tegalrejo', '2024-05-30', 'Magelang', 'perempuan', 'menikah', '088216072167', '1231', '$2y$10$RnF3KZQlGyqyB1jm29eNQus0wWsAi95DEsReYjhg/zOzAHGRLnGV2');

-- --------------------------------------------------------

--
-- Table structure for table `angsuran`
--

DROP TABLE IF EXISTS `angsuran`;
CREATE TABLE IF NOT EXISTS `angsuran` (
  `id_angsuran` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_kategori` int NOT NULL,
  `id_anggota` int NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `angsuran_ke` int NOT NULL,
  `besar_angsuran` int NOT NULL,
  `ket` enum('belum','lunas') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'belum',
  PRIMARY KEY (`id_angsuran`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `angsuran`
--

INSERT INTO `angsuran` (`id_angsuran`, `id_kategori`, `id_anggota`, `tgl_pembayaran`, `angsuran_ke`, `besar_angsuran`, `ket`) VALUES
('', 0, 0, '0000-00-00', 1, 0, 'belum'),
('663e430d0eb47', 1, 6634, '0000-00-00', 1, 0, 'belum'),
('663f84236474a', 1, 6634, '0000-00-00', 1, 0, 'belum'),
('663f8444e2a07', 1, 6634, '0000-00-00', 1, 0, 'belum'),
('663f8b12d0bb4', 1, 6634, '0000-00-00', 1, 0, 'belum'),
('663f8b12d0bb5', 1, 6634, '0000-00-00', 2, 0, 'belum'),
('663f8b12d0bb6', 1, 6634, '0000-00-00', 3, 0, 'belum'),
('663f8b12d0bb7', 1, 6634, '0000-00-00', 4, 0, 'belum'),
('663f938f59025', 2, 6634, '0000-00-00', 1, 0, 'belum'),
('663f942b4db2b', 2, 6634, '0000-00-00', 1, 0, 'belum'),
('663f942b4db2d', 2, 6634, '0000-00-00', 2, 0, 'belum'),
('663f942b4db2e', 2, 6634, '0000-00-00', 3, 0, 'belum'),
('663f942b4db2f', 2, 6634, '0000-00-00', 4, 0, 'belum'),
('663f942b4db30', 2, 6634, '0000-00-00', 5, 0, 'belum'),
('663f942b4db31', 2, 6634, '0000-00-00', 6, 0, 'belum'),
('663f942b4db32', 2, 6634, '0000-00-00', 7, 0, 'belum'),
('663f942b4db33', 2, 6634, '0000-00-00', 8, 0, 'belum');

-- --------------------------------------------------------

--
-- Table structure for table `detail_angsuran`
--

DROP TABLE IF EXISTS `detail_angsuran`;
CREATE TABLE IF NOT EXISTS `detail_angsuran` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_angsuran` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_jatuh_tempo` date NOT NULL,
  `besar_angsuran` int NOT NULL,
  `ket` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_angsuran`
--

INSERT INTO `detail_angsuran` (`id`, `id_angsuran`, `tgl_jatuh_tempo`, `besar_angsuran`, `ket`) VALUES
(65, '663e430d0eb47', '2024-06-11', 550000, ''),
(66, '', '2024-06-11', 0, ''),
(67, '663f8b12d0bb4', '2024-06-11', 412500, ''),
(68, '663f8b12d0bb5', '2024-07-11', 412500, ''),
(69, '663f8b12d0bb6', '2024-08-11', 412500, ''),
(70, '663f8b12d0bb7', '2024-09-11', 412500, ''),
(71, '663f8444e2a07', '2024-06-11', 2200000, ''),
(72, '663f942b4db2b', '2024-06-11', 137500, ''),
(73, '663f942b4db2d', '2024-07-11', 137500, ''),
(74, '663f942b4db2e', '2024-08-11', 137500, ''),
(75, '663f942b4db2f', '2024-09-11', 137500, ''),
(76, '663f942b4db30', '2024-10-11', 137500, ''),
(77, '663f942b4db31', '2024-11-11', 137500, ''),
(78, '663f942b4db32', '2024-12-11', 137500, ''),
(79, '663f942b4db33', '2025-01-11', 137500, ''),
(80, '663f938f59025', '2024-06-11', 550000, ''),
(81, '663f84236474a', '2024-06-11', 550000, '');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_pinjaman`
--

DROP TABLE IF EXISTS `kategori_pinjaman`;
CREATE TABLE IF NOT EXISTS `kategori_pinjaman` (
  `id_kategori_pinjaman` int NOT NULL AUTO_INCREMENT,
  `nama_pinjaman` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_kategori_pinjaman`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_pinjaman`
--

INSERT INTO `kategori_pinjaman` (`id_kategori_pinjaman`, `nama_pinjaman`) VALUES
(1, 'pelajar'),
(2, 'keluarga'),
(3, 'bisnis');

-- --------------------------------------------------------

--
-- Table structure for table `petugas_koperasi`
--

DROP TABLE IF EXISTS `petugas_koperasi`;
CREATE TABLE IF NOT EXISTS `petugas_koperasi` (
  `id_petugas` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `no_tlp` int NOT NULL,
  `tmp_lhr` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_lhr` date NOT NULL,
  `ket` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_petugas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petugas_koperasi`
--

INSERT INTO `petugas_koperasi` (`id_petugas`, `nama`, `alamat`, `no_tlp`, `tmp_lhr`, `tgl_lhr`, `ket`, `password`) VALUES
('6639a50deaacb', 'Handika', 'tampingan', 4555, 'Magelang', '0000-00-00', 'dasdasd', '$2y$10$yAt46Kudo.hFZDFsE5RTx.PIKE/qI4TCpkIF.oOdoPuBI92DCsm4S'),
('6639d5e860505', 'pasyakopral', 'baawng', 1222, 'Magelang', '0000-00-00', 'dasdasd', '$2y$10$CL1BtrsKl0b7M208Z0STVOFd9/TMMyJLoOyGQdh2RDqR81SMR22cu');

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
--

DROP TABLE IF EXISTS `pinjaman`;
CREATE TABLE IF NOT EXISTS `pinjaman` (
  `id_pinjaman` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_pinjaman` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_anggota` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `besar_pinjaman` bigint NOT NULL,
  `tgl_pengajuan_pinjaman` date DEFAULT NULL,
  `tgl_acc_peminjaman` date DEFAULT NULL,
  `tgl_pinjaman` date DEFAULT NULL,
  `tgl_pelunasan` date DEFAULT NULL,
  `id_angsuran` json NOT NULL,
  `ket` enum('diminta','ditolak','diterima','dipinjamkan') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'diminta',
  PRIMARY KEY (`id_pinjaman`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pinjaman`
--

INSERT INTO `pinjaman` (`id_pinjaman`, `nama_pinjaman`, `id_anggota`, `besar_pinjaman`, `tgl_pengajuan_pinjaman`, `tgl_acc_peminjaman`, `tgl_pinjaman`, `tgl_pelunasan`, `id_angsuran`, `ket`) VALUES
('663e430d0eb39', 'pelajar', '6634b9974f884', 500000, '2024-05-10', '0000-00-00', '2024-05-11', NULL, '\"663e430d0eb47\"', 'dipinjamkan'),
('663f84236473d', 'pelajar', '6634b9974f884', 500000, '2024-05-11', '2024-05-11', '2024-05-11', NULL, '\"663f84236474a\"', 'dipinjamkan'),
('663f8444e29fd', 'pelajar', '6634b9974f884', 2000000, '2024-05-11', '2024-05-11', '2024-05-11', NULL, '\"663f8444e2a07\"', 'dipinjamkan'),
('663f8b12d0baa', 'pelajar', '6634b9974f884', 1500000, '2024-05-11', '2024-05-11', '2024-05-11', NULL, '[\"663f8b12d0bb4\", \"663f8b12d0bb5\", \"663f8b12d0bb6\", \"663f8b12d0bb7\"]', 'dipinjamkan'),
('663f938f59015', 'keluarga', '6634b9974f884', 500000, '2024-05-11', '2024-05-11', '2024-05-11', NULL, '[\"663f938f59025\"]', 'dipinjamkan'),
('663f942b4db1f', 'keluarga', '6634b9974f884', 1000000, '2024-05-11', '2024-05-11', '2024-05-11', NULL, '[\"663f942b4db2b\", \"663f942b4db2d\", \"663f942b4db2e\", \"663f942b4db2f\", \"663f942b4db30\", \"663f942b4db31\", \"663f942b4db32\", \"663f942b4db33\"]', 'dipinjamkan'),
('663f9845baa1b', 'pelajar', '6634b9974f884', 1500000, '2024-05-11', NULL, NULL, NULL, '[\"663f9845baa26\", \"663f9845baa27\"]', 'ditolak'),
('663f98515060b', 'pelajar', '6634b9974f884', 500000, '2024-05-11', NULL, NULL, NULL, '[\"663f985150617\", \"663f985150618\"]', 'diminta'),
('663f9856e5b88', 'pelajar', '6634b9974f884', 500000, '2024-05-11', '2024-05-11', NULL, NULL, '[\"663f9856e5b92\", \"663f9856e5b94\", \"663f9856e5b95\", \"663f9856e5b96\"]', 'diterima');

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
  `besar_simpanan` bigint NOT NULL,
  `ket` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_simpanan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `super`
--

DROP TABLE IF EXISTS `super`;
CREATE TABLE IF NOT EXISTS `super` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `password` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

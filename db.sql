-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 20, 2024 at 07:35 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

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

CREATE TABLE `anggota` (
  `id_anggota` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_lhr` date NOT NULL,
  `tmp_lhr` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `j_kel` enum('laki-laki','perempuan') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `no_tlp` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ket` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama`, `alamat`, `tgl_lhr`, `tmp_lhr`, `j_kel`, `status`, `no_tlp`, `ket`, `password`) VALUES
('664a37300471c', 'AyanoKoji', 'tampingan', '1111-11-11', 'Magelang', 'laki-laki', 'menikah', '088216072167', '123213', '$2y$10$i0cv2CEZgAp2b6QGqYn.aOuRvolIlwMQniUhyK2SjN/laLGtPM7JK'),
('664af6cab25c7', 'julpaa', 'Magelang', '2024-05-01', 'Magelang', 'perempuan', 'lajang', '081727383923', 'apa yha', '$2y$10$sFeED4G2DhESeN5ucYePUOWtk1a9.xRdBxiLTqFRMg4bQZ8UOiVwS');

-- --------------------------------------------------------

--
-- Table structure for table `angsuran`
--

CREATE TABLE `angsuran` (
  `id_angsuran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_kategori` int NOT NULL,
  `id_anggota` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_pembayaran` date DEFAULT NULL,
  `angsuran_ke` int NOT NULL,
  `ket` enum('belum','lunas') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'belum'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `angsuran`
--

INSERT INTO `angsuran` (`id_angsuran`, `id_kategori`, `id_anggota`, `tgl_pembayaran`, `angsuran_ke`, `ket`) VALUES
('664a4178b0055', 1, '664a37300471c', '2024-05-19', 1, 'lunas'),
('664a419328b1b', 1, '664a37300471c', '2024-05-19', 1, 'lunas'),
('664a419328b1c', 1, '664a37300471c', '2024-05-19', 2, 'lunas'),
('664a419328b1d', 1, '664a37300471c', '2024-05-19', 3, 'lunas'),
('664a419328b1e', 1, '664a37300471c', '2024-05-19', 4, 'lunas'),
('664a419328b1f', 1, '664a37300471c', '2024-05-19', 5, 'lunas'),
('664a419328b20', 1, '664a37300471c', '2024-05-19', 6, 'lunas'),
('664a419328b21', 1, '664a37300471c', '2024-05-19', 7, 'lunas'),
('664a419328b22', 1, '664a37300471c', '2024-05-19', 8, 'lunas'),
('664a419328b23', 1, '664a37300471c', '2024-05-19', 9, 'lunas'),
('664a419328b24', 1, '664a37300471c', '2024-05-19', 10, 'lunas'),
('664a419328b25', 1, '664a37300471c', '2024-05-19', 11, 'lunas'),
('664a419328b26', 1, '664a37300471c', '2024-05-19', 12, 'lunas'),
('664a4505d5a25', 1, '664a37300471c', NULL, 1, 'belum'),
('664a46125f60b', 2, '664a37300471c', NULL, 1, 'belum'),
('664af74e138ce', 1, '664af6cab25c7', '2024-05-20', 1, 'lunas'),
('664af74e138cf', 1, '664af6cab25c7', '2024-05-20', 2, 'lunas'),
('664af74e138d0', 1, '664af6cab25c7', '2024-05-20', 3, 'lunas'),
('664af74e138d1', 1, '664af6cab25c7', '2024-05-20', 4, 'lunas'),
('664afb100c517', 1, '664af6cab25c7', '2024-05-20', 1, 'lunas'),
('664afb100c518', 1, '664af6cab25c7', '2024-05-20', 2, 'lunas'),
('664afb100c519', 1, '664af6cab25c7', NULL, 3, 'belum'),
('664afbee0d416', 1, '664af6cab25c7', NULL, 1, 'belum');

-- --------------------------------------------------------

--
-- Table structure for table `detail_angsuran`
--

CREATE TABLE `detail_angsuran` (
  `id` int NOT NULL,
  `id_angsuran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_jatuh_tempo` date NOT NULL,
  `besar_angsuran` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_angsuran`
--

INSERT INTO `detail_angsuran` (`id`, `id_angsuran`, `tgl_jatuh_tempo`, `besar_angsuran`) VALUES
(1, '664a419328b1b', '2024-06-19', 91667),
(2, '664a419328b1c', '2024-07-19', 91667),
(3, '664a419328b1d', '2024-08-19', 91667),
(4, '664a419328b1e', '2024-09-19', 91667),
(5, '664a419328b1f', '2024-10-19', 91667),
(6, '664a419328b20', '2024-11-19', 91667),
(7, '664a419328b21', '2024-12-19', 91667),
(8, '664a419328b22', '2025-01-19', 91667),
(9, '664a419328b23', '2025-02-19', 91667),
(10, '664a419328b24', '2025-03-19', 91667),
(11, '664a419328b25', '2025-04-19', 91667),
(12, '664a419328b26', '2025-05-19', 91667),
(13, '664a4178b0055', '2024-06-19', 550000),
(14, '664a4505d5a25', '2024-06-19', 11000000),
(15, '664a46125f60b', '2024-06-19', 535000),
(16, '664af74e138ce', '2024-06-20', 498750),
(17, '664af74e138cf', '2024-07-20', 498750),
(18, '664af74e138d0', '2024-08-20', 498750),
(19, '664af74e138d1', '2024-09-20', 498750),
(20, '664afb100c517', '2024-06-20', 315000),
(21, '664afb100c518', '2024-07-20', 315000),
(22, '664afb100c519', '2024-08-20', 315000),
(23, '664afbee0d416', '2024-06-20', 630000);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_pinjaman`
--

CREATE TABLE `kategori_pinjaman` (
  `id_kategori_pinjaman` int NOT NULL,
  `nama_pinjaman` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

CREATE TABLE `petugas_koperasi` (
  `id_petugas` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `no_tlp` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `tmp_lhr` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_lhr` date DEFAULT NULL,
  `ket` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petugas_koperasi`
--

INSERT INTO `petugas_koperasi` (`id_petugas`, `nama`, `alamat`, `no_tlp`, `tmp_lhr`, `tgl_lhr`, `ket`, `password`) VALUES
('664af5b9a8db7', 'aspasya', 'magelang', '5232', 'Magelang', '2024-05-20', 'ya', '$2y$10$IP7ISZJ87iIhF6tWlKZPG.iwnwbosJio7J5PIGQ8Ll1vPxV5a8Km.');

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
--

CREATE TABLE `pinjaman` (
  `id_pinjaman` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_pinjaman` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_anggota` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `besar_pinjaman` bigint NOT NULL,
  `tgl_pengajuan_pinjaman` date DEFAULT NULL,
  `tgl_acc_peminjaman` date DEFAULT NULL,
  `tgl_pinjaman` date DEFAULT NULL,
  `tgl_pelunasan` date DEFAULT NULL,
  `id_angsuran` json NOT NULL,
  `ket` enum('diminta','ditolak','diterima','dipinjamkan','lunas') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'diminta'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pinjaman`
--

INSERT INTO `pinjaman` (`id_pinjaman`, `nama_pinjaman`, `id_anggota`, `besar_pinjaman`, `tgl_pengajuan_pinjaman`, `tgl_acc_peminjaman`, `tgl_pinjaman`, `tgl_pelunasan`, `id_angsuran`, `ket`) VALUES
('664a4178b0049', 'pelajar', '664a37300471c', 500000, '2024-05-19', '2024-05-19', '2024-05-19', '2024-05-19', '[\"664a4178b0055\"]', 'lunas'),
('664a419328b12', 'pelajar', '664a37300471c', 1000000, '2024-05-19', '2024-05-19', '2024-05-19', '2024-05-19', '[\"664a419328b1b\", \"664a419328b1c\", \"664a419328b1d\", \"664a419328b1e\", \"664a419328b1f\", \"664a419328b20\", \"664a419328b21\", \"664a419328b22\", \"664a419328b23\", \"664a419328b24\", \"664a419328b25\", \"664a419328b26\"]', 'lunas'),
('664a4505d5a17', 'pelajar', '664a37300471c', 10000000, '2024-05-19', '2024-05-19', '2024-05-19', NULL, '[\"664a4505d5a25\"]', 'dipinjamkan'),
('664a46125f5fd', 'keluarga', '664a37300471c', 500000, '2024-05-19', '2024-05-19', '2024-05-19', NULL, '[\"664a46125f60b\"]', 'dipinjamkan'),
('664a468469378', 'keluarga', '664a37300471c', 500000, '2024-05-19', NULL, NULL, NULL, '[\"664a468469389\"]', 'ditolak'),
('664a46c31704a', 'keluarga', '664a37300471c', 500000, '2024-05-19', NULL, NULL, NULL, '[\"664a46c317054\"]', 'ditolak'),
('664a47015c69c', 'keluarga', '664a37300471c', 500000, '2024-05-19', NULL, NULL, NULL, '[\"664a47015c6a6\"]', 'ditolak'),
('664a470433a7b', 'keluarga', '664a37300471c', 500000, '2024-05-19', NULL, NULL, NULL, '[\"664a470433a84\"]', 'ditolak'),
('664a473256ab2', 'keluarga', '664a37300471c', 2000000, '2024-05-19', NULL, NULL, NULL, '[\"664a473256abb\"]', 'ditolak'),
('664a482b932ef', 'keluarga', '664a37300471c', 500000, '2024-05-19', NULL, NULL, NULL, '[\"664a482b932f8\"]', 'diminta'),
('664a483d128c9', 'keluarga', '664a37300471c', 500000, '2024-05-19', NULL, NULL, NULL, '[\"664a483d128d7\"]', 'ditolak'),
('664a493d79800', 'pelajar', '664a37300471c', 500000, '2024-05-19', '2024-05-19', NULL, NULL, '[\"664a493d7981b\"]', 'diterima'),
('664af74e138c4', 'pelajar', '664af6cab25c7', 1900000, '2024-05-20', '2024-05-20', '2024-05-20', '2024-05-20', '[\"664af74e138ce\", \"664af74e138cf\", \"664af74e138d0\", \"664af74e138d1\"]', 'lunas'),
('664afb100c50e', 'pelajar', '664af6cab25c7', 900000, '2024-05-20', '2024-05-20', '2024-05-20', NULL, '[\"664afb100c517\", \"664afb100c518\", \"664afb100c519\"]', 'dipinjamkan'),
('664afbee0d40a', 'pelajar', '664af6cab25c7', 600000, '2024-05-20', '2024-05-20', '2024-05-20', NULL, '[\"664afbee0d416\"]', 'dipinjamkan'),
('664afd1aade6e', 'pelajar', '664af6cab25c7', 500000, '2024-05-20', NULL, NULL, NULL, '[\"664afd1aade78\"]', 'diminta');

-- --------------------------------------------------------

--
-- Table structure for table `saldo`
--

CREATE TABLE `saldo` (
  `id_saldo` int NOT NULL,
  `id_anggota` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `saldo` bigint DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `saldo`
--

INSERT INTO `saldo` (`id_saldo`, `id_anggota`, `saldo`) VALUES
(1, '664a37300471c', 1199000),
(2, '664af6cab25c7', 60000);

-- --------------------------------------------------------

--
-- Table structure for table `simpanan`
--

CREATE TABLE `simpanan` (
  `id_simpanan` int NOT NULL,
  `nm_simpanan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_anggota` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_simpanan` date NOT NULL,
  `besar_simpanan` bigint NOT NULL,
  `ket` enum('deposit','withdraw') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'deposit'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `simpanan`
--

INSERT INTO `simpanan` (`id_simpanan`, `nm_simpanan`, `id_anggota`, `tgl_simpanan`, `besar_simpanan`, `ket`) VALUES
(1, 'AyanoKoji', '664a37300471c', '2024-05-19', 200000, 'deposit'),
(2, 'AyanoKoji', '664a37300471c', '2024-05-19', 1000, 'withdraw'),
(3, 'AyanoKoji', '664a37300471c', '2024-05-19', 1000000, 'deposit'),
(4, 'julpaa', '664af6cab25c7', '2024-05-20', 75000, 'deposit'),
(5, 'julpaa', '664af6cab25c7', '2024-05-20', 5000, 'withdraw'),
(6, 'julpaa', '664af6cab25c7', '2024-05-20', 10000, 'withdraw');

-- --------------------------------------------------------

--
-- Table structure for table `super`
--

CREATE TABLE `super` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `angsuran`
--
ALTER TABLE `angsuran`
  ADD PRIMARY KEY (`id_angsuran`);

--
-- Indexes for table `detail_angsuran`
--
ALTER TABLE `detail_angsuran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_pinjaman`
--
ALTER TABLE `kategori_pinjaman`
  ADD PRIMARY KEY (`id_kategori_pinjaman`);

--
-- Indexes for table `petugas_koperasi`
--
ALTER TABLE `petugas_koperasi`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`id_pinjaman`);

--
-- Indexes for table `saldo`
--
ALTER TABLE `saldo`
  ADD PRIMARY KEY (`id_saldo`);

--
-- Indexes for table `simpanan`
--
ALTER TABLE `simpanan`
  ADD PRIMARY KEY (`id_simpanan`);

--
-- Indexes for table `super`
--
ALTER TABLE `super`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_angsuran`
--
ALTER TABLE `detail_angsuran`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `kategori_pinjaman`
--
ALTER TABLE `kategori_pinjaman`
  MODIFY `id_kategori_pinjaman` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `saldo`
--
ALTER TABLE `saldo`
  MODIFY `id_saldo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `simpanan`
--
ALTER TABLE `simpanan`
  MODIFY `id_simpanan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `super`
--
ALTER TABLE `super`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

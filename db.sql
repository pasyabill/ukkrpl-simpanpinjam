-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 04, 2024 at 02:40 AM
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
-- Database: `affiliate_app`
--
CREATE DATABASE IF NOT EXISTS `affiliate_app` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `affiliate_app`;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
--
-- Database: `handika`
--
CREATE DATABASE IF NOT EXISTS `handika` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `handika`;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Handika Putra', 'mlbb5393@gmail.com', NULL, '$2y$12$.er5ZOFJ8PzRqYBmy3DUDOnDARG3OI9LKQExm8gtLzTGKY/ry7noG', NULL, '2024-02-02 20:54:53', '2024-02-02 20:54:53');
--
-- Database: `penjualan_handika`
--
CREATE DATABASE IF NOT EXISTS `penjualan_handika` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `penjualan_handika`;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

DROP TABLE IF EXISTS `barang`;
CREATE TABLE IF NOT EXISTS `barang` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kdbrg` varchar(3) DEFAULT NULL,
  `nmbrg` varchar(50) DEFAULT NULL,
  `jnsbrg` varchar(50) DEFAULT NULL,
  `harga` int DEFAULT NULL,
  `jumlah` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kdbrg`, `nmbrg`, `jnsbrg`, `harga`, `jumlah`) VALUES
(1, '001', 'supermie', 'mie instan', 2500, 50),
(2, '002', 'ting ting', 'snack', 1000, 75),
(3, '003', 'morinaga', 'susu bayi', 78000, 60),
(4, '004', 'sari roti', 'roti', 15000, 100),
(5, '005', 'potato', 'snack', 5000, 80),
(6, '006', 'castrol', 'oli', 45000, 100),
(7, '007', 'indomie', 'mie instant', 3000, 50),
(8, '008', 'marlboro', 'rokok', 25000, 150),
(9, '009', 'close up', 'pasta gigi', 12500, 10),
(10, '010', 'pantene', 'shampoo', 15000, 200);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

DROP TABLE IF EXISTS `pembelian`;
CREATE TABLE IF NOT EXISTS `pembelian` (
  `id` int NOT NULL AUTO_INCREMENT,
  `No_nota` varchar(5) DEFAULT NULL,
  `kdbrg` varchar(3) DEFAULT NULL,
  `kdsup` varchar(4) DEFAULT NULL,
  `Tanggal_beli` date DEFAULT NULL,
  `jumlah_beli` int DEFAULT NULL,
  `harga_beli` int DEFAULT NULL,
  `Total` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id`, `No_nota`, `kdbrg`, `kdsup`, `Tanggal_beli`, `jumlah_beli`, `harga_beli`, `Total`) VALUES
(1, 'HG001', '001', 'S001', '2016-03-01', 200, 2500, 500000),
(2, 'HG002', '002', 'S004', '2016-03-01', 100, 15000, 1500000),
(3, 'HG003', '006', 'S001', '2017-05-05', 150, 2500, 375000),
(4, 'HG004', '003', 'S003', '2017-07-01', 30, 78000, 2340000),
(5, 'HG005', '004', 'S006', '2017-05-15', 40, 45000, 1800000),
(6, 'HG006', '007', 'S007', '2017-08-15', 250, 3000, 75000),
(7, 'HG007', '009', 'S008', '2017-07-29', 200, 25000, 5000000),
(8, 'HG008', '003', 'S003', '2018-01-01', 100, 78000, 7800000),
(9, 'HG009', '009', 'S008', '2018-10-25', 50, 25000, 1250000),
(10, 'HG010', '007', 'S009', '2018-03-20', 350, 12500, 4375000);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE IF NOT EXISTS `supplier` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kdsup` varchar(4) DEFAULT NULL,
  `nmsup` varchar(50) DEFAULT NULL,
  `tgllhr` date DEFAULT NULL,
  `alamat_kantor` varchar(250) DEFAULT NULL,
  `telpkantor` varchar(20) DEFAULT NULL,
  `jekel` enum('P','L') DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `kdsup`, `nmsup`, `tgllhr`, `alamat_kantor`, `telpkantor`, `jekel`, `email`) VALUES
(1, 'S001', 'Novita', '1985-05-20', 'JL. a yani', '08123456', 'P', 'novita@gmail.com'),
(2, 'S002', 'Firman', '1990-07-30', 'JL. solo', '08567895', 'L', 'firman@yahoo.com'),
(3, 'S003', 'Lina', '1992-08-06', 'Jl. colo dawe', '08789523', 'P', 'lina@msn.com'),
(4, 'S004', 'Anisa', '1987-10-10', 'JL anggrek', '08889999', 'P', 'anisa@gmail.com'),
(5, 'S005', 'Ilham', '1986-08-17', 'Jl salak', '08777999', 'L', 'ilham@msn.com'),
(6, 'S006', 'Imam', '2000-01-01', 'Jl majapahit', '08655566', 'L', 'imam@gmail.com'),
(7, 'S007', 'Joko', '1998-10-15', 'Jl kalingga', '08791122', 'L', 'joko@joko.com'),
(8, 'S008', 'Rina', '1997-12-12', 'Jl sudirman', '08663344', 'P', 'rina@gmail.com'),
(9, 'S009', 'Dimas', '1980-02-14', 'Jl kalisahak', '08554466', 'L', 'dimas@gmail.com'),
(10, 'S010', 'Triya', '1999-04-18', 'Jl balapan', '08332244', 'P', 'triya@gmail.com');
--
-- Database: `perpustakaan_ayano`
--
CREATE DATABASE IF NOT EXISTS `perpustakaan_ayano` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `perpustakaan_ayano`;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

DROP TABLE IF EXISTS `mahasiswa`;
CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `nim` int NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`nim`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `alamat`) VALUES
(21400200, 'faqih', 'bandung'),
(21400201, 'Ina', 'jakarta'),
(21400202, 'Anto', 'semarang'),
(21400203, 'Dani', 'padang'),
(21400204, 'jaka', 'bandung'),
(21400205, 'nara', 'bandung'),
(21400206, 'Senta', 'semarang');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` int NOT NULL AUTO_INCREMENT,
  `nim` int DEFAULT NULL,
  `buku` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `nim`, `buku`) VALUES
(1, 21400200, 'Buku Informatika'),
(2, 21400200, 'Buku Informatika'),
(3, 21400202, 'Buku Teknik Elektro'),
(4, 21400203, 'Buku Matematika'),
(5, 21400206, 'Buku Fisika'),
(6, 21400207, 'Buku Bahasa Indonesia'),
(7, 21400210, 'Buku Bahasa Daerah'),
(8, 21400211, 'Buku Kimia');
--
-- Database: `rentalbuku_handika`
--
CREATE DATABASE IF NOT EXISTS `rentalbuku_handika` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `rentalbuku_handika`;

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

DROP TABLE IF EXISTS `buku`;
CREATE TABLE IF NOT EXISTS `buku` (
  `kode_buku` int NOT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `kategori` char(1) DEFAULT NULL,
  `jumlah` int DEFAULT NULL,
  PRIMARY KEY (`kode_buku`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`kode_buku`, `judul`, `kategori`, `jumlah`) VALUES
(1, 'Naruto 305', 'j', 3),
(2, 'Naruto 306', 'j', 3),
(3, 'Legend of A', 'k', 2),
(4, 'One Piece 305', 'j', 4),
(5, 'Ugly', 'k', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
CREATE TABLE IF NOT EXISTS `kategori` (
  `kode_kat` char(1) NOT NULL,
  `nm_kat` varchar(30) DEFAULT NULL,
  `sewa` int DEFAULT NULL,
  PRIMARY KEY (`kode_kat`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kode_kat`, `nm_kat`, `sewa`) VALUES
('j', 'komik jepang', 2000),
('k', 'komik korea', 1500),
('i', 'komik indonesia', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `kode_plg` char(3) NOT NULL,
  `nm_plg` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kode_plg`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`kode_plg`, `nm_plg`, `alamat`) VALUES
('M01', 'Andi', 'Kusumanegara'),
('M02', 'Anton', 'Glagah'),
('M03', 'Burhan', 'Janturan'),
('M04', 'Laila', 'Janturan'),
('M05', 'Indah', 'Glagah');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE IF NOT EXISTS `transaksi` (
  `pelanggan` char(3) DEFAULT NULL,
  `buku` int DEFAULT NULL,
  `lama_sewa` int DEFAULT NULL,
  `tgl_sewa` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`pelanggan`, `buku`, `lama_sewa`, `tgl_sewa`) VALUES
('M01', 1, 2, '2013-01-20'),
('M03', 1, 1, '2013-01-20'),
('M05', 3, 1, '2013-01-21'),
('M04', 5, 1, '2013-01-28');
--
-- Database: `simpan_pinjam`
--
CREATE DATABASE IF NOT EXISTS `simpan_pinjam` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `simpan_pinjam`;

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
--
-- Database: `smeanfess`
--
CREATE DATABASE IF NOT EXISTS `smeanfess` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `smeanfess`;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '0001_01_01_000001_create_cache_table', 1),
(10, '0001_01_01_000002_create_jobs_table', 1),
(11, '2014_10_12_000000_create_users_table', 1),
(12, '2024_01_12_020043_create_pesan_table', 1),
(13, '2024_04_02_012900_create_sessions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

DROP TABLE IF EXISTS `pesan`;
CREATE TABLE IF NOT EXISTS `pesan` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `pesan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '-',
  `to` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '-',
  `status` enum('menfess','kritik') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id`, `pesan`, `from`, `to`, `status`, `created_at`, `updated_at`) VALUES
(1, '🌹', 'handika tampan', 'metsaa', 'menfess', '2024-04-01 18:45:55', '2024-04-01 18:45:55'),
(2, '🌹', 'handika tampan', 'metsaa', 'menfess', '2024-04-01 18:46:08', '2024-04-01 18:46:08'),
(3, '🌹🌹', 'handika', 'metsaa', 'menfess', '2024-04-01 22:09:19', '2024-04-01 22:09:19'),
(4, 'kemana uangku yang 50% itu', 'handika tampan', 'pemungut pajak', 'kritik', '2024-04-01 22:12:28', '2024-04-01 22:12:28'),
(5, 'aku suka kepeseng kalau lihat kamu 😭😭', 'nepan unyu', 'widya', 'menfess', '2024-04-01 22:13:03', '2024-04-01 22:13:03'),
(6, 'itu anaknya nngerokkok bu tadi 🌹', 'mas mas habis jumatan', 'widya', 'kritik', '2024-04-01 23:29:48', '2024-04-01 23:29:48'),
(7, 'kamu kok manis banget siii 😭😭', 'forW', 'rehan', 'menfess', '2024-04-01 23:32:55', '2024-04-01 23:32:55');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('hnLHUgibSphg0WRpAan53zI448wdJPwcMpCRcif4', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 'YTo0OntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0NjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL21lc3NhZ2VzL2ZldGNoLzAvbWVuZmVzcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NjoiX3Rva2VuIjtzOjQwOiIzZWpLbGRycklnRFFWRW13VnNxZmtHa0d4YlpkTkR2N0YyUkk1R09PIjtzOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1712039593);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','superadmin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_password_unique` (`password`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$12$tFQSyhkHvjZqvj1gsnDZVOSOfrvFZMG8h6zfn5HkoqaBfkhjVFs/m', 'admin', '2024-04-01 19:16:30', '2024-04-01 19:16:30'),
(2, 'asd', '$2y$12$3WuZsz6BPZ1oeGWHfcOZvefjlUrtOeghJZLf.Ex.AiHYaE4dyfW6i', 'admin', '2024-04-01 20:45:20', '2024-04-01 20:45:20'),
(3, 'super', '$2y$12$DOmkUqwCH4dyFqR5Vauw0uafE7.PklkXPcSu6dDAe62/aqSBmekGe', 'superadmin', '2024-04-01 21:30:54', '2024-04-01 21:30:54');
--
-- Database: `toko_handika`
--
CREATE DATABASE IF NOT EXISTS `toko_handika` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `toko_handika`;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

DROP TABLE IF EXISTS `barang`;
CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` int NOT NULL,
  `id_kategory` smallint DEFAULT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `harga` int DEFAULT NULL,
  `stok` int DEFAULT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_kategory`, `nama_barang`, `harga`, `stok`) VALUES
(1, 1, 'RAM', 230000, 4),
(2, 1, 'Mainboard', 1250000, 7),
(3, 1, 'Mouse', 80000, 6),
(4, 3, 'Mousepad', 35000, 3),
(5, 3, 'keyboard', 80000, 5);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id_pelanggan` int NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `email`) VALUES
(1, 'Alfa', 'alfa@yahoo.com'),
(2, 'beta', 'beta@yahoo.com'),
(3, 'Charlie', 'charlie@yahoo.com'),
(4, 'Delta', 'delta@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

DROP TABLE IF EXISTS `penjualan`;
CREATE TABLE IF NOT EXISTS `penjualan` (
  `id_transaksi` int NOT NULL,
  `id_pelanggan` int DEFAULT NULL,
  `tgl_transaksi` date DEFAULT NULL,
  `total_transaksi` int DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_transaksi`, `id_pelanggan`, `tgl_transaksi`, `total_transaksi`) VALUES
(1, 1, '2017-02-22', 230000),
(2, 3, '2017-02-22', 195000),
(3, 2, '2017-01-01', 1710000),
(4, 1, '2017-02-04', 310000),
(5, 0, '2017-02-10', 80000);
--
-- Database: `uks`
--
CREATE DATABASE IF NOT EXISTS `uks` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `uks`;

-- --------------------------------------------------------

--
-- Table structure for table `kunjungan`
--

DROP TABLE IF EXISTS `kunjungan`;
CREATE TABLE IF NOT EXISTS `kunjungan` (
  `id_kunjungan` int NOT NULL AUTO_INCREMENT,
  `nis` int NOT NULL,
  `id_obat` int NOT NULL,
  `tanggal` date NOT NULL,
  `keluhan` text COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah` int NOT NULL,
  PRIMARY KEY (`id_kunjungan`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kunjungan`
--

INSERT INTO `kunjungan` (`id_kunjungan`, `nis`, `id_obat`, `tanggal`, `keluhan`, `jumlah`) VALUES
(33, 1111111, 8, '2024-04-01', 'sakit jiwa', 20),
(34, 212121, 7, '2024-04-01', 'kepesing 24/7', 1);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

DROP TABLE IF EXISTS `obat`;
CREATE TABLE IF NOT EXISTS `obat` (
  `id_obat` int NOT NULL AUTO_INCREMENT,
  `nama_obat` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `stok` int NOT NULL,
  `status` enum('tersedia','habis') COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_obat`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `stok`, `status`) VALUES
(3, 'Antasida', 13, 'tersedia'),
(4, 'Loperamide', 20, 'tersedia'),
(5, 'Minyak Kayu Putih', -2, 'tersedia'),
(6, 'hansaplas', 8, 'tersedia'),
(7, 'Tolak Angin', 24, 'tersedia'),
(8, 'Bodrexin', 7, 'tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

DROP TABLE IF EXISTS `petugas`;
CREATE TABLE IF NOT EXISTS `petugas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id`, `username`, `password`) VALUES
(5, 'bluby', '4d5bdeb4e1d33c14294a5d5a0bccb207');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

DROP TABLE IF EXISTS `siswa`;
CREATE TABLE IF NOT EXISTS `siswa` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nis` int NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `kelas` enum('10','11','12') COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`,`nis`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2147483647 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nama`, `kelas`, `password`) VALUES
(2147483647, 212121, 'brilian anak abah', '12', 'a3dcb4d229de6fde0db5686dee47145d'),
(2147483647, 1111111, 'zulfakayang', '10', 'a3dcb4d229de6fde0db5686dee47145d'),
(2147483647, 2222222, 'handik', '10', 'a3dcb4d229de6fde0db5686dee47145d'),
(2147483647, 2147483647, 'Handika Naik Haji', '10', '247073052ad65fca5d03cf1589ccc638');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

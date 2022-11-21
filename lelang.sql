-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 20, 2022 at 08:56 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lelang`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(225) NOT NULL,
  `tahun_barang` year(4) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto_barang` varchar(225) NOT NULL,
  `status` enum('dibuka','ditutup','belum dibuka') NOT NULL,
  `id_pemenang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `tahun_barang`, `harga`, `deskripsi`, `foto_barang`, `status`, `id_pemenang`) VALUES
(18, 'pipin tzy', 2022, 60, 'uwionggg', '5547pak pipin.jpeg', 'ditutup', 12),
(20, 'chisato', 2022, 2000, 'istri ales', '9191chisato.jfif', 'ditutup', 15);

-- --------------------------------------------------------

--
-- Table structure for table `laporan_lelang`
--

CREATE TABLE `laporan_lelang` (
  `id_laporan_lelang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_peserta` int(11) NOT NULL,
  `harga` int(20) NOT NULL,
  `tgl_lelang` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan_lelang`
--

INSERT INTO `laporan_lelang` (`id_laporan_lelang`, `id_barang`, `id_peserta`, `harga`, `tgl_lelang`) VALUES
(15, 18, 12, 60, '2022-11-19'),
(16, 20, 12, 1999, '2022-11-20'),
(17, 20, 15, 2000, '2022-11-20');

-- --------------------------------------------------------

--
-- Table structure for table `lelang`
--

CREATE TABLE `lelang` (
  `id_lelang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tgl_lelang` date NOT NULL,
  `harga` int(11) NOT NULL,
  `id_peserta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lelang`
--

INSERT INTO `lelang` (`id_lelang`, `id_barang`, `tgl_lelang`, `harga`, `id_peserta`) VALUES
(63, 18, '2022-11-19', 60, 12),
(64, 20, '2022-11-20', 1999, 12),
(65, 20, '2022-11-20', 2000, 15);

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id_peserta` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `tlp` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id_peserta`, `nama`, `username`, `password`, `alamat`, `tlp`) VALUES
(12, 'hilmy', 'hilmy', 'd41d8cd98f00b204e9800998ecf8427e', 'kepuharjo', '081931995771'),
(15, 'andre', 'andre', 'd41d8cd98f00b204e9800998ecf8427e', 'malang', '0899999');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `level`) VALUES
(4, 'admin', 'admin', 'd41d8cd98f00b204e9800998ecf8427e', 'admin'),
(6, 'admin1', 'admin1', 'd41d8cd98f00b204e9800998ecf8427e', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_pemenang` (`id_pemenang`);

--
-- Indexes for table `laporan_lelang`
--
ALTER TABLE `laporan_lelang`
  ADD PRIMARY KEY (`id_laporan_lelang`),
  ADD KEY `foreign barang` (`id_barang`),
  ADD KEY `foreign masyarakat` (`id_peserta`);

--
-- Indexes for table `lelang`
--
ALTER TABLE `lelang`
  ADD PRIMARY KEY (`id_lelang`),
  ADD KEY `foreign barang` (`id_barang`),
  ADD KEY `id_peserta` (`id_peserta`),
  ADD KEY `foreign peserta` (`id_peserta`) USING BTREE;

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id_peserta`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `laporan_lelang`
--
ALTER TABLE `laporan_lelang`
  MODIFY `id_laporan_lelang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `lelang`
--
ALTER TABLE `lelang`
  MODIFY `id_lelang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_pemenang`) REFERENCES `peserta` (`id_peserta`);

--
-- Constraints for table `laporan_lelang`
--
ALTER TABLE `laporan_lelang`
  ADD CONSTRAINT `laporan_lelang_ibfk_2` FOREIGN KEY (`id_peserta`) REFERENCES `peserta` (`id_peserta`),
  ADD CONSTRAINT `laporan_lelang_ibfk_3` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lelang`
--
ALTER TABLE `lelang`
  ADD CONSTRAINT `lelang_ibfk_2` FOREIGN KEY (`id_peserta`) REFERENCES `peserta` (`id_peserta`),
  ADD CONSTRAINT `lelang_ibfk_3` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

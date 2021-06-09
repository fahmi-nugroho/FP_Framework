-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2021 at 11:05 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fp_framework`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `judul_artikel` varchar(100) NOT NULL,
  `isi_artikel` text NOT NULL,
  `tanggal_artikel` date NOT NULL,
  `gambar_artikel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `batik`
--

CREATE TABLE `batik` (
  `id_batik` int(11) NOT NULL,
  `nama_batik` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` double NOT NULL,
  `ukuran` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batik`
--

INSERT INTO `batik` (`id_batik`, `nama_batik`, `deskripsi`, `harga`, `ukuran`, `stok`, `gambar`) VALUES
(1, 'Lasem dan Madura', 'Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.', 150000, '250 x 250 cm', 50, 'batik khas sidoarjo, lasem dan madura.jpg'),
(2, 'Bunga Kupu - kupu', 'Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.', 75000, '241 x 110 cm', 50, 'Batik Sidoarjo Motif Bunga kupu kupu.jpg'),
(3, 'Burung Merak 1', 'Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.', 110000, '241 x 150 cm', 50, 'Batik Sidoarjo Motif Burung Merak 1.jpg'),
(4, 'Burung Merak 2', 'Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.', 90000, '200 x 210 cm', 1, 'Batik Sidoarjo Motif Burung Merak 2.jpg'),
(5, 'Kembang Bayem', 'Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.', 88000, '234 x 400 cm', 0, 'batik sidoarjo motif kembang bayem.jpg'),
(6, 'Mahkota', 'Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.', 92000, '171 x 240 cm', 50, 'Batik Sidoarjo Motif Mahkota.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_order` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_pembeli` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_order`, `tanggal`, `nama_pembeli`, `alamat`, `total_harga`, `status`) VALUES
(1, '18081010065', '2018-08-10', 'haluboy', 'haluland', 5000, 'Proses Pengiriman'),
(2, '18081010064', '2018-08-10', 'diki', 'dikiland', 2000, 'Pesanan Dibatalkan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `batik`
--
ALTER TABLE `batik`
  ADD PRIMARY KEY (`id_batik`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `batik`
--
ALTER TABLE `batik`
  MODIFY `id_batik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

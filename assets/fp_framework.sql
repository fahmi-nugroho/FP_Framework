-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 10, 2021 at 04:12 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

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
(1, 'Lasem dan Madura', 'batik khas sidoarjo, lasem dan madura, semuanya hampir memiliki pewarnaan yang serupa. Dimana warna warna ngejreng dan berani banyak dipilih. namun untuk batik madura, motif yang diaplikasi adalah tentang bunga atau tumbuhan, tidak memiliki kebiasaan bermotif hewan. ini sangat berkaitan dengan kulturnya yang religius.', 150000, '250 x 250 cm', 40, 'batik khas sidoarjo, lasem dan madura.jpg'),
(2, 'Bunga Kupu - kupu', 'Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.', 75000, '241 x 110 cm', 18, 'Batik Sidoarjo Motif Bunga kupu kupu.jpg'),
(3, 'Burung Merak 1', 'Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.', 110000, '241 x 150 cm', 13, 'Batik Sidoarjo Motif Burung Merak 1.jpg'),
(4, 'Burung Merak 2', 'Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.', 90000, '200 x 210 cm', 8, 'Batik Sidoarjo Motif Burung Merak 2.jpg'),
(5, 'Kembang Bayem', 'Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.', 88000, '234 x 400 cm', 28, 'batik sidoarjo motif kembang bayem.jpg'),
(6, 'Mahkota', 'Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.', 92000, '171 x 240 cm', 19, 'Batik Sidoarjo Motif Mahkota.jpg'),
(8, 'Rawan Kenceng', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 123000, '140 x 50 cm', 28, 'Batik Sidoarjo Motif Rawan kenceng.jpg'),
(9, 'Sawunggaling', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 310000, '130 x 350 cm', 11, 'batik sidoarjo motif sawunggaling.jpg'),
(10, 'Tambal Segitiga', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 140000, '190 x 110 cm', 25, 'batik tambal segitiga.jpg'),
(11, 'Uwer', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 290000, '220 x 250 cm', 15, 'Batik Sidoarjo Motif Uwer.jpg'),
(12, 'Sekar Jagad', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 150000, '210 x 90 cm', 7, 'Batik Sidoarjo Motif Sekar Jagad.jpg'),
(13, 'Sekardangan', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 200000, '150 x 150 cm', 16, 'Batik Sidoarjo motif Sekardangan.jpg'),
(14, 'Rawan Wungu', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 150000, '310 x 210 cm', 23, 'Batik Tulis Sidoarjo Rawan Wungu.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_order`
--

CREATE TABLE `daftar_order` (
  `id_transaksi` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `notelp` varchar(25) NOT NULL,
  `total` double NOT NULL,
  `kurir` varchar(50) NOT NULL,
  `status` varchar(100) NOT NULL,
  `bukti` varchar(100) DEFAULT NULL,
  `resi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_order`
--

INSERT INTO `daftar_order` (`id_transaksi`, `id_order`, `id_user`, `nama`, `tanggal`, `alamat`, `notelp`, `total`, `kurir`, `status`, `bukti`, `resi`) VALUES
(1, 1623283968, 4, 'rifan', '10-06-2021', 'Perumahan Sejahtera', '087755565590', 2170000, 'JNT', 'Menunggu Pembayaran', NULL, NULL),
(4, 1623325349, 4, 'rifan', '10-06-2021', 'Jl. P. Diponegoro, Lemah Putro, Sidoarjo, Jawa Timur 61213', '087755565590', 1968000, 'Ambil ditempat', 'Menunggu Pembayaran', NULL, NULL),
(5, 1623330875, 4, 'rifan', '10-06-2021', 'Perumahan Sejahtera', '087755565590', 11195500, 'SiCepat', 'Menunggu Pembayaran', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail_order`
--

CREATE TABLE `detail_order` (
  `id_detail` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_batik` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_order`
--

INSERT INTO `detail_order` (`id_detail`, `id_order`, `id_batik`, `jumlah`, `harga`) VALUES
(1, 1623283968, 3, 5, '110000'),
(2, 1623283968, 1, 10, '150000'),
(3, 1623325349, 1, 1, '150000'),
(4, 1623325349, 2, 1, '75000'),
(5, 1623325349, 3, 1, '110000'),
(6, 1623325349, 4, 1, '90000'),
(7, 1623325349, 5, 1, '88000'),
(8, 1623325349, 6, 1, '92000'),
(9, 1623325349, 8, 1, '123000'),
(10, 1623325349, 9, 1, '310000'),
(11, 1623325349, 10, 1, '140000'),
(12, 1623325349, 11, 1, '290000'),
(13, 1623325349, 12, 1, '150000'),
(14, 1623325349, 13, 1, '200000'),
(15, 1623325349, 14, 1, '150000'),
(16, 1623330875, 1, 9, '150000'),
(17, 1623330875, 2, 6, '75000'),
(18, 1623330875, 4, 8, '90000'),
(19, 1623330875, 6, 2, '92000'),
(20, 1623330875, 8, 5, '123000'),
(21, 1623330875, 9, 2, '310000'),
(22, 1623330875, 10, 7, '140000'),
(23, 1623330875, 11, 6, '290000'),
(24, 1623330875, 12, 9, '150000'),
(25, 1623330875, 13, 7, '200000'),
(26, 1623330875, 14, 8, '150000');

-- --------------------------------------------------------

--
-- Table structure for table `kurir`
--

CREATE TABLE `kurir` (
  `id_kurir` int(11) NOT NULL,
  `nama_kurir` varchar(150) NOT NULL,
  `harga_kurir` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kurir`
--

INSERT INTO `kurir` (`id_kurir`, `nama_kurir`, `harga_kurir`) VALUES
(1, 'JNE', 7500),
(2, 'JNT', 8000),
(3, 'POS', 10000),
(4, 'SiCepat', 8500);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id_rating` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_batik` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id_rating`, `id_order`, `id_user`, `id_batik`, `rating`) VALUES
(1, 1623283968, 4, 3, 7),
(2, 1623283968, 4, 1, 9),
(3, 1623325349, 4, 1, 8),
(4, 1623325349, 4, 2, 4),
(5, 1623325349, 4, 3, 6),
(6, 1623325349, 4, 4, 8),
(7, 1623325349, 4, 5, 7),
(8, 1623325349, 4, 6, 9),
(9, 1623325349, 4, 8, 10),
(10, 1623325349, 4, 9, 9),
(11, 1623325349, 4, 10, 8),
(12, 1623325349, 4, 11, 7),
(13, 1623325349, 4, 12, 9),
(14, 1623325349, 4, 13, 8),
(15, 1623325349, 4, 14, 6),
(16, 1623330875, 4, 1, 6),
(17, 1623330875, 4, 2, 5),
(18, 1623330875, 4, 4, 9),
(19, 1623330875, 4, 6, 5),
(20, 1623330875, 4, 8, 7),
(21, 1623330875, 4, 9, 8),
(22, 1623330875, 4, 10, 9),
(23, 1623330875, 4, 11, 6),
(24, 1623330875, 4, 12, 9),
(25, 1623330875, 4, 13, 6),
(26, 1623330875, 4, 14, 7);

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

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telepon` varchar(25) DEFAULT NULL,
  `alamat` text,
  `foto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `email`, `password`, `telepon`, `alamat`, `foto`) VALUES
(1, 'Admin', 'Admin@admin.com', '$2y$10$ROxtKzqztryWEtq6aPrxo.EPXxpKC1q0q9RELtGWz2rEeMe3kOMs6', NULL, 'Jl. P. Diponegoro, Lemah Putro, Sidoarjo, Jawa Timur 61213', NULL),
(4, 'rifan', 'rifan@gmail.com', '$2y$10$JsbO69v8DQ0tH5RtQ/cAOuv8a9bPTpbK.LdfaCxNQrHBREerSWs1W', '087755565590', 'Perumahan Sejahtera', NULL);

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
-- Indexes for table `daftar_order`
--
ALTER TABLE `daftar_order`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD UNIQUE KEY `id_order` (`id_order`),
  ADD UNIQUE KEY `resi` (`resi`),
  ADD KEY `fk_user` (`id_user`);

--
-- Indexes for table `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `fk_order` (`id_order`),
  ADD KEY `fk_batik` (`id_batik`);

--
-- Indexes for table `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`id_kurir`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id_rating`),
  ADD KEY `fk_order_rating` (`id_order`),
  ADD KEY `fk_user_rating` (`id_user`),
  ADD KEY `fk_batik_rating` (`id_batik`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `telepon` (`telepon`);

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
  MODIFY `id_batik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `daftar_order`
--
ALTER TABLE `daftar_order`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `kurir`
--
ALTER TABLE `kurir`
  MODIFY `id_kurir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daftar_order`
--
ALTER TABLE `daftar_order`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON UPDATE CASCADE;

--
-- Constraints for table `detail_order`
--
ALTER TABLE `detail_order`
  ADD CONSTRAINT `fk_batik` FOREIGN KEY (`id_batik`) REFERENCES `batik` (`id_batik`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_order` FOREIGN KEY (`id_order`) REFERENCES `daftar_order` (`id_order`) ON UPDATE CASCADE;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `fk_batik_rating` FOREIGN KEY (`id_batik`) REFERENCES `batik` (`id_batik`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_order_rating` FOREIGN KEY (`id_order`) REFERENCES `daftar_order` (`id_order`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_rating` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

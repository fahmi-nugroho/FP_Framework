-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 23, 2021 at 03:42 PM
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

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul_artikel`, `isi_artikel`, `tanggal_artikel`, `gambar_artikel`) VALUES
(2, 'Motif Batik Burung Kampung Jetis', 'Batik Jetis, Sidoarjo khas sentuhan motif burung merak yang mengembangkan ekor panjang yang indah. Selain itu dipenuhi warna cerah seperti biru, kuning dan hijau. Sedangkan batik khas Solo dan Yogyakarta berwarna coklat atau sogan.\r\n\r\nKarena ketekunannya mempertahankan batik Jetis, Miftach dipercaya mengikuti berbagai pameran. Bahkan, sebanyak 10 warga Australia, Jerman, Amerika, Belgia dan Kanada belajar membatik. Ia juga memamerkan sejumlah pejabat negara membeli batik karyanya. Namun, kini ia mengaku kesulitan pekerja untuk membuat batik tulis. Sebab, tak banyak generasi muda yang tertarik membatik.', '2021-06-11', '60c358e7cf52e2_77013164.jpg'),
(3, '12 LANGKAH PROSES MEMBUAT KAIN BATIK TULIS!', 'Berikut tahap-tahap dan istilah-istilah dalam proses pembuatan kain batik tulis asli mulai dari pembuatan pola pertama sampai pewarnaan terakhir:\r\n\r\n1. Nyungging\r\n\r\nProses pertama kali ketika membuat batik tulis yaitu membuat pola di atas kertas yang dikerjakan oleh spesialis pola. Tidak semua orang dapat mengerjakan pola ini.\r\n\r\n2. Njaplak\r\n\r\nProses memindahkan pola dari kertas ke kain.\r\n\r\n3. Nglowong\r\n\r\nDi tahap ini, pembatik mulai melekatkan malam/lilin sesuai dengan pola yang telah dibuat.\r\n\r\n4. Ngiseni\r\n\r\nMemberikan isen-isen (isian) pada ornamen-ornamen tertentu seperti gambar bunga atau hewan.\r\n\r\n5. Nyolet\r\n\r\nMemberikan warna pada bagian-bagian tertentu dengan kuas.\r\n\r\n6. Mopok\r\n\r\nBagian ini adalah menutup bagian yang telah dicolet dengan malam.\r\n\r\n7. Nembok\r\n\r\nProses menutup bagian latar belakang pola yang tidak perlu diwarnai.\r\n\r\n8. Ngelir\r\n\r\nProses pewarnaan kain secara menyeluruh dengan memasukkannya ke dalam pewarna alam atau kimia.\r\n\r\n9. Nglorod\r\n\r\nProses meluruhkan malam untuk pertama kali dengan merendamkannya di dalam air mendidih.\r\n\r\n10. Ngrentesi\r\n\r\nProses memberikan titik/cecek pada klowongan menggunakan canting dengan jarum yang tipis\r\n\r\n11. Nyumri\r\n\r\nMenutup bagian tertentu dengan malam.\r\n\r\n12 . Nglorod\r\n\r\nProses akhir meluruhkan dan melarutkan malam pada kain dengan memasukkan pada air mendidih, kemudian diangin-anginkan sampai kering.\r\n\r\nProses nglorod tergantung pada banyaknya warna yang ingin dihasilkan pada satu helai kain batik. Semakin banyak warna yang diinginkan, semakin banyak proses nglorod yang akan dilakukan.\r\n\r\nItulah mengapa kain batik memiliki nilai dan harga yang lebih tinggi dibandingkan batik-batik lainnya. Proses pengerjaan satu kain batik membutuhkan kesabaran, ketekunan dan ketelitian dari masing-masing pengrajin batik. Proses pengerjaan yang panjang dan rumit biasanya membutuhkan waktu berbulan-bulan sampai bertahun-tahun.', '2021-06-11', '60c3594b3cf378_70191388.jpg');

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
(2, 'Bunga Kupu - kupu', 'Kain Batik ber bahan halus nyaman di pakai &  tidak panas, berkualitas tinggi dengan Harga Kompetitif. Kami menggunakan kualitas bahan bagus, menggunakan Bahan  100% Cotton Mercerized (Katun Prima)', 75000, '241 x 110 cm', 18, 'Batik Sidoarjo Motif Bunga kupu kupu.jpg'),
(3, 'Burung Merak Coklat', 'Burung Merak Sebagai salah satu burung paling eksotis di dunia ini, dapat melambangkan si pemakai motif ini dengan keindahan yang abadi. Mereka juga melambangkan burung yang tangguh dan pantang menyerah. Mereka juga tidak ingin dianggap rendah lawanya. Bagaimana menjadi pribadi yang tangguh tapi tetap anggun.', 110000, '241 x 150 cm', 13, 'Batik Sidoarjo Motif Burung Merak 1.jpg'),
(4, 'Burung Merak', 'Motif ini digambarkan dengan burung merak yang saling berhadap hadapan dengan ekor yang mengembang seperti sedang menari. Ada pula kupu kupu kecil cantik dan dilengkapi gambar pohon kelapa beraksen hiasan tambahan lainnya.', 90000, '200 x 210 cm', 8, 'Batik Sidoarjo Motif Burung Merak 2.jpg'),
(5, 'Kembang Bayem', 'Motif Kembang Bayem ini terkait dengan banyaknya sayuran bayam di daerah pedesaan Sidoarjo. Tanaman tersebut sangat mudah dijumpai di sekitar rumah penduduk, baik yang ditanam maupun yang tumbuh liar.', 88000, '234 x 400 cm', 28, 'batik sidoarjo motif kembang bayem.jpg'),
(6, 'Mahkota', 'Batik Sekardangan dikenal masyarakat sebagai batik halus dan mahal. MotifMahkota adalah salah satu motif khas batik Sekardangan yang sudah dipatenkan oleh pemerintah daerah.Rumusan masalah penelitian ini meliputi bagaimana perwujudan motif Mahkota pada batiktulis Sekardangan Sidoarjo, dan bagaimana makna filosofi pada motif Mahkota di batik tulisSekardangan Sidoarjo?.', 92000, '171 x 240 cm', 19, 'Batik Sidoarjo Motif Mahkota.jpg'),
(8, 'Rawan Kenceng', 'Motif ini diberi nama Rawan Kenceng karena memiliki latar berupa garis yang berkelok-kelok. Garis yang berkelok-kelok ini disebut rawan, yang berasal dari kata “rawa” yang mendapat imbuhan “an”. Yang menjadi motif utama adalah burung dan bunga sedangkan motif pelengkapnya adalah kupu-kupu dan surya majapahit.', 123000, '140 x 50 cm', 28, 'Batik Sidoarjo Motif Rawan kenceng.jpg'),
(9, 'Sawunggaling', 'Motif ini dibuat oleh Ngabehi Atmo Supomo, seorang penatah wayang yang diberikan kepada salah satu pelopot motif batik di Indonesia bernama Hardjonegoro atau yang dikenal luas dengan Go Tik.', 310000, '130 x 350 cm', 11, 'batik sidoarjo motif sawunggaling.jpg'),
(10, 'Tambal Segitiga', 'Motif hias tambal segitiga sudah ada sejak masa prasejarah hingga sekarang. Dimana pada masa pra-sejarah tersebut, filosofi motif batik tumpal ini memiliki fungsi magis sebagai penggambaran dari yang hal bersifat keduniaan menuju kepada transenden atau ketuhanan.', 140000, '190 x 110 cm', 25, 'batik tambal segitiga.jpg'),
(11, 'Uwer', 'merupakan batik yang menggunakan motif yang indah dan juga artistik tanpa memiliki makna dan juga harapan tertentu pada garis motif nya. Pemakaian motif batik yang memperlihatkan keindahan alam masyarakat daerah.', 290000, '220 x 250 cm', 15, 'Batik Sidoarjo Motif Uwer.jpg'),
(12, 'Sekar Jagad', 'Batik Sekar Jagad adalah salah satu motif batik khas Indonesia. Motif ini mengandung makna kecantikan dan keindahan sehingga orang lain yang melihat akan terpesona. Ada pula yang beranggapan bahwa motif Sekar Jagad sebenarnya berasal dari kata \"kar jagad\" yang diambil dari bahasa Jawa (Kar=peta; Jagad=dunia), sehingga motif ini juga melambangkan keragaman di seluruh dunia.', 150000, '210 x 90 cm', 7, 'Batik Sidoarjo Motif Sekar Jagad.jpg'),
(13, 'Sekardangan', 'Kabupaten Sidoarjo telah menjadi daerah sentra batik Sebut saja Batik Sekardangan Jetis Tulangan Kedungcangkring dan Cina Peranakan dimana masing masing batik yang dihasilkan memiliki ciri khas dan karakteristik tersendiri.', 200000, '150 x 150 cm', 16, 'Batik Sidoarjo motif Sekardangan.jpg'),
(14, 'Rawan Wungu', 'motif rawan yang berarti rawa. Jika rawa digambarkan lurus disebut Rawan Kenceng, namun jika rawa digambarkan berkelok-kelok maka disebut Rawan Inggek/Enggok. Motif-motif batik Jetis Sidoarjo pada 1990an mengalami kemajuan pesat, pengrajin dalam penciptaan batik motif batik lebih ditujukan kepada keindahan bentuk baku yang diarahkan pada pemenuhan selera pemakai (konsumen).', 150000, '310 x 210 cm', 23, 'Batik Tulis Sidoarjo Rawan Wungu.jpg');

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
(1, 1623283968, 4, 'rifan', '10-06-2021', 'Perumahan Sejahtera', '087755565590', 2170000, 'JNT', 'Pesanan Selesai', '60c376fc66c1f8_54046704.jpg', '345345'),
(4, 1623325349, 4, 'rifan', '10-06-2021', 'Jl. P. Diponegoro, Lemah Putro, Sidoarjo, Jawa Timur 61213', '087755565590', 1968000, 'Ambil ditempat', 'Pesanan Selesai', '5ffdd146cabbb.jpg', NULL),
(5, 1623330875, 4, 'rifan', '10-06-2021', 'Perumahan Sejahtera', '087755565590', 11195500, 'SiCepat', 'Pesanan Selesai', NULL, NULL),
(6, 1623426303, 4, 'Rifanz', '11-06-2021', 'Jl. P. Diponegoro, Lemah Putro, Sidoarjo, Jawa Timur 61213', '087755565590', 1030000, 'Ambil ditempat', 'Pesanan Selesai', '60c3850ea98590_27899146.jpg', '12942834'),
(7, 1623429017, 4, 'Rifanz', '11-06-2021', 'Perumahan Sejahtera', '087755565590', 102000, 'POS', 'Pesanan Dibatalkan', NULL, NULL),
(8, 1623430488, 4, 'Rifanz', '11-06-2021', 'Jl. P. Diponegoro, Lemah Putro, Sidoarjo, Jawa Timur 61213', '087755565590', 88000, 'Ambil ditempat', 'Pesanan Selesai', '60c39565dd4b69_92525456.jpg', NULL),
(9, 1624461804, 4, 'Rifanz', '23-06-2021', 'Jl. P. Diponegoro, Lemah Putro, Sidoarjo, Jawa Timur 61213', '087755565590', 368000, 'Ambil ditempat', 'Pesanan Selesai', '60d3520086c416_86282574.jpg', NULL);

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
(26, 1623330875, 14, 8, '150000'),
(27, 1623426303, 1, 1, '150000'),
(28, 1623426303, 5, 10, '88000'),
(29, 1623429017, 6, 1, '92000'),
(30, 1623430488, 5, 1, '88000'),
(31, 1624461804, 6, 4, '92000');

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
(26, 1623330875, 4, 14, 7),
(27, 1623426303, 4, 1, 9),
(28, 1623426303, 4, 5, 1),
(29, 1623430488, 4, 5, 10);

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
(4, 'Rifanz', 'rifan@gmail.com', '$2y$10$E1jEiCfmEWvh.qxSWuyx/.eKGGKPa/ciMybubxSPfAv5Gog7D1jTW', '087755565590', 'Perumahan Sejahtera', '60c34b1d39f1f0_53971704.jpg');

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
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `batik`
--
ALTER TABLE `batik`
  MODIFY `id_batik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `daftar_order`
--
ALTER TABLE `daftar_order`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `kurir`
--
ALTER TABLE `kurir`
  MODIFY `id_kurir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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

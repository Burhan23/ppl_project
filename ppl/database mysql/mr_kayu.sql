-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2023 at 06:09 AM
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
-- Database: `mr_kayu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_mrkayu`
--

CREATE TABLE `admin_mrkayu` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `role` varchar(100) NOT NULL DEFAULT 'Full Access',
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_mrkayu`
--

INSERT INTO `admin_mrkayu` (`id`, `fname`, `email`, `username`, `role`, `password`) VALUES
(1, 'FARHAN BURHANUDIN', 'admin@gmail.com', 'admin', 'Full Access', 'kelompok3');

-- --------------------------------------------------------

--
-- Table structure for table `bayar`
--

CREATE TABLE `bayar` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `gmail` varchar(255) NOT NULL,
  `jumlah` int(255) NOT NULL,
  `metode` varchar(255) NOT NULL,
  `nomer` varchar(255) NOT NULL,
  `username_pengrajin` varchar(255) NOT NULL,
  `bukti` varchar(100) NOT NULL DEFAULT 'SCAM',
  `status` varchar(100) NOT NULL DEFAULT '1',
  `id_invest` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bayar`
--

INSERT INTO `bayar` (`id`, `username`, `gmail`, `jumlah`, `metode`, `nomer`, `username_pengrajin`, `bukti`, `status`, `id_invest`) VALUES
(1, 'king', 'king@gmail.com', 20000000, 'dana', '1223213213', 'john', 'honkai-star-rail-gamescom-2022-trailer-(1).png', '2', '1'),
(2, 'john', 'john@gmail.com', 20000000, 'dana', '2142141', 'king@gmail.com', 'riko.png', '4', '1'),
(3, 'john', 'john@gmail.com', 20000000, 'gopay', '14212411223', 'king@gmail.com', 'kerjainan.jpg', '4', '1'),
(4, 'king', 'king@gmail.com', 1213212312, 'dana', '21312121322', 'john', '11bg.jpg', '2', '2');

-- --------------------------------------------------------

--
-- Table structure for table `invest`
--

CREATE TABLE `invest` (
  `id` int(11) NOT NULL,
  `email_investor` varchar(255) NOT NULL,
  `username_investor` varchar(255) NOT NULL,
  `nik_investor` varchar(100) NOT NULL,
  `jumlah_dana` int(100) NOT NULL,
  `nama_pengrajin` varchar(100) NOT NULL,
  `status_investor` varchar(100) NOT NULL DEFAULT 'Permintaan sudah dikirim, Menunggu respon',
  `status_pengrajin` varchar(100) NOT NULL DEFAULT 'Menunggu respon',
  `status` varchar(100) NOT NULL DEFAULT '1',
  `tanggal` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invest`
--

INSERT INTO `invest` (`id`, `email_investor`, `username_investor`, `nik_investor`, `jumlah_dana`, `nama_pengrajin`, `status_investor`, `status_pengrajin`, `status`, `tanggal`) VALUES
(1, 'king@gmail.com', 'king', 'false', 20000000, 'john', 'Silahkan cek rekning anda, jika ada masalah hubungi https://wa.me/6282122321', 'Selesai, Terima kasih', '4', '2023-05-08'),
(2, 'king@gmail.com', 'king', 'false', 1213212312, 'john', 'Selesai, Ambil Investasimu pada ', 'Silahkan cek rekning anda, jika ada masalah hubungi https://wa.me/6282122321', '4', '2023-05-08'),
(3, 'king@gmail.com', 'king', 'false', 12000000, 'john', 'Permintaan diterima, Bayar sekarang', 'Permintaan diterima,Sedang Diproses', '2', '2023-05-08'),
(4, 'king@gmail.com', 'king', '213213231', 20000000, 'john', 'Permintaan sudah dikirim, Menunggu respon', 'Menunggu respon', '1', '2023-05-12');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama_product` varchar(50) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama_product`, `gambar`, `deskripsi`, `username`) VALUES
(2, 'Muramasa blade', '2022-10-01-14-27-09_0.png', 'Pedang kayu pembelah gunung', 'jerry'),
(4, 'Lebaran ya..', 'kerjainan.jpg', 'motor mainan berkualitas tinggi selama 3 hari', 'john');

-- --------------------------------------------------------

--
-- Table structure for table `topup`
--

CREATE TABLE `topup` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `gmail` varchar(255) NOT NULL,
  `jumlah` int(255) NOT NULL,
  `metode` varchar(255) NOT NULL,
  `nomer` varchar(255) NOT NULL,
  `bukti` varchar(100) NOT NULL DEFAULT 'SCAM'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `upgrade`
--

CREATE TABLE `upgrade` (
  `id` int(11) NOT NULL,
  `npwp` varchar(20) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `no_rekening` varchar(20) NOT NULL,
  `deskripsi` text NOT NULL,
  `bukti_ktp` varchar(100) NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upgrade`
--

INSERT INTO `upgrade` (`id`, `npwp`, `nik`, `no_rekening`, `deskripsi`, `bukti_ktp`, `id_users`) VALUES
(7, '2132113211', '241124121', '42142121421', '', 'Frame 32.png', 33);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pp` varchar(255) NOT NULL DEFAULT 'default-pp.png',
  `role` varchar(100) NOT NULL,
  `npwp` varchar(100) NOT NULL DEFAULT 'false',
  `nik` varchar(100) NOT NULL DEFAULT 'false',
  `no_rekening` varchar(100) NOT NULL DEFAULT 'false',
  `deskripsi` text NOT NULL DEFAULT 'Ini merupakan desktipsi pengrajin mengenai kerajinan',
  `last_login` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `email`, `username`, `password`, `pp`, `role`, `npwp`, `nik`, `no_rekening`, `deskripsi`, `last_login`) VALUES
(28, 'king', 'king@gmail.com', 'king', '123', 'logos.png', '2', '213132123', '213213231', '321231321', '', '2023-05-15'),
(29, 'jerry', 'jerry@gmail.com', 'jerry', '123', 'bmc.png', '1', 'false', 'false', 'false', 'Ini merupakan desktipsi pengrajin mengenai kerajinan', '2023-05-07'),
(30, 'John Chena', 'john@gmail.com', 'john', '123', 'logos.png', '1', '12121212122', '1234567890123456', '1234567890123456', '<p>Halo guys</p>\r\n\r\n<p>kembali dengan saya di youtube</p>\r\n\r\n<p>Dssssaddddddddddddddddddddddddd dddddddddddddddd ddddddddddddddd dddddddddddddd dddddddddddddd dddddddddddddddd ddddddddddddd</p>\r\n', '2023-05-15'),
(31, 'Mont3r', 'mont3r@gmail.com', 'mon', '123', 'honkai-star-rail-gamescom-2022-trailer-(1).png', '2', 'false', 'false', 'false', 'Ini merupakan desktipsi pengrajin mengenai kerajinan', '2023-05-10'),
(32, 'gogo', 'gogo@gmail.com', 'gogo', '123', 'Gambaran Aplikasi.png', '1', '2132122412', '2142121412', '2132131221', '<p>halo</p>\r\n', '2023-05-12'),
(33, 'wanyu', 'nano@gmail.com', 'nano', '123', 'WhatsApp Image 2023-05-04 at 12.05.56 PM.jpeg', '1', 'false', 'false', 'false', 'Ini merupakan desktipsi pengrajin mengenai kerajinan', '2023-05-12'),
(34, 'robert', 'root@gmail.com', 'root', '123', '11bg.jpg', '1', 'false', 'false', 'false', 'Ini merupakan desktipsi pengrajin mengenai kerajinan', '2023-05-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_mrkayu`
--
ALTER TABLE `admin_mrkayu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `bayar`
--
ALTER TABLE `bayar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invest`
--
ALTER TABLE `invest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topup`
--
ALTER TABLE `topup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upgrade`
--
ALTER TABLE `upgrade`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD UNIQUE KEY `no_rekening` (`no_rekening`),
  ADD UNIQUE KEY `id_users` (`id_users`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_mrkayu`
--
ALTER TABLE `admin_mrkayu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bayar`
--
ALTER TABLE `bayar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `invest`
--
ALTER TABLE `invest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `topup`
--
ALTER TABLE `topup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `upgrade`
--
ALTER TABLE `upgrade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2018 at 10:38 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `market`
--

-- --------------------------------------------------------

--
-- Table structure for table `apotek`
--

CREATE TABLE `apotek` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `jalan` varchar(255) NOT NULL,
  `no_rek` varchar(50) NOT NULL,
  `no_izin` varchar(100) NOT NULL,
  `apoteker` varchar(255) NOT NULL,
  `id_login` int(11) NOT NULL,
  `id_provinsi` varchar(100) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `id_kota` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apotek`
--

INSERT INTO `apotek` (`id`, `nama`, `no_hp`, `jalan`, `no_rek`, `no_izin`, `apoteker`, `id_login`, `id_provinsi`, `provinsi`, `id_kota`, `kota`) VALUES
(1, 'test', '1212', 'jajsdlkasjdkl', '124123', '125123123', 'skadjkasjlkdasdasd', 1, '11', 'Jawa TImur', '363', 'Ponorogo');

-- --------------------------------------------------------

--
-- Table structure for table `bukti_pembayaran`
--

CREATE TABLE `bukti_pembayaran` (
  `id` int(11) NOT NULL,
  `pengirim` varchar(255) NOT NULL,
  `penerima` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `tgl_upload` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `id_login` int(11) NOT NULL,
  `id_provinsi` varchar(100) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `id_kota` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `jalan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `nama`, `no_hp`, `id_login`, `id_provinsi`, `provinsi`, `id_kota`, `kota`, `jalan`) VALUES
(1, 'admin', '0172123', 1, '11', 'jawa timur', '256', 'Malang', 'Kembang Kertas'),
(2, 'ervi', '08579648537', 2, '11', 'jawa timur', '256', 'Malang', 'Kembang');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id`, `id_transaksi`, `id_produk`, `jumlah`, `status`) VALUES
(14, 12, 3, 4, 1),
(16, 13, 3, 1, 1),
(17, 13, 2, 2, 1),
(18, 14, 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_obat`
--

CREATE TABLE `jenis_obat` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_obat`
--

INSERT INTO `jenis_obat` (`id`, `nama`) VALUES
(1, 'tes'),
(2, 'hmmm\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `komposisi` varchar(255) NOT NULL,
  `indikasi` varchar(255) NOT NULL,
  `isi` varchar(255) NOT NULL,
  `harga` varchar(10) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `berat` double NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_apotek` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `komposisi`, `indikasi`, `isi`, `harga`, `gambar`, `stok`, `berat`, `id_jenis`, `id_apotek`) VALUES
(1, 'paramex', 'aaffrgg, ahsvdfbdsfj', 'pusing, panas, dingin', '12', '5000', 'komen_perang_meme1.jpg', 12, 1, 1, 1),
(2, 'akjsdhsjkadh', 'hajksdhaskd', '123', '1', '1', 'komen_perang_meme1.jpg', 1, 1, 2, 1),
(3, 'test', '123', '123', '234', '12', 'komen_perang_meme1.jpg', 123, 12, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `id` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `id_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `tgl` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total` varchar(10) NOT NULL,
  `metode` varchar(255) NOT NULL,
  `ongkir` varchar(10) NOT NULL,
  `status` int(1) NOT NULL,
  `id_customer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `tgl`, `total`, `metode`, `ongkir`, `status`, `id_customer`) VALUES
(12, '2018-05-19 00:14:17', '48', '3', '25000', 2, 1),
(13, '2018-05-19 03:04:07', '14', '3', '14000', 2, 1),
(14, '2018-05-19 03:17:52', '12', '3', '7000', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `status`) VALUES
(1, 'a@a.com', '202cb962ac59075b964b07152d234b70', 1),
(2, 'b@b.com', '202cb962ac59075b964b07152d234b70', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apotek`
--
ALTER TABLE `apotek`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_login` (`id_login`);

--
-- Indexes for table `bukti_pembayaran`
--
ALTER TABLE `bukti_pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_login` (`id_login`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `jenis_obat`
--
ALTER TABLE `jenis_obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `id_apotek` (`id_apotek`);

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apotek`
--
ALTER TABLE `apotek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bukti_pembayaran`
--
ALTER TABLE `bukti_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `jenis_obat`
--
ALTER TABLE `jenis_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `resep`
--
ALTER TABLE `resep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apotek`
--
ALTER TABLE `apotek`
  ADD CONSTRAINT `apotek_ibfk_1` FOREIGN KEY (`id_login`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bukti_pembayaran`
--
ALTER TABLE `bukti_pembayaran`
  ADD CONSTRAINT `bukti_pembayaran_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`id_login`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_obat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produk_ibfk_2` FOREIGN KEY (`id_apotek`) REFERENCES `apotek` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `resep`
--
ALTER TABLE `resep`
  ADD CONSTRAINT `resep_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

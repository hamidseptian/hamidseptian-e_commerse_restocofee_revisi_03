-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2021 at 12:56 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerse_cofeeresto`
--

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_toko` varchar(25) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `jenis` varchar(25) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar_produk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_toko`, `nama_produk`, `jenis`, `harga`, `gambar_produk`) VALUES
(3, '66', 'Gubuk coffee milk', '', 16000, '210825105005kochenk.jpg'),
(4, '66', 'Coffee chocolate', '', 17000, ''),
(5, '66', 'Long black', '', 15000, ''),
(6, '66', 'Coffee latte', '', 15000, ''),
(7, '66', 'Vanilla latte', '', 16000, ''),
(8, '66', 'Vietnam drip ori', '', 14000, ''),
(9, '66', 'Vietnam drip milk', '', 15000, ''),
(10, '66', 'Coffee beer', '', 15000, ''),
(11, '66', 'Avocado coffee', '', 17000, ''),
(12, '66', 'Kentang goreng', '', 10000, ''),
(13, '66', 'Nugget', '', 12000, ''),
(14, '66', 'Chicken wings', '', 20000, ''),
(15, '66', 'Kebab', '', 18000, ''),
(16, '66', 'Mie rebus/goreng', '', 15000, ''),
(17, '66', 'Spaghetti', '', 14000, ''),
(18, '66', 'Beef barbeque', '', 20000, ''),
(19, '66', 'Beef spicy', '', 20000, ''),
(20, '66', 'Siomay goreng', '', 15000, ''),
(21, '50', 'Espresso', '', 12000, ''),
(22, '50', 'Macchiato', '', 14000, ''),
(23, '50', 'Minilatte', '', 14000, ''),
(24, '50', 'Bleck kopi', '', 13000, ''),
(25, '50', 'Cappuccino', '', 15000, ''),
(26, '50', 'Kopilatte', '', 15000, ''),
(27, '50', 'Kopimoka', '', 17000, ''),
(28, '50', 'Nteh latte', '', 12000, ''),
(29, '50', 'Nteh choco', '', 15000, ''),
(30, '50', 'Cokelat', '', 15000, ''),
(31, '50', 'Taro', '', 15000, ''),
(32, '16', 'Nila goreng', '', 11500, ''),
(33, '16', 'Gurame goreng', '', 13800, ''),
(34, '16', 'Kakap putih bakar', '', 14950, ''),
(35, '16', 'Kakap merah bakar', '', 16100, ''),
(36, '16', 'Paket kampoeng 1(nasi,ayam penyet,lalapan,sambal)', '', 15000, ''),
(37, '16', 'Paket kampoeng 2(nasi,ayam kremes,lalapan,sambal)', '', 18000, ''),
(38, '16', 'Paket kampoeng 3(nasi,ayam bakar,lalapan,sambal)', '', 18000, ''),
(39, '16', 'Paket mix pak tristo 1(kerang pelangi,kerang bumbu', '', 40000, ''),
(40, '16', 'Paket mix pak tristo 2(kerang pelangi,kerang bumbu', '', 65000, ''),
(41, '16', 'Paket mix pak tristo 3(kerang pelangi,kerang bumbu', '', 65000, ''),
(42, '16', 'Juice mangga', '', 14000, ''),
(43, '16', 'Juice alpukat', '', 13000, ''),
(44, '16', 'Juice nanas', '', 13000, ''),
(45, '16', 'Juice melon', '', 12000, ''),
(46, '16', 'Juice semangka', '', 10000, ''),
(47, '42', 'otak - otak', 'Makanan', 6000, ''),
(48, '42', 'Lupis', '', 9000, ''),
(49, '42', 'Ketoprak', '', 16000, ''),
(50, '42', 'Lontong sayur', '', 15000, ''),
(51, '42', 'Lontong pical', '', 16000, ''),
(52, '42', 'Dimsum siomay', '', 16000, ''),
(53, '42', 'Dimsum lumpia', '', 15000, ''),
(54, '42', 'Bubur ayam', '', 18000, ''),
(55, '42', 'Bubur polos', '', 15000, ''),
(57, '42', 'Bihun ayam', '', 20000, ''),
(58, '42', 'Bihun goreng', '', 20000, ''),
(59, '42', 'Bihun karie', '', 22000, ''),
(60, '42', 'Kwetiaw kuah', '', 25000, ''),
(61, '42', 'Nasi rawon', '', 28000, ''),
(62, '42', 'Nasi Sup buntut', '', 45000, ''),
(64, '66', 'es durian', '', 30000, '20210812084512kochenk.jpg'),
(65, '66', 'wefwefvv', '', 4534534, '20210824095233sampulbuku1.jpg'),
(66, '66', 'Minas', 'Minuman', 30000, '20210829043443padi.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

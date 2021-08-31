-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2021 at 12:55 PM
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
-- Table structure for table `pesan_mitra`
--

CREATE TABLE `pesan_mitra` (
  `id_pesan_mitra` int(11) NOT NULL,
  `id_toko` varchar(5) NOT NULL,
  `judul` text NOT NULL,
  `isi` text NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `jam` varchar(10) NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesan_mitra`
--

INSERT INTO `pesan_mitra` (`id_pesan_mitra`, `id_toko`, `judul`, `isi`, `tanggal`, `jam`, `status`) VALUES
(1, '', 'adasd', '<p>asdgsad</p>\r\n', '2021-08-29', '17:28', ''),
(3, '66', 'Suspend se', '<p>karena bersalah ya</p>\r\n', '2021-08-29', '17:40', 'R'),
(4, '66', 'QQ', '<p>AAAA</p>\r\n', '2021-08-29', '17:52', ''),
(5, '66', 'assd', '<p>ad ads</p>\r\n', '2021-08-29', '17:52', 'R');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pesan_mitra`
--
ALTER TABLE `pesan_mitra`
  ADD PRIMARY KEY (`id_pesan_mitra`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pesan_mitra`
--
ALTER TABLE `pesan_mitra`
  MODIFY `id_pesan_mitra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

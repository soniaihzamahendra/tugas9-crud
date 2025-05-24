-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2025 at 06:02 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pwd2`
--

-- --------------------------------------------------------

--
-- Table structure for table `bunga`
--

CREATE TABLE `bunga` (
  `id_bunga` int(11) NOT NULL,
  `nama_bunga` varchar(50) NOT NULL,
  `jenis_bunga` varchar(50) NOT NULL,
  `warna` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bunga`
--

INSERT INTO `bunga` (`id_bunga`, `nama_bunga`, `jenis_bunga`, `warna`) VALUES
(1, 'Tulip', 'Bunga Potong', 'Kuning'),
(2, 'Lily of the Valley', 'Bunga Hias', 'Putih'),
(3, 'Peony', 'Bunga Taman', 'Merah Muda'),
(4, 'Daisy', 'Bunga Liar', 'Putih'),
(5, 'Hydrangea', 'Bunga Hias', 'Biru');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bunga`
--
ALTER TABLE `bunga`
  ADD PRIMARY KEY (`id_bunga`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bunga`
--
ALTER TABLE `bunga`
  MODIFY `id_bunga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2022 at 10:26 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barbershop`
--

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `Id_Pelanggan` int(255) NOT NULL,
  `Nama_Pelanggan` varchar(255) NOT NULL,
  `Alamat` varchar(255) NOT NULL,
  `Handphone` int(255) NOT NULL,
  `No_Antrian` int(255) NOT NULL,
  `Tipe_Antrian` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`Id_Pelanggan`, `Nama_Pelanggan`, `Alamat`, `Handphone`, `No_Antrian`, `Tipe_Antrian`) VALUES
(2, 'Reihan Wiyanda', 'Jln Kubang Utara No 25', 2147483647, 1, 'Home'),
(3, 'Asep', 'Jln Diditu', 892391233, 2, 'Home');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_Pengguna` int(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Status` varchar(25) NOT NULL,
  `Nama_lengkap` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_Pengguna`, `Username`, `Password`, `Status`, `Nama_lengkap`) VALUES
(1, 'mancung12345', '12345', 'Admin', 'Reihan Wiyanda'),
(2, 'divasabila', '12345', 'Kasir', 'Diva Sabila Ramadhan'),
(3, 'ginanjar12345', '12345', 'Barbermen', 'Ginanjar'),
(4, 'rendy12345', '12345', 'Owner', 'Rendy D'),
(5, 'rachman12345', '12345', 'Admin', 'Rachman A'),
(6, 'firman12345', '12345', 'Kasir', 'Firman S'),
(7, 'galih12345', '12345', 'Pelanggan', 'Galih Adam Firdaus');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `Id_Produk` int(255) NOT NULL,
  `Nama_Produk` varchar(255) NOT NULL,
  `Harga_Produk` int(255) NOT NULL,
  `Kategori_Produk` varchar(255) NOT NULL,
  `Foto_Produk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`Id_Produk`, `Nama_Produk`, `Harga_Produk`, `Kategori_Produk`, `Foto_Produk`) VALUES
(16, 'Mohack', 25000, 'Model', '2475-ptg-rambut2.jpg'),
(17, 'Pompadour', 25000, 'Model', '3554-Pompadour.jpg'),
(18, 'Undercut', 25000, 'Model', '4314-ptg-rambut5.jpg'),
(19, 'Brush On Top', 25000, 'Model', '1898-ptg-rambut7.jpg'),
(20, 'Fade', 25000, 'Model', '8170-ptg-rambut3.jpg'),
(21, 'Comb Over', 30000, 'Model', '3746-ptg-rambut9.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`Id_Pelanggan`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_Pengguna`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`Id_Produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `Id_Pelanggan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_Pengguna` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `Id_Produk` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

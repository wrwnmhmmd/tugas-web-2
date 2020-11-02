-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2020 at 07:47 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_branch`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cso`
--

CREATE TABLE `tbl_cso` (
  `id_cso` int(10) NOT NULL,
  `nama_cso` varchar(255) NOT NULL,
  `npp_cso` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cso`
--

INSERT INTO `tbl_cso` (`id_cso`, `nama_cso`, `npp_cso`) VALUES
(1, 'Muhammad Rizka', '80077'),
(2, 'Wirawan Muhammad', '80001');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nasabah`
--

CREATE TABLE `tbl_nasabah` (
  `id_nasabah` int(10) NOT NULL,
  `nama_nasabah` varchar(255) NOT NULL,
  `nomor_rekening` char(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nomor_handphone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_nasabah`
--

INSERT INTO `tbl_nasabah` (`id_nasabah`, `nama_nasabah`, `nomor_rekening`, `email`, `alamat`, `nomor_handphone`) VALUES
(3, 'Jihan Noerisma', '0542235012', 'jihannoerisma77@yahoo.co.id', 'Jl Antasari No.24, Jakarta Selatan', '085720453252'),
(6, 'Marvel Parulian', '0506758421', 'marvelparulian@gmail.com', 'Komplek Bedahan Timur No.48, Depok', '087856230213');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teller`
--

CREATE TABLE `tbl_teller` (
  `id_teller` int(10) NOT NULL,
  `nama_teller` varchar(255) NOT NULL,
  `npp_teller` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_teller`
--

INSERT INTO `tbl_teller` (`id_teller`, `nama_teller`, `npp_teller`) VALUES
(1, 'Wirawan', '80079'),
(3, 'Virgi', '343242');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_cso`
--

CREATE TABLE `transaksi_cso` (
  `id_transaksi` int(10) NOT NULL,
  `id_cso` int(10) NOT NULL,
  `id_nasabah` int(10) NOT NULL,
  `jenis_layanan` varchar(255) NOT NULL,
  `tgl_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_cso`
--

INSERT INTO `transaksi_cso` (`id_transaksi`, `id_cso`, `id_nasabah`, `jenis_layanan`, `tgl_transaksi`) VALUES
(4, 1, 3, 'Ganti Buku Tabungan', '2020-11-01'),
(5, 2, 3, 'Ganti Buku Tabungan', '2020-11-01'),
(6, 2, 6, 'Ganti Buku Tabungan', '2020-11-01');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_teller`
--

CREATE TABLE `transaksi_teller` (
  `id_transaksi` int(10) NOT NULL,
  `id_teller` int(10) NOT NULL,
  `id_nasabah` int(10) NOT NULL,
  `nilai_setor_tunai` int(20) NOT NULL,
  `tanggal_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_teller`
--

INSERT INTO `transaksi_teller` (`id_transaksi`, `id_teller`, `id_nasabah`, `nilai_setor_tunai`, `tanggal_transaksi`) VALUES
(1, 1, 3, 700000000, '2020-10-15'),
(2, 1, 6, 900000000, '2020-11-01');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(3, 'wrwnmhmmd', '$2y$10$lcS1SymtbU1BnqfYFXqs3eigIwrYBhgooX7/Mkf8W.yZT10AT0BuS'),
(5, 'admin', '$2y$10$.t.AFkiqFbVkD22yZZmyAep0SVFgkeQp3BLy9PIcVosPasbph0VTi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_cso`
--
ALTER TABLE `tbl_cso`
  ADD PRIMARY KEY (`id_cso`);

--
-- Indexes for table `tbl_nasabah`
--
ALTER TABLE `tbl_nasabah`
  ADD PRIMARY KEY (`id_nasabah`);

--
-- Indexes for table `tbl_teller`
--
ALTER TABLE `tbl_teller`
  ADD PRIMARY KEY (`id_teller`);

--
-- Indexes for table `transaksi_cso`
--
ALTER TABLE `transaksi_cso`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `transaksi_teller`
--
ALTER TABLE `transaksi_teller`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_cso`
--
ALTER TABLE `tbl_cso`
  MODIFY `id_cso` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_nasabah`
--
ALTER TABLE `tbl_nasabah`
  MODIFY `id_nasabah` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_teller`
--
ALTER TABLE `tbl_teller`
  MODIFY `id_teller` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi_cso`
--
ALTER TABLE `transaksi_cso`
  MODIFY `id_transaksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaksi_teller`
--
ALTER TABLE `transaksi_teller`
  MODIFY `id_transaksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2018 at 02:04 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `nama_member` varchar(100) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `job_member` varchar(100) NOT NULL,
  `foto_profile` varchar(100) NOT NULL,
  `tgl_daftar_member` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `nama_member`, `username`, `password`, `job_member`, `foto_profile`, `tgl_daftar_member`) VALUES
(1, 'Muhammad Ali Zufan', 'admin', 'admin', 'Administrator', 'zufan.jpg', '2018-04-15 15:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `nama_siswa`, `tgl_lahir`, `jenis_kelamin`, `alamat`) VALUES
(4, '291038', 'Resa', '2001-12-10', 'L', 'Tulungagung'),
(16, '481788', 'Azaria', '2001-03-03', 'P', 'Jombang'),
(17, '388719', 'Zida', '2000-03-08', 'L', 'Gadang'),
(22, '734671', 'Farhan', '2003-10-10', 'L', 'Banyuwangi'),
(23, '177176', 'Shevanata', '2001-04-17', 'P', 'Lumajang'),
(24, '193819', 'rohman', '2000-05-03', 'L', 'Pasuruan'),
(25, '1883817', 'nafuz', '2000-09-22', 'L', 'Jombang'),
(26, '1654553', 'udin', '1999-03-31', 'L', 'Kediri'),
(27, '8787798', 'Rama', '2006-09-27', 'L', 'Jombang'),
(28, '666622', 'zufan', '2018-04-24', 'L', 'jln danau baturrta'),
(30, '124141', 'sari', '2016-06-16', 'P', 'jln danau ranau'),
(31, '345321', 'nurlailai', '2018-04-11', 'P', 'jl kampung');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

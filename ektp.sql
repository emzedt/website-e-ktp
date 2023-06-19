-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2022 at 08:20 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ektp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbdatadiri`
--

CREATE TABLE `tbdatadiri` (
  `username` varchar(16) NOT NULL,
  `nik` int(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat` varchar(50) NOT NULL,
  `tanggallahir` date NOT NULL,
  `jeniskelamin` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `rtrw` varchar(50) NOT NULL,
  `keldesa` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `kewarganegaraan` varchar(50) NOT NULL,
  `ttd` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbdatadiri`
--

INSERT INTO `tbdatadiri` (`username`, `nik`, `nama`, `tempat`, `tanggallahir`, `jeniskelamin`, `alamat`, `rtrw`, `keldesa`, `kecamatan`, `agama`, `status`, `pekerjaan`, `kewarganegaraan`, `ttd`, `foto`) VALUES
('bryan', 123456789, 'BRYAN GANTENG', 'KERAK BUMI', '1970-09-10', 'LAKI-LAKI', 'BINTARO', '01/01', 'RISATU', 'RISATU', 'KATOLIK', 'KAWIN', 'MAHASISWA/PELAJAR', 'WNI', '99.png', 'dimitrov.jpg'),
('william', 31210072, 'WILLIAM', 'MEDAN', '1970-10-10', 'LAKI-LAKI', 'KALIDERES', '10/00', 'KALIDERES', 'KALIDERES', 'KRISTEN', 'KAWIN', 'MAHASISWA/PELAJAR', 'WNI', 'Andrey_Zhdanov.jpg', 'Biografi-Ahmad-Soebardjo-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbrole`
--

CREATE TABLE `tbrole` (
  `idrole` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbrole`
--

INSERT INTO `tbrole` (`idrole`, `role`) VALUES
(1, 'Pemohon'),
(2, 'Admin'),
(3, 'PetugasLayanan'),
(4, 'PetugasRekam'),
(5, 'Operator'),
(6, 'Kurir');

-- --------------------------------------------------------

--
-- Table structure for table `tbstatus`
--

CREATE TABLE `tbstatus` (
  `username` varchar(16) NOT NULL,
  `statusverif` varchar(50) NOT NULL,
  `statusrekam` varchar(50) NOT NULL,
  `statuspengiriman` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbstatus`
--

INSERT INTO `tbstatus` (`username`, `statusverif`, `statusrekam`, `statuspengiriman`) VALUES
('bryan', 'terverifikasi', 'data sudah terekam', 'Paket telah selesai diantar'),
('william', 'terverifikasi', 'data sudah terekam', 'Paket telah selesai diantar');

-- --------------------------------------------------------

--
-- Table structure for table `tbuser`
--

CREATE TABLE `tbuser` (
  `username` varchar(16) NOT NULL,
  `password` varchar(50) NOT NULL,
  `idrole` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbuser`
--

INSERT INTO `tbuser` (`username`, `password`, `idrole`) VALUES
('admin', '123', 2),
('bani', '123', 1),
('bryan', '123', 1),
('cell', '123', 1),
('kurir', '123', 6),
('operator', '123', 5),
('petugaslayanan', '123', 3),
('petugasrekam', '123', 4),
('william', '123', 1),
('zaidan', '123', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbdatadiri`
--
ALTER TABLE `tbdatadiri`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tbrole`
--
ALTER TABLE `tbrole`
  ADD PRIMARY KEY (`idrole`);

--
-- Indexes for table `tbstatus`
--
ALTER TABLE `tbstatus`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`username`),
  ADD KEY `idrole` (`idrole`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbdatadiri`
--
ALTER TABLE `tbdatadiri`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`username`) REFERENCES `tbuser` (`username`);

--
-- Constraints for table `tbstatus`
--
ALTER TABLE `tbstatus`
  ADD CONSTRAINT `fk_status` FOREIGN KEY (`username`) REFERENCES `tbuser` (`username`);

--
-- Constraints for table `tbuser`
--
ALTER TABLE `tbuser`
  ADD CONSTRAINT `fk_role` FOREIGN KEY (`idrole`) REFERENCES `tbrole` (`idrole`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

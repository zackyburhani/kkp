-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 02, 2018 at 01:51 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biyamaestrohardscape`
--

-- --------------------------------------------------------

--
-- Table structure for table `banding`
--

CREATE TABLE `banding` (
  `kd_kriteria` char(2) NOT NULL,
  `kd_kriteria2` char(2) NOT NULL,
  `nilaibanding` decimal(5,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `banding2`
--

CREATE TABLE `banding2` (
  `kd_subkriteria` char(3) NOT NULL,
  `kd_subkriteria2` char(3) NOT NULL,
  `nilaibanding2` decimal(5,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `calon`
--

CREATE TABLE `calon` (
  `id_calon` char(5) NOT NULL,
  `nm_calon` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `jk` varchar(1) NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `pendidikan_terakhir` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_calon` char(5) NOT NULL,
  `keterangan` varchar(15) NOT NULL,
  `hasil_akhir` decimal(5,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `kd_kriteria` char(2) NOT NULL,
  `nm_kriteria` varchar(30) NOT NULL,
  `eigenvector` decimal(5,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

CREATE TABLE `subkriteria` (
  `kd_subkriteria` char(3) NOT NULL,
  `nm_subkriteria` varchar(30) NOT NULL,
  `eigenvector_sub` decimal(5,4) NOT NULL,
  `kd_kriteria` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `target`
--

CREATE TABLE `target` (
  `kd_kriteria` char(2) NOT NULL,
  `id_calon` char(5) NOT NULL,
  `nilai_target` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `target2`
--

CREATE TABLE `target2` (
  `kd_subkriteria` char(3) NOT NULL,
  `id_calon` char(5) NOT NULL,
  `nilai_target2` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banding`
--
ALTER TABLE `banding`
  ADD KEY `kd_kriteria` (`kd_kriteria`),
  ADD KEY `kd_kriteria2` (`kd_kriteria2`);

--
-- Indexes for table `banding2`
--
ALTER TABLE `banding2`
  ADD KEY `kd_subkriteria` (`kd_subkriteria`),
  ADD KEY `kd_subkriteria2` (`kd_subkriteria2`);

--
-- Indexes for table `calon`
--
ALTER TABLE `calon`
  ADD PRIMARY KEY (`id_calon`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD KEY `id_calon` (`id_calon`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`kd_kriteria`);

--
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`kd_subkriteria`),
  ADD KEY `kd_kriteria` (`kd_kriteria`);

--
-- Indexes for table `target`
--
ALTER TABLE `target`
  ADD KEY `kd_kriteria` (`kd_kriteria`),
  ADD KEY `id_calon` (`id_calon`);

--
-- Indexes for table `target2`
--
ALTER TABLE `target2`
  ADD KEY `kd_subkriteria` (`kd_subkriteria`),
  ADD KEY `id_calon` (`id_calon`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `banding`
--
ALTER TABLE `banding`
  ADD CONSTRAINT `banding_ibfk_1` FOREIGN KEY (`kd_kriteria`) REFERENCES `kriteria` (`kd_kriteria`),
  ADD CONSTRAINT `banding_ibfk_2` FOREIGN KEY (`kd_kriteria2`) REFERENCES `kriteria` (`kd_kriteria`);

--
-- Constraints for table `banding2`
--
ALTER TABLE `banding2`
  ADD CONSTRAINT `banding2_ibfk_1` FOREIGN KEY (`kd_subkriteria`) REFERENCES `subkriteria` (`kd_subkriteria`),
  ADD CONSTRAINT `banding2_ibfk_2` FOREIGN KEY (`kd_subkriteria2`) REFERENCES `subkriteria` (`kd_subkriteria`);

--
-- Constraints for table `hasil`
--
ALTER TABLE `hasil`
  ADD CONSTRAINT `hasil_ibfk_1` FOREIGN KEY (`id_calon`) REFERENCES `calon` (`id_calon`);

--
-- Constraints for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD CONSTRAINT `subkriteria_ibfk_1` FOREIGN KEY (`kd_kriteria`) REFERENCES `kriteria` (`kd_kriteria`);

--
-- Constraints for table `target`
--
ALTER TABLE `target`
  ADD CONSTRAINT `target_ibfk_1` FOREIGN KEY (`kd_kriteria`) REFERENCES `kriteria` (`kd_kriteria`),
  ADD CONSTRAINT `target_ibfk_2` FOREIGN KEY (`id_calon`) REFERENCES `calon` (`id_calon`);

--
-- Constraints for table `target2`
--
ALTER TABLE `target2`
  ADD CONSTRAINT `target2_ibfk_1` FOREIGN KEY (`kd_subkriteria`) REFERENCES `subkriteria` (`kd_subkriteria`),
  ADD CONSTRAINT `target2_ibfk_2` FOREIGN KEY (`id_calon`) REFERENCES `calon` (`id_calon`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 02, 2018 at 08:04 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

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
  `nilaibanding` decimal(5,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `banding2`
--

CREATE TABLE `banding2` (
  `kd_subkriteria` char(3) NOT NULL,
  `kd_subkriteria2` char(3) NOT NULL,
  `nilaibanding2` decimal(5,4) DEFAULT NULL
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
  `pendidikan_terakhir` varchar(3) NOT NULL,
  `periode_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calon`
--

INSERT INTO `calon` (`id_calon`, `nm_calon`, `tgl_lahir`, `alamat`, `jk`, `email`, `no_telp`, `pendidikan_terakhir`, `periode_masuk`) VALUES
('CL001', 'Zacky Burhani Hotib', '1997-09-13', 'Pondok Kacang', 'L', 'zackyburhani99@gmail.com', '083891778014', 'S1', '2018-05-16'),
('CL002', 'Andy Chahyono', '1997-09-09', 'Cipadu', 'L', 'andy@gmail.com', '08389188291', 'S1', '2018-05-15'),
('CL003', 'Aldis Fakhri Sorengpati', '1997-01-08', 'Pamulang', 'L', 'aldis@gmail.com', '081253664736', 'S1', '2018-05-15'),
('CL004', 'Sisca Agdinsa Ramadhan', '1996-07-07', 'Graha Raya', 'P', 'sisca@gmail.com', '083891778022', 'S1', '2018-05-15'),
('CL005', 'Tia Selviana', '1997-06-06', 'Pondok Pisang', 'P', 'akes@gmail.com', '081253664733', 'D3', '2018-05-15'),
('CL006', 'Muhammad Faiz Alviansyah', '1997-09-09', 'Kuningan', 'L', 'faiz@gmail.com', '0839281992819', 'S1', '2018-05-16'),
('CL007', 'Widya Pramesti', '1997-08-01', 'Pamulang', 'P', 'widya@gmail.com', '083829338928', 'S1', '2018-05-15'),
('CL008', 'Ahmad Syarif', '1997-09-09', 'Ciledug', 'P', 'ahmad@gmail.com', '08391899829', 'D3', '2018-05-27'),
('CL009', 'Lulu Komala', '1998-08-08', 'Jakarta', 'P', 'lulu@gmail.com', '081253664736', 'SMA', '2018-05-27');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_calon` char(5) NOT NULL,
  `keterangan` varchar(15) DEFAULT NULL,
  `hasil_akhir` decimal(5,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id_calon`, `keterangan`, `hasil_akhir`) VALUES
('CL002', 'Lolos', '0.9037'),
('CL003', NULL, '0.8127'),
('CL004', 'Lolos', '0.9493'),
('CL005', 'Lolos', '0.8868'),
('CL007', 'Lolos', '0.8856');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `kd_kriteria` char(2) NOT NULL,
  `nm_kriteria` varchar(30) DEFAULT NULL,
  `eigenvector` decimal(5,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`kd_kriteria`, `nm_kriteria`, `eigenvector`) VALUES
('K1', 'Kompetensi', '0.3571'),
('K2', 'Interview', '0.1194'),
('K3', 'Konsistensi', '0.5236');

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

CREATE TABLE `subkriteria` (
  `kd_subkriteria` char(3) NOT NULL,
  `nm_subkriteria` varchar(30) DEFAULT NULL,
  `eigenvector_sub` decimal(5,4) DEFAULT NULL,
  `kd_kriteria` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`kd_subkriteria`, `nm_subkriteria`, `eigenvector_sub`, `kd_kriteria`) VALUES
('SK1', 'Jurusan', '0.1030', 'K1'),
('SK2', 'Skill', '0.2573', 'K1'),
('SK3', 'Tanggung Jawab', '0.6397', 'K1'),
('SK4', 'Kesiapan Kerja', '0.1250', 'K2'),
('SK5', 'Perilaku', '0.8750', 'K2'),
('SK6', 'Ketelitian', '0.1250', 'K3'),
('SK7', 'Kejujuran', '0.8750', 'K3');

-- --------------------------------------------------------

--
-- Table structure for table `target`
--

CREATE TABLE `target` (
  `kd_kriteria` char(2) NOT NULL,
  `id_calon` char(5) NOT NULL,
  `nilai_target` decimal(5,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `target`
--

INSERT INTO `target` (`kd_kriteria`, `id_calon`, `nilai_target`) VALUES
('K1', 'CL002', '0.8111'),
('K1', 'CL003', '0.7053'),
('K1', 'CL004', '0.8634'),
('K1', 'CL005', '0.8030'),
('K1', 'CL007', '0.9146'),
('K2', 'CL002', '0.9880'),
('K2', 'CL003', '0.8266'),
('K2', 'CL004', '0.7330'),
('K2', 'CL005', '0.8317'),
('K2', 'CL007', '0.8688'),
('K3', 'CL002', '0.8652'),
('K3', 'CL003', '0.8094'),
('K3', 'CL004', '0.9688'),
('K3', 'CL005', '0.8747'),
('K3', 'CL007', '0.7836');

-- --------------------------------------------------------

--
-- Table structure for table `target2`
--

CREATE TABLE `target2` (
  `kd_subkriteria` char(3) NOT NULL,
  `id_calon` char(5) NOT NULL,
  `nilai_target2` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `target2`
--

INSERT INTO `target2` (`kd_subkriteria`, `id_calon`, `nilai_target2`) VALUES
('SK1', 'CL002', 80),
('SK2', 'CL002', 100),
('SK3', 'CL002', 70),
('SK4', 'CL002', 75),
('SK5', 'CL002', 100),
('SK6', 'CL002', 90),
('SK7', 'CL002', 80),
('SK1', 'CL003', 60),
('SK2', 'CL003', 80),
('SK3', 'CL003', 65),
('SK4', 'CL003', 55),
('SK5', 'CL003', 85),
('SK6', 'CL003', 83),
('SK7', 'CL003', 75),
('SK1', 'CL004', 100),
('SK2', 'CL004', 60),
('SK3', 'CL004', 90),
('SK4', 'CL004', 80),
('SK5', 'CL004', 70),
('SK6', 'CL004', 75),
('SK7', 'CL004', 93),
('SK1', 'CL005', 90),
('SK2', 'CL005', 85),
('SK3', 'CL005', 73),
('SK4', 'CL005', 70),
('SK5', 'CL005', 83),
('SK6', 'CL005', 60),
('SK7', 'CL005', 85),
('SK1', 'CL007', 92),
('SK2', 'CL007', 70),
('SK3', 'CL007', 95),
('SK4', 'CL007', 83),
('SK5', 'CL007', 85),
('SK6', 'CL007', 100),
('SK7', 'CL007', 70);

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

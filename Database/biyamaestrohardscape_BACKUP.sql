-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 08, 2018 at 04:56 PM
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
  `kd_kriteria` char(2) DEFAULT NULL,
  `kd_kriteria2` char(2) DEFAULT NULL,
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
('CL009', 'Lulu Komala', '1998-08-08', 'Jakarta', 'P', 'lulu@gmail.com', '081253664736', 'SMA', '2018-05-27'),
('CL010', 'fadila hasana', '1997-04-22', 'palembang', 'P', 'fadila@gmail.com', '083918882718', 'S1', '2018-06-30'),
('CL011', 'iqra habibi', '1997-09-09', 'cibinong', 'L', 'iqra@gmail.com', '08383928811', 'S2', '2018-06-30'),
('CL012', 'ahmad zainul', '1997-08-08', 'subang', 'L', 'ahmad@gmail.com', '08389188929', 'SMA', '2018-06-30'),
('CL013', 'aditya wibowo', '1997-07-07', 'palembang', 'L', 'adit@gmail.com', '083918229183', 'D3', '2018-06-30'),
('CL014', 'zein hanafi', '1887-09-09', 'karawang', 'L', 'zein@gmail.com', '08156125352', 'S3', '2018-06-30'),
('CL015', 'rinaldy', '1995-08-08', 'jakarta', 'L', 'rinaldwhy@gmail.com', '0871627716616', 'S1', '2018-06-30'),
('CL016', 'sasa nabila', '1997-07-07', 'ciputat', 'P', 'sasa@gmail.com', '08392881721', 'SMA', '2018-06-30'),
('CL017', 'novia indriani', '1997-07-07', 'tangerang', 'P', 'mpi@gmail.com', '083891778011', 'S1', '2018-06-30'),
('CL018', 'anjay', '2018-07-05', 'haha', 'L', 'k@gmail.com', '088881991828', 'SMA', '2018-07-10');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_calon` char(5) NOT NULL,
  `keterangan` varchar(15) DEFAULT NULL,
  `hasil_akhir` decimal(5,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('K1', 'Kompetensi', '0.0000'),
('K2', 'Interview', '0.0000'),
('K3', 'Konsistensi', '0.0000');

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
('SK1', 'Jurusan', '0.0000', 'K1'),
('SK2', 'Skill', '0.0000', 'K1'),
('SK3', 'Tanggung Jawab', '0.0000', 'K1'),
('SK4', 'Kesiapan Kerja', '0.0000', 'K2'),
('SK5', 'Perilaku', '0.0000', 'K2'),
('SK6', 'Ketelitian', '0.0000', 'K3'),
('SK7', 'Kejujuran', '0.0000', 'K3');

-- --------------------------------------------------------

--
-- Table structure for table `target`
--

CREATE TABLE `target` (
  `kd_kriteria` char(2) NOT NULL,
  `id_calon` char(5) NOT NULL,
  `nilai_target` decimal(5,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 10, 2018 at 06:17 PM
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
  `alamat` varchar(255) NOT NULL,
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
('CL020', 'anik nurul', '1994-08-03', 'Jl. Glintingan RT 02/RW 01, Gedawang, Banyumanik, Semarang', 'P', 'anikpratiwi51@gmail.com', '085702112994', 'S1', '2018-07-10'),
('CL021', 'Ardian Dwi Kurnia', '1993-11-11', 'Lempongsari,Sapuran,Wonosobo', 'L', 'ardiandyan5@gmail.com', '08953388112', 'SMA', '2018-07-10'),
('CL022', 'Bachtiar Yope Pratama', '1994-03-31', 'Jl. Yos Sudarso 12 Rt. 04/III Dliwang, Kec. Ungaran Barat,\r\nKab. Semarang, Jawa Tengah', 'L', 'pratama.yope@yahoo.com', '082225421991', 'D3', '2018-07-10'),
('CL023', 'Ratno', '1972-02-13', 'Vila Mutiara Cikarang Blok I3, No. 9, RT 023/008\r\nBekasi – jawa Barat', 'L', 'ratno93ratno@yahoo.com', '08127398815', 'S1', '2018-07-10'),
('CL024', 'Tri Hartanto', '1975-10-20', 'Perum Tiga Raksa Jl. Jeruk 1 Kec. Tiga Raksa\r\nTangerang', 'L', 'bagashartanto@gmail.com', '08121354304', 'SMA', '2018-07-10');

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

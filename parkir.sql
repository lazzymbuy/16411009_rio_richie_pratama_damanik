-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 23, 2018 at 18:15 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `parkir`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `level` varchar(10) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`username`, `password`, `nama`, `level`) VALUES
('202446dd1d6028084426867365b0c7a1', '202446dd1d6028084426867365b0c7a1', 'Sigit Dwi Prasetyo', 'gudang'),
('21232f297a57a5a743894a0e4a801fc3', '21232f297a57a5a743894a0e4a801fc3', 'administrator', 'admin'),
('c7911af3adbd12a035b289556d96470a', 'c7911af3adbd12a035b289556d96470a', 'kasir', 'kasir');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kendaraan`
--

CREATE TABLE IF NOT EXISTS `jenis_kendaraan` (
  `inc` int(9) NOT NULL AUTO_INCREMENT,
  `jenis_kendaraan_id` varchar(14) NOT NULL,
  `jenis_kendaraan_nama` varchar(90) NOT NULL,
  `harga_parkir` int(10) NOT NULL,
  PRIMARY KEY (`inc`),
  KEY `barang_id` (`jenis_kendaraan_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `jenis_kendaraan`
--

INSERT INTO `jenis_kendaraan` (`inc`, `jenis_kendaraan_id`, `jenis_kendaraan_nama`, `harga_parkir`) VALUES
(1, 'J001', 'Motor', 1000),
(2, 'J002', 'Mobil', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `parkir_keluar`
--

CREATE TABLE IF NOT EXISTS `parkir_keluar` (
  `id_parkir_keluar` int(5) NOT NULL AUTO_INCREMENT,
  `id_parkir_masuk` varchar(10) NOT NULL,
  `lama_parkir` int(5) NOT NULL,
  `total_parkir` int(10) NOT NULL,
  `tanggal_keluar` varchar(10) NOT NULL,
  `jam_keluar` varchar(10) NOT NULL,
  PRIMARY KEY (`id_parkir_keluar`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `parkir_keluar`
--

INSERT INTO `parkir_keluar` (`id_parkir_keluar`, `id_parkir_masuk`, `lama_parkir`, `total_parkir`, `tanggal_keluar`, `jam_keluar`) VALUES
(7, 'MTCIHZ', 1, 1000, '25/08/2016', '08:50:52'),
(6, 'BQSZLZ', 1, 1000, '25/08/2016', '08:49:15'),
(8, 'XTRCDY', 3, 6000, '25/08/2016', '08:59:25');

-- --------------------------------------------------------

--
-- Table structure for table `parkir_masuk`
--

CREATE TABLE IF NOT EXISTS `parkir_masuk` (
  `id_parkir_masuk` varchar(10) NOT NULL,
  `id_jenis_kendaraan` int(5) NOT NULL,
  `plat_motor` varchar(14) NOT NULL,
  `merk` varchar(10) NOT NULL,
  `tanggal` varchar(10) NOT NULL,
  `waktu_parkir` varchar(10) NOT NULL,
  `harga` int(10) NOT NULL,
  `status` enum('Masuk','Keluar') NOT NULL,
  PRIMARY KEY (`id_parkir_masuk`),
  KEY `beli_id` (`id_jenis_kendaraan`),
  KEY `supplier_id` (`tanggal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parkir_masuk`
--

INSERT INTO `parkir_masuk` (`id_parkir_masuk`, `id_jenis_kendaraan`, `plat_motor`, `merk`, `tanggal`, `waktu_parkir`, `harga`, `status`) VALUES
('7TI6EY', 2, 'AE 4566 NN', 'HINO', '25/08/2016', '09:13:16', 2000, 'Masuk'),
('BQSZLZ', 1, 'AB 1234 LL', 'JUPITER MX', '25/08/2016', '08:20:39', 1000, 'Keluar'),
('DWKX4J', 2, 'AD 6666 FF', 'VIXION', '25/08/2016', '09:03:40', 2000, 'Masuk'),
('MTCIHZ', 1, 'K 2333 LL', 'MIO', '25/08/2016', '08:28:42', 1000, 'Keluar'),
('XTRCDY', 2, 'B 6765 XX', 'JAZZ', '25/08/2016', '08:29:47', 2000, 'Keluar');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

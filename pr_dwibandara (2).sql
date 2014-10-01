-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2014 at 03:37 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pr_dwibandara`
--

-- --------------------------------------------------------

--
-- Table structure for table `deskripsi`
--

CREATE TABLE IF NOT EXISTS `deskripsi` (
  `layanan` text NOT NULL,
  `keunggulan` text NOT NULL,
  `tentang_kami` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deskripsi`
--

INSERT INTO `deskripsi` (`layanan`, `keunggulan`, `tentang_kami`) VALUES
('Dwibandara Tours and Travel menyediakan layanan travel yang murah dan lengkap. Memberikan wisatawan/turis untuk menikmati perjalanan liburan yang tidak akan pernah terlupakan', 'Dwibandara Tours and Travel memberikan harga yang terjangkau dan beragam pilihan pakej wisata yang bisa dipilih sesuai keinginan wisatawan', 'Kami adalah penyedia travel dan tour terkemuka di bandung, berlokasi di Bandara Husein Sastranegara, kantor kami mudah diakses. Silahkan hubungi kami untuk bertanya-tanya');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE IF NOT EXISTS `galeri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_foto` varchar(500) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('Aktif','Nonaktif') NOT NULL,
  `foto` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id`, `nama_foto`, `deskripsi`, `tanggal`, `status`, `foto`) VALUES
(3, 'Test Galeri', 'Test Galeri', '2014-09-30', 'Aktif', 'Penguins.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE IF NOT EXISTS `kontak` (
  `alamat` text NOT NULL,
  `email` text NOT NULL,
  `telpon_1` varchar(30) NOT NULL,
  `telpon_2` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`alamat`, `email`, `telpon_1`, `telpon_2`) VALUES
('Jl. Pajajaran No 233B, Depan Bandara Husein Sastranegara  , Dortmund', 'dwiadnriev@yahoo.co.id', '7949479797', '765666');

-- --------------------------------------------------------

--
-- Table structure for table `konten`
--

CREATE TABLE IF NOT EXISTS `konten` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE IF NOT EXISTS `lokasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` text NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id`, `nama`, `deskripsi`, `gambar`, `status`) VALUES
(6, 'Test Lokasi', 'Test Lokasi', 'Desert.jpg', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE IF NOT EXISTS `paket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paket` varchar(100) NOT NULL,
  `durasi` enum('3 Hari 2 Malam','4 Hari 3 Malam','5 Hari 4 Malam','') NOT NULL,
  `ongkos_bandung` varchar(100) NOT NULL,
  `ongkos_jakarta` varchar(100) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id`, `paket`, `durasi`, `ongkos_bandung`, `ongkos_jakarta`, `status`) VALUES
(8, 'Test Paket', '4 Hari 3 Malam', '677', '677', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `paket_fasilitas`
--

CREATE TABLE IF NOT EXISTS `paket_fasilitas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paket` varchar(100) NOT NULL,
  `tipe` enum('hotel','makan','transport','visit') NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE IF NOT EXISTS `testimoni` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pengirim` text NOT NULL,
  `url` text NOT NULL,
  `asal` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('Aktif','Nonaktif') NOT NULL,
  `isi` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id`, `pengirim`, `url`, `asal`, `tanggal`, `status`, `isi`) VALUES
(1, 'Dika', 'dika@gapunya.com', 'Brunei', '2014-09-26', 'Aktif', 'Mahal'),
(3, 'Test 2', 'facebook.com', 'Buenos Aires', '2014-09-29', 'Aktif', 'Wah asyik banget, aku suka banget deh !'),
(4, 'Even', 'asdasd', 'Jamaica', '2014-09-29', 'Aktif', 'CROT MARKOTHOP');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` enum('Aktif','Nonaktif') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `status`) VALUES
(2, 'admin', 'admin', 'Admin', 'Aktif');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

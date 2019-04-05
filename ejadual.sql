-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2019 at 11:16 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ejadual`
--

-- --------------------------------------------------------

--
-- Table structure for table `agensi`
--

CREATE TABLE `agensi` (
  `id` int(11) NOT NULL,
  `agensi_id` varchar(15) NOT NULL,
  `agensi_nama` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agensi`
--

INSERT INTO `agensi` (`id`, `agensi_id`, `agensi_nama`) VALUES
(1, 'KEW', 'Pejabat Kewangan Negeri Perak'),
(2, 'MUFTI', 'Pejabat Mufti Negeri Perak'),
(3, 'HAKIM', 'Jabatan Kehakiman Syariah Negeri Perak'),
(4, 'SPA', 'Suruhanjaya Perkhidmatan Awam'),
(5, 'TANAH', 'Pejabat Pengarah Tanah Dan Galian'),
(6, 'JKR', 'Jabatan Kerja Raya'),
(7, 'JPB', 'Jabatan Perancang Bandar Dan Desa'),
(8, 'LAP', 'Lembaga Air Perak'),
(9, 'PKNP', 'Perbadanan Kemajuan Negeri Perak'),
(10, 'JAIP', 'Jabatan Agama Islam Perak'),
(11, 'HUTAN', 'Jabatan Perhutanan Negeri Perak'),
(12, 'JPS', 'Jabatan Pengairan Dan Saliran'),
(13, 'TANI', 'Pejabat Pertanian Negeri Perak'),
(14, 'JKMN', 'Jabatan Kebajikan Masyarakat Negeri'),
(15, 'VET', 'Jabatan Perkhidmatan Veterinar Negeri Perak'),
(16, 'GEO', 'Jabatan Mineral Dan Geosains Negeri Perak'),
(17, 'EKO', 'Perbadanan Kemajuan Ekonomi Islam Negeri Perak'),
(18, 'YP', 'Yayasan Perak'),
(19, 'UISAS', 'Universiti Islam Sultan Azlan Shah'),
(20, 'PPPN', 'Perbadanan Pembangunan Pertanian Negeri Perak'),
(21, 'PPANP', 'Perbadanan Perpustakaan Awam Negeri Perak'),
(22, 'SSI', 'Perbadanan Setiausaha Kerajaan Negeri Perak (SSI)'),
(23, 'UNIKL', 'Universiti Kuala Lumpur'),
(24, 'KPERAK', 'K-Perak Implementation And Coordination Corporation'),
(25, 'GALERI', 'Galeri Sultan Azlan Shah'),
(26, 'TOUR', 'Perak Tourism Management Bhd.'),
(27, 'PTNP', 'Perbadanan Taman Negeri Perak'),
(28, 'IDR', 'Institut Darul Ridzuan'),
(29, 'SPA', 'Suruhanjaya Perkhidmatan Awam Negeri Perak'),
(30, 'YBU', 'Yayasan Bina Upaya Darul Ridzuan'),
(31, 'MAIAM', 'Majlis Agama Islam & Adat Melayu Perak '),
(32, 'SYARIAH', 'Jabatan Pendakwaan Syariah Negeri Perak'),
(33, 'MBINC', 'MB Incorporated'),
(34, 'PIMC', 'Perak Investment Management Centre'),
(35, 'LPHP', 'Lembaga Perumahan Dan Hartanah Perak');

-- --------------------------------------------------------

--
-- Table structure for table `ahli`
--

CREATE TABLE `ahli` (
  `id` int(11) NOT NULL,
  `ahli_id` varchar(15) NOT NULL,
  `ahli_nama` varchar(191) NOT NULL,
  `ahli_emel` varchar(191) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ahli`
--

INSERT INTO `ahli` (`id`, `ahli_id`, `ahli_nama`, `ahli_emel`) VALUES
(1, 'DB', 'Datuk Bandar', '@mbi.gov.my'),
(2, 'SUB', 'Setiausaha Bandaraya', '@mbi.gov.my'),
(3, 'PK (I/O)', 'Pengarah Kanan - Infrastruktur & Operasi', 'badrul@mbi.gov.my'),
(4, 'PK (P/B)', 'Pengarah Kanan - Pengurusan', '@mbi.gov.my'),
(5, 'PK (T/W)', 'Pengarah Kanan - Teknikal', '@mbi.gov.my'),
(6, 'PCB', 'Pengarah Korporat Bandaraya', 'normala@mbi.gov.my'),
(7, 'PUB', 'Penasihat Undang-undang Bandaraya', 'syahrul@mbi.gov.my'),
(8, 'PB UTC', 'Pengurus Besar UTC', 'romzizamri@gmail.com'),
(9, 'PAB', 'Pengarah Audit Bandaraya', 'khairudin@mbi.gov.my'),
(10, 'KB (TM)', 'Ketua Bahagian Teknologi Maklumat', 'faridah_s@mbi.gov.my'),
(11, 'KB (OSC)', 'Ketua Bahagian Pusat Setempat ', 'muhd_nasrul_hadi@yahoo.com'),
(12, 'KB (QS)', 'Ketua Bahagian Ukur Bahan ', 'suriani_i@mbi.gov.my'),
(13, 'KB (COB)', 'Ketua Bahagian Pesuruhjaya Bangunan', 'norizan@mbi.gov.my'),
(14, 'PKP', 'Pengarah Khidmat Pengurusan', '@mbi.gov.my'),
(15, 'PNB', 'Pengarah Penilaian Bandaraya', 'rohayah@mbi.gov.my'),
(16, 'PJB', 'Pengarah Kejuruteraan Bandaraya', 'zuraina@mbi.gov.my'),
(17, 'PPB', 'Pengarah Perancang Bandaraya', 'zulqarnain@mbi.gov.my'),
(18, 'PPM', 'Pengarah Pembangunan Masyarakat Bandaraya', '@mbi.gov.my'),
(19, 'PWB', 'Pengarah Perbendaharaan Bandaraya', 'syazlan@mbi.gov.my'),
(20, 'PLB', 'Pengarah Landskap Bandaraya', 'meorzaidi@gmail.com'),
(21, 'PKB', 'Pengarah Kesihatan Bandaraya', 'm_alias@mbi.gov.my'),
(22, 'POB', 'Pengarah Pelesenan & Penguatkuasaan Bandaraya', 'zaiyadi@mbi.gov.my'),
(23, 'PBB', 'Pengarah Bangunan Bandaraya', 'syahril@mbi.gov.my');

-- --------------------------------------------------------

--
-- Table structure for table `bilik`
--

CREATE TABLE `bilik` (
  `id` int(11) NOT NULL,
  `bilik_id` varchar(15) NOT NULL,
  `bilik_nama` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bilik`
--

INSERT INTO `bilik` (`id`, `bilik_id`, `bilik_nama`) VALUES
(1, 'DMM', 'Dewan Mesyuarat Majlis (Chamber)'),
(2, 'DAA', 'Dewan Azlan Shah, Tingkat 10'),
(3, 'ANG', 'Bilik Anggerik, Tingkat 10'),
(4, 'ORK', 'Bilik Orkid, Tingkat 9'),
(5, 'TEK', 'Bilik Tekoma, Tingkat 8'),
(6, 'IXO', 'Bilik Ixora, Tingkat 7'),
(7, 'BAK', 'Bilik Bakawali, Tingkat 6'),
(8, 'TAN', 'Bilik Bunga Tanjung, Tingkat 5'),
(9, 'SER', 'Bilik Seroja, Tingkat 3'),
(10, 'GER', 'Bilik Gerakan, Tingkat 2'),
(11, 'UTC', 'Bilik Mesyuarat Utama, UTC Perak'),
(12, 'BOU', 'Bilik Allysium, Tingkat 8, Wisma Bouganv'),
(13, 'KUL', 'Dewan Kuliah, Pejabat Penguatkuasaan (Ipoh Padang)'),
(14, 'RAZ', 'Bilik Mesyuarat, Perpustakaan Tun Razak'),
(15, 'AKU', 'Bilik Mesyuarat, Pusat Akuatik');

-- --------------------------------------------------------

--
-- Table structure for table `bulan`
--

CREATE TABLE `bulan` (
  `id` int(11) NOT NULL,
  `bulan_nama` varchar(15) NOT NULL,
  `bulan_id` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulan`
--

INSERT INTO `bulan` (`id`, `bulan_nama`, `bulan_id`) VALUES
(1, 'Januari', 'JAN'),
(2, 'Februari', 'FEB'),
(3, 'Mac', 'MAC'),
(4, 'April', 'APR'),
(5, 'Mei', 'MEI'),
(6, 'Jun', 'JUN'),
(7, 'Julai', 'JUL'),
(8, 'Ogos', 'OGO'),
(9, 'September', 'SEP'),
(10, 'Oktober', 'OKT'),
(11, 'November', 'NOV'),
(12, 'Disember', 'DIS');

-- --------------------------------------------------------

--
-- Table structure for table `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `color` varchar(255) NOT NULL,
  `textColor` varchar(255) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventos`
--

INSERT INTO `eventos` (`id`, `title`, `description`, `color`, `textColor`, `start`, `end`) VALUES
(1, 'Mesyuarat JK', 'Bil. 328/03/19', '#FF0F0', '#FFF', '2019-02-14 10:30:00', '2019-02-14 12:00:00'),
(2, 'Mesyuarat JK Tender', 'Bil. 159/01/19', '#000000', '#FFF', '2019-02-14 14:30:00', '2019-02-14 14:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `jab`
--

CREATE TABLE `jab` (
  `id` int(11) NOT NULL,
  `jab_id` varchar(15) NOT NULL,
  `jab_nama` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jab`
--

INSERT INTO `jab` (`id`, `jab_id`, `jab_nama`) VALUES
(1, 'JPM', 'Jabatan Pembangunan Masyarakat'),
(2, 'JKA', 'Jabatan Kesihatan Awam dan Perkhidmatan '),
(3, 'JPP', 'Jabatan Pelesenan dan Penguatkuasaan'),
(4, 'JPB', 'Jabatan Perancang Bandar'),
(5, 'JK', 'Jabatan Kejuruteraan'),
(6, 'JKB', 'Jabatan Kawalan Bangunan'),
(7, 'JL', 'Jabatan Landskap'),
(8, 'JKP', 'Jabatan Khidmat Pengurusan'),
(9, 'JP', 'Jabatan Perbendaharaan'),
(10, 'JPPH', 'Jabatan Penilaian & Pengurusan Harta'),
(11, 'UAD', 'Unit Audit Dalam'),
(12, 'UUU', 'Unit Undang-Undang'),
(13, 'UKPA', 'Unit Korporat Dan Perhubungan Awam'),
(14, 'OSC', 'Unit Pusat Setempat (OSC)'),
(15, 'COB', 'Unit Pesuruhjaya Bangunan (COB)'),
(16, 'BTM', 'Unit Teknologi Maklumat'),
(17, 'UTC', 'Unit Pentadbiran UTC'),
(18, 'UUB', 'Unit Ukur Bahan');

-- --------------------------------------------------------

--
-- Table structure for table `mesy`
--

CREATE TABLE `mesy` (
  `mesy_id` int(11) NOT NULL,
  `title` varchar(191) NOT NULL,
  `jab_id` varchar(15) NOT NULL,
  `mesy_pengerusi` varchar(191) NOT NULL,
  `mesy_ahli` varchar(191) NOT NULL,
  `mesy_lokasi` varchar(15) NOT NULL,
  `mesy_tarikh` date NOT NULL,
  `mesy_status` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `color` varchar(191) DEFAULT NULL,
  `textColor` varchar(191) DEFAULT NULL,
  `mesy_huraian` text,
  `agensi_id` varchar(15) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `mesy_bulan` varchar(15) DEFAULT NULL,
  `adding_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mesy`
--

INSERT INTO `mesy` (`mesy_id`, `title`, `jab_id`, `mesy_pengerusi`, `mesy_ahli`, `mesy_lokasi`, `mesy_tarikh`, `mesy_status`, `start`, `end`, `color`, `textColor`, `mesy_huraian`, `agensi_id`, `user_id`, `mesy_bulan`, `adding_date`) VALUES
(1, 'Mesyuarat JK OSC', 'OSC', 'Ketua Bahagian OSC', 'BTM', 'DMM', '2019-03-13', 1, '2019-03-13 09:30:00', '2019-03-13 09:30:00', '#000000', '#FFF', 'Staf BTM yang terlibat: Zulheldy', 'UISAS', 1, NULL, '2019-04-01 04:57:54'),
(2, 'Mesy. 1', 'UTC', 'Pn A', 'Pn B', 'IXO', '2019-03-14', 1, '2019-03-14 09:30:00', '2019-03-14 09:30:00', '#000000', '#FFF', '', 'YP', 1, NULL, '2019-04-01 04:57:54'),
(4, 'Mesy Test 2', 'UTC', 'Tuan B', 'Tuan C', 'DMM', '2019-03-22', 1, '2019-03-22 14:00:00', '2019-03-22 14:00:00', '#000000', '#FFF', 'hi hi ', 'KEW', 1, NULL, '2019-04-01 04:57:54'),
(5, 'Mesy Test 3', 'UUB', 'Pn A', 'Pn A', 'ANG', '2019-03-02', 1, '2019-03-02 12:30:00', '2019-03-02 12:30:00', '#000000', '#FFF', 'hi hi hi', 'JPS', 1, NULL, '2019-04-01 04:57:54'),
(6, 'Mesy Test 4', 'JP', 'Pn. A', 'Pn. B', 'TAN', '2019-03-01', 1, '2019-03-01 09:30:00', '2019-03-01 09:30:00', '#000000', '#FFF', 'hi hi hi hi', 'GEO', 1, NULL, '2019-04-01 04:57:54'),
(7, 'TEST 5', 'OSC', 'TEST', 'TETSD', 'TEK', '2019-03-15', 1, '2019-03-15 09:29:00', '2019-03-15 09:29:00', '#000000', '#FFF', 'TEST', 'JKR', 1, NULL, '2019-04-01 04:57:54'),
(8, 'TEST 6', 'JPPH', 'TEST', 'TEST', 'TEK', '2019-03-08', 1, '2019-03-08 06:30:00', '2019-03-08 06:30:00', '#000000', '#FFF', 'TEST', 'LAP', 1, NULL, '2019-04-01 04:57:54'),
(9, 'TEST 7', 'UUU', 'TEST', 'TEST', 'ANG', '2019-03-12', 1, '2019-03-12 09:30:00', '2019-03-12 09:30:00', '#000000', '#FFF', 'TEST', 'LAP', 1, NULL, '2019-04-01 04:57:54'),
(10, 'TEST 8', 'UAD', 'TEST', 'TEST', 'ORK', '2019-03-14', 1, '2019-03-14 11:45:00', '2019-03-14 11:45:00', '#000000', '#FFF', 'TEST', 'JAIP', 1, NULL, '2019-04-01 04:57:54'),
(11, 'TEST 9', 'JL', 'TEST', 'TEST', 'BOU', '2019-03-15', 1, '2019-03-15 11:45:00', '2019-03-15 11:45:00', '#000000', '#FFF', 'TEST', 'TANAH', 1, NULL, '2019-04-01 04:57:54'),
(12, 'TEST 10', 'BTM', 'TEST', 'TEST', 'ORK', '2019-03-20', 1, '2019-03-20 09:55:00', '2019-03-20 09:55:00', '#000000', '#FFF', 'TEST', 'HUTAN', 1, NULL, '2019-04-01 04:57:54'),
(15, 'test 11', 'JKP', 'tuan 1', 'tuan 2', 'TEK', '2019-03-16', 1, '2019-03-16 12:31:00', '2019-03-16 12:31:00', '#000000', '#FFF', 'test', 'Tiada', 1, NULL, '2019-04-01 04:57:54'),
(14, 'Mesyuarat JK', 'OSC', 'KB (OSC)', 'Pn Faridah', 'DMM', '2019-02-14', 1, '2019-02-14 10:30:00', '2019-02-14 10:30:00', '#000000', '#FFF', 'Bil. 328/03/19\nStaf BTM yang terlibat: Iskandar', 'JKR', 1, NULL, '2019-04-01 04:57:54'),
(16, 'test 12', 'JKP', 'tuan A', 'tuan b', 'ANG', '2019-03-23', 1, '2019-03-23 10:10:00', '2019-03-23 10:10:00', '#000000', '#FFF', 'test 12', 'Array', 1, NULL, '2019-04-01 04:57:54'),
(19, 'test 13', 'BTM', 'pn B', 'pn c', 'DAA', '2019-03-24', 2, '2019-03-24 10:29:00', '2019-03-24 10:29:00', '#000000', '#FFF', 'test', 'Array', 1, NULL, '2019-04-01 04:57:54'),
(20, 'test 14', 'COB', 'pn c', 'pn f', 'DAA', '2019-03-17', 1, '2019-03-17 11:30:00', '2019-03-17 11:30:00', '#000000', '#FFF', 'test', 'Array', 1, NULL, '2019-04-01 04:57:54'),
(21, 'test 15', 'OSC', 'tn f', 'tn f', 'BAK', '2019-03-18', 1, '2019-03-18 09:45:00', '2019-03-18 09:45:00', '#000000', '#FFF', 'test', 'Array', 1, NULL, '2019-04-01 04:57:54'),
(22, 'test 16', 'UAD', 'pn u', 'pn u', 'ORK', '2019-03-19', 1, '2019-03-19 10:15:00', '2019-03-19 10:15:00', '#000000', '#FFF', 'test', 'Array', 1, NULL, '2019-04-01 04:57:54'),
(23, 'test 17', 'UKPA', 'pn b', 'pn b', 'BAK', '2019-03-21', 1, '2019-03-21 12:30:00', '2019-03-21 12:30:00', '#000000', '#FFF', 'test', 'Array', 1, NULL, '2019-04-01 04:57:54'),
(24, 'test 17', 'JKB', 'Pn K', 'Pn L', 'IXO', '2019-03-10', 1, '2019-03-10 11:30:00', '2019-03-10 11:30:00', '#000000', '#FFF', 'test', 'Array', 1, NULL, '2019-04-01 04:57:54'),
(25, 'test 18', 'JL', 'Tn A', 'Tn B', 'IXO', '2019-03-09', 1, '2019-03-09 10:30:00', '2019-03-09 10:30:00', '#000000', '#FFF', 'test ', 'Array', 1, NULL, '2019-04-01 04:57:54'),
(26, 'test 19', 'BTM', 'Tn B', 'Tn B', 'DAA', '2019-03-11', 1, '2019-03-11 10:30:00', '2019-03-11 10:30:00', '#000000', '#FFF', 'test', 'Array', 1, NULL, '2019-04-01 04:57:54'),
(27, 'TEST 20', 'UUB', 'a', 'b', 'DAA', '2019-03-04', 1, '2019-03-04 10:00:00', '2019-03-04 10:00:00', '#000000', '#FFF', 'TEST', 'Array', 1, NULL, '2019-04-01 04:57:54'),
(28, 'test 21', 'OSC', 'a', 'a', 'DMM', '2019-03-05', 1, '2019-03-05 12:30:00', '2019-03-05 12:30:00', '#000000', '#FFF', 'test', 'Array', 1, NULL, '2019-04-01 04:57:54'),
(29, 'TEST 22', 'UKPA', 'EN A', 'EN B', 'ANG', '2019-03-06', 1, '2019-03-06 11:30:00', '2019-03-06 11:30:00', '#000000', '#FFF', 'TEST', 'Array', 1, NULL, '2019-04-01 04:57:54'),
(30, 'TEST 23', 'OSC', 'A', 'B', 'IXO', '2019-03-07', 1, '2019-03-07 11:45:00', '2019-03-07 11:45:00', '#000000', '#FFF', 'TEST', 'Array', 1, NULL, '2019-04-01 04:57:54'),
(31, 'TEST 24', 'UKPA', 'a', 'b', 'ORK', '2019-03-03', 1, '2019-03-03 10:11:00', '2019-03-03 10:11:00', '#000000', '#FFF', 'TEST', 'Array', 1, NULL, '2019-04-01 04:57:54'),
(32, 'test 25', 'OSC', 'a', 'b', 'TEK', '2019-02-28', 1, '2019-02-28 10:10:00', '2019-02-28 10:10:00', '#000000', '#FFF', 'test', 'Array', 1, NULL, '2019-04-01 04:57:54'),
(33, 'test 26', 'COB', 'b', 'a', 'GER', '2019-02-27', 1, '2019-02-27 12:30:00', '2019-02-27 12:30:00', '#000000', '#FFF', 'test', NULL, 1, NULL, '2019-04-01 04:57:54'),
(34, 'test 27', 'UKPA', 'Datuk Bandar', '', 'ANG', '2019-02-25', 1, '2019-02-25 11:30:00', '2019-02-25 11:30:00', '#000000', '#FFF', 'test', NULL, 1, NULL, '2019-04-01 04:57:54'),
(35, 'TEST 28', 'UUU', 'test', '', 'DAA', '2019-02-26', 1, '2019-02-26 10:55:00', '2019-02-26 10:55:00', '#000000', '#FFF', 'TEST', NULL, 1, NULL, '2019-04-01 04:57:54'),
(45, 'hai', '', 'hai', '', '', '2019-03-01', 1, '2019-03-01 10:10:00', '2019-03-01 10:10:00', '#000000', '#FFF', 'hai', NULL, 1, NULL, '2019-04-01 04:57:54'),
(44, 'nama', 'JK', 'DB', '', 'TAN', '2019-02-28', 1, '2019-02-28 10:10:00', '2019-02-28 10:10:00', '#000000', '#FFF', 'nama', NULL, 1, NULL, '2019-04-01 04:57:54'),
(42, 'A', 'OSC', 'DB', '', 'DAA', '2019-04-03', 1, '2019-04-03 10:00:00', '2019-04-03 10:00:00', '#000000', '#FFF', 'B', NULL, 1, NULL, '2019-04-01 04:57:54'),
(43, 'Test untuk ubah', 'BTM', 'DB', '', 'IXO', '2019-04-05', 4, '2019-04-05 10:00:00', '2019-04-05 10:00:00', '#000000', '#FFF', 'bib', NULL, 1, NULL, '2019-04-01 04:57:54'),
(46, 'test whether status insert or not', 'JKA', 'DB', '', 'BAK', '2019-04-04', 1, '2019-04-04 11:00:00', '2019-04-04 11:00:00', '#000000', '#FFF', 'dd', NULL, 1, NULL, '2019-04-03 04:47:47'),
(47, 'test again', '', 'DB', '', '', '2019-04-13', 0, '2019-04-13 11:00:00', '2019-04-13 11:00:00', '#000000', '#FFF', '22', NULL, 1, NULL, '2019-04-03 04:48:49');

-- --------------------------------------------------------

--
-- Table structure for table `mesy_agensi`
--

CREATE TABLE `mesy_agensi` (
  `id` int(11) NOT NULL,
  `mesy_id` int(11) NOT NULL,
  `agensi_id` varchar(15) DEFAULT NULL,
  `agensi_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mesy_agensi`
--

INSERT INTO `mesy_agensi` (`id`, `mesy_id`, `agensi_id`, `agensi_status`) VALUES
(1, 0, NULL, 5),
(2, 0, 'KEW', 5),
(3, 0, 'MUFTI', 5),
(4, 21, 'GALERI', 5),
(5, 4, 'TOUR', 5),
(6, 5, 'PTNP', 5),
(7, 23, 'GALERI', 5),
(8, 7, 'TOUR', 5),
(9, 0, 'TOUR', 5),
(10, 0, 'PTNP', 5),
(11, 0, 'GALERI', 5),
(12, 0, 'TOUR', 5),
(13, 0, 'PTNP', 5),
(14, 31, 'UNIKL', 5),
(15, 14, 'KPERAK', 5),
(16, 32, 'IDR', 5),
(17, 32, 'SPA', 5),
(18, 33, 'KEW', 5),
(19, 33, 'MUFTI', 5),
(20, 33, 'TANAH', 5),
(21, 33, 'JPB', 5),
(22, 33, 'LAP', 5),
(23, 34, 'JPB', 5),
(24, 34, 'LAP', 5),
(25, 35, 'KEW', 5),
(26, 35, 'MUFTI', 5),
(27, 36, 'TANAH', 5),
(28, 36, 'JKR', 5),
(29, 36, 'JPB', 5),
(30, 36, 'LAP', 5),
(31, 36, 'JPS', 5),
(32, 36, 'GEO', 5),
(33, 37, 'TANAH', 5),
(34, 37, 'JKR', 5),
(35, 37, 'JPB', 5),
(36, 37, 'LAP', 5),
(37, 37, 'JPS', 5),
(38, 37, 'GEO', 5),
(39, 38, 'TANAH', 5),
(40, 38, 'JKR', 5),
(41, 38, 'JPB', 5),
(42, 38, 'LAP', 5),
(43, 38, 'JPS', 5),
(44, 38, 'GEO', 5),
(45, 41, 'KEW', 5),
(46, 41, 'TANAH', 5),
(47, 41, 'JKR', 5),
(48, 41, 'JPB', 5),
(49, 41, 'LAP', 5),
(50, 41, 'PKNP', 5),
(51, 41, 'JPS', 5),
(52, 41, 'GEO', 5),
(53, 42, 'SYARIAH', 5),
(54, 42, 'MBINC', 5),
(55, 43, 'KEW', 5),
(56, 43, 'MUFTI', 5),
(57, 44, 'KEW', 5),
(58, 44, 'MUFTI', 5),
(59, 45, 'MUFTI', 5),
(60, 45, 'HAKIM', 5),
(61, 46, 'KEW', 5),
(62, 46, 'IDR', 5);

-- --------------------------------------------------------

--
-- Table structure for table `mesy_ahli`
--

CREATE TABLE `mesy_ahli` (
  `id` int(11) NOT NULL,
  `mesy_id` int(11) NOT NULL,
  `ahli_id` varchar(15) DEFAULT NULL,
  `ahli_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mesy_ahli`
--

INSERT INTO `mesy_ahli` (`id`, `mesy_id`, `ahli_id`, `ahli_status`) VALUES
(1, 34, 'DB', 5),
(2, 34, 'SUB', 5),
(3, 34, 'PK (I/O)', 5),
(4, 35, 'DB', 5),
(5, 35, 'SUB', 5),
(6, 35, 'PK (I/O)', 5),
(7, 36, 'DB', 5),
(8, 36, 'SUB', 5),
(9, 36, 'PUB', 5),
(10, 36, 'KB (TM)', 5),
(11, 36, 'KB (COB)', 5),
(12, 36, 'PNB', 5),
(13, 36, 'PJB', 5),
(14, 36, 'PPB', 5),
(15, 36, 'PPM', 5),
(16, 36, 'PLB', 5),
(17, 36, 'PKB', 5),
(18, 36, 'POB', 5),
(19, 36, 'PBB', 5),
(20, 37, 'DB', 5),
(21, 37, 'SUB', 5),
(22, 37, 'PUB', 5),
(23, 37, 'KB (TM)', 5),
(24, 37, 'KB (COB)', 5),
(25, 37, 'PNB', 5),
(26, 37, 'PJB', 5),
(27, 37, 'PPB', 5),
(28, 37, 'PPM', 5),
(29, 37, 'PLB', 5),
(30, 37, 'PKB', 5),
(31, 37, 'POB', 5),
(32, 37, 'PBB', 5),
(33, 38, 'DB', 5),
(34, 38, 'SUB', 5),
(35, 38, 'PUB', 5),
(36, 38, 'KB (TM)', 5),
(37, 38, 'KB (COB)', 5),
(38, 38, 'PNB', 5),
(39, 38, 'PJB', 5),
(40, 38, 'PPB', 5),
(41, 38, 'PPM', 5),
(42, 38, 'PLB', 5),
(43, 38, 'PKB', 5),
(44, 38, 'POB', 5),
(45, 38, 'PBB', 5),
(46, 41, 'DB', 5),
(47, 41, 'SUB', 5),
(48, 41, 'PUB', 5),
(49, 41, 'KB (TM)', 5),
(50, 41, 'KB (COB)', 5),
(51, 41, 'PNB', 5),
(52, 41, 'PJB', 5),
(53, 41, 'PPB', 5),
(54, 41, 'PPM', 5),
(55, 41, 'PWB', 5),
(56, 41, 'PLB', 5),
(57, 41, 'PKB', 5),
(58, 41, 'POB', 5),
(59, 41, 'PBB', 5),
(60, 42, 'DB', 5),
(61, 42, 'SUB', 5),
(62, 43, 'DB', 5),
(63, 43, 'SUB', 5),
(64, 44, 'DB', 5),
(65, 44, 'SUB', 5),
(66, 45, 'SUB', 5),
(67, 45, 'PK (I/O)', 5),
(68, 46, 'SUB', 5),
(69, 46, 'PK (P/B)', 5);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `status_nama` varchar(191) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status_id`, `status_nama`) VALUES
(1, 1, 'proses'),
(2, 2, 'lulus'),
(3, 3, 'tangguh'),
(4, 4, 'batal'),
(5, 5, 'menunggu'),
(6, 6, 'terima');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(191) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_type` varchar(15) NOT NULL,
  `joining_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `incharge_bilik` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `user_name`, `user_email`, `user_pass`, `user_type`, `joining_date`, `incharge_bilik`) VALUES
(1, 181676, 'Nabihah binti Taquddin Azmy', 'nabihah.student@gmail.com', '$2y$10$VC53QvFcLSFdbBBG5nh.pu8SzEQTZr0tmd.pgIXdttALweMuBRC6i', 'pengguna', '2019-03-11 06:32:42', NULL),
(2, 13834, 'Yusliza bt. Yusup', 'yuslizayusup@mbi.gov.my', '$2y$10$lXmhDD/kfd77H/t7fF8QseT/wCzyuUOfxvZnxq4LuPAAQFmtWCrAe', 'admin', '2019-03-11 06:36:42', 'DAA'),
(3, 181677, 'Nur Amalina Zakaria', 'amalinazakaria@hotmail.com', '$2y$10$zCbdbXJc7lnlqupygxgaOOcOqoevpbrfGxFW5xglGWfup/TYLhehW', 'pengguna', '2019-03-19 07:09:31', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agensi`
--
ALTER TABLE `agensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ahli`
--
ALTER TABLE `ahli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bilik`
--
ALTER TABLE `bilik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bulan`
--
ALTER TABLE `bulan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jab`
--
ALTER TABLE `jab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mesy`
--
ALTER TABLE `mesy`
  ADD PRIMARY KEY (`mesy_id`),
  ADD KEY `FK_StatusMesy` (`mesy_status`),
  ADD KEY `FK_UsersMesy` (`user_id`),
  ADD KEY `FK_JabMesy` (`jab_id`),
  ADD KEY `FK_BilikMesy` (`mesy_lokasi`),
  ADD KEY `FK_AgensiMesy` (`agensi_id`);

--
-- Indexes for table `mesy_agensi`
--
ALTER TABLE `mesy_agensi`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FK_Mesymesy_agensi` (`mesy_id`),
  ADD KEY `FK_StatusMesy_agensi` (`agensi_status`);

--
-- Indexes for table `mesy_ahli`
--
ALTER TABLE `mesy_ahli`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FK_Mesymesy_ahli` (`mesy_id`),
  ADD KEY `FK_StatusMesy_ahli` (`ahli_status`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_BilikUsers` (`incharge_bilik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agensi`
--
ALTER TABLE `agensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `ahli`
--
ALTER TABLE `ahli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `bilik`
--
ALTER TABLE `bilik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `bulan`
--
ALTER TABLE `bulan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jab`
--
ALTER TABLE `jab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `mesy`
--
ALTER TABLE `mesy`
  MODIFY `mesy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `mesy_agensi`
--
ALTER TABLE `mesy_agensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `mesy_ahli`
--
ALTER TABLE `mesy_ahli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

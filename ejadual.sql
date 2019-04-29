-- phpMyAdmin SQL Dump
-- version 4.1.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 26, 2019 at 09:18 AM
-- Server version: 5.5.61-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ejadual`
--

-- --------------------------------------------------------

--
-- Table structure for table `agensi`
--

CREATE TABLE IF NOT EXISTS `agensi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agensi_id` varchar(15) NOT NULL,
  `agensi_nama` varchar(191) NOT NULL,
  `agensi_emel` varchar(191) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `agensi`
--

INSERT INTO `agensi` (`id`, `agensi_id`, `agensi_nama`, `agensi_emel`) VALUES
(1, 'KEW', 'Pejabat Kewangan Negeri Perak', 'nabihah.student@gmail.com'),
(2, 'MUFTI', 'Pejabat Mufti Negeri Perak', ''),
(3, 'HAKIM', 'Jabatan Kehakiman Syariah Negeri Perak', ''),
(4, 'SPA', 'Suruhanjaya Perkhidmatan Awam', ''),
(5, 'TANAH', 'Pejabat Pengarah Tanah Dan Galian', ''),
(6, 'JKR', 'Jabatan Kerja Raya', ''),
(7, 'JPB', 'Jabatan Perancang Bandar Dan Desa', ''),
(8, 'LAP', 'Lembaga Air Perak', ''),
(9, 'PKNP', 'Perbadanan Kemajuan Negeri Perak', ''),
(10, 'JAIP', 'Jabatan Agama Islam Perak', ''),
(11, 'HUTAN', 'Jabatan Perhutanan Negeri Perak', ''),
(12, 'JPS', 'Jabatan Pengairan Dan Saliran', ''),
(13, 'TANI', 'Pejabat Pertanian Negeri Perak', ''),
(14, 'JKMN', 'Jabatan Kebajikan Masyarakat Negeri', ''),
(15, 'VET', 'Jabatan Perkhidmatan Veterinar Negeri Perak', ''),
(16, 'GEO', 'Jabatan Mineral Dan Geosains Negeri Perak', ''),
(17, 'EKO', 'Perbadanan Kemajuan Ekonomi Islam Negeri Perak', ''),
(18, 'YP', 'Yayasan Perak', ''),
(19, 'UISAS', 'Universiti Islam Sultan Azlan Shah', ''),
(20, 'PPPN', 'Perbadanan Pembangunan Pertanian Negeri Perak', ''),
(21, 'PPANP', 'Perbadanan Perpustakaan Awam Negeri Perak', ''),
(22, 'SSI', 'Perbadanan Setiausaha Kerajaan Negeri Perak (SSI)', ''),
(23, 'UNIKL', 'Universiti Kuala Lumpur', ''),
(24, 'KPERAK', 'K-Perak Implementation And Coordination Corporation', ''),
(25, 'GALERI', 'Galeri Sultan Azlan Shah', ''),
(26, 'TOUR', 'Perak Tourism Management Bhd.', ''),
(27, 'PTNP', 'Perbadanan Taman Negeri Perak', ''),
(28, 'IDR', 'Institut Darul Ridzuan', ''),
(29, 'SPA', 'Suruhanjaya Perkhidmatan Awam Negeri Perak', ''),
(30, 'YBU', 'Yayasan Bina Upaya Darul Ridzuan', ''),
(31, 'MAIAM', 'Majlis Agama Islam & Adat Melayu Perak ', ''),
(32, 'SYARIAH', 'Jabatan Pendakwaan Syariah Negeri Perak', ''),
(33, 'MBINC', 'MB Incorporated', ''),
(34, 'PIMC', 'Perak Investment Management Centre', ''),
(35, 'LPHP', 'Lembaga Perumahan Dan Hartanah Perak', '');

-- --------------------------------------------------------

--
-- Table structure for table `ahli`
--

CREATE TABLE IF NOT EXISTS `ahli` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ahli_id` varchar(15) NOT NULL,
  `ahli_nama` varchar(191) NOT NULL,
  `ahli_emel` varchar(191) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `ahli`
--

INSERT INTO `ahli` (`id`, `ahli_id`, `ahli_nama`, `ahli_emel`) VALUES
(1, 'DB', 'Datuk Bandar', 'nabihah.student@gmail.com'),
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

CREATE TABLE IF NOT EXISTS `bilik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bilik_id` varchar(15) NOT NULL,
  `bilik_nama` varchar(191) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

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

CREATE TABLE IF NOT EXISTS `bulan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bulan_nama` varchar(15) NOT NULL,
  `bulan_id` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

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

CREATE TABLE IF NOT EXISTS `eventos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `color` varchar(255) NOT NULL,
  `textColor` varchar(255) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  PRIMARY KEY (`id`)
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

CREATE TABLE IF NOT EXISTS `jab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jab_id` varchar(15) NOT NULL,
  `jab_nama` varchar(191) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

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
(18, 'UUB', 'Unit Ukur Bahan'),
(19, 'UPPK', 'Unit Pembangunan dan Projek Khas');

-- --------------------------------------------------------

--
-- Table structure for table `mesy`
--

CREATE TABLE IF NOT EXISTS `mesy` (
  `mesy_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `mesy_bulan` int(11) DEFAULT NULL,
  `adding_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`mesy_id`),
  KEY `FK_StatusMesy` (`mesy_status`),
  KEY `FK_UsersMesy` (`user_id`),
  KEY `FK_JabMesy` (`jab_id`),
  KEY `FK_BilikMesy` (`mesy_lokasi`),
  KEY `FK_AgensiMesy` (`agensi_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `mesy`
--

INSERT INTO `mesy` (`mesy_id`, `title`, `jab_id`, `mesy_pengerusi`, `mesy_ahli`, `mesy_lokasi`, `mesy_tarikh`, `mesy_status`, `start`, `end`, `color`, `textColor`, `mesy_huraian`, `agensi_id`, `user_id`, `mesy_bulan`, `adding_date`) VALUES
(2, 'Mesy. 1', 'UTC', 'Pn A', 'Pn B', 'IXO', '2019-03-14', 4, '2019-03-14 09:30:00', '2019-03-14 09:30:00', '#000000', '#FFF', '', 'YP', 1, 3, '0000-00-00 00:00:00'),
(4, 'Mesy Test 2', 'UTC', 'Tuan B', 'Tuan C', 'DMM', '2019-03-22', 1, '2019-03-22 14:00:00', '2019-03-22 14:00:00', '#000000', '#FFF', 'hi hi ', 'KEW', 1, 3, '0000-00-00 00:00:00'),
(5, 'Mesy Test 3', 'UUB', 'Pn A', 'Pn A', 'ANG', '2019-03-02', 1, '2019-03-02 12:30:00', '2019-03-02 12:30:00', '#000000', '#FFF', 'hi hi hi', 'JPS', 1, 3, '0000-00-00 00:00:00'),
(6, 'Mesy Test 4', 'JP', 'Pn. A', 'Pn. B', 'TAN', '2019-03-01', 1, '2019-03-01 09:30:00', '2019-03-01 09:30:00', '#000000', '#FFF', 'hi hi hi hi', 'GEO', 1, 3, '0000-00-00 00:00:00'),
(7, 'TEST 5', 'OSC', 'TEST', 'TETSD', 'TEK', '2019-03-15', 1, '2019-03-15 09:29:00', '2019-03-15 09:29:00', '#000000', '#FFF', 'TEST', 'JKR', 1, 3, '0000-00-00 00:00:00'),
(8, 'TEST 6', 'JPPH', 'TEST', 'TEST', 'TEK', '2019-03-08', 2, '2019-03-08 06:30:00', '2019-03-08 06:30:00', '#000000', '#FFF', 'TEST', 'LAP', 1, 3, '0000-00-00 00:00:00'),
(9, 'TEST 7', 'UUU', 'TEST', 'TEST', 'ANG', '2019-03-12', 1, '2019-03-12 09:30:00', '2019-03-12 09:30:00', '#000000', '#FFF', 'TEST', 'LAP', 1, 3, '0000-00-00 00:00:00'),
(10, 'TEST 8', 'UAD', 'TEST', 'TEST', 'ORK', '2019-03-14', 1, '2019-03-14 11:45:00', '2019-03-14 11:45:00', '#000000', '#FFF', 'TEST', 'JAIP', 1, 3, '0000-00-00 00:00:00'),
(14, 'Mesyuarat JK', 'OSC', 'KB (OSC)', 'Pn Faridah', 'DMM', '2019-02-14', 2, '2019-02-14 10:30:00', '2019-02-14 10:30:00', '#000000', '#FFF', 'Bil. 328/03/19\nStaf BTM yang terlibat: Iskandar', 'JKR', 1, 2, '0000-00-00 00:00:00'),
(16, 'test 12', 'JKP', 'tuan A', 'tuan b', 'ANG', '2019-03-23', 1, '2019-03-23 10:10:00', '2019-03-23 10:10:00', '#000000', '#FFF', 'test 12', 'Array', 1, 3, '0000-00-00 00:00:00'),
(19, 'test 13', 'BTM', 'pn B', 'pn c', 'DAA', '2019-03-24', 1, '2019-03-24 10:29:00', '2019-03-24 10:29:00', '#000000', '#FFF', 'test', 'Array', 1, 3, '0000-00-00 00:00:00'),
(20, 'test 14', 'COB', 'pn c', 'pn f', 'DAA', '2019-03-17', 2, '2019-03-17 11:30:00', '2019-03-17 11:30:00', '#000000', '#FFF', 'test', 'Array', 1, NULL, '0000-00-00 00:00:00'),
(21, 'test 15', 'OSC', 'tn f', 'tn f', 'BAK', '2019-03-18', 1, '2019-03-18 09:45:00', '2019-03-18 09:45:00', '#000000', '#FFF', 'test', 'Array', 1, 3, '0000-00-00 00:00:00'),
(40, 'Mesyuarat Jawatankuasa Pusat Setempat Majlis Bandaraya Ipoh', 'OSC', 'Datuk Bandar', '', 'DMM', '2019-04-18', 1, '2019-04-18 10:00:00', '2019-04-18 10:00:00', '#000000', '#FFF', 'Bil. 330/05/19', NULL, 3, 4, '2019-04-15 06:46:51'),
(37, 'Test hantar emel', 'JPB', 'Datuk Bandar', '', 'DMM', '2019-04-19', 4, '2019-04-19 12:30:00', '2019-04-19 12:30:00', '#000000', '#FFF', 'test', NULL, 1, 4, '2019-04-05 02:54:12'),
(41, 'Mesyuarat JK Penasihat Perkhidmatan Bandar, Landskap dan Aduan Awam', 'JPB', 'Datuk Bandar', '', 'DMM', '2019-02-15', 2, '2019-02-15 09:00:00', '2019-02-15 09:00:00', '#000000', '#FFF', 'Bil. 114/02/19', NULL, 1, 2, '2019-04-26 00:22:49'),
(42, 'Mesyuarat OSC', 'BTM', 'Datuk Bandar', '', 'ANG', '2019-04-26', 0, '2019-04-26 09:00:00', '2019-04-26 09:00:00', '#000000', '#FFF', '', NULL, 1, 4, '2019-04-26 07:58:06'),
(43, 'Mesyuarat OSC', 'BTM', 'Datuk Bandar', '', 'ANG', '2019-04-26', 0, '2019-04-26 09:00:00', '2019-04-26 09:00:00', '#000000', '#FFF', '', NULL, 1, 4, '2019-04-26 07:58:15');

-- --------------------------------------------------------

--
-- Table structure for table `mesy_agensi`
--

CREATE TABLE IF NOT EXISTS `mesy_agensi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mesy_id` int(11) NOT NULL,
  `agensi_id` varchar(15) DEFAULT NULL,
  `agensi_status` int(11) NOT NULL,
  UNIQUE KEY `id` (`id`),
  KEY `FK_Mesymesy_agensi` (`mesy_id`),
  KEY `FK_StatusMesy_agensi` (`agensi_status`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `mesy_agensi`
--

INSERT INTO `mesy_agensi` (`id`, `mesy_id`, `agensi_id`, `agensi_status`) VALUES
(48, 43, 'Tiada', 0),
(47, 41, 'SPA', 0),
(4, 21, 'GALERI', 5),
(5, 4, 'TOUR', 5),
(6, 5, 'PTNP', 5),
(7, 7, 'KEW', 5),
(8, 7, 'TOUR', 5),
(46, 41, 'MUFTI', 0),
(45, 41, 'KEW', 0),
(44, 40, 'LPHP', 0),
(43, 40, 'GEO', 0),
(42, 40, 'JPS', 0),
(14, 14, 'KPERAK', 5),
(15, 32, 'IDR', 5),
(16, 32, 'SPA', 5),
(17, 33, 'KEW', 5),
(18, 33, 'MUFTI', 5),
(19, 33, 'TANAH', 5),
(20, 33, 'JPB', 5),
(21, 33, 'LAP', 5),
(22, 34, 'JPB', 5),
(23, 34, 'LAP', 5),
(41, 40, 'JPB', 0),
(27, 36, 'YP', 5),
(26, 36, 'KEW', 5),
(28, 36, 'MUFTI', 5),
(29, 1, 'LAP', 5),
(30, 17, 'KEW', 0),
(31, 30, 'HAKIM', 0),
(32, 31, 'LAP', 0),
(33, 19, 'TANI', 0),
(34, 33, 'TANI', 0),
(40, 40, 'JKR', 0),
(39, 40, 'TANAH', 0),
(37, 19, 'KEW', 6),
(38, 1, 'KEW', 6);

-- --------------------------------------------------------

--
-- Table structure for table `mesy_ahli`
--

CREATE TABLE IF NOT EXISTS `mesy_ahli` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mesy_id` int(11) NOT NULL,
  `ahli_id` varchar(15) DEFAULT NULL,
  `ahli_status` int(11) NOT NULL,
  UNIQUE KEY `id` (`id`),
  KEY `FK_Mesymesy_ahli` (`mesy_id`),
  KEY `FK_StatusMesy_ahli` (`ahli_status`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `mesy_ahli`
--

INSERT INTO `mesy_ahli` (`id`, `mesy_id`, `ahli_id`, `ahli_status`) VALUES
(1, 34, 'DB', 5),
(2, 34, 'SUB', 5),
(3, 34, 'PK (I/O)', 5),
(4, 21, NULL, 5),
(5, 36, 'KB (TM)', 5),
(6, 36, 'SUB', 5),
(7, 16, NULL, 5),
(37, 40, 'SUB', 0),
(10, 9, 'PK (P/B)', 5),
(36, 40, 'DB', 0),
(15, 37, 'DB', 5),
(39, 40, 'KB (TM)', 0),
(17, 16, 'PK (I/O)', 0),
(38, 40, 'PUB', 0),
(19, 18, 'PJB', 0),
(20, 5, 'DB', 5),
(41, 40, 'KB (COB)', 0),
(40, 40, 'KB (OSC)', 0),
(25, 14, 'DB', 0),
(26, 4, 'DB', 5),
(27, 7, 'DB', 5),
(28, 6, 'DB', 5),
(29, 9, 'DB', 5),
(31, 2, 'DB', 5),
(32, 10, 'DB', 5),
(33, 8, 'DB', 6),
(34, 8, 'SUB', 0),
(35, 19, 'DB', 6),
(42, 40, 'PNB', 0),
(43, 40, 'PJB', 0),
(44, 40, 'PPB', 0),
(45, 40, 'PLB', 0),
(46, 40, 'PKB', 0),
(47, 40, 'POB', 0),
(48, 40, 'PBB', 0),
(49, 41, 'DB', 0),
(50, 41, 'SUB', 0),
(51, 41, 'PK (I/O)', 0),
(52, 42, 'DB', 0),
(53, 42, 'SUB', 0),
(54, 43, 'DB', 0),
(55, 43, 'SUB', 0);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status_id` int(11) NOT NULL,
  `status_nama` varchar(191) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

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

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(191) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_type` varchar(15) NOT NULL,
  `joining_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `incharge_bilik` varchar(15) DEFAULT NULL,
  `totp_key` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_BilikUsers` (`incharge_bilik`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `user_name`, `user_email`, `user_pass`, `user_type`, `joining_date`, `incharge_bilik`, `totp_key`) VALUES
(1, 181676, 'Nabihah binti Taquddin Azmy', 'nabihah.student@gmail.com', '$2y$10$wlSUih9r26ckR6y7QrF5fOzB4X7gb/vW5633TWnVuJnPOIsB983oW', 'pengguna', '2019-04-10 06:53:06', NULL, NULL),
(2, 13834, 'Yusliza bt. Yusup', 'yuslizayusup@mbi.gov.my', '$2y$10$lXmhDD/kfd77H/t7fF8QseT/wCzyuUOfxvZnxq4LuPAAQFmtWCrAe', 'penyelaras', '2019-03-11 06:36:42', 'DMM', NULL),
(3, 181677, 'Nur Amalina Zakaria', 'amalinazakaria@hotmail.com', '$2y$10$zCbdbXJc7lnlqupygxgaOOcOqoevpbrfGxFW5xglGWfup/TYLhehW', 'pengguna', '2019-03-19 07:09:31', NULL, NULL),
(4, 181678, 'Aqilah ', 'aqilahkgmelayu@gmail.com', '$2y$10$n3KZ4xGCOvRdN5U.P6vZION7cn1F9P/FLhRodAYTNsiwYYhd.YkP.', 'pengguna', '2019-03-20 09:00:36', NULL, NULL),
(5, 112233, 'Pentadbiran', 'ejadualv1.mbi@gmail.com', '$2y$10$LqINQsf19xMClF9CXQUXY.UEMze7CQM555FhiyTFXQvN6K00eVRq6', 'pentadbir', '2019-04-08 07:48:12', NULL, NULL),
(6, 100100, 'Admin', 'admin@gmail.com', '$2y$10$BFv/rxhxp8ZifsNv2Gigqu/BqmejaOv8jOoyaBDhB82Lpl3gImbk6', 'pentadbir', '2019-04-08 08:52:52', NULL, NULL),
(7, 123123, 'Mohamed Abu Abas', 'maabas@mbi.gov.my', '$2y$10$SqUTMEURLclDTq9PW7W7pOYtcT6wEm4GwrZZSci2Z/ukyT3UYlb1e', 'penyelaras', '2019-04-09 01:06:30', 'AKU', NULL),
(9, 101101, 'Nursharina binti Sharon', 'aqhreen@mbi.gov.my', '$2y$10$zgjz3ottMfI3J41kf7Vo3ORkYUqVX7A/AL1f9G1Yjjq9r9j.qr6oq', 'penyelaras', '2019-04-12 04:07:14', 'SER', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

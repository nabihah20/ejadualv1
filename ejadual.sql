-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2019 at 09:51 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

--
-- Database: `ejadual`
--

-- --------------------------------------------------------

--
-- Table structure for table `agensi`
--

CREATE TABLE IF NOT EXISTS `agensi` (
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

CREATE TABLE IF NOT EXISTS `ahli` (
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

CREATE TABLE IF NOT EXISTS `bilik` (
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

CREATE TABLE IF NOT EXISTS `bulan` (
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

CREATE TABLE IF NOT EXISTS `eventos` (
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

CREATE TABLE IF NOT EXISTS `jab` (
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
(18, 'UUB', 'Unit Ukur Bahan'),
(19, 'UPPK', 'Unit Pembangunan dan Projek Khas');

-- --------------------------------------------------------

--
-- Table structure for table `mesy`
--

CREATE TABLE IF NOT EXISTS `mesy` (
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
  `mesy_bulan` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mesy`
--

INSERT INTO `mesy` (`mesy_id`, `title`, `jab_id`, `mesy_pengerusi`, `mesy_ahli`, `mesy_lokasi`, `mesy_tarikh`, `mesy_status`, `start`, `end`, `color`, `textColor`, `mesy_huraian`, `agensi_id`, `user_id`, `mesy_bulan`) VALUES
(1, 'Mesyuarat JK OSC', 'OSC', 'Ketua Bahagian OSC', 'BTM', 'DMM', '2019-03-13', 1, '2019-03-13 09:30:00', '2019-03-13 09:30:00', '#000000', '#FFF', 'Staf BTM yang terlibat: Zulheldy', 'UISAS', 1, NULL),
(2, 'Mesy. 1', 'UTC', 'Pn A', 'Pn B', 'IXO', '2019-03-14', 1, '2019-03-14 09:30:00', '2019-03-14 09:30:00', '#000000', '#FFF', '', 'YP', 1, NULL),
(4, 'Mesy Test 2', 'UTC', 'Tuan B', 'Tuan C', 'DMM', '2019-03-22', 1, '2019-03-22 14:00:00', '2019-03-22 14:00:00', '#000000', '#FFF', 'hi hi ', 'KEW', 1, NULL),
(5, 'Mesy Test 3', 'UUB', 'Pn A', 'Pn A', 'ANG', '2019-03-02', 1, '2019-03-02 12:30:00', '2019-03-02 12:30:00', '#000000', '#FFF', 'hi hi hi', 'JPS', 1, NULL),
(6, 'Mesy Test 4', 'JP', 'Pn. A', 'Pn. B', 'TAN', '2019-03-01', 1, '2019-03-01 09:30:00', '2019-03-01 09:30:00', '#000000', '#FFF', 'hi hi hi hi', 'GEO', 1, NULL),
(7, 'TEST 5', 'OSC', 'TEST', 'TETSD', 'TEK', '2019-03-15', 1, '2019-03-15 09:29:00', '2019-03-15 09:29:00', '#000000', '#FFF', 'TEST', 'JKR', 1, NULL),
(8, 'TEST 6', 'JPPH', 'TEST', 'TEST', 'TEK', '2019-03-08', 1, '2019-03-08 06:30:00', '2019-03-08 06:30:00', '#000000', '#FFF', 'TEST', 'LAP', 1, NULL),
(9, 'TEST 7', 'UUU', 'TEST', 'TEST', 'ANG', '2019-03-12', 1, '2019-03-12 09:30:00', '2019-03-12 09:30:00', '#000000', '#FFF', 'TEST', 'LAP', 1, NULL),
(10, 'TEST 8', 'UAD', 'TEST', 'TEST', 'ORK', '2019-03-14', 1, '2019-03-14 11:45:00', '2019-03-14 11:45:00', '#000000', '#FFF', 'TEST', 'JAIP', 1, NULL),
(11, 'TEST 9', 'JL', 'TEST', 'TEST', 'BOU', '2019-03-15', 1, '2019-03-15 11:45:00', '2019-03-15 11:45:00', '#000000', '#FFF', 'TEST', 'TANAH', 1, NULL),
(12, 'TEST 10', 'BTM', 'TEST', 'TEST', 'ORK', '2019-03-20', 1, '2019-03-20 09:55:00', '2019-03-20 09:55:00', '#000000', '#FFF', 'TEST', 'HUTAN', 1, NULL),
(15, 'test 11', 'JKP', 'tuan 1', 'tuan 2', 'TEK', '2019-03-16', 1, '2019-03-16 12:31:00', '2019-03-16 12:31:00', '#000000', '#FFF', 'test', 'Tiada', 1, NULL),
(14, 'Mesyuarat JK', 'OSC', 'KB (OSC)', 'Pn Faridah', 'DMM', '2019-02-14', 1, '2019-02-14 10:30:00', '2019-02-14 10:30:00', '#000000', '#FFF', 'Bil. 328/03/19\nStaf BTM yang terlibat: Iskandar', 'JKR', 1, NULL),
(16, 'test 12', 'JKP', 'tuan A', 'tuan b', 'ANG', '2019-03-23', 1, '2019-03-23 10:10:00', '2019-03-23 10:10:00', '#000000', '#FFF', 'test 12', 'Array', 1, NULL),
(19, 'test 13', 'BTM', 'pn B', 'pn c', 'DAA', '2019-03-24', 1, '2019-03-24 10:29:00', '2019-03-24 10:29:00', '#000000', '#FFF', 'test', 'Array', 1, NULL),
(20, 'test 14', 'COB', 'pn c', 'pn f', 'DAA', '2019-03-17', 1, '2019-03-17 11:30:00', '2019-03-17 11:30:00', '#000000', '#FFF', 'test', 'Array', 1, NULL),
(21, 'test 15', 'OSC', 'tn f', 'tn f', 'BAK', '2019-03-18', 1, '2019-03-18 09:45:00', '2019-03-18 09:45:00', '#000000', '#FFF', 'test', 'Array', 1, NULL),
(22, 'test 16', 'UAD', 'pn u', 'pn u', 'ORK', '2019-03-19', 1, '2019-03-19 10:15:00', '2019-03-19 10:15:00', '#000000', '#FFF', 'test', 'Array', 1, NULL),
(23, 'test 17', 'UKPA', 'pn b', 'pn b', 'BAK', '2019-03-21', 1, '2019-03-21 12:30:00', '2019-03-21 12:30:00', '#000000', '#FFF', 'test', 'Array', 1, NULL),
(24, 'test 17', 'JKB', 'Pn K', 'Pn L', 'IXO', '2019-03-10', 1, '2019-03-10 11:30:00', '2019-03-10 11:30:00', '#000000', '#FFF', 'test', 'Array', 1, NULL),
(25, 'test 18', 'JL', 'Tn A', 'Tn B', 'IXO', '2019-03-09', 1, '2019-03-09 10:30:00', '2019-03-09 10:30:00', '#000000', '#FFF', 'test ', 'Array', 1, NULL),
(26, 'test 19', 'BTM', 'Tn B', 'Tn B', 'DAA', '2019-03-11', 1, '2019-03-11 10:30:00', '2019-03-11 10:30:00', '#000000', '#FFF', 'test', 'Array', 1, NULL),
(27, 'TEST 20', 'UUB', 'a', 'b', 'DAA', '2019-03-04', 1, '2019-03-04 10:00:00', '2019-03-04 10:00:00', '#000000', '#FFF', 'TEST', 'Array', 1, NULL),
(28, 'test 21', 'OSC', 'a', 'a', 'DMM', '2019-03-05', 1, '2019-03-05 12:30:00', '2019-03-05 12:30:00', '#000000', '#FFF', 'test', 'Array', 1, NULL),
(29, 'TEST 22', 'UKPA', 'EN A', 'EN B', 'ANG', '2019-03-06', 1, '2019-03-06 11:30:00', '2019-03-06 11:30:00', '#000000', '#FFF', 'TEST', 'Array', 1, NULL),
(30, 'TEST 23', 'OSC', 'A', 'B', 'IXO', '2019-03-07', 1, '2019-03-07 11:45:00', '2019-03-07 11:45:00', '#000000', '#FFF', 'TEST', 'Array', 1, NULL),
(31, 'TEST 24', 'UKPA', 'a', 'b', 'ORK', '2019-03-03', 1, '2019-03-03 10:11:00', '2019-03-03 10:11:00', '#000000', '#FFF', 'TEST', 'Array', 1, NULL),
(32, 'test 25', 'OSC', 'a', 'b', 'TEK', '2019-02-28', 1, '2019-02-28 10:10:00', '2019-02-28 10:10:00', '#000000', '#FFF', 'test', 'Array', 1, NULL),
(33, 'test 26', 'COB', 'b', 'a', 'GER', '2019-02-27', 1, '2019-02-27 12:30:00', '2019-02-27 12:30:00', '#000000', '#FFF', 'test', NULL, 1, NULL),
(34, 'test 27', 'UKPA', 'Datuk Bandar', '', 'ANG', '2019-02-25', 1, '2019-02-25 11:30:00', '2019-02-25 11:30:00', '#000000', '#FFF', 'test', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mesy_agensi`
--

CREATE TABLE IF NOT EXISTS `mesy_agensi` (
  `mesy_id` int(11) NOT NULL,
  `agensi_id` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mesy_agensi`
--

INSERT INTO `mesy_agensi` (`mesy_id`, `agensi_id`) VALUES
(0, NULL),
(0, 'KEW'),
(0, 'MUFTI'),
(21, 'GALERI'),
(4, 'TOUR'),
(5, 'PTNP'),
(23, 'GALERI'),
(7, 'TOUR'),
(0, 'TOUR'),
(0, 'PTNP'),
(0, 'GALERI'),
(0, 'TOUR'),
(0, 'PTNP'),
(31, 'UNIKL'),
(14, 'KPERAK'),
(32, 'IDR'),
(32, 'SPA'),
(33, 'KEW'),
(33, 'MUFTI'),
(33, 'TANAH'),
(33, 'JPB'),
(33, 'LAP'),
(34, 'JPB'),
(34, 'LAP');

-- --------------------------------------------------------

--
-- Table structure for table `mesy_ahli`
--

CREATE TABLE IF NOT EXISTS `mesy_ahli` (
  `mesy_id` int(11) NOT NULL,
  `ahli_id` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mesy_ahli`
--

INSERT INTO `mesy_ahli` (`mesy_id`, `ahli_id`) VALUES
(34, 'DB'),
(34, 'SUB'),
(34, 'PK (I/O)');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status_nama` varchar(191) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status_nama`) VALUES
(1, 'proses'),
(2, 'lulus'),
(3, 'tangguh'),
(4, 'batal');

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
  `joining_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `user_name`, `user_email`, `user_pass`, `joining_date`) VALUES
(1, 181676, 'Nabihah binti Taquddin Azmy', 'nabihah.student@gmail.com', '$2y$10$VC53QvFcLSFdbBBG5nh.pu8SzEQTZr0tmd.pgIXdttALweMuBRC6i', '2019-03-11 06:32:42'),
(2, 13834, 'Yusliza bt. Yusup', 'yuslizayusup@mbi.gov.my', '$2y$10$lXmhDD/kfd77H/t7fF8QseT/wCzyuUOfxvZnxq4LuPAAQFmtWCrAe', '2019-03-11 06:36:42');

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
  ADD KEY `FK_Mesymesy_agensi` (`mesy_id`);

--
-- Indexes for table `mesy_ahli`
--
ALTER TABLE `mesy_ahli`
  ADD KEY `FK_Mesymesy_ahli` (`mesy_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `mesy`
--
ALTER TABLE `mesy`
  MODIFY `mesy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

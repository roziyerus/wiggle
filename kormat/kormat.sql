-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2014 at 09:51 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kormat`
--


-- --------------------------------------------------------

--
-- Table structure for table `angkatan`
--

CREATE TABLE IF NOT EXISTS `angkatan` (
  `kd_angkatan` int(15) NOT NULL,
  `nm_angkatan` int(15) NOT NULL,
  PRIMARY KEY (`kd_angkatan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `angkatan`
--

INSERT INTO `angkatan` (`kd_angkatan`, `nm_angkatan`) VALUES
(2, 2010),
(3, 2011),
(4, 2012),
(5, 2013);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `id_class` int(2) NOT NULL,
  `nm_class` varchar(10) NOT NULL,
  PRIMARY KEY (`id_class`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id_class`, `nm_class`) VALUES
(1, 'A'),
(2, 'B');

-- --------------------------------------------------------

--
-- Table structure for table `date_task`
--

CREATE TABLE IF NOT EXISTS `date_task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nim` varchar(50) NOT NULL,
  `jdl_tugas` text NOT NULL,
  `tgl_tugas` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

-- --------------------------------------------------------

--
-- Table structure for table `email_dosen`
--

CREATE TABLE IF NOT EXISTS `email_dosen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nm_dosen` varchar(50) NOT NULL,
  `email_dosen` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `email_dosen`
--

INSERT INTO `email_dosen` (`id`, `nm_dosen`, `email_dosen`) VALUES
(2, 'Eko Didik Widianto, S.T, M.T', 'ekodidik@undip.ac.id'),
(3, 'Adian Fathur R, S.T, M.T.', 'adian@undip.ac.id'),
(4, 'Kurniawan Teguh Martono, S.T. M.T', 'kteguhm@gmail.com'),
(5, 'Rinta Kridalukmana, S.T, M.T', 'rintakrida@ce.undip.ac.id');

-- --------------------------------------------------------

--
-- Table structure for table `file_makul`
--

CREATE TABLE IF NOT EXISTS `file_makul` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nim` varchar(50) NOT NULL,
  `nm_files` varchar(100) NOT NULL,
  `nm_pengirim` varchar(25) NOT NULL,
  `id_makul` int(10) NOT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dt_task` datetime NOT NULL,
  `id_class` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `link_tugas`
--

CREATE TABLE IF NOT EXISTS `link_tugas` (
  `nim_kormat` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `judul_tugas` varchar(100) NOT NULL,
  `decrip_tugas` text NOT NULL,
  PRIMARY KEY (`nim_kormat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `link_tugas`
--
DROP TRIGGER IF EXISTS `insert_into_date_task`;
DELIMITER //
CREATE TRIGGER `insert_into_date_task` AFTER INSERT ON `link_tugas`
 FOR EACH ROW BEGIN
INSERT INTO date_task 
(nim,jdl_tugas,tgl_tugas)
values 


(new.nim_kormat,new.judul_tugas,new.date);
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `when_update_insert_into_date_task`;
DELIMITER //
CREATE TRIGGER `when_update_insert_into_date_task` AFTER UPDATE ON `link_tugas`
 FOR EACH ROW BEGIN
INSERT INTO date_task 
(nim,jdl_tugas,tgl_tugas)
values 


(new.nim_kormat,new.judul_tugas,new.date

);
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `makul`
--

CREATE TABLE IF NOT EXISTS `makul` (
  `id_makul` int(10) NOT NULL,
  `nm_makul` varchar(100) NOT NULL,
  `semester` int(2) NOT NULL,
  PRIMARY KEY (`id_makul`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `makul`
--

INSERT INTO `makul` (`id_makul`, `nm_makul`, `semester`) VALUES
(1, 'Ilmu Sosial dan Budaya Dasar', 2),
(2, 'Fisika Dasar II', 2),
(3, 'Pendidikan Kewarganegaraan', 2),
(4, 'Algoritma dan Pemrograman', 2),
(5, 'Sistem Digital', 2),
(6, 'Kalkulus II', 2),
(7, 'Elektronika Dasar', 2),
(8, 'Arsitektur Komputer', 2),
(9, 'Sistem Basis Data', 2),
(10, 'Metodologi Penelitian', 2),
(11, 'Jaringan Komputer I', 2),
(12, 'Transduser dan Sensor', 2),
(13, 'Pemrograman Perangkat Bergerak', 2),
(14, 'Struktur Data', 2),
(15, 'Kriptografi', 2),
(16, 'Real Time Operating System', 2),
(17, 'Multimedia', 2),
(18, 'Jaringan Komputer Lanjut', 2),
(19, 'Etika Profesi', 2),
(20, 'Rekayasa Software Berbasis Komponen', 2),
(21, 'Fundamental of Object Oriented Programming', 2),
(22, 'Pemrograman Berorientasi Lanjut', 2),
(23, 'Sistem Embedded Terdistribusi', 2),
(24, 'Pemrograman Basis Data', 2),
(25, 'Speech Recognition', 2),
(26, 'Perancangan Mikroprosessor', 2),
(27, 'Pengolahan Paralel', 2),
(28, 'Pengolahan Sinyal', 2),
(29, 'Keamanan Sistem Informasi', 2),
(30, 'Bahasa Inggris', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mimin`
--

CREATE TABLE IF NOT EXISTS `mimin` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mimin`
--

INSERT INTO `mimin` (`id`, `username`, `password`, `level`) VALUES
(1, 'mimin', '03f7f7198958ffbda01db956d15f134a', 'mimin');

-- --------------------------------------------------------

--
-- Table structure for table `pending_users`
--

CREATE TABLE IF NOT EXISTS `pending_users` (
  `username` varchar(50) NOT NULL,
  `token` varchar(40) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL,
  `nim` varchar(50) NOT NULL,
  PRIMARY KEY (`nim`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
  `set_makul` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`set_makul`) VALUES
(2);

-- --------------------------------------------------------

--
-- Table structure for table `users_data`
--

CREATE TABLE IF NOT EXISTS `users_data` (
  `full_name` varchar(50) NOT NULL,
  `nim` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `angkatan` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  `joined` datetime NOT NULL,
  `id_makul` int(100) NOT NULL,
  `id_class` int(11) NOT NULL,
  PRIMARY KEY (`nim`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_data`
--

INSERT INTO `users_data` (`full_name`, `nim`, `email`, `angkatan`, `username`, `password`, `status`, `joined`, `id_makul`, `id_class`) VALUES
('Rozi Yerus', '21120111130038', 'roziyerus@live.com', '3', 'roziyerus', '942fb5b7d158121be6238bf12dd02b09', 1, '2014-03-01 23:57:29', 8, 1);

--
-- Triggers `users_data`
--
DROP TRIGGER IF EXISTS `insert_on`;
DELIMITER //
CREATE TRIGGER `insert_on` AFTER INSERT ON `users_data`
 FOR EACH ROW begin

end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users_photos`
--

CREATE TABLE IF NOT EXISTS `users_photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nim` varchar(25) NOT NULL,
  `photos_name` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- Table structure for table `zip_files`
--

CREATE TABLE IF NOT EXISTS `zip_files` (
  `id_zip_file` int(15) NOT NULL AUTO_INCREMENT,
  `nm_z_files` varchar(100) NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_makul` int(15) NOT NULL,
  `id_class` int(11) NOT NULL,
  PRIMARY KEY (`id_zip_file`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

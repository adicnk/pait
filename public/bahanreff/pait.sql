-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.24-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for pait
CREATE DATABASE IF NOT EXISTS `pait` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `pait`;

-- Dumping structure for table pait.jurusan
CREATE TABLE IF NOT EXISTS `jurusan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jname` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table pait.jurusan: ~2 rows (approximately)
/*!40000 ALTER TABLE `jurusan` DISABLE KEYS */;
INSERT INTO `jurusan` (`id`, `jname`, `created_at`, `updated_at`) VALUES
	(1, 'D3 Keperawatan', '2022-04-04 23:42:35', '2022-04-04 23:42:37'),
	(2, 'Profesi Ners', '2022-04-04 23:43:05', '2022-04-04 23:43:06');
/*!40000 ALTER TABLE `jurusan` ENABLE KEYS */;

-- Dumping structure for table pait.kategori_soal
CREATE TABLE IF NOT EXISTS `kategori_soal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kname` varchar(100) DEFAULT NULL,
  `jumlah_soal` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table pait.kategori_soal: ~5 rows (approximately)
/*!40000 ALTER TABLE `kategori_soal` DISABLE KEYS */;
INSERT INTO `kategori_soal` (`id`, `kname`, `jumlah_soal`, `created_at`, `updated_at`) VALUES
	(1, 'Pemeriksaan Ekstrimitas', 20, '2022-04-04 23:12:55', '2022-04-04 23:12:58'),
	(2, 'Pemeriksaan Kepala dan Leher', 35, '2022-04-04 23:13:53', '2022-04-04 23:13:55'),
	(3, 'Pemeriksaan Dada', 41, '2022-04-04 23:14:37', '2022-04-04 23:14:39'),
	(4, 'Pemeriksaan Perut', 13, '2022-04-04 23:15:10', '2022-04-04 23:15:11'),
	(5, 'Pemeriksaan Genitalia & Rectum', 40, '2022-04-05 18:41:35', '2022-04-05 18:41:36');
/*!40000 ALTER TABLE `kategori_soal` ENABLE KEYS */;

-- Dumping structure for table pait.login
CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `is_start` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table pait.login: ~2 rows (approximately)
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` (`id`, `role_id`, `user_id`, `username`, `password`, `is_active`, `is_start`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 'a', 'a', 1, NULL, '2022-04-08 05:48:21', '2022-04-08 05:48:21'),
	(2, 1, 2, 'b', 'b', 1, NULL, '2022-04-08 05:50:18', '2022-04-08 05:50:18'),
	(3, 1, 5, 'ff', 'ff', 1, NULL, '2022-04-09 00:06:03', '2022-04-09 00:06:03');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;

-- Dumping structure for table pait.role
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table pait.role: ~2 rows (approximately)
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` (`id`, `name`) VALUES
	(1, 'Administrator'),
	(2, 'Member');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;

-- Dumping structure for table pait.soal
CREATE TABLE IF NOT EXISTS `soal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_soal_id` int(11) DEFAULT NULL,
  `name` text DEFAULT NULL,
  `is_picture` tinyint(1) DEFAULT NULL,
  `picture_url` varchar(100) DEFAULT NULL,
  `is_audio` tinyint(1) DEFAULT NULL,
  `audio_url` varchar(100) DEFAULT NULL,
  `is_choosen` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table pait.soal: ~4 rows (approximately)
/*!40000 ALTER TABLE `soal` DISABLE KEYS */;
INSERT INTO `soal` (`id`, `kategori_soal_id`, `name`, `is_picture`, `picture_url`, `is_audio`, `audio_url`, `is_choosen`) VALUES
	(1, 1, '1', 1, NULL, 1, NULL, 1),
	(2, 2, '2', 1, NULL, NULL, NULL, NULL),
	(3, 3, '3', NULL, NULL, 1, NULL, NULL),
	(4, 4, '4', 1, NULL, 1, NULL, NULL),
	(5, 5, '5', NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `soal` ENABLE KEYS */;

-- Dumping structure for table pait.status
CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sname` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table pait.status: ~2 rows (approximately)
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` (`id`, `sname`, `created_at`, `updated_at`) VALUES
	(1, 'Mahasiswa', '2022-04-08 17:10:59', '2022-04-08 17:11:01'),
	(2, 'Staff', '2022-04-08 17:11:14', '2022-04-08 17:11:16');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;

-- Dumping structure for table pait.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `jurusan_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `slug` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `nim` varchar(50) DEFAULT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table pait.user: ~7 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `role_id`, `status_id`, `jurusan_id`, `name`, `slug`, `email`, `nim`, `nip`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 1, 'a', 'a', 'a@a', '12345', NULL, '2022-04-08 05:48:21', '2022-04-08 05:48:21'),
	(2, 1, 2, NULL, 'b', 'b', 'b@b', NULL, '56789', '2022-04-08 05:50:17', '2022-04-08 05:50:17'),
	(3, 2, 1, 2, 'cc', 'cc', NULL, '0809809809', NULL, '2022-04-08 06:31:32', '2022-04-08 06:31:33'),
	(4, 2, 2, NULL, 'dd', 'dd', 'dd@dd', '0809809809', NULL, '2022-04-08 06:32:36', '2022-04-08 06:32:36'),
	(5, 1, 1, 2, 'ff', 'ff', 'ff@ff', '34534', NULL, '2022-04-09 00:06:03', '2022-04-09 00:06:03'),
	(6, 2, 1, 1, 'gg', 'gg', 'gg@gg', '6585765', NULL, '2022-04-09 01:03:36', '2022-04-09 01:03:36'),
	(7, 2, 1, 2, 'hh', 'hh', 'hh@hh', '23424', NULL, '2022-04-09 01:08:07', '2022-04-09 01:08:07');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

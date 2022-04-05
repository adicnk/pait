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

-- Dumping structure for table pait.class
CREATE TABLE IF NOT EXISTS `class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table pait.class: ~2 rows (approximately)
/*!40000 ALTER TABLE `class` DISABLE KEYS */;
INSERT INTO `class` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'D3 Keperawatan', '2022-04-04 23:42:35', '2022-04-04 23:42:37'),
	(2, 'Profesi Ners', '2022-04-04 23:43:05', '2022-04-04 23:43:06');
/*!40000 ALTER TABLE `class` ENABLE KEYS */;

-- Dumping structure for table pait.kategori_soal
CREATE TABLE IF NOT EXISTS `kategori_soal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `jumlah_soal` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table pait.kategori_soal: ~4 rows (approximately)
/*!40000 ALTER TABLE `kategori_soal` DISABLE KEYS */;
INSERT INTO `kategori_soal` (`id`, `name`, `jumlah_soal`, `created_at`, `updated_at`) VALUES
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table pait.login: ~0 rows (approximately)
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` (`id`, `role_id`, `user_id`, `username`, `password`, `is_active`, `is_start`, `created_at`, `updated_at`) VALUES
	(1, 1, NULL, 'admin', 'admin', 1, NULL, '2022-04-04 23:38:33', '2022-04-04 23:38:35');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;

-- Dumping structure for table pait.role
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table pait.role: ~2 rows (approximately)
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'administrator', '2022-04-04 23:30:52', '2022-04-04 23:30:54'),
	(2, 'mahasiswa', '2022-04-04 23:31:05', '2022-04-04 23:31:07');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;

-- Dumping structure for table pait.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `nim` varchar(50) DEFAULT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table pait.user: ~1 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `class_id`, `name`, `nim`, `nip`, `created_at`, `updated_at`) VALUES
	(1, NULL, 'Administrator', NULL, NULL, '2022-04-04 23:51:50', '2022-04-04 23:51:52');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

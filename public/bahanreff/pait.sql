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

-- Dumping structure for table pait.jawaban
CREATE TABLE IF NOT EXISTS `jawaban` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `soal_id` int(11) DEFAULT NULL,
  `jawabanA` text DEFAULT NULL,
  `jawabanB` text DEFAULT NULL,
  `jawabanC` text DEFAULT NULL,
  `jawabanD` text DEFAULT NULL,
  `jawabanE` text DEFAULT NULL,
  `jawaban_benar` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table pait.jawaban: ~0 rows (approximately)
/*!40000 ALTER TABLE `jawaban` DISABLE KEYS */;
INSERT INTO `jawaban` (`id`, `soal_id`, `jawabanA`, `jawabanB`, `jawabanC`, `jawabanD`, `jawabanE`, `jawaban_benar`, `created_at`, `updated_at`) VALUES
	(1, 1, 'aa', 'aa', 'aa', 'aa', 'aa', 1, '2022-04-12 21:10:13', '2022-04-12 21:10:13');
/*!40000 ALTER TABLE `jawaban` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table pait.login: ~2 rows (approximately)
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` (`id`, `role_id`, `user_id`, `username`, `password`, `is_active`, `is_start`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 'aa', 'cc', 1, NULL, '2022-04-13 11:31:47', '2022-04-13 11:34:08'),
	(2, 1, 2, 'bb', 'dd', 1, NULL, '2022-04-13 11:33:09', '2022-04-13 11:34:30');
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
  `is_choosen` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table pait.soal: ~0 rows (approximately)
/*!40000 ALTER TABLE `soal` DISABLE KEYS */;
INSERT INTO `soal` (`id`, `kategori_soal_id`, `name`, `is_picture`, `picture_url`, `is_audio`, `audio_url`, `is_choosen`, `created_at`, `updated_at`) VALUES
	(1, 1, 'aa', NULL, NULL, NULL, NULL, 1, '2022-04-12 21:10:13', '2022-04-12 21:10:13');
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
  `idx` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table pait.user: ~2 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `idx`, `role_id`, `status_id`, `jurusan_id`, `name`, `slug`, `email`, `nim`, `nip`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 1, 1, 'aa', 'aa', '', '', '', '2022-04-13 11:31:46', '2022-04-13 11:34:08'),
	(2, 2, 1, 1, 1, 'bb', 'bb', '', '', '', '2022-04-13 11:33:09', '2022-04-13 11:34:30');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

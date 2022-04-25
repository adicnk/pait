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

-- Dumping structure for table pait.config
CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total_soal` int(11) DEFAULT NULL,
  `nilai_min` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table pait.config: ~1 rows (approximately)
/*!40000 ALTER TABLE `config` DISABLE KEYS */;
INSERT INTO `config` (`id`, `total_soal`, `nilai_min`, `created_at`, `updated_at`) VALUES
	(1, 5, 60, '2022-04-14 08:20:48', '2022-04-14 08:20:49');
/*!40000 ALTER TABLE `config` ENABLE KEYS */;

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
  `pilihan` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table pait.jawaban: ~7 rows (approximately)
/*!40000 ALTER TABLE `jawaban` DISABLE KEYS */;
INSERT INTO `jawaban` (`id`, `soal_id`, `jawabanA`, `jawabanB`, `jawabanC`, `jawabanD`, `jawabanE`, `jawaban_benar`, `pilihan`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Kaji tanda-tanda dehidrasi', 'Ukur intake dan output ', 'Beri banyak minum', 'Beri antiemetik sesuai terapi', 'Berikan cairan parenteral sesuai program', 5, NULL, '2022-04-16 02:25:05', '2022-04-25 09:57:27'),
	(2, 2, '24%', '44%', '30%', '60%', '40%', 1, NULL, '2022-04-16 15:42:29', '2022-04-16 15:42:29'),
	(3, 3, 'Retensi air dan Natrium', 'Sekresi ADH dan Aldosteron', 'Hipoalbuminemia akibat proteiuria ', 'Penurunan Tekanan osmotik koloid', 'Peningkatan Permeabilitas membran glomerolus', 3, NULL, '2022-04-16 15:59:19', '2022-04-16 15:59:19'),
	(4, 4, 'Beri diet sesuai usia', 'Sendawakan dengan sering', 'Dorong ibu untuk menyusui sesegera mungkin', 'Gunakan alat makan khusus', 'Pantau berat badan bayi', 4, NULL, '2022-04-16 16:04:14', '2022-04-16 16:04:14'),
	(5, 5, 'Memberikan air minum hangat', 'Mengatur posisi klien', 'Mengauskultasi paru', 'Memberikan  obat ekspektoran', 'Melakukan perkusi/klaping', 1, NULL, '2022-04-16 16:08:17', '2022-04-16 23:58:13'),
	(6, 6, 'Berikan cairan pedialit', 'Teruskan  pemberian ASI saja', 'Berikan cairan RL dan oralit', 'Berikan cairan Dekstros dan NaCl', 'Berikan diet secara bervariasi', 1, NULL, '2022-04-16 16:12:22', '2022-04-16 16:12:22'),
	(7, 7, 'Mengurangi batuk', 'Merangsang pengeluaran sekret', 'Mengencerkan sekret', 'Mengurangi dahak', 'Memberikan rasa nyaman.', 3, NULL, '2022-04-16 18:14:36', '2022-04-16 18:14:59');
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

-- Dumping data for table pait.kategori_soal: ~4 rows (approximately)
/*!40000 ALTER TABLE `kategori_soal` DISABLE KEYS */;
INSERT INTO `kategori_soal` (`id`, `kname`, `jumlah_soal`, `created_at`, `updated_at`) VALUES
	(1, 'Pemeriksaan Ekstremitas', 2, '2022-04-14 09:11:00', '2022-04-22 14:01:40'),
	(2, 'Pemeriksaan Kepala dan Leher', 2, '2022-04-14 09:11:58', '2022-04-22 14:01:40'),
	(3, 'Pemeriksaan Dada', 1, '2022-04-14 09:12:00', '2022-04-22 14:01:40'),
	(4, 'Pemeriksaan Perut', 2, '2022-04-14 09:12:18', '2022-04-22 14:01:40'),
	(5, 'Pemeriksaan Genitalia dan Rectum', 1, '2022-04-14 09:12:45', '2022-04-22 14:01:40');
/*!40000 ALTER TABLE `kategori_soal` ENABLE KEYS */;

-- Dumping structure for table pait.latihan
CREATE TABLE IF NOT EXISTS `latihan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `benar` int(11) DEFAULT NULL,
  `salah` int(11) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table pait.latihan: ~0 rows (approximately)
/*!40000 ALTER TABLE `latihan` DISABLE KEYS */;
/*!40000 ALTER TABLE `latihan` ENABLE KEYS */;

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

-- Dumping data for table pait.login: ~1 rows (approximately)
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` (`id`, `role_id`, `user_id`, `username`, `password`, `is_active`, `is_start`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 'admin', 'admin', 1, NULL, '2022-04-25 08:22:31', '2022-04-25 08:22:31'),
	(2, 1, 3, 'bella', 'bella', 1, NULL, '2022-04-25 16:38:29', '2022-04-25 16:38:29');
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
	(1, 'Administrator', '2022-04-14 08:19:35', '2022-04-14 08:19:36'),
	(2, 'Member', '2022-04-14 08:19:38', '2022-04-14 08:19:39');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;

-- Dumping structure for table pait.soal
CREATE TABLE IF NOT EXISTS `soal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idx` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table pait.soal: ~7 rows (approximately)
/*!40000 ALTER TABLE `soal` DISABLE KEYS */;
INSERT INTO `soal` (`id`, `idx`, `kategori_soal_id`, `name`, `is_picture`, `picture_url`, `is_audio`, `audio_url`, `is_choosen`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 'Seorang anak perempuan umur  4 tahundi antar orang tuanya ke UGD  karena  panas sudah 3 hari dan muntah-muntah .  Hasil pengkajian didapatkan data :  pasien tampak lemas, mukosa bibir kering, turgor kulit kurang elastis. Akral dingin, nadi 100 kali permenit, suhu tubuh 38,6°C, pernafasan 28 kali permenit, petikie pada ektremitas .Trombosit 87.000 /mm3 , Hematokrit 40 %. \r\nManakah  rencana tindakan yang  utama untuk memperbaiki status  cairan pada anak tersebut ?', NULL, NULL, NULL, NULL, NULL, '2022-04-16 02:25:05', '2022-04-25 09:57:27'),
	(2, 2, 3, 'Seorang anak  laki-laki  umur  2 tahun di rawat. Menurut ibu klien anaknya sesak dan batuk –batuk , panas, rewel .  Hasil pengkajian didapatkan bayi didapatkan sesak, batuk , retraksi dada, pernafasan 30 kali permenit nadi 100 kali permenit, suhu tubuh 38°C, terdapat ronkhi, terpasang O2 1liter/menit dengan nasal kanul\r\nBerapakah konsentrasi oksigen yang di dapatkan?\r\n', 1, NULL, NULL, NULL, 1, '2022-04-16 15:42:28', '2022-04-16 15:42:29'),
	(3, 3, 2, 'Seorang anak laki-laki umur 4 tahun dirawat dirumah sakit. Ibu klien mengatakan badan anaknya bengkak sejak 2 bulan.  Hasil pemeriksaan fisik : edema pada wajah, abdomen, dan ekstremitas, tekanan darah 140/90 mmHg, nadi 88 x/menit, pernafasan 28 x/menit,suhu 36.8°C', NULL, NULL, NULL, NULL, 1, '2022-04-16 15:59:18', '2022-04-16 15:59:19'),
	(4, 4, 4, 'Seorang bayi laki-laki berusia 1 bulan dibawa oleh ibunya  dengan Labiopalatozkisis dengan keluhan kesulitan  menyusu dan berat badan menurun. Berdasarkan kasus tersebut, diharapkan bayi  akan mengkonsumsi nutrisi secara adekuat.\r\nApa tindakan keperawatan prioritas utama yang diberikan untuk mencapai tujuan yang diharapkan?\r\n', 1, NULL, NULL, NULL, 1, '2022-04-16 16:04:14', '2022-04-16 16:04:14'),
	(5, 5, 5, 'Seorang anak  perempuan usia 4 tahun, di rawat dengan diagnosa medis Bronchopneumonia ibu mengatakan anaknya batuk tapi tidak disertai sesak pada saat dilakukan pemeriksaan fisik didapatkan frekwensi pernapasan 30x/menit denyut nadi 100 x/menit temperatur 36 ºC setelah selesai  pemeriksaan TTV anak tersebut di rencanakan untuk dilakukan fisioterapi dada yang di awali dariPostural drainage,claping dan vibrating.\r\nSebelum melaksanakna postural drainage hal pertama yang harus dilakukan oleh perawat adalah?', 1, NULL, NULL, NULL, 1, '2022-04-16 16:08:17', '2022-04-16 23:58:13'),
	(6, 6, 4, 'Seorang anak laki-laki berumur 1 bulan dengan diare dirawat di rumah sakit. Ibu klien mengatakan klien buang air sudah 8x, muntah dan tidak mau minum ASI, mata cekung, mukosa bibir kering,berat badan turun,apatis\r\nApakah rencana keperawatan utama pada kasus diatas?', NULL, NULL, NULL, NULL, NULL, '2022-04-16 16:12:22', '2022-04-16 16:12:22'),
	(7, 7, 2, 'Seorang anak laki-laki usia 1 tahun ,Orang tua mengatakan  anaknya batuk sejak 14 hari yang lalu, dan kondisi batuknya semakin berat dan sesak nafas,hasil pengkajian pernafasan 60 x/menit, nafas cuping hidung, retraksi dada, ronkhi terdengar di kedua lapangan paru dari terafi yang di berikan oleh doter adalah pemberian nebulizer dengan dosis obat 3x  1 amp ambiven.\r\nTujuan utama pemberian Nebulizer adalah?\r\n', NULL, NULL, NULL, NULL, 1, '2022-04-16 18:14:36', '2022-04-16 18:14:59');
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
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table pait.user: ~2 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `idx`, `role_id`, `status_id`, `jurusan_id`, `name`, `slug`, `email`, `nim`, `nip`, `username`, `password`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 2, NULL, 'Administrator', 'administrator', 'admin@stikep-ppnijabar.ac.id', NULL, '', NULL, NULL, '2022-04-25 08:22:31', '2022-04-25 08:22:31'),
	(2, 2, 2, 1, 1, 'Donni', 'donni', 'donni@stikep-ppnijabar.ac.id', '84567589', '84567589', 'donni', 'donni', '2022-04-25 08:35:39', '2022-04-25 08:58:22'),
	(3, 3, 1, 1, 1, 'Bella', 'bella', '', '', NULL, NULL, NULL, '2022-04-25 16:38:26', '2022-04-25 16:38:27');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

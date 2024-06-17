/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET NAMES utf8 */
;
/*!50503 SET NAMES utf8mb4 */
;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */
;
/*!40103 SET TIME_ZONE='+00:00' */
;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */
;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */
;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */
;

CREATE DATABASE IF NOT EXISTS `kiranatour` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `kiranatour`;

CREATE TABLE IF NOT EXISTS `admin` (
    `id` int NOT NULL AUTO_INCREMENT,
    `nama_lengkap` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
    `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
    `nomor_telepon` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
    `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `email` (`email`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `driver` (
    `id` int NOT NULL AUTO_INCREMENT,
    `nama_lengkap` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
    `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
    `nomor_telepon` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
    `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
    `kendaraan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
    `kapasitas` int NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `email` (`email`)
) ENGINE = InnoDB AUTO_INCREMENT = 11 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `inbox` (
    `id` int NOT NULL AUTO_INCREMENT,
    `id_penerima` int NOT NULL,
    `judul` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
    `tanggal_waktu` datetime NOT NULL,
    `status` tinyint(1) NOT NULL,
    `konten` text COLLATE utf8mb4_general_ci NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 9 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `rute` (
    `id` int NOT NULL AUTO_INCREMENT,
    `kota_awal` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
    `kota_tujuan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
    `harga` decimal(10, 2) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 11 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `transaksi` (
    `id` int NOT NULL AUTO_INCREMENT,
    `id_user` int NOT NULL,
    `rute` int NOT NULL,
    `driver` int DEFAULT NULL,
    `tanggal_mulai` datetime NOT NULL,
    `tanggal_selesai` datetime NOT NULL,
    `jumlah_penumpang` int NOT NULL,
    `nama_pemesan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
    `perusahaan` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
    `telepon` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
    `alamat_penjemputan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
    `pemandu_wisata` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
    `tempat_makan` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
    `akomodasi` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
    `catatan` text COLLATE utf8mb4_general_ci,
    `total_harga` decimal(10, 2) NOT NULL,
    `status` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
    `rating` int DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `rute` (`rute`),
    KEY `driver` (`driver`),
    CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`rute`) REFERENCES `rute` (`id`),
    CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`driver`) REFERENCES `driver` (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 47 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `user` (
    `id` int NOT NULL AUTO_INCREMENT,
    `nama_lengkap` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
    `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
    `nomor_telepon` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
    `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `email` (`email`)
) ENGINE = InnoDB AUTO_INCREMENT = 7 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `pelaporan` (
    `id` int NOT NULL AUTO_INCREMENT,
    `pelapor` int NOT NULL,
    `judul` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
    `kategori` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
    `isi` text COLLATE utf8mb4_general_ci NOT NULL,
    `telepon` int DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `pelapor` (`pelapor`),
    CONSTRAINT `pelaporan_ibfk_1` FOREIGN KEY (`pelapor`) REFERENCES `user` (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 12 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */
;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */
;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */
;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */
;
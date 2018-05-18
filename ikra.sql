-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.1.29-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for dbpenjualan
CREATE DATABASE IF NOT EXISTS `dbpenjualan` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dbpenjualan`;

-- Dumping structure for table dbpenjualan.barang
CREATE TABLE IF NOT EXISTS `barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `satuan_id` int(11) DEFAULT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `harga_jual` double DEFAULT NULL,
  `harga_beli` double DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `merek` varchar(50) DEFAULT NULL,
  `tipe` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_barang_satuan` (`satuan_id`),
  CONSTRAINT `FK_barang_satuan` FOREIGN KEY (`satuan_id`) REFERENCES `satuan` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table dbpenjualan.barang: ~8 rows (approximately)
DELETE FROM `barang`;
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
INSERT INTO `barang` (`id`, `satuan_id`, `nama_barang`, `harga_jual`, `harga_beli`, `stok`, `merek`, `tipe`) VALUES
	(1, 1, 'Semen', 5000000, 2000000, 30, '4 Roda', 'Item'),
	(2, 2, 'Tali', 10000, 5000, 400, 'cobra', 'tambang'),
	(3, 1, 'Gipsum', 60000, 50000, 30, 'drakal', 'lunak'),
	(4, 2, 'kawat', 3000, 2500, 1000, NULL, NULL),
	(5, 1, 'Pasir', 60000, 50000, 40, NULL, NULL),
	(6, 1, 'lem', 400000, 320000, 21, NULL, NULL),
	(7, 3, 'paku', 2000, 1000, 1500, NULL, NULL),
	(8, 3, 'sekop', 70000, 60000, 20, NULL, NULL),
	(9, 3, 'gergaji', 200000, 180000, 10, NULL, NULL),
	(10, 3, 'kuas', 50000, 40000, 30, NULL, NULL);
/*!40000 ALTER TABLE `barang` ENABLE KEYS */;

-- Dumping structure for table dbpenjualan.satuan
CREATE TABLE IF NOT EXISTS `satuan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_satuan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table dbpenjualan.satuan: ~3 rows (approximately)
DELETE FROM `satuan`;
/*!40000 ALTER TABLE `satuan` DISABLE KEYS */;
INSERT INTO `satuan` (`id`, `nama_satuan`) VALUES
	(1, 'KG'),
	(2, 'M'),
	(3, 'Pcs');
/*!40000 ALTER TABLE `satuan` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

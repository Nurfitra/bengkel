-- MySQL dump 10.16  Distrib 10.1.13-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: bengkel
-- ------------------------------------------------------
-- Server version	10.1.13-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `daftar_service`
--

DROP TABLE IF EXISTS `daftar_service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `daftar_service` (
  `no_pendaftaran` int(20) NOT NULL AUTO_INCREMENT,
  `no_polisi` varchar(15) NOT NULL,
  `nama_pemilik` varchar(35) NOT NULL,
  `kendaraan` varchar(20) NOT NULL,
  `keluhan` varchar(220) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `status` enum('1','2','0') NOT NULL,
  PRIMARY KEY (`no_pendaftaran`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `daftar_service`
--

LOCK TABLES `daftar_service` WRITE;
/*!40000 ALTER TABLE `daftar_service` DISABLE KEYS */;
INSERT INTO `daftar_service` VALUES (1,'B 1234 CDE','Bambang','Yamaha Mio','service','2017-06-08','1'),(2,'F 456 GHJ','Samsul','Honda Beat','Ganti Oli','2017-06-16','1');
/*!40000 ALTER TABLE `daftar_service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gudang`
--

DROP TABLE IF EXISTS `gudang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gudang` (
  `id_barang` int(20) NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `stok` int(5) NOT NULL,
  `harga` int(25) NOT NULL,
  `satuan` enum('pcs','set') NOT NULL,
  `kode_gudang` varchar(5) NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gudang`
--

LOCK TABLES `gudang` WRITE;
/*!40000 ALTER TABLE `gudang` DISABLE KEYS */;
INSERT INTO `gudang` VALUES (4,'123','test',10,2000,'pcs','2'),(5,'456','test2',10,1000,'pcs','4'),(6,'12312312','yuhu',5,500000,'pcs','2');
/*!40000 ALTER TABLE `gudang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jasa`
--

DROP TABLE IF EXISTS `jasa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jasa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jasa` varchar(20) NOT NULL,
  `harga` int(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jasa`
--

LOCK TABLES `jasa` WRITE;
/*!40000 ALTER TABLE `jasa` DISABLE KEYS */;
INSERT INTO `jasa` VALUES (1,'Ganti Sparepart',0),(2,'Service',10000),(3,'Pengecekan',5000);
/*!40000 ALTER TABLE `jasa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pesan_barang`
--

DROP TABLE IF EXISTS `pesan_barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pesan_barang` (
  `id_pesan` int(11) NOT NULL AUTO_INCREMENT,
  `gudang` varchar(50) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `tgl` date NOT NULL,
  `pemesan` varchar(30) NOT NULL,
  `status` enum('menunggu','dikirim','ditolak') NOT NULL,
  PRIMARY KEY (`id_pesan`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pesan_barang`
--

LOCK TABLES `pesan_barang` WRITE;
/*!40000 ALTER TABLE `pesan_barang` DISABLE KEYS */;
INSERT INTO `pesan_barang` VALUES (4,'2','4',1,'2017-07-06','Administrator','ditolak');
/*!40000 ALTER TABLE `pesan_barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `no_pendaftaran` varchar(25) NOT NULL,
  `tgl_service` date NOT NULL,
  `barang` varchar(30) NOT NULL,
  `jasa` varchar(50) NOT NULL,
  `montir` varchar(20) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `harga` int(10) NOT NULL,
  `storename` varchar(25) NOT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaksi`
--

LOCK TABLES `transaksi` WRITE;
/*!40000 ALTER TABLE `transaksi` DISABLE KEYS */;
INSERT INTO `transaksi` VALUES (65,'2','2017-07-03',' test','Ganti Sparepart','Administrator',2,2000,'Bengkel'),(66,'2','2017-07-03',' yuhu','Ganti Sparepart','Administrator',4,500000,'Bengkel'),(67,'2','2017-07-03',' yuhu','Ganti Sparepart','Administrator',4,2000,'Bengkel'),(68,'2','2017-07-03',' test','Ganti Sparepart','Administrator',4,2000,'Bengkel');
/*!40000 ALTER TABLE `transaksi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(35) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` enum('1','2','3','4') NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Administrator','admin','admin','1'),(2,'Admin Gudang1','gudang1','gudang1','2'),(3,'Montir','montir','montir','3'),(4,'Admin Gudang2','gudang2','gudang2','2'),(5,'Kasir','kasir','kasir','4');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-07-04  1:35:03

/*!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19  Distrib 10.11.8-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: db_monitoring
-- ------------------------------------------------------
-- Server version	10.11.8-MariaDB-0ubuntu0.24.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbl_pelaporan`
--

DROP TABLE IF EXISTS `tbl_pelaporan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_pelaporan` (
  `id_pelaporan` int(11) NOT NULL AUTO_INCREMENT,
  `id_wali_kelas` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `judul_pelaporan` varchar(255) NOT NULL,
  `ket_pelaporan` text DEFAULT NULL,
  `status_pelaporan` int(11) NOT NULL COMMENT '1 = dalam tahap verifikasi, 2 = di tangani walikelas, 3  = ditangani bk',
  `pemanggilan` int(11) NOT NULL COMMENT '0 = tidak di panggil, 1 = sudah di panggil',
  `tindak_lanjut` text DEFAULT NULL,
  `selesai` int(11) NOT NULL COMMENT '0 = belum selesai, 1 = sudah selesai',
  `ket_selesai` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id_pelaporan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_pelaporan`
--

LOCK TABLES `tbl_pelaporan` WRITE;
/*!40000 ALTER TABLE `tbl_pelaporan` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_pelaporan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_siswa`
--

DROP TABLE IF EXISTS `tbl_siswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nip_nisn` varchar(20) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `id_wali_kelas` int(11) NOT NULL,
  `nama_ortu` int(11) DEFAULT NULL,
  `no_ortu` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_siswa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_siswa`
--

LOCK TABLES `tbl_siswa` WRITE;
/*!40000 ALTER TABLE `tbl_siswa` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_siswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(150) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0 = tidak aktif, 1 = aktif',
  `role` int(11) NOT NULL DEFAULT 2 COMMENT '1 = bk / admin, 2 = walikelas , 3 = kepala',
  `nama_ruangan` varchar(100) NOT NULL COMMENT 'nama kelas atau ruangan yang di gunakan',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user`
--

LOCK TABLES `tbl_user` WRITE;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user_system`
--

DROP TABLE IF EXISTS `tbl_user_system`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user_system` (
  `id_user_system` int(11) NOT NULL AUTO_INCREMENT,
  `nama_sekolah` varchar(150) NOT NULL,
  `alamat_sekolah` text DEFAULT NULL,
  `hook_api_wa` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_user_system`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user_system`
--

LOCK TABLES `tbl_user_system` WRITE;
/*!40000 ALTER TABLE `tbl_user_system` DISABLE KEYS */;
INSERT INTO `tbl_user_system` VALUES
(1,'SMP N 4 KOTA GORONTALO','Jalan Beringin, Kel Buladu.','http://127.0.0.1:8000/send-wa');
/*!40000 ALTER TABLE `tbl_user_system` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-23  3:08:08

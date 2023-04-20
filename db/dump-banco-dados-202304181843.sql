-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: banco-dados
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.27-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `albuns`
--

DROP TABLE IF EXISTS `albuns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `albuns` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `capa` varchar(45) NOT NULL,
  `situacao` int(11) NOT NULL,
  `id_album` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `albuns`
--

LOCK TABLES `albuns` WRITE;
/*!40000 ALTER TABLE `albuns` DISABLE KEYS */;
INSERT INTO `albuns` VALUES (46,'643adb62a8f8d.png',1,'Formatura2042');
/*!40000 ALTER TABLE `albuns` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `depoimentos`
--

DROP TABLE IF EXISTS `depoimentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `depoimentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `depoimento` varchar(45) NOT NULL,
  `situacao` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `depoimentos`
--

LOCK TABLES `depoimentos` WRITE;
/*!40000 ALTER TABLE `depoimentos` DISABLE KEYS */;
INSERT INTO `depoimentos` VALUES (6,'6438a8dc0deca.png',1),(7,'6438aae5aa7a4.png',1);
/*!40000 ALTER TABLE `depoimentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fotos`
--

DROP TABLE IF EXISTS `fotos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fotos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(45) NOT NULL,
  `situacao` int(11) NOT NULL,
  `id_album` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fotos`
--

LOCK TABLES `fotos` WRITE;
/*!40000 ALTER TABLE `fotos` DISABLE KEYS */;
/*!40000 ALTER TABLE `fotos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `matricula`
--

DROP TABLE IF EXISTS `matricula`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `matricula` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) NOT NULL,
  `rua` varchar(30) NOT NULL,
  `endereco` varchar(30) NOT NULL,
  `n` varchar(4) NOT NULL,
  `complemento` varchar(20) DEFAULT NULL,
  `dataNascimento` varchar(10) NOT NULL,
  `genero` varchar(10) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `mae` varchar(40) NOT NULL,
  `rg1` varchar(13) NOT NULL,
  `cpf1` varchar(14) NOT NULL,
  `dataNascimento1` varchar(10) NOT NULL,
  `rua1` varchar(30) NOT NULL,
  `bairro1` varchar(30) NOT NULL,
  `n1` varchar(4) NOT NULL,
  `complemento1` varchar(20) DEFAULT NULL,
  `naturalidade1` varchar(15) NOT NULL,
  `grau1` varchar(30) NOT NULL,
  `civil1` varchar(10) NOT NULL,
  `religiao1` varchar(10) DEFAULT NULL,
  `celular1` varchar(15) NOT NULL,
  `telefone1` varchar(15) DEFAULT NULL,
  `email1` varchar(30) NOT NULL,
  `pai` varchar(40) DEFAULT NULL,
  `rg2` varchar(13) DEFAULT NULL,
  `cpf2` varchar(14) DEFAULT NULL,
  `dataNascimento2` varchar(10) DEFAULT NULL,
  `rua2` varchar(30) DEFAULT NULL,
  `bairro2` varchar(30) DEFAULT NULL,
  `n2` varchar(4) DEFAULT NULL,
  `complemento2` varchar(20) DEFAULT NULL,
  `naturalidade2` varchar(15) DEFAULT NULL,
  `grau2` varchar(30) DEFAULT NULL,
  `civil2` varchar(10) DEFAULT NULL,
  `religiao2` varchar(10) DEFAULT NULL,
  `celular2` varchar(15) DEFAULT NULL,
  `telefone2` varchar(15) DEFAULT NULL,
  `email2` varchar(30) DEFAULT NULL,
  `p1` varchar(45) NOT NULL,
  `p2` varchar(45) NOT NULL,
  `p3` varchar(45) NOT NULL,
  `p4` varchar(45) NOT NULL,
  `p5` varchar(45) NOT NULL,
  `p6` varchar(45) NOT NULL,
  `sono` varchar(10) DEFAULT NULL,
  `p8` varchar(45) NOT NULL,
  `p9` varchar(45) NOT NULL,
  `p10` varchar(45) NOT NULL,
  `p12` varchar(45) NOT NULL,
  `p13` varchar(45) NOT NULL,
  `p14` varchar(45) NOT NULL,
  `p16` varchar(45) NOT NULL,
  `vacinas` varchar(45) DEFAULT NULL,
  `doencas` varchar(45) DEFAULT NULL,
  `saude` varchar(45) DEFAULT NULL,
  `medico` varchar(45) DEFAULT NULL,
  `medicamento` varchar(45) DEFAULT NULL,
  `sangue` varchar(45) NOT NULL,
  `alergia` varchar(45) DEFAULT NULL,
  `celular3` varchar(15) NOT NULL,
  `celular4` varchar(15) NOT NULL,
  `autorizados1` varchar(30) NOT NULL,
  `autorizados2` varchar(30) NOT NULL,
  `snimg` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=180 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matricula`
--

LOCK TABLES `matricula` WRITE;
/*!40000 ALTER TABLE `matricula` DISABLE KEYS */;
/*!40000 ALTER TABLE `matricula` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `professores`
--

DROP TABLE IF EXISTS `professores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `professores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `face` varchar(220) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `info` varchar(45) NOT NULL,
  `situacao` int(11) NOT NULL DEFAULT 2,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professores`
--

LOCK TABLES `professores` WRITE;
/*!40000 ALTER TABLE `professores` DISABLE KEYS */;
INSERT INTO `professores` VALUES (10,'643adb148375e.png',' Luciane','1° ano e grupo 5',1);
/*!40000 ALTER TABLE `professores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slides`
--

DROP TABLE IF EXISTS `slides`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `slides` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imagem` varchar(220) NOT NULL,
  `situacao` int(11) NOT NULL DEFAULT 2,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slides`
--

LOCK TABLES `slides` WRITE;
/*!40000 ALTER TABLE `slides` DISABLE KEYS */;
INSERT INTO `slides` VALUES (14,'Imagem1.png',1),(28,'6438742e97d87.png',1),(30,'6438a97d1324e.png',1);
/*!40000 ALTER TABLE `slides` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `adm` int(1) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `turma` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'adm@adm.com','adm123','Luciane',1,'adm',NULL),(2,'prof@prof.com','prof123','Viviane',0,'prof',NULL),(3,'aluno@aluno.com','aluno123','Muleque',0,'aluno',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'banco-dados'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-18 18:43:11

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
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `albuns`
--

LOCK TABLES `albuns` WRITE;
/*!40000 ALTER TABLE `albuns` DISABLE KEYS */;
INSERT INTO `albuns` VALUES (52,'643f51538bfa9.jpg',1,'Formatura2022');
/*!40000 ALTER TABLE `albuns` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `calendario`
--

DROP TABLE IF EXISTS `calendario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `calendario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `cor` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calendario`
--

LOCK TABLES `calendario` WRITE;
/*!40000 ALTER TABLE `calendario` DISABLE KEYS */;
/*!40000 ALTER TABLE `calendario` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `depoimentos`
--

LOCK TABLES `depoimentos` WRITE;
/*!40000 ALTER TABLE `depoimentos` DISABLE KEYS */;
INSERT INTO `depoimentos` VALUES (7,'6438aae5aa7a4.png',1),(10,'64594cd3bb1c2.png',1);
/*!40000 ALTER TABLE `depoimentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `start` timestamp(6) NULL DEFAULT NULL,
  `end` timestamp(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=541 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fotos`
--

LOCK TABLES `fotos` WRITE;
/*!40000 ALTER TABLE `fotos` DISABLE KEYS */;
INSERT INTO `fotos` VALUES (328,'643f55ac6e659.jpg',1,'formatura2022'),(329,'643f55ac7093e.jpg',1,'formatura2022'),(330,'643f55ac7271d.jpg',1,'formatura2022'),(331,'643f55ac73fe8.jpg',1,'formatura2022'),(332,'643f55ac75cb6.jpg',1,'formatura2022'),(333,'643f55ac76f78.jpg',1,'formatura2022'),(334,'643f55ac781ea.jpg',1,'formatura2022'),(335,'643f55ac79468.jpg',1,'formatura2022'),(336,'643f55ac7a14d.jpg',1,'formatura2022'),(337,'643f55ac7b1b8.jpg',1,'formatura2022'),(338,'643f55ac7bdd1.jpg',1,'formatura2022'),(339,'643f55ac7d0ae.jpg',1,'formatura2022'),(340,'643f55ac7e208.jpg',1,'formatura2022'),(341,'643f55ac7ee34.jpg',1,'formatura2022'),(342,'643f55ac7fe52.jpg',1,'formatura2022'),(343,'643f55ac80b08.jpg',1,'formatura2022'),(344,'643f55bc7848a.jpg',1,'formatura2022'),(345,'643f55bc79d2f.jpg',1,'formatura2022'),(346,'643f55bc7ada8.jpg',1,'formatura2022'),(347,'643f55bc7ba3c.jpg',1,'formatura2022'),(348,'643f55bc7ca0e.jpg',1,'formatura2022'),(349,'643f55bc7dd33.jpg',1,'formatura2022'),(350,'643f55bc7e826.jpg',1,'formatura2022'),(351,'643f55bc7f725.jpg',1,'formatura2022'),(352,'643f55bc80276.jpg',1,'formatura2022'),(353,'643f55bc8127f.jpg',1,'formatura2022'),(354,'643f55bc81db7.jpg',1,'formatura2022'),(355,'643f55bc82cfc.jpg',1,'formatura2022'),(356,'643f55bc83804.jpg',1,'formatura2022'),(357,'643f55bc847f7.jpg',1,'formatura2022'),(358,'643f55bc8589c.jpg',1,'formatura2022'),(359,'643f55bc8634f.jpg',1,'formatura2022'),(360,'643f55c9efceb.jpg',1,'formatura2022'),(361,'643f55c9f0ef5.jpg',1,'formatura2022'),(362,'643f55c9f2283.jpg',1,'formatura2022'),(363,'643f55c9f3444.jpg',1,'formatura2022'),(364,'643f55ca0047c.jpg',1,'formatura2022'),(365,'643f55ca017a2.jpg',1,'formatura2022'),(366,'643f55ca027ca.jpg',1,'formatura2022'),(367,'643f55ca037d1.jpg',1,'formatura2022'),(368,'643f55ca04acf.jpg',1,'formatura2022'),(369,'643f55ca05b57.jpg',1,'formatura2022'),(370,'643f55ca06a3e.jpg',1,'formatura2022'),(371,'643f55ca07ad2.jpg',1,'formatura2022'),(372,'643f55ca085ea.jpg',1,'formatura2022'),(373,'643f55ca0958f.jpg',1,'formatura2022'),(374,'643f55ca0a205.jpg',1,'formatura2022'),(375,'643f55ca0b257.jpg',1,'formatura2022'),(376,'643f55e4c0912.jpg',1,'formatura2022'),(377,'643f55e4c2d5e.jpg',1,'formatura2022'),(378,'643f55e4c48b1.jpg',1,'formatura2022'),(379,'643f55e4c65d9.jpg',1,'formatura2022'),(380,'643f55e4c7be5.jpg',1,'formatura2022'),(381,'643f55e4c97a0.jpg',1,'formatura2022'),(382,'643f55e4ca52a.jpg',1,'formatura2022'),(383,'643f55e4cb3ef.jpg',1,'formatura2022'),(384,'643f55e4ccb46.jpg',1,'formatura2022'),(385,'643f55e4cdbfa.jpg',1,'formatura2022'),(386,'643f55e4ce933.jpg',1,'formatura2022'),(387,'643f55e4cfbb3.jpg',1,'formatura2022'),(388,'643f55e4d0931.jpg',1,'formatura2022'),(389,'643f55e4d1f44.jpg',1,'formatura2022'),(390,'643f55e4d2b92.jpg',1,'formatura2022'),(391,'643f55e4d3d80.jpg',1,'formatura2022'),(392,'643f560f361c1.jpg',1,'formatura2022'),(393,'643f560f37b21.jpg',1,'formatura2022'),(394,'643f560f39991.jpg',1,'formatura2022'),(395,'643f560f3b389.jpg',1,'formatura2022'),(396,'643f560f3c65d.jpg',1,'formatura2022'),(397,'643f560f3d492.jpg',1,'formatura2022'),(398,'643f560f3e72f.jpg',1,'formatura2022'),(399,'643f560f3f488.jpg',1,'formatura2022'),(400,'643f560f40939.jpg',1,'formatura2022'),(401,'643f560f41ce6.jpg',1,'formatura2022'),(402,'643f560f42ddf.jpg',1,'formatura2022'),(403,'643f560f43e28.jpg',1,'formatura2022'),(404,'643f560f44b27.jpg',1,'formatura2022'),(405,'643f560f45e58.jpg',1,'formatura2022'),(406,'643f560f46a10.jpg',1,'formatura2022'),(407,'643f560f47ad7.jpg',1,'formatura2022'),(408,'643f5637be632.jpg',1,'formatura2022'),(409,'643f5637c0800.jpg',1,'formatura2022'),(410,'643f5637c2813.jpg',1,'formatura2022'),(411,'643f5637c437e.jpg',1,'formatura2022'),(412,'643f5637c6626.jpg',1,'formatura2022'),(413,'643f5637c7c8b.jpg',1,'formatura2022'),(414,'643f5637c9794.jpg',1,'formatura2022'),(415,'643f5637cb151.jpg',1,'formatura2022'),(416,'643f5637cc517.jpg',1,'formatura2022'),(417,'643f5637cd909.jpg',1,'formatura2022'),(418,'643f5637cea2a.jpg',1,'formatura2022'),(419,'643f5637cfc44.jpg',1,'formatura2022'),(420,'643f5637d0ed5.jpg',1,'formatura2022'),(421,'643f5637d24e8.jpg',1,'formatura2022'),(422,'643f5637d327b.jpg',1,'formatura2022'),(423,'643f5637d4475.jpg',1,'formatura2022'),(424,'643f565a40d3b.jpg',1,'formatura2022'),(425,'643f565a42a3b.jpg',1,'formatura2022'),(426,'643f565a445fb.jpg',1,'formatura2022'),(427,'643f565a46263.jpg',1,'formatura2022'),(428,'643f565a479ac.jpg',1,'formatura2022'),(429,'643f565a49702.jpg',1,'formatura2022'),(430,'643f565a4a8a3.jpg',1,'formatura2022'),(431,'643f565a4bb38.jpg',1,'formatura2022'),(432,'643f565a4ce4e.jpg',1,'formatura2022'),(433,'643f565a4dbf4.jpg',1,'formatura2022'),(434,'643f565a4ef52.jpg',1,'formatura2022'),(435,'643f565a5019c.jpg',1,'formatura2022'),(436,'643f565a5150a.jpg',1,'formatura2022'),(437,'643f565a52740.jpg',1,'formatura2022'),(438,'643f565a5345a.jpg',1,'formatura2022'),(439,'643f565a5479b.jpg',1,'formatura2022'),(440,'643f566ac3196.jpg',1,'formatura2022'),(441,'643f566ac4ad5.jpg',1,'formatura2022'),(442,'643f566ac668a.jpg',1,'formatura2022'),(443,'643f566ac8298.jpg',1,'formatura2022'),(444,'643f566ac98a7.jpg',1,'formatura2022'),(445,'643f566acb6a5.jpg',1,'formatura2022'),(446,'643f566acccd6.jpg',1,'formatura2022'),(447,'643f566acda39.jpg',1,'formatura2022'),(448,'643f566acee11.jpg',1,'formatura2022'),(449,'643f566ad0315.jpg',1,'formatura2022'),(450,'643f566ad1612.jpg',1,'formatura2022'),(451,'643f566ad2418.jpg',1,'formatura2022'),(452,'643f566ad34fe.jpg',1,'formatura2022'),(453,'643f566ad4175.jpg',1,'formatura2022'),(454,'643f566ad5245.jpg',1,'formatura2022'),(455,'643f566ad5f09.jpg',1,'formatura2022'),(456,'643f567874a93.jpg',1,'formatura2022'),(457,'643f567875f6e.jpg',1,'formatura2022'),(458,'643f56787705f.jpg',1,'formatura2022'),(459,'643f5678781c8.jpg',1,'formatura2022'),(460,'643f567879448.jpg',1,'formatura2022'),(461,'643f56787a0a9.jpg',1,'formatura2022'),(462,'643f56787b251.jpg',1,'formatura2022'),(463,'643f56787be56.jpg',1,'formatura2022'),(464,'643f56787d03a.jpg',1,'formatura2022'),(465,'643f56787e1e3.jpg',1,'formatura2022'),(466,'643f56787f421.jpg',1,'formatura2022'),(467,'643f56788023a.jpg',1,'formatura2022'),(468,'643f5678814dc.jpg',1,'formatura2022'),(469,'643f5678820b1.jpg',1,'formatura2022'),(470,'643f567882fdc.jpg',1,'formatura2022'),(471,'643f567883b10.jpg',1,'formatura2022'),(472,'643f568573c59.jpg',1,'formatura2022'),(473,'643f568574ec0.jpg',1,'formatura2022'),(474,'643f568576321.jpg',1,'formatura2022'),(475,'643f568577177.jpg',1,'formatura2022'),(476,'643f568578c0d.jpg',1,'formatura2022'),(477,'643f56857a0a0.jpg',1,'formatura2022'),(478,'643f56857b313.jpg',1,'formatura2022'),(479,'643f56857c6c7.jpg',1,'formatura2022'),(480,'643f56857d3dc.jpg',1,'formatura2022'),(481,'643f56857e290.jpg',1,'formatura2022'),(482,'643f56857f3e8.jpg',1,'formatura2022'),(483,'643f56858037f.jpg',1,'formatura2022'),(484,'643f568581499.jpg',1,'formatura2022'),(485,'643f568581f42.jpg',1,'formatura2022'),(486,'643f568582db7.jpg',1,'formatura2022'),(487,'643f5685839cc.jpg',1,'formatura2022'),(488,'643f569bdd4cc.jpg',1,'formatura2022'),(489,'643f569bdf8bb.jpg',1,'formatura2022'),(490,'643f569be0897.jpg',1,'formatura2022'),(491,'643f569be13f1.jpg',1,'formatura2022'),(492,'643f569be2516.jpg',1,'formatura2022'),(493,'643f569be3179.jpg',1,'formatura2022'),(494,'643f569be407b.jpg',1,'formatura2022'),(495,'643f569be4b91.jpg',1,'formatura2022'),(496,'643f569be5a86.jpg',1,'formatura2022'),(497,'643f569be6772.jpg',1,'formatura2022'),(498,'643f569be772a.jpg',1,'formatura2022'),(499,'643f569be820e.jpg',1,'formatura2022'),(500,'643f569be93d8.jpg',1,'formatura2022'),(501,'643f569bea5b6.jpg',1,'formatura2022'),(502,'643f569beb69e.jpg',1,'formatura2022'),(503,'643f569bec6f4.jpg',1,'formatura2022'),(504,'643f56c96e8bf.jpg',1,'formatura2022'),(505,'643f56c96ff6a.jpg',1,'formatura2022'),(506,'643f56c971177.jpg',1,'formatura2022'),(507,'643f56c972168.jpg',1,'formatura2022'),(508,'643f56c973074.jpg',1,'formatura2022'),(509,'643f56c973b67.jpg',1,'formatura2022'),(510,'643f56c974b34.jpg',1,'formatura2022'),(511,'643f56c9756b7.jpg',1,'formatura2022'),(512,'643f56c976614.jpg',1,'formatura2022'),(513,'643f56c977271.jpg',1,'formatura2022'),(514,'643f56c978260.jpg',1,'formatura2022'),(515,'643f56c978ec3.jpg',1,'formatura2022'),(516,'643f56c979ed1.jpg',1,'formatura2022'),(517,'643f56c97b034.jpg',1,'formatura2022'),(518,'643f56c97bb28.jpg',1,'formatura2022'),(519,'643f56c97cbbe.jpg',1,'formatura2022'),(520,'643f56d61b029.jpg',1,'formatura2022'),(521,'643f56d61d1ca.jpg',1,'formatura2022'),(522,'643f56d61eab4.jpg',1,'formatura2022'),(523,'643f56d620485.jpg',1,'formatura2022'),(524,'643f56d62187e.jpg',1,'formatura2022'),(525,'643f56d6232a0.jpg',1,'formatura2022'),(526,'643f56d623fa2.jpg',1,'formatura2022'),(527,'643f56d62508c.jpg',1,'formatura2022'),(528,'643f56d625d5f.jpg',1,'formatura2022'),(529,'643f56d62710d.jpg',1,'formatura2022'),(530,'643f56d628263.jpg',1,'formatura2022'),(531,'643f56d628f0c.jpg',1,'formatura2022'),(532,'643f56d62a13c.jpg',1,'formatura2022'),(533,'643f56d62b680.jpg',1,'formatura2022'),(534,'643f56d62c648.jpg',1,'formatura2022');
/*!40000 ALTER TABLE `fotos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horarios`
--

DROP TABLE IF EXISTS `horarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `horarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `horario` varchar(45) NOT NULL,
  `turma` varchar(45) NOT NULL,
  `turno` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horarios`
--

LOCK TABLES `horarios` WRITE;
/*!40000 ALTER TABLE `horarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `horarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materias`
--

DROP TABLE IF EXISTS `materias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `materias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materias`
--

LOCK TABLES `materias` WRITE;
/*!40000 ALTER TABLE `materias` DISABLE KEYS */;
/*!40000 ALTER TABLE `materias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `matricula`
--

DROP TABLE IF EXISTS `matricula`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `matricula` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `turma` varchar(30) NOT NULL,
  `turno` varchar(30) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=201 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matricula`
--

LOCK TABLES `matricula` WRITE;
/*!40000 ALTER TABLE `matricula` DISABLE KEYS */;
/*!40000 ALTER TABLE `matricula` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notas`
--

DROP TABLE IF EXISTS `notas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_aluno` int(11) NOT NULL,
  `materia` varchar(45) DEFAULT NULL,
  `nota1` decimal(3,1) DEFAULT NULL,
  `falta1` int(11) DEFAULT NULL,
  `nota2` decimal(3,1) DEFAULT NULL,
  `falta2` int(11) DEFAULT NULL,
  `nota3` decimal(3,1) DEFAULT NULL,
  `falta3` int(11) DEFAULT NULL,
  `nota4` decimal(3,1) DEFAULT NULL,
  `falta4` int(11) DEFAULT NULL,
  `media` decimal(3,1) DEFAULT NULL,
  `faltas` int(11) DEFAULT NULL,
  `resultado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=273 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notas`
--

LOCK TABLES `notas` WRITE;
/*!40000 ALTER TABLE `notas` DISABLE KEYS */;
INSERT INTO `notas` VALUES (266,2937,'Matemática',10.0,1,10.0,1,10.0,1,10.0,1,10.0,4,'Aprovado'),(267,2937,'Português',2.0,2,2.0,NULL,2.0,2,2.0,2,2.0,6,'Recuperação'),(268,2937,'História',2.0,2,2.0,2,2.0,2,2.0,2,2.0,8,'Recuperação'),(269,2937,'Ciências',10.0,10,10.0,10,10.0,10,10.0,10,10.0,40,'Aprovado'),(270,2937,'Geografia',10.0,10,10.0,10,10.0,10,10.0,10,10.0,40,'Aprovado'),(271,2937,'Artes',10.0,10,10.0,10,10.0,10,10.0,10,10.0,40,'Aprovado'),(272,2937,'Inglês',10.0,10,10.0,10,10.0,10,10.0,10,10.0,40,'Aprovado');
/*!40000 ALTER TABLE `notas` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professores`
--

LOCK TABLES `professores` WRITE;
/*!40000 ALTER TABLE `professores` DISABLE KEYS */;
INSERT INTO `professores` VALUES (12,'644f2f397a9eb.jpg',' Luciane Alves','Grupo 5 e primeiro ano',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slides`
--

LOCK TABLES `slides` WRITE;
/*!40000 ALTER TABLE `slides` DISABLE KEYS */;
INSERT INTO `slides` VALUES (35,'644f2b8b66a13.png',1),(37,'64596f2a929af.png',1),(38,'64596f4682c78.png',1);
/*!40000 ALTER TABLE `slides` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `turmas`
--

DROP TABLE IF EXISTS `turmas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `turmas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `turma` varchar(45) NOT NULL,
  `turno` varchar(45) NOT NULL,
  `vagas` varchar(45) NOT NULL,
  `horarios` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turmas`
--

LOCK TABLES `turmas` WRITE;
/*!40000 ALTER TABLE `turmas` DISABLE KEYS */;
INSERT INTO `turmas` VALUES (33,'Grupo 2 e 3','Matutino','8',NULL),(34,'Grupo 2 e 3','Vespertino','8',NULL),(35,'Grupo 4','Matutino','8',NULL),(36,'Grupo 4','Vespertino','8',NULL),(37,'Grupo 5','Vespertino','12',NULL),(38,'1° ano','Matutino','12',NULL);
/*!40000 ALTER TABLE `turmas` ENABLE KEYS */;
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
  `turma1` varchar(45) DEFAULT NULL,
  `turma2` varchar(45) DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2953 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'adm@adm.com','adm123','Luciane',1,'prof','','','../assets/images/clientes/644ca20accc52.jpg'),(2952,'adam@adm.com','adm123','Alan Deivide Alves dos Santos',0,'aluno','1° ano',NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vagas`
--

DROP TABLE IF EXISTS `vagas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vagas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vaga` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vagas`
--

LOCK TABLES `vagas` WRITE;
/*!40000 ALTER TABLE `vagas` DISABLE KEYS */;
/*!40000 ALTER TABLE `vagas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `visitas`
--

DROP TABLE IF EXISTS `visitas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `visitas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(45) DEFAULT NULL,
  `visitas` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visitas`
--

LOCK TABLES `visitas` WRITE;
/*!40000 ALTER TABLE `visitas` DISABLE KEYS */;
INSERT INTO `visitas` VALUES (1,'192.168.0.150','0');
/*!40000 ALTER TABLE `visitas` ENABLE KEYS */;
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

-- Dump completed on 2023-05-08 19:15:18

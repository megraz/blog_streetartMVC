-- MySQL dump 10.15  Distrib 10.0.36-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: blogstreetart
-- ------------------------------------------------------
-- Server version	10.0.36-MariaDB-0ubuntu0.16.04.1

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
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `commentaire` text NOT NULL,
  `photo` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article`
--

LOCK TABLES `article` WRITE;
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
INSERT INTO `article` VALUES (1,'      test birdy kids  birdy     ','0000-00-00 00:00:00','      test birdy kidssssssssss!!!!!!  birdy birdy birdy birdy birdy birdy birdy birdy birdy !!!!!   test ','birdy1.png'),(28,'new birdy','0000-00-00 00:00:00',' Fondé en 2010, Birdy Kids est un collectif de street art composé de trois créateurs réunis autour d&#39;un projet commun : un street art ludique et coloré à la portée de tous. Basé à Lyon, l’oiseau Birdy Kids apparaît sous forme de graffitis à la fin des années 80. Le collectif se fait connaitre en faisant des autoroutes lyonnaises son terrain de jeu préféré : les grandes étendues de béton vierge et la fréquentation avoisinant les 300 000 véhicules par jour sur le réseau autoroutier du Grand Lyon faisant figure d’emplacement stratégique. A l’origine vues comme du graffiti quelconque et donc comme une dégradation de l’espace publique par la plupart des gens, les œuvres du collectif par leur aspect ludique et coloré deviennent de plus en plus appréciées par les automobilistes lyonnais et font aujourd’hui partie des rares graffitis épargnés par les services de nettoyage de la ville. Au début des années 2010, Birdy Kids est reconnu par le public comme le représentant principal de l’art urbain lyonnais. Conscients de leur impact nouveau sur la population, le collectif participe de façon active à la démocratisation du Street Art en revendiquant un art perfectionniste avec une créativité et un style qui leur est propre. La vision du collectif est de créer une vraie interaction entre les riverains et l’œuvre artistique, en positionnant leur art au cœur de l’espace urbain. Cette vision moderne a permis au collectif d’être nommé « Ambassadeur culturel » de la ville de Lyon, lors d’une tournée rassemblant dix des plus grandes capitales européennes en 2012.\r\n','birdycap1.jpg'),(29,'Invader','0000-00-00 00:00:00','Invader, est un artiste de rue et mosaïste français, né en France en 1969. Il installe depuis 1996 une série de Space Invaders, réalisés en mosaïques, sur les murs de grandes métropoles internationales','invader2.JPG'),(27,'Jef Aérosol','0000-00-00 00:00:00','Jean-François Perroy, plus connu sous le pseudonyme Jef Aérosol, né à Nantes le 15 janvier 1957, est un artiste pochoiriste français issu de la première vague de « street art » du début des années 1980. Il est considéré comme l&#39;un des pionniers historiques de ce phénomène artistique.','jef_aerosol1.jpg');
/*!40000 ALTER TABLE `article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorie` (
  `idcategorie` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(64) NOT NULL,
  PRIMARY KEY (`idcategorie`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie`
--

LOCK TABLES `categorie` WRITE;
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` VALUES (1,'sticker'),(2,'graffiti'),(3,'pochoir'),(4,'collage'),(5,'light painting'),(6,'installation'),(7,'affiche'),(8,'animation'),(9,'mosaique'),(10,'peinture'),(11,'tape art'),(12,'yarn bombing'),(13,'anamorphose'),(14,'cellograff'),(15,'cle usb'),(16,'craie au sol'),(17,'graff vegetal'),(18,'lettrage'),(19,'clean tag'),(20,'autre');
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-01-05 19:10:02

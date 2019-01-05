-- MySQL dump 10.13  Distrib 5.7.23, for Linux (x86_64)
--
-- Host: localhost    Database: street_art
-- ------------------------------------------------------
-- Server version	5.7.23-0ubuntu0.18.04.1

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
-- Table structure for table `Images`
--

DROP TABLE IF EXISTS `Images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Images` (
  `idImages` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `path` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `id_post` int(10) NOT NULL,
  `location` point DEFAULT NULL,
  PRIMARY KEY (`idImages`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Images`
--

LOCK TABLES `Images` WRITE;
/*!40000 ALTER TABLE `Images` DISABLE KEYS */;
INSERT INTO `Images` VALUES (10,'http://image.noelshack.com/fichiers/2018/39/3/1537987656-ememem1.jpg','ememem',2,NULL),(11,'http://image.noelshack.com/fichiers/2018/39/4/1538031796-ememem4.jpg','ememem',3,NULL),(12,'http://image.noelshack.com/fichiers/2018/39/4/1538075593-ememem5.jpg','ememem vaise ',4,NULL),(13,'http://image.noelshack.com/fichiers/2018/39/4/1538075604-ememem6.jpg','ememem flacking ',5,NULL),(14,'http://image.noelshack.com/fichiers/2018/39/4/1538075628-ememem3.jpg','ememem carrelage ',6,NULL),(15,'http://image.noelshack.com/fichiers/2018/39/4/1538076439-cap-phi1.jpg','Cap Phi panneau ',7,NULL);
/*!40000 ALTER TABLE `Images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `artiste_categ`
--

DROP TABLE IF EXISTS `artiste_categ`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `artiste_categ` (
  `idartiste_categ` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `artistes_idartistes` int(10) unsigned NOT NULL,
  `categorie_idcategorie` int(10) NOT NULL,
  PRIMARY KEY (`idartiste_categ`),
  KEY `fk_artiste_categ_artistes1_idx` (`artistes_idartistes`),
  KEY `fk_artiste_categ_categorie1_idx` (`categorie_idcategorie`),
  CONSTRAINT `fk_artiste_categ_artistes1` FOREIGN KEY (`artistes_idartistes`) REFERENCES `artistes` (`idartistes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_artiste_categ_categorie1` FOREIGN KEY (`categorie_idcategorie`) REFERENCES `categorie` (`idcategorie`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artiste_categ`
--

LOCK TABLES `artiste_categ` WRITE;
/*!40000 ALTER TABLE `artiste_categ` DISABLE KEYS */;
/*!40000 ALTER TABLE `artiste_categ` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `artiste_img`
--

DROP TABLE IF EXISTS `artiste_img`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `artiste_img` (
  `idartiste_img` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Images_idImages` varchar(255) NOT NULL,
  `idartistes` int(10) unsigned NOT NULL,
  `artiste_img_images` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idartiste_img`),
  KEY `fk_artiste_img_artistes_idx` (`idartistes`),
  KEY `fk_artiste_img_images_idx` (`artiste_img_images`),
  CONSTRAINT `fk_artiste_img_artistes` FOREIGN KEY (`idartistes`) REFERENCES `artistes` (`idartistes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_artiste_img_images` FOREIGN KEY (`artiste_img_images`) REFERENCES `Images` (`idImages`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artiste_img`
--

LOCK TABLES `artiste_img` WRITE;
/*!40000 ALTER TABLE `artiste_img` DISABLE KEYS */;
/*!40000 ALTER TABLE `artiste_img` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `artistes`
--

DROP TABLE IF EXISTS `artistes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `artistes` (
  `idartistes` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `date_debut` year(4) DEFAULT NULL,
  `idcompte_user` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`idartistes`),
  KEY `fk_artistes_compte_user_idx` (`idcompte_user`),
  CONSTRAINT `fk_artistes_compte_user` FOREIGN KEY (`idcompte_user`) REFERENCES `compte_user` (`idcompte_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artistes`
--

LOCK TABLES `artistes` WRITE;
/*!40000 ALTER TABLE `artistes` DISABLE KEYS */;
INSERT INTO `artistes` VALUES (1,'Birdy kids','Birdy Kids se compose de deux frères réunis autour d\'un projet commun un Street Art ludique et coloré à la portée de tous',2010,NULL),(2,'Big Ben','Big ben, roi du pochoir. Il anime la rue par ces personnages du monde cinématographique et de ses collages subtiles',2011,NULL),(3,'Don Mateo','Collages, pochoirs, stencils peint ce qui le touche, ce qui le fait vibrer et peu importe le support ou la technique, la sensation, la sensibilité, l\'émotion est le moteur de sa peinture',2010,NULL),(4,'Cap Phi','Cap Phi a un univers bien à lui, les petits monstres. au fil des rues de Lyon vous découvrirez différentes formes, différentes expressions',2010,NULL),(5,'Brusk','Brusk déploie son univers visuel délirant fait de torsions typographiques, d’explosions abstraites, de personnages ultra réalistes et de scènes d’émeutes urbaines',1991,NULL),(6,'Rezine','Rezine combine ainsi dans son travail calligraphie, graffiti en 3D, ainsi que des éléments technologiques et architecturaux qui aspirent à l’idée de “mutation”, sollicitant le spectateur à s’immerger dans une vision parallèle de sa conscience et son rapport au monde',1991,NULL),(7,'Invader','La démarche d’Invader se résume à trois points : la rencontre entre la mosaïque et le pixel, la transposition d’un jeu vidéo dans la réalité ainsi qu\'un processus d’invasion à l’échelle planétaire',1996,NULL),(8,'C215','L’art  de  C215  est  de  capter  la lumière,  la  profondeur  et  l’humanité.  C’est  très  difficile  à  réaliser  au  pochoir',1996,NULL),(9,'Agrume','Artiste curieux, il explore différentes techniques et compile plusieurs disciplines. Les situations sont absurdes, romantiques, mélancoliques, dérangeantes',2013,NULL),(10,'KALOUF','Ses différentes compositions tantôt fantastiques, tantôt hyper-réalistes conduisent aujourd’hui l’artiste à mêler dans son travail ce scrupuleux souci du détail couplé au côté plus brut et graphique du graffiti',1990,NULL),(11,'Banksy','Il adore provoquer, choquer voire perturber la société et c\'est ce qui fait toute l\'importance de son oeuvre',1992,NULL),(12,'Ememem','Son carrelage épouse la forme de la blessure et rend ce petit bout d’urbanité vraiment beau, tout comme votre marche qui jusque là n’avait peut-être rien de passionnante.',2016,NULL),(13,'M.Chat',' Le cadre de mon travail est la ville, ses rues, ses murs, et le regard de ceux qui l’habitent. Je cherche à créer des supports à la narration de la ville pour ses habitants, participant à la naissance et à l’échange d’une culture de proximité',2000,NULL),(14,'JR','JR expose librement sur les murs du monde entier, attirant ainsi l’attention de ceux qui ne fréquentent pas les musées habituellement',2001,NULL),(15,'Le Diamantaire','il a su se faire remarquer grâce à un symbole de luxe immédiatement identifiable : le diamant pour embellir les villes',2001,NULL);
/*!40000 ALTER TABLE `artistes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorie` (
  `idcategorie` int(10) NOT NULL AUTO_INCREMENT,
  `nom` varchar(64) NOT NULL,
  PRIMARY KEY (`idcategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie`
--

LOCK TABLES `categorie` WRITE;
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` VALUES (1,'sticker'),(2,'graffiti'),(3,'pochoir'),(4,'collage'),(5,'light painting'),(6,'installation'),(7,'affiche'),(8,'animation'),(9,'mosaique'),(10,'peinture'),(11,'tape art'),(12,'yarn bombing'),(13,'anamorphose'),(14,'cellograff'),(15,'cle usb'),(16,'craie au sol'),(17,'graff vegetal'),(18,'lettrage'),(19,'clean tag'),(20,'autre');
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compte_user`
--

DROP TABLE IF EXISTS `compte_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compte_user` (
  `idcompte_user` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(64) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `mdp` varchar(40) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idcompte_user`),
  CONSTRAINT `fk_compte_user_artistes1` FOREIGN KEY (`idcompte_user`) REFERENCES `artistes` (`idartistes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_compte_user_post` FOREIGN KEY (`idcompte_user`) REFERENCES `post` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compte_user`
--

LOCK TABLES `compte_user` WRITE;
/*!40000 ALTER TABLE `compte_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `compte_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `img_categ`
--

DROP TABLE IF EXISTS `img_categ`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `img_categ` (
  `Images_idImages` int(10) unsigned NOT NULL,
  `categorie_idcategorie` int(10) NOT NULL,
  KEY `fk_img_categ_Images1_idx` (`Images_idImages`),
  KEY `fk_img_categ_categorie1_idx` (`categorie_idcategorie`),
  KEY `index_imgcateg` (`categorie_idcategorie`,`Images_idImages`),
  CONSTRAINT `fk_img_categ_Images1` FOREIGN KEY (`Images_idImages`) REFERENCES `Images` (`idImages`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_img_categ_categorie1` FOREIGN KEY (`categorie_idcategorie`) REFERENCES `categorie` (`idcategorie`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `img_categ`
--

LOCK TABLES `img_categ` WRITE;
/*!40000 ALTER TABLE `img_categ` DISABLE KEYS */;
/*!40000 ALTER TABLE `img_categ` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `idnews` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`idnews`),
  CONSTRAINT `fk_news_compte_user1` FOREIGN KEY (`idnews`) REFERENCES `compte_user` (`idcompte_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `nom` varchar(64) DEFAULT NULL,
  `commentaire` text NOT NULL,
  `categorie_idcategorie` int(10) NOT NULL,
  `moderation` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_post_categorie1_idx` (`categorie_idcategorie`),
  CONSTRAINT `fk_post_categorie1` FOREIGN KEY (`categorie_idcategorie`) REFERENCES `categorie` (`idcategorie`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (2,'ememem lyon 5e','2018-09-23','ememem','Un nouveau flacking d\'ememem quai fulchiron Lyon 5e',9,NULL),(3,'ememem lyon 9e','2018-09-25','ememem','Carreleur fou ou simple raccommodeur de bitume ?\nVoici un exemple des œuvres d’Ememem qui sévit actuellement sur la voirie lyonnaise',9,NULL),(4,'ememem lyon','2018-09-25','ememem','Old roman school flacking nouvelle pièce d\'ememem à Amphithéâtre de Lyon',9,NULL),(5,'ememem lyon','2018-09-25','ememem flacking Harring','Dans les rues de Lyon vous trouverez un Kiss Harring flacking d\'ememem',9,NULL),(6,'ememem lyon','2018-09-26','ememem','Avec Ememem, le  street art prend une nouvelle dimension, il envahit désormais les trottoirs des villes en recouvre les plaies urbaines avec des œuvres plus ou moins visibles. \nL’artiste a surtout réparé les rues de Lyon, mais il a aussi habillé  celles de Paris, Turin ou Milan',9,NULL),(7,'Cap Phi','2018-09-27','Cap Phi','Cap Phi dessine la ville, l’habille de couleurs et de petits monstres, sans aucune prétention particulière, à part celle de la bonne humeur ',4,NULL);
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-09-28 10:34:36

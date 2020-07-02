-- MySQL dump 10.13  Distrib 5.5.57, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: hidden_springs
-- ------------------------------------------------------
-- Server version	5.5.57-0ubuntu0.14.04.1

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
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `customerId` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(122) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `state` varchar(30) DEFAULT NULL,
  `zipcode` int(11) DEFAULT NULL,
  PRIMARY KEY (`customerId`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (1,'Beth','Scholze',NULL,NULL,'5811 Russett Rd. Apt 2D','Madison','WI',53711),(2,'Beth','Scholze',NULL,NULL,'5811 Russett Rd. Apt 2D','Madison','WI',53711),(3,'Beth','Scholze',NULL,NULL,'5811 Russett Rd. Apt 2D','Madison','WI',53711),(4,'Beth','Scholze',NULL,NULL,'5811 Russett Rd. Apt 2D','Madison','WI',53711),(5,'Beth','Scholze',NULL,NULL,'5811 Russett Rd. Apt 2D','Madison','WI',53711),(6,'Beth','Scholze',NULL,NULL,'5811 Russett Rd. Apt 2D','Madison','WI',53711),(7,'Beth','Scholze',NULL,NULL,'5811 Russett Rd. Apt 2D','Madison','WI',53711),(8,'Beth','Scholze',NULL,NULL,'5811 Russett Rd. Apt 2D','Madison','WI',53711),(9,'Beth','Scholze',NULL,NULL,'5811 Russett Rd. Apt 2D','Madison','WI',53711),(10,'Beth','Scholze',NULL,NULL,'5811 Russett Rd. Apt 2D','Madison','WI',53711),(11,'Beth','Scholze',NULL,NULL,'5811 Russett Rd. Apt 2D','Madison','WI',53711),(12,'Beth','Scholze',NULL,NULL,'5811 Russett Rd. Apt 2D','Madison','WI',53711),(13,'mr','magoo',NULL,NULL,'12345 red road','madison','wi',53718),(14,'Ann','Scholze',NULL,NULL,'4567 place','johnny','WI',54852),(15,'Ann','Scholze',NULL,NULL,'4567 place','johnny','WI',54852),(16,'john','smith','','$2y$10$mxYLtOUAaJRTzvavmJTIle2cTudExqLCWNbWeEFr8uKGQI5U3rJlO',NULL,NULL,NULL,NULL),(17,'Beth','scholze',NULL,NULL,'1245 road','madison','wi',14255),(18,'herb','herberts',NULL,NULL,'12546','asdf','asdfasdf',5421),(19,'herb','herberts',NULL,NULL,'12546','asdf','asdfasdf',5421),(20,'herb','herberts',NULL,NULL,'12546','asdf','asdfasdf',5421),(21,'berth','biggs',NULL,NULL,'12345 road rd','madison','wi',56741),(22,'berth','biggs',NULL,NULL,'12345 road rd','madison','wi',56741),(23,'berth','biggs',NULL,NULL,'12345 road rd','madison','wi',56741),(24,'berth','biggs',NULL,NULL,'12345 road rd','madison','wi',56741),(25,'here','is',NULL,NULL,'2568 complex rd','Data','To',65891),(26,'here','is',NULL,NULL,'2568 complex rd','Data','To',65891),(27,'here','is',NULL,NULL,'2568 complex rd','Data','To',65891),(28,'here','is',NULL,NULL,'2568 complex rd','Data','To',65891),(29,'here','is',NULL,NULL,'2568 complex rd','Data','To',65891),(30,'here','is',NULL,NULL,'2568 complex rd','Data','To',65891),(31,'here','is',NULL,NULL,'2568 complex rd','Data','To',65891),(32,'here','is',NULL,NULL,'2568 complex rd','Data','To',65891),(33,'here','is',NULL,NULL,'2568 complex rd','Data','To',65891),(34,'Did','I',NULL,NULL,'fix the 5678','problem','with',12589),(35,'Did','I',NULL,NULL,'fix the 5678','problem','with',12589),(36,'Jeffery','Jefferson',NULL,NULL,'14567 road st.','st andrew','nd',65841),(37,'johnny','appleseed',NULL,NULL,'4526 pine tree ln','cedar rapids','WI',53365),(38,'Han','Solo',NULL,NULL,'Millenium st.','Falcon','MI',65987),(39,'jessica','rabbit',NULL,NULL,'5845 here rd','robin','fl',5846),(40,'sdfgsfdg','sdfgsdfg',NULL,NULL,'sdfgsdfgsdfg','sdfgsdfg','sdfg',546546465),(41,'jeff','shebob',NULL,NULL,'4564 sofia lane','madiosn','wi',56478);
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `how_to_guides`
--

DROP TABLE IF EXISTS `how_to_guides`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `how_to_guides` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `content` text,
  `author` varchar(40) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,
  `picture` varchar(30) DEFAULT NULL,
  `visible` varchar(5) DEFAULT 'yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `how_to_guides`
--

LOCK TABLES `how_to_guides` WRITE;
/*!40000 ALTER TABLE `how_to_guides` DISABLE KEYS */;
INSERT INTO `how_to_guides` VALUES (4,'Knitting 101','2019-05-04','What is Lorem Ipsum?\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\nWhy do we use it?\r\n\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\nWhere does it come from?\r\n\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\nWhere can I get some?\r\n\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.','Beth Scholze','knitting',NULL,'yes'),(5,'crocheting 101','2019-05-31','What is Lorem Ipsum?\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\nWhy do we use it?\r\n\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\nWhere does it come from?\r\n\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\nWhere can I get some?\r\n\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.','scholze','crocheting',NULL,'no'),(6,'spinning 101','2019-05-07','ucas ipsum dolor sit amet zorba jabba vella cordÃ© darth jubnuk bajic skywalker lars snivvian. Coruscant darth gora arkanis. Gorax fett yevetha qel-droma kenobi cad lumiya ralter tapani. Gotal zuggs duros sebulba. Vodran tsavong briqualon bren. Adi lars vulptereen kalarba vel moff. Tib alderaan cognus cornelius duro x\'ting nassau rukh. Tambor mon ahsoka kamino qui-gon saleucami cody tython talz. Piett ssi-ruuk dat mothma polis mace tarkin. Arkanian lorth sidious sith dooku ima-gun sunrider luke.\r\n\r\nAlderaan balosar jek gilad palpatine jarael. Gilad ubese reach moor jek ruurian hutt. Luke gizka kurtzen leia yanÃ©. Sola psadan sola theelin. Vao thisspias lama malastare sio. C-3po kamino rendar djo tarkin -lom gamorr alderaan dooku. Jeremoch klaatu massa b4-d4 tib ti. Nahdar devaronian hutta kowakian bail r4-p17 talortai defel. Cerea juvex veila khai omas unduli massans lars. Organa pellaeon choka kasan frozarns rugor epicanthix. Var kenobi ewok jusik gerb boss. Sluis durge moore gonk soontir thisspiasian sneevel ansionian roos.\r\n\r\nKen needa zann aurra zuggs bertroff offee fel. Organa obi-wan tibor khai cathar miraluka y\'bith ranat. Saurin quee jabba saurin elom. Ansuroer moff mayagil koon r4-p17 moore caamasi quinlan ismaren. Mara grizmallt ugnaught cliegg chommell moff lama. Ithorian isolder ubese kiffar ponda orrin h\'nemthean rattatak. Clawdite vella allie huk nagai. Tchuukthai qrygg jodo tyranus plo kwi cornelius jango. Coruscant gonk mantell organa maarek. Jerjerrod breha golda gavyn. Moor breha hoth logray ruwee cerean organa ahsoka.\r\n\r\nUnduli skywalker davin noa sio gilad thennqora taung. Pau\'an yoda whitesun muzzer. Nunb mirialan emtrey besalisk. Stele gand chazrach falleen darth t\'landa. Sunrider onimi nien keshiri boba sifo-dyas moff bane. Lars kwi rattatak cadavine skywalker gunray qu grodin. Sarn zannah dexter raa solo skywalker biggs luke d8. Vor pellaeon massans borsk irek gev. Naberrie quee mccool jubnuk vodran cognus watto jan piett. Weequay tierce beru metalorn grievous bibble. Chistori kit klaatu sio vader sing joelle saffa davin.\r\n\r\nTono senex cordÃ© di terrik. Zam stele unu nagai wirutid danni. Yoda veers pellaeon sulorine vima-da-boda quelli. Sykes vao clawdite bib chazrach shi\'ido wilhuff cordÃ© woostoid. Nute dak chewbacca derlin ki-adi-mundi mimbanite vel hapan yavin. Draethos plo hutt wedge himoran seerdon skywalker beru vor. Gamorrean carnor desolous piett ralter. Cabasshite dagobah zorba tof. Isolder sabÃ© darth thul moff argazdan freedon gunray. Lama clawdite amidala brak droch snootles jek. Rakata antilles tano chazrach zabrak ozzel.','Beth','spinning',NULL,'yes'),(8,'Crocheting 201','2019-05-07','Ken needa zann aurra zuggs bertroff offee fel. Organa obi-wan tibor khai cathar miraluka y\'bith ranat. Saurin quee jabba saurin elom. Ansuroer moff mayagil koon r4-p17 moore caamasi quinlan ismaren. Mara grizmallt ugnaught cliegg chommell moff lama. Ithorian isolder ubese kiffar ponda orrin h\'nemthean rattatak. Clawdite vella allie huk nagai. Tchuukthai qrygg jodo tyranus plo kwi cornelius jango. Coruscant gonk mantell organa maarek. Jerjerrod breha golda gavyn. Moor breha hoth logray ruwee cerean organa ahsoka.\r\n\r\nUnduli skywalker davin noa sio gilad thennqora taung. Pau\'an yoda whitesun muzzer. Nunb mirialan emtrey besalisk. Stele gand chazrach falleen darth t\'landa. Sunrider onimi nien keshiri boba sifo-dyas moff bane. Lars kwi rattatak cadavine skywalker gunray qu grodin. Sarn zannah dexter raa solo skywalker biggs luke d8. Vor pellaeon massans borsk irek gev. Naberrie quee mccool jubnuk vodran cognus watto jan piett. Weequay tierce beru metalorn grievous bibble. Chistori kit klaatu sio vader sing joelle saffa davin.\r\n\r\nTono senex cordÃ© di terrik. Zam stele unu nagai wirutid danni. Yoda veers pellaeon sulorine vima-da-boda quelli. Sykes vao clawdite bib chazrach shi\'ido wilhuff cordÃ© woostoid. Nute dak chewbacca derlin ki-adi-mundi mimbanite vel hapan yavin. Draethos plo hutt wedge himoran seerdon skywalker beru vor. Gamorrean carnor desolous piett ralter. Cabasshite dagobah zorba tof. Isolder sabÃ© darth thul moff argazdan freedon gunray. Lama clawdite amidala brak droch snootles jek. Rakata antilles tano chazrach zabrak ozzel.','Beth','crocheting',NULL,'yes'),(9,'Weaving 101','2019-05-05','Alderaan balosar jek gilad palpatine jarael. Gilad ubese reach moor jek ruurian hutt. Luke gizka kurtzen leia yanÃ©. Sola psadan sola theelin. Vao thisspias lama malastare sio. C-3po kamino rendar djo tarkin -lom gamorr alderaan dooku. Jeremoch klaatu massa b4-d4 tib ti. Nahdar devaronian hutta kowakian bail r4-p17 talortai defel. Cerea juvex veila khai omas unduli massans lars. Organa pellaeon choka kasan frozarns rugor epicanthix. Var kenobi ewok jusik gerb boss. Sluis durge moore gonk soontir thisspiasian sneevel ansionian roos.\r\n\r\nKen needa zann aurra zuggs bertroff offee fel. Organa obi-wan tibor khai cathar miraluka y\'bith ranat. Saurin quee jabba saurin elom. Ansuroer moff mayagil koon r4-p17 moore caamasi quinlan ismaren. Mara grizmallt ugnaught cliegg chommell moff lama. Ithorian isolder ubese kiffar ponda orrin h\'nemthean rattatak. Clawdite vella allie huk nagai. Tchuukthai qrygg jodo tyranus plo kwi cornelius jango. Coruscant gonk mantell organa maarek. Jerjerrod breha golda gavyn. Moor breha hoth logray ruwee cerean organa ahsoka.','beth','weaving',NULL,'yes'),(10,'Dyeing Yarn','2019-05-08','We donâ€™t serve their kind here! What? Your droids. Theyâ€™ll have to wait outside. We donâ€™t want them here. Listen, why donâ€™t you wait out by the speeder. We donâ€™t want any trouble. I heartily agree with you sir. Negola dewaghi wooldugger?!? He doesnâ€™t like you. Iâ€™m sorry. I donâ€™t like you either You just watch yourself. Weâ€™re wanted men. I have the death sentence in twelve systems. Iâ€™ll be careful than. Youâ€™ll be dead. This little one isnâ€™t worth the effort. Come let me buy you somethingâ€¦\r\n\r\nThe approach will not be easy. You are required to maneuver straight down this trench and skim the surface to this point. The target area is only two meters wide. Itâ€™s a small thermal exhaust port, right below the main port. The shaft leads directly to the reactor system. A precise hit will start a chain reaction which should destroy the station. Only a precise hit will set up a chain reaction. The shaft is ray-shielded, so youâ€™ll have to use proton torpedoes. Thatâ€™s impossible, even for a computer. Itâ€™s not impossible. I used to bullâ€™s-eye womp rats in my T-sixteen back home. Theyâ€™re not much bigger than two meters. Man your ships! And may the Force be with you!\r\n\r\nLuke? Luke? Luke? Have you seen Luke this morning? He said he had some things to do before he started today, so he left early. Uh? Did he take those two new droids with him? I think so. Well, heâ€™d better have those units in the south range repaired be midday or thereâ€™ll be hell to pay! Wait, thereâ€™s something dead ahead on the scanner. It looks like our droidâ€¦hit the accelerator.\r\n\r\nThere. You see Lord Vader, she can be reasonable. Continue with the operation. You may fire when ready. What? Youâ€™re far too trusting. Dantooine is too remote to make an effective demonstration. But donâ€™t worry. We will deal with your Rebel friends soon enough. No! Commence primary ignition.\r\n\r\nThreepio! Come in, Threepio! Threepio! Get to the top! I canâ€™t Where could he be? Threepio! Threepio, will you come in? They arenâ€™t here! Something must have happened to them. See if theyâ€™ve been captured. Hurry! One thingâ€™s for sure. Weâ€™re all going to be a lot thinner! Get on top of it! Iâ€™m trying! Thank goodness, they havenâ€™t found them! Where could they be? Use the comlink? Oh, my! I forgot I turned it off! Are you there, sir? Threepio! Weâ€™ve had some problemsâ€¦ Will you shut up and listen to me? Shut down all garbage mashers on the detention level, will you? Do you copy? Shut down all the garbage mashers on the detention level. Shut down all the garbage mashers on the detention level. No. Shut them all down! Hurry! Listen to them! Theyâ€™re dying, Artoo! Curse my metal body! I wasnâ€™t fast enough. Itâ€™s all my fault! My poor master! Threepio, weâ€™re all right! Weâ€™re all right. You did great.','Beth','yarn',NULL,'yes');
/*!40000 ALTER TABLE `how_to_guides` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total` double(6,2) DEFAULT NULL,
  `customerId` int(11) DEFAULT NULL,
  `shipped` varchar(15) DEFAULT 'no',
  PRIMARY KEY (`id`),
  KEY `customerId` (`customerId`),
  CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `customers` (`customerId`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice`
--

LOCK TABLES `invoice` WRITE;
/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
INSERT INTO `invoice` VALUES (6,20.00,9,NULL),(7,20.00,10,NULL),(8,20.00,11,NULL),(9,20.00,12,NULL),(10,144.89,13,NULL),(11,47.80,14,NULL),(12,47.80,15,NULL),(13,81.63,17,NULL),(14,62.60,18,NULL),(15,0.00,19,NULL),(16,0.00,20,NULL),(17,20.00,21,NULL),(18,0.00,22,NULL),(19,0.00,23,NULL),(20,0.00,24,NULL),(21,236.19,25,NULL),(22,0.00,26,NULL),(23,0.00,27,NULL),(24,0.00,28,NULL),(25,0.00,29,NULL),(26,0.00,30,NULL),(27,0.00,31,NULL),(28,0.00,32,NULL),(29,0.00,33,NULL),(30,127.16,34,NULL),(31,127.16,35,NULL),(32,147.16,36,NULL),(33,153.84,37,'yes'),(34,147.82,38,'no'),(35,20.00,39,'no'),(36,20.00,40,'no'),(37,42.86,41,'no');
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoiceProducts`
--

DROP TABLE IF EXISTS `invoiceProducts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoiceProducts` (
  `invoiceId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `size` char(1) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double(6,2) NOT NULL,
  `cost` double(6,2) DEFAULT NULL,
  KEY `invoiceId` (`invoiceId`),
  KEY `productId` (`productId`),
  CONSTRAINT `invoiceProducts_ibfk_1` FOREIGN KEY (`invoiceId`) REFERENCES `invoice` (`id`),
  CONSTRAINT `invoiceProducts_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoiceProducts`
--

LOCK TABLES `invoiceProducts` WRITE;
/*!40000 ALTER TABLE `invoiceProducts` DISABLE KEYS */;
INSERT INTO `invoiceProducts` VALUES (32,1,'l',4,20.00,80.00),(32,6,'m',3,1.30,3.90),(32,7,'s',2,21.63,43.26),(32,1,'l',1,20.00,20.00),(33,1,'m',1,20.00,20.00),(33,6,'l',3,1.30,3.90),(33,23,'m',4,25.99,103.96),(33,24,'l',2,12.99,25.98),(34,1,'m',3,20.00,60.00),(34,6,'s',1,1.30,1.30),(34,7,'m',4,21.63,86.52),(35,1,'m',1,20.00,20.00),(36,1,'m',1,20.00,20.00),(37,11,'m',1,1.23,1.23),(37,1,'s',1,20.00,20.00),(37,7,'s',1,21.63,21.63);
/*!40000 ALTER TABLE `invoiceProducts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `price` float(6,2) DEFAULT NULL,
  `description` text,
  `size` varchar(20) DEFAULT NULL,
  `picture` varchar(20) DEFAULT NULL,
  `available` varchar(4) DEFAULT 'yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'llama wool hat','hat',20.00,'llama wool hat with stripes','small','llamaWoolhat.jpg','yes'),(6,'dfgsdfg','Mitten',1.30,'sdfgsdfgsdfgsdfg',NULL,'wool_scarf.jpg','yes'),(7,'scarves','Scarf',21.63,'Thisis to see if the picture loads to the images folder.',NULL,'woolScarves.jpg','yes'),(9,'fdfgh','Hat',1.33,'ghdghgghg',NULL,'woolScarves.jpg','yes'),(11,'dfgh','Scarf',1.23,'dfghdfgh',NULL,'woolScarves.jpg','yes'),(18,'gsdfgdf','Sock',1.23,'sdfgsdfgsdfg',NULL,'','yes'),(19,'This sis new','Blanket',1.23,'A beautiful blanket',NULL,'','yes'),(20,'fghfdg','Scarf',12.36,'dfghdfghdfghfdgh',NULL,'Sheep.jpeg','yes'),(23,'Angora scarf','Scarf',25.99,'A beautiful angora scarf. Why? Why not!',NULL,'angoraScarf.jpg','yes'),(24,'Wool Mittens','Mitten',12.99,'Cozy wool mittens.',NULL,'woolMittens.jpg','yes'),(25,'wool socks','Sock',12.99,'For cold winter nights.',NULL,'woolSocks.jpg','yes');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_comments`
--

DROP TABLE IF EXISTS `user_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_comments` (
  `commentId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT NULL,
  `comment` text,
  `date` varchar(20) DEFAULT NULL,
  `approved` varchar(5) DEFAULT 'no',
  `username` varchar(30) DEFAULT NULL,
  `howTo` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`commentId`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_comments`
--

LOCK TABLES `user_comments` WRITE;
/*!40000 ALTER TABLE `user_comments` DISABLE KEYS */;
INSERT INTO `user_comments` VALUES (22,1,'here, we go','May 5, 2019, 4:06 pm','no','username',''),(23,1,'Does this comment have the how to name?','May 5, 2019, 4:54 pm','yes','username',''),(24,1,'Does this comment have the how to name?','May 5, 2019, 4:57 pm','no','username',''),(25,1,'Does this work','May 5, 2019, 4:58 pm','no','username',''),(27,1,'Comments must be approved by a moderator before they appear on the page.','May 5, 2019, 5:00 pm','yes','username',''),(28,1,'Comments must be approved by a moderator before they appear on the page.','May 5, 2019, 5:02 pm','no','username',''),(29,1,'Comments must be approved by a moderator before they appear on the page.','May 5, 2019, 5:02 pm','no','username',''),(30,1,'Comments must be approved by a moderator before they appear on the page.','May 5, 2019, 5:05 pm','no','username',''),(31,1,'Comments must be approved by a moderator before they appear on the page.','May 5, 2019, 5:08 pm','no','username','crocheting 101'),(32,1,'halsdfkjdfjkldfjlkasdklj','May 5, 2019, 5:08 pm','yes','username','crocheting 101'),(33,1,'ajhsdkfjhjkashdflkhasjkdh','May 8, 2019, 12:38 a','yes','username',''),(34,1,'Here is a comment on weaving id 9','May 8, 2019, 2:29 am','yes','username',''),(35,1,'Here is a new comment. knitting 101','May 8, 2019, 2:38 am','yes','username','Dyeing Yarn'),(36,1,'akskjlfsdajlkadfs;kljfklsj;dakljaf;slkjaglhgs;hlgj;adgsj;gds;jkdsf;kjdfsjrjlfslkdskjlfgdznlmfbzdnlkmrdbdbgjklfrvk;ljdgrbskm;ldr spinning 101','May 8, 2019, 2:45 am','yes','username','Dyeing Yarn'),(38,1,'crocheting 201 user comment','May 8, 2019, 2:56 am','yes','username','Crocheting 201'),(39,1,'why did it releoad dying yarn','May 8, 2019, 2:57 am','yes','username','Dyeing Yarn'),(40,2,'This is my brand new comment','May 8, 2019, 3:10 am','no','john','Dyeing Yarn'),(41,2,'This is my brand new comment','May 8, 2019, 3:10 am','no','john','Dyeing Yarn'),(42,2,'This is my brand new comment','May 8, 2019, 3:11 am','no','john','Dyeing Yarn'),(43,2,'This is my brand new comment','May 8, 2019, 3:12 am','no','john','Dyeing Yarn'),(44,2,'This is my brand new comment','May 8, 2019, 3:12 am','no','john','Dyeing Yarn'),(45,2,'This is my brand new comment','May 8, 2019, 3:12 am','no','john','Dyeing Yarn'),(46,2,'This is my brand new comment','May 8, 2019, 3:17 am','yes','john','Dyeing Yarn'),(49,2,'This is my brand new comment','May 8, 2019, 3:19 am','no','john','Dyeing Yarn'),(50,2,'This is my brand new comment','May 8, 2019, 3:20 am','no','john','Dyeing Yarn'),(52,2,'This is my brand new comment','May 8, 2019, 3:22 am','no','john','Dyeing Yarn'),(54,2,'This is my brand new comment','May 8, 2019, 3:23 am','no','john','Dyeing Yarn');
/*!40000 ALTER TABLE `user_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('username','password','username','$2y$10$1.TUEz88ZuszegMU7er1meyDj3onVMsIK8LToxwDhg7sBNU0xg0M2',1),('john','johnjohn','john','$2y$10$TPJTo2Xj6VN3AohCdpfEN.9mUtw9Ci6eY7fJr/xygNjOrWI.kegU.',2);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-08 14:42:39

-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.54-1ubuntu4


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema booking
--

CREATE DATABASE IF NOT EXISTS booking;
USE booking;

--
-- Definition of table `booking`.`accounts`
--

DROP TABLE IF EXISTS `booking`.`accounts`;
CREATE TABLE  `booking`.`accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `deff` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking`.`accounts`
--

/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
LOCK TABLES `accounts` WRITE;
INSERT INTO `booking`.`accounts` VALUES  (1,'My Bank',0),
 (5,'Wallet',1);
UNLOCK TABLES;
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;


--
-- Definition of table `booking`.`currency`
--

DROP TABLE IF EXISTS `booking`.`currency`;
CREATE TABLE  `booking`.`currency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) DEFAULT NULL,
  `deff` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `booking`.`currency`
--

/*!40000 ALTER TABLE `currency` DISABLE KEYS */;
LOCK TABLES `currency` WRITE;
INSERT INTO `booking`.`currency` VALUES  (49,'Kn',1),
 (50,'Eur',0);
UNLOCK TABLES;
/*!40000 ALTER TABLE `currency` ENABLE KEYS */;


--
-- Definition of table `booking`.`inputCategory`
--

DROP TABLE IF EXISTS `booking`.`inputCategory`;
CREATE TABLE  `booking`.`inputCategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `income_outcome` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking`.`inputCategory`
--

/*!40000 ALTER TABLE `inputCategory` DISABLE KEYS */;
LOCK TABLES `inputCategory` WRITE;
INSERT INTO `booking`.`inputCategory` VALUES  (23,'Gas',0),
 (24,'Phone',0),
 (25,'Salary',1);
UNLOCK TABLES;
/*!40000 ALTER TABLE `inputCategory` ENABLE KEYS */;


--
-- Definition of table `booking`.`recording`
--

DROP TABLE IF EXISTS `booking`.`recording`;
CREATE TABLE  `booking`.`recording` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCurrency` int(11) NOT NULL,
  `idAccounts` int(11) NOT NULL,
  `idinputGroup` int(11) DEFAULT NULL,
  `income` decimal(12,2) DEFAULT NULL,
  `dateEntry` date NOT NULL,
  `outcome` decimal(12,2) DEFAULT NULL,
  `pending` tinyint(1) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `transaction` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking`.`recording`
--

/*!40000 ALTER TABLE `recording` DISABLE KEYS */;
LOCK TABLES `recording` WRITE;
INSERT INTO `booking`.`recording` VALUES  (79,49,1,25,'1000.00','2012-02-04',NULL,0,'Test',NULL);
UNLOCK TABLES;
/*!40000 ALTER TABLE `recording` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

<?php
$lang = 'cro_lang'; // ovdje ce biti post ili get o jeziku
include($lang);

$dbhost = 'localhost';
$dbuser = 'fivasic';
$dbpass = 'Brahman';
$dbname = 'ahaha';

$db = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

$createAccounts = "CREATE TABLE  `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `deff` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8";

$sql = $db->query($createAccounts ) ;

if($sql == FALSE) {
		echo "Failure on creating table <b>accounts</b>";
		exit;
}
	
 $createCurrency= 'CREATE TABLE  `currency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) DEFAULT NULL,
  `deff` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC';	

$sql2 = $db->query($createCurrency) ;
if($sql2 == FALSE) {
		echo "Failure on creating table <b>currency</b>";
		exit;
}

$inputCategory = 'CREATE TABLE  `inputCategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `income_outcome` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 ';

$sql3 = $db->query($inputCategory);

if($sql3 == FALSE) {
		echo "Failure on creating table <b>inputCategory</b>";
		exit;
}

$recording = ' CREATE TABLE  `recording` (
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
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8 ';

$sql4 = $db->query($recording);

if($sql4 == FALSE) {
		echo "Failure on creating table <b>recording</b>";
		exit;
}


?>
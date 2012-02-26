<?php
/*
// language for eventual errors.
if(isset($_POST['lang'])){
	$lang = $_POST['lang'];	
}
else {
	exit;
}

$lang_name = $lang."_lang.php";
include($lang_name);
*/
include("cro_lang.php");

$url = $_POST['url'];

$dbhost = $_POST['webServer'];
$dbuser = $_POST['dbUser']; 
$dbpass = $_POST['dbPasswd']; 
$dbname = $_POST['dbName']; 

echo "<h1>URL: $url <br>host: $dbhost<br>dbuser:$dbuser<br> pass: $dbpass<br>dbname: $dbname</h1>";


$con = mysqli_connect($dbhost, $dbuser, $dbpass);
if (!$con)  {
  die("$connection_failure" . mysqli_error());
  }

$q = "CREATE DATABASE $dbname ;";
if (mysqli_query($con, $q))  {
  echo "$dbCreated";
}

else  {
  echo "<br>$dbErrorBase<br>" . mysqli_error();
  }

mysqli_close($con);

////////////////////////////////////////////////////////
/////// Fill the database:


$db = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

$createAccounts = "CREATE TABLE  `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `deff` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8";

$sql = $db->query($createAccounts ) ;

if($sql == FALSE) {
		echo "$failure_table <b>accounts</b>";
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
		echo "$failure_table <b>currency</b>";
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
		echo "$failure_table <b>inputCategory</b>";
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
		echo "$failure_table <b>recording</b>";
		exit;
}

echo "<p>Tables created...</p>";
///////////////////////////////////////////
// Edit the configuration file, first config.php

   $file = '../application/config/config.php';
   $content0 = file_get_contents('../application/config/config.php');
   $content0 = str_replace('http://localhost/booking/', $url, $content0);
   file_put_contents($file, $content0);
   
  
  // edit the database.php:
 $file1 = '../application/config/database.php';
 $content = file_get_contents('../application/config/database.php');
 $content = str_replace('localhoster', $dbhost, $content);
 $content = str_replace('fivasic', $dbuser, $content);
 $content = str_replace('dbPassword', $dbpass, $content);
 $content = str_replace('booking_dev', $dbname, $content);
 
 file_put_contents($file1, $content);
  
  echo "<p>Configuration finished
  <br><br>klik to <a href='$url'>home-page</a>...</p>";

?> 
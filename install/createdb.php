<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="../css/main.css" rel="stylesheet" type="text/css" />
<link href="../css/help.css" rel="stylesheet" type="text/css" />
<title>Install</title>
</head>
<body>
<hr class="hr" />
<div class="main">
<?php
// creating and controlling url
function curPageURL($webServer) {
	 $pageURL = 'http';
	 if (isset($_SERVER["HTTPS"])) {
	 	$pageURL .= "s";
	 }
	 $pageURL .= "://";
	 if ($_SERVER["SERVER_PORT"] != "80") {
	  	$pageURL .= $webServer.":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	 } else {
	  	$pageURL .= $webServer.$_SERVER["REQUEST_URI"];
	 }
	 // cut out  install/dbconfig.php from url for config purpose
	 $url = str_replace('install/createdb.php', "", $pageURL);
	 
	 return $url;
}


////////// language for messages and eventual errors.
if(isset($_POST['lang'])){
	$lang = $_POST['lang'];	
}
else {
	echo "Direct access is not allowed!";
	exit;
}

$lang_name = $lang."_lang.php";
include($lang_name);

//////////////////////////////////////////////////////////////////////////////
// get data from post
$webServer = $_POST['webServer'];
if($webServer == NULL) {
	echo $db_error;
	echo "	<a href='javascript:history.back();'><br><br><span style='color: rgb(153, 0, 0);'><b>$back</b></span></a>";
	exit;
}
$webServer = str_replace(' ', '', $webServer);
$url = curPageURL($webServer);  // function curPageURL


$dbhost = $_POST['sqlServer'];
if($dbhost == NULL) {
	echo $db_error;
	echo "	<a href='javascript:history.back();'><br><br><span style='color: rgb(153, 0, 0);'><b>$back</b></span></a>";
	exit;
}
$dbhost = str_replace(' ', '', $dbhost);

$dbuser = $_POST['dbUser']; 
if($dbuser == NULL) {
	echo $db_error;
	echo "	<a href='javascript:history.back();'><br><br><span style='color: rgb(153, 0, 0);'><b>$back</b></span></a>";
	exit;
}
$dbuser = str_replace(' ', '', $dbuser);
$dbpass = $_POST['dbPasswd']; 
$dbpass = str_replace(' ', '', $dbpass);

$dbname = $_POST['dbName'];
if($dbname == NULL) {
	echo $db_error;
	echo "	<a href='javascript:history.back();'><br><br><span style='color: rgb(153, 0, 0);'><b>$back</b></span></a>";
	exit;
}
$dbname = str_replace(' ', '', $dbname);


echo "<h1>URL: $url <br>host: $dbhost<br>dbuser:$dbuser<br> pass: $dbpass<br>dbname: $dbname</h1>";

////////////////////////////////
// exit;

/////////////////////////////////////////////////////////////////////////////////////////////////////////
// CREATE DATABASE if not exist

$con = mysqli_connect($dbhost, $dbuser, $dbpass);
if (!$con)  {
  die("$connection_failure" . mysqli_error());
  }

$q = "CREATE DATABASE IF NOT EXISTS $dbname ;";
if (mysqli_query($con, $q))  {
  echo "$dbCreated";
}

else  {
  echo "<br>$dbErrorBase<br>" . mysqli_error();
  }

mysqli_close($con);

/////////////////////////////////////////////////////////////////////////////////////////////////////
/////// Fill the database:


$db = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

$createAccounts = "CREATE TABLE IF NOT EXISTS `accounts` (
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
	
 $createCurrency= 'CREATE TABLE IF NOT EXISTS `currency` (
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

$inputCategory = 'CREATE TABLE IF NOT EXISTS `inputCategory` (
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

$recording = ' CREATE TABLE IF NOT EXISTS `recording` (
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

///////////////////////////////////////////////////////////////////////////////////
// Edit the configuration file, first config.php
  
  
  // edit the database.php:
 $file1 = '../application/config/database.php';
 $content = file_get_contents('../application/config/database.php');
 $content = str_replace('localhost', $dbhost, $content);
 $content = str_replace('root', $dbuser, $content);
 $content = str_replace('dbPassword', $dbpass, $content);
 $content = str_replace('booking', $dbname, $content);
 
 file_put_contents($file1, $content);
  
  echo "<p>$confEnd
  <br><br>klik to <a href='$url/$lang'>home-page</a>...</p>";

?>
</div>
</body>
</html> 
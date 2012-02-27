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

// language for installation
if(isset($_POST['lang'])) {
	$lang = $_POST['lang'];
}

if($lang == 'cro'){
	include("cro_lang.php");
}
elseif($lang == 'eng') {
	include("eng_lang.php");
}

function curPageURL() {
	 $pageURL = 'http';
	 if (isset($_SERVER["HTTPS"])) {
	 	$pageURL .= "s";
	 }
	 $pageURL .= "://";
	 if ($_SERVER["SERVER_PORT"] != "80") {
	  	$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	 } else {
	  	$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	 }
	 // cut out  install/dbconfig.php from url for config
	 $url = str_replace('install/dbconfig.php', "", $pageURL);
	 
	 return $url;
}


$url = curPageURL();
echo "URL: $url";
echo "<h1>$fill_out</h1>
	$writeAccess ";
?>
<form name='forma' method='post' action='createdb.php'>

	<input type='hidden' name='url' value="<?php echo $url; ?>" />
	<input type='hidden' name='lang' value="<?php echo $lang; ?>" />

	<h3><?php echo $webServer; ?></h3>
	<input id="webServer" type="text" name="webServer" value="localhost"  />
	<hr>
	
	<h3><?php echo $sqlServer; ?></h3>
	<?php echo $sqlMore; ?>
	<br>
	<input id="sqlServer" type="text" name="sqlServer" value="localhost"  />
	<hr>
	
	<h3><?php echo $dbUser; ?></h3>
	<input id="dbUser" type="text" name="dbUser" value="root"  />
	<hr>
	
	<h3><?php echo $dbPasswd; ?></h3>
	<?php echo $dbWin; ?><br />
	<input id="dbPasswd" type="text" name="dbPasswd" value=""  />
	<hr>
	
	<h3><?php echo $dbName; ?></h3>
	<input id="dbName" type="text" name="dbName" value="booking"  />
	
	
	<br><br>
	<input name="unos" type="submit" id="unos" value="<?php echo $submit; ?>" />
</form> 
</div>
</body>
</html>
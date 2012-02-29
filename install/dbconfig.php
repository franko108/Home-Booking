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

if($lang == 'hr'){
	include("hr_lang.php");
}
elseif($lang == 'en') {
	include("en_lang.php");
}


echo "<h1>$fill_out</h1>
	$license<hr>
	$writeAccess ";
?>
<form name='forma' method='post' action='createdb.php'>

	<input type='hidden' name='url' value="<?php echo $url; ?>" />
	<input type='hidden' name='lang' value="<?php echo $lang; ?>" />

	<h3><?php echo $webServer; ?></h3>
	<input id="webServer" type="text" name="webServer" value="<?php echo $_SERVER['SERVER_NAME']; ?>"  />
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
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
include("cro_lang.php");
//include("../funkcije.php");

echo "<h2>$welcome</h2>";
?>
<form name='forma' method='post' action='dbconfig.php'>
	<?php echo $language; ?>
	
	<select name="lang">
			<option value="eng">English</option>
			<option value="cro">Hrvatski</option>
	</select>
		<input name="unos" type="submit" id="unos" value="Submit" />
</form> 
</div>
</body>
</html>
<?php
$language = $this->lang->lang();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="<?php echo base_url(); ?>css/main.css" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url(); ?>css/help.css" rel="stylesheet" type="text/css"  />
</head>
<body>
<p>&nbsp;</p>
<div class="col1">
	&nbsp;
</div>
<?php include('menu_help.php'); ?>

<p>&nbsp;</p><br /><br />
<hr class="hr" />
<div class="main">

<h1 align="center">Backup</h1>
<p>
	
	Well, if your data aren't important to archive, just skip this chapter.
<br>Click on <i>Help-Backup</i>  script will run creating backup of current data in SQL format within gz archive.
<br>Same one may be used for restoring data on another or same machine, and can be stored  on the pc, usb memory stick or wherever.
<br>Picture shows the dialog of downloading archived data. (picture may vary depending of the browser).
<br>Another copy of the same archive is stored within directory <i>doc</i>
<br>
<br>
Picture 1.
<br>
<img src="<?php echo base_url(); ?>/help-pictures/hr/backup.png" border="1">
</p>

</div>
</body>
</html>
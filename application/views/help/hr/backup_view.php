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

<h1 align="center">Arhiviranje podataka</h1>
<p>
	Ako vam upisani podaci nisu jako važni, preskočite ovo poglavlje.
<br>Klikom na <i>Pomoć->Backup</i> pokreće se skripta za stvaranje arhive u SQL formatu unutar gz arhive.
<br>Ista se moze upotrijebiti za vraćanje podataka na drugom stroju a moze se čuvati na kompjuteru, usb sticku ili gdje već držite svoju arhivu.
<br>Prikazan je dijalog za download sličan kao na slici 1. (ovisno o browseru).
<br>Jedna kopija iste arhive pohranjena je unutar direktorija <i>doc</i>
<br>
<br>
Slika 1.
<br>
<img src="<?php echo base_url(); ?>/help-pictures/hr/backup.png" border="1">
</p>

</div>
</body>
</html>
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

<h1 align="center">Unos transackcija</h1>
<p>
Transakcije s jednog računa na drugi dostupne su kroz menu <i>Knjiženje->Transakcije</i>
<br>- Biramo datum preko kalendara
<br>- Upis iznosa za transfer
<br>- Izbor valute
<br>- Izbor sa kojeg računa uzimamo novac, izbor na koji račun ide uplata.

<br /><br />U donjem dijelu nalazi se tabela sa ranije upisanim transferima unutar koje se nalazi opcija za izmjenu ili 
brisanje transakcije.

<br /><br />Slika 1.
	<br />
	<img src="<?php echo base_url(); ?>/help-pictures/hr/transfer.png" border="1">
</p>
</div>
</body>
</html>
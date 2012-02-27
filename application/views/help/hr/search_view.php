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


<h1 align="center">Pretraga podataka</h1>
<p>
U gornjem desnom kutu nalazi se opcija <i>Search</i> koja omogućuje pretragu podataka.
<br>Može se upisati naziv kategorije ili opis prihoda/troška, za potvrdu <i>Enter</i>.
<br>Nije potrebno napisati ni puni naziv, pretraga će biti obavljena.
<br>I ovaj izvještaj može preslagati redove klikom na naziv kolone, tj. po datumu, nazivu ili iznosu.
<br><br>
Slika 1.
<br>
<br><img src="<?php echo base_url(); ?>/help-pictures/hr/pretraga.png" border="1">
</p>

</div>
</body>
</html>
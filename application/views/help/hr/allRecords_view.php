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

<h1 align="center">Pregled svih unosa</h1>

<p>Svi unosi o prihodima i rashodima nalaze se u tabeli dostupnoj na meniju <i>Izvještaji->Svi unosi</i>
<br><br>
Početno su pokazani svi unosi, a imamo mogućnost filtriranja podataka po datumima.
Ako odaberemo datum od 01.01.2012 - 31.01.2012, biti će prikazani podaci unutar ovih datuma i 
<i>Aktualno stanje računa:</i> 31.01.2012. po definiranim računima.
<br>
<br>
<br>Prikazani svi unosi u tabeli, 30 redova ima jedna stranica. Ispod tablice je mogućnost navigacije kroz stranice
te izbor za prikaz 10, 20, 30 ili 40 redova u tabeli.
<br>Klikom na naslov pojedine kolone podaci postaju poslagani padajućim nizom te kolone, ako kliknemom na datum, 
redovi su poslagani po datumima, klik na vrstu ili opis, podaci su poslagani po abecedi, klik na prihod ili trošak, podaci 
postaju poslagani po padajućim ili rastućim vrijednostima.
<br><br>
Prihod ili trošak koji je postavljan kao odgođen, obilježen je crvenom bojom i ta vrijednost nije zbrojena sa ostalim
prihodima ili troškovima.


<br><br>Slika 1 
<br><img src="<?php echo base_url(); ?>/help-pictures/hr/sviUnosi.jpg" border="1">
</p>
</div>
</body>
</html>
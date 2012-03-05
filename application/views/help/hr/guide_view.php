<?php
$language = $this->lang->lang();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="<?php echo base_url(); ?>css/main.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>css/help.css" rel="stylesheet" type="text/css"  />
<title>Matični podaci</title>
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

<h1 align="center">Korištenje programa</h1>
<p>
	Nakon uspješne instalacije programa, može se početi sa korištenjem programa.
<br />Prvo je potrebno podesiti matične podatke, račune, valute, kategorije isplata i uplata.
Bez podešenih matičnih podataka, program neće dozvoliti knjiženje uplata/isplata.
<br />
<h3>Unos i izmjena valute</h3>
Na slici 1. je sučelje koje prikazuje izgled unosa valute. Možemo odabrati zadanu valutu, tj.valuta koja će biti postavljena kod unosa uplata ili isplata.
<br />Ispod forme za unos nalazi se tabela sa pregledom upisanih valuta i opcijom izmjene naziva ili brisanja valute.
<br ><br >
Slika 1.
<br >
<img src="<?php echo base_url(); ?>/help-pictures/hr/valuta.png" border="1"></img>
</p>

<div id="rn">
<h3>Unos i izmjena računa</h3>
Slika 2 prikazuje sučelje za unos i izmjenu računa. Jedan račun minimalno mora biti postavljen a nema ograničenja u broju računa. Jedan račun može biti 
zadan i biti će prvi ponuđen kod unosa isplata ili uplata. 
<br />Ispod forme za upis, nalazi se tabela sa pregledom upisanih računa i opcijama za izmjenu ili brisanje računa. 
<br />Ako je račun već korišten u knjiženju uplata ili isplata, brisanje neće biti dozvoljeno.
<br /><br />
Slika 2.
<br />
<img src="<?php echo base_url(); ?>/help-pictures/hr/rn.png" border="1">

</div>

<div id="vrste">
<h3>Unos i izmjena vrsta prihoda i rashoda</h3>
Slika 3 prikazuje sučelje za unos i izmjenu kategorija ili vrsta uplata i isplata. Mora biti postavljena najmanje jedna vrsta
prihoda i jedna vrsta rashoda.
<br />Ispod forme za upis, nalazi se tabela sa pregledom upisanih kategorija i opcijama za izmjenu ili brisanje kategorije.
<br />Ako je vrsta prihoda ili rashoda već korištena u knjiženju uplata ili isplata, brisanje neće biti dozvoljeno.
<br /><br />
Slika 3.
<br />
<img src="<?php echo base_url(); ?>/help-pictures/hr/vrste.png" border="1">

</div>


</div>
</body>
</html>
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

<div class="col2">
	<a href="nesto ">O programu</a>
	<br />
	<a href="nesto ">Licenca</a>
	<br />
	<a href="nesto ">Instalacija</a>

</div>

<div class="col3">
	<a href="nesto ">Upute za rad</a>
	<br />
	<a href="nesto ">Matični podaci</a>
	<br />
	<a href="nesto ">Kniženje</a>
	<br />
	<a href="nesto ">Transakcija</a>
</div>

<div class="col4">
	<a href="nesto ">Izvještaji</a>
	<br />
	<a href="nesto ">Pretraga</a>
	<br />
	<a href=" nesto">Arhiva</a>

</div> 

<p>&nbsp;</p><br /><br />
<div class="main">
<hr>
<h1 align="center">O programu</h1>
<p>
Program za vođenje prihoda i troškova.<br>
robao sam par programa i nisu mi se bas dopali, previse kompliciranja
za moj ukus.<br>
Htio sam da program bude vrlo jednostavan, da izgleda ovako kako
izgleda i da bude brzo gotov.<br>
<br>
Zato sam radio ovaj program u Codeignter (izasla je i nova verzija,
sasvim ok) i sam, tako<br>
da meni odgovara u prvom redu, a ostali neka se snalaze ili neka pisu
svoje verzije :-))<br>
Ima nesto Jquery: menu i sort tabele na browseru.<br>
Open source je program, nalazi se na github, bio sam znatizeljan kako
radi github.<br>
Uglavnom, slicno kao assembla, daju wiki za open soruce program.
Assembla ima ipak preglednije sučelje.<br>
Link: https://github.com/franko108/Home-Booking<br>
<br>
Manje-vise je program gotov, jos par detalja je ostalo za srediti, a
htio bi napraviti i neki user friendly setup,<br>
nesto kao sto ima npr. Drupal, tako da postavi bazu i konfiguracijske
datoteke. Nesto sam poceo i po tome, mislim da<br>
ce ici, osim ako ljudi nalete na probleme sa web serverom, to ce morati
sami.<br>
Program nema pravo dvojno knjigovodstvo, iako bi se moglo koristiti na
slican nacin.<br>
<br>
Program ima funkcionalnosti:<br>
<br>
&nbsp;&nbsp;&nbsp; Unos prihoda/rashoda<br>
&nbsp;&nbsp;&nbsp; jedna ili vise valuta,<br>
&nbsp;&nbsp;&nbsp; jedan ili vise računa,<br>
&nbsp;&nbsp;&nbsp; jedna ili vise kategorija prihoda ili troškova<br>
&nbsp;&nbsp;&nbsp; prihod/rashod na "čekanju", tj. nije jos realiziran
i ne zbraja se sa ostalim promjenama<br>
&nbsp;&nbsp;&nbsp; transfer s jednog računa na drugi,<br>
&nbsp;&nbsp;&nbsp; izvjestaji sa listom svih prihoda/rashoda, i filter
prema datumu koji pokazuje i npr. koliko je<br>
&nbsp;&nbsp;&nbsp; bio iznos na nekom računu upravo tog ranijeg dana.<br>
&nbsp;&nbsp;&nbsp; izvjestaji po kategorijama prihoda troskova ,
zapravo sam zbog ovoga isao pisati program. Opet filter po datumima<br>
&nbsp;&nbsp;&nbsp; i iznosi unutar zadanih datuma.<br>
&nbsp;&nbsp;&nbsp; Search prema opisu ili kategorijama. Radi neovisno
da li su mala ili velika slova.<br>
&nbsp;&nbsp;&nbsp; Backup skripta, tj. backup baze u sql formatu.<br>
<br>
Demo: http://home-booking.it-pu.com<br>
<br>
Ima lokalizacija na eng. treba napisati Help... :-)<br>
Na helpu ce pisati da je odrzavanje programa u rukama Istra-data.<br>
Menu ne radi na IE6 i to je isto u redu. #*#*<br>
</p>


</div>

</body>
</html>
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
<div class="main">
<hr>
<h1 align="center">O programu</h1>
<p>
Program za vođenje prihoda i troškova.<br>
Namjera je da program bude pregledan i jednostavan za korištenje. Ne
koristi se pravo dvojno knjigovodstvo, iako
bi se moglo prilagoditi za takvu potrebu.
<br>
<br>
Program ima funkcionalnosti: <br>
<ul>
<li>unos prihoda/rashoda <br>
</li>
<li>jedna ili vise valuta, <br>
</li>
<li>jedan ili vise računa, <br>
</li>
<li>jedna ili vise kategorija prihoda ili troškova <br>
</li>
<li>prihod/rashod na "čekanju", tj. nije jos realiziran i ne zbraja
se sa ostalim promjenama transfer s jednog računa na drugi <br>
</li>
<li>izvjestaji sa listom svih prihoda/rashoda, i filter prema datumu
koji pokazuje i npr. koliko je bio iznos na nekom računu upravo tog
ranijeg dana. <br>
</li>
<li>izvjestaji po kategorijama prihoda troskova sa filterom po
datumima i iznosi unutar zadanih datuma. <br>
</li>
<li>pretraga prema opisu ili kategorijama. <br>
</li>
<li>backup skripta, tj. backup baze u sql formatu. <br>
</li>
</ul>
<h2>LICENCA</h2>
&nbsp;&nbsp;&nbsp; Program je otvorenog koda (Open Source) sa licencom
GPL v2. To znači da je slobodan za korištenje za osobne ili
komercijalne svrhe.<br>
Autor se ograničava od svake odgovornosti od moguće nastale štete ili
problema nastalih korištenjem programa.<br>
Korisnik programa instalacijom i korištenjem privhaća odredbe licence
čiji puni tekst nalati se <a
href="http://www.gnu.org/licenses/gpl-2.0.html">ovdje</a><br>
<br>
<h2>INSTALACIJA</h2>
&nbsp;&nbsp;&nbsp; Posljednja verzija programa dostupna je ovdje:
<a href="https://github.com/franko108/Home-Booking/zipball/master">https://github.com/franko108/Home-Booking/zipball/master</a><br>
<br>
Program radi na kombinaciji PHP/MySQL.<br>
<h3>Programski zahtjevi</h3>
<ul>
<li>Web server, Apache ili neki drugi. Clean url, odnosno na Apache,
mod_rewrite mora biti uključen</li>
<li>MySQL 5</li>
<li>PHP 5.2</li>
<li>Operativni sistemi: Linux (preporučen), Windows ili Mac OS</li>
</ul>
<h3>Linux instalacija</h3>
Na većini linux distribucija, instalacija web servera, PHP i MySQL je
jednostavna.<br>
- Na Ubuntu distribuciji dovoljno je upisati naredbu u shell:<br>
<span style="font-family: Courier New;">$ sudo tasksel install
lamp-server</span><br>
<br>
Za vrijeme instalacije, trebati će postaviti root password MySQL.<br>
<br>
- Raspakirati sadržaj programa Home-Booking u root web servera. Na
Debian/Ubutnu je to /var/www<br>
Obratite paženju da web server mora imati prava nad sadržajem programa.
Npr. naredba:<br>
$ sudo chown -R /var/www/Home-Booking<br>
<br>
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
<br>
<br>
Demo: http://home-booking.it-pu.com<br>
<br>
Ima lokalizacija na eng. treba napisati Help... :-)<br>
Na helpu ce pisati da je odrzavanje programa u rukama Istra-data.<br>
Menu ne radi na IE6 i to je isto u redu. #*#*<br>
<br>

</div>

</body>
</html>
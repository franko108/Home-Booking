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
<div id="license">
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
Razvoj i održavanje programa vodi <a href="http://istra-data.org">Istra-Data.</a>
</div>

<div id="inst">
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
<li>Moderan browser - Firefox, Opera, Chrome, IE7 najmanje. (IE6 ne radi, to nije moderan browser)</li>
</ul>
<h3>Linux instalacija</h3>
Ukratko:<br />
- Podesiti lamp (linux, apache, mysql i php)
<br />
- Raspakirati sadzaj programa u web root
<br />
- Pokrenuti instalaciju u browseru naredbom: http://localhost/Home-Booking/install/install.php
<br /> &nbsp;&nbsp; pratiti upute za instalaciju, biti ce postavljena baza podataka i konfiguracijske datoteke.
<p>
	Detaljniji opis kao i rješavanje mogućih problema je <?php echo anchor('help/install','ovdje');  ?>
</p>

<h3>Windows instalacija</h3>
Može se instalirati wamp server koji ima podešen i konfiguriran apache, PHP i MySQL za windows.
<br>Download je <a href="http://www.wampserver.com/en/#download-wrapper">ovdje</a>
<br /><br />
 &nbsp; - Raspakirati program u web root: C:\wamp\www
 <br />&nbsp;- Pokrenuti instalaciju u browseru sa http://localhost/Home-Booking/install/install.php (ne kopirati ovaj link u google! Ništa nećete naštetiti, ali niti postići)
 <br />&nbsp;- Odgovoriti na nekoliko pitanja tokom instalacije
 <br />&nbsp;- Korištenje programa
</div>

<p>
<h3>Credits</h3>
Korišteni su slijedeći programi, platforme i biblioteke:
<ul>
<li>Linux</li>
<li>PHP</li>
<li>MySQL</li>
<li><a href="http://codeigniter.com">CodeIgniter</a></li>
<li><a href="http://jquery.com/">JQuery</a></li>
<li><a href="http://tablesorter.com">TableSorter</a></li>
<li><a href="http://www.softcomplex.com/products/tigra_calendar/">Tigra Calendar</a></li>
</ul>
<br /> 
<br /> 
<br /> 
<br /> 
<br /> 
</p>

<br />
<br />
<br />



</div>

</body>
</html>
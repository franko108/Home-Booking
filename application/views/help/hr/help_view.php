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
Program ima slijedeće funkcionalnosti: <br>
<ul>
<li>unos prihoda/rashoda <br>
</li>
<li>upotreba jedne ili vise valuta, <br>
</li>
<li>jedan ili vise računa, <br>
</li>
<li>jedna ili vise kategorija prihoda ili troškova <br>
</li>
<li>prihod/rashod na "čekanju", tj. nije jos realiziran i ne zbraja
se sa ostalim promjenama 
</li>
<li>transfer s jednog računa na drugi</li>
<li>izvjestaji sa listom svih prihoda/rashoda, i filter prema datumu
koji pokazuje i npr. koliko je bio iznos na nekom računu upravo tog
ranijeg dana. <br>
</li>
<li>izvjestaji po kategorijama prihoda troskova sa filterom za
datume i iznose unutar zadanih datuma. <br>
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
Program se koristi "kakav jest" i autor se ograđuje od svake odgovornosti za eventualnu štetu ili
probleme nastalim korištenjem programa.<br>
Korisnik programa instalacijom i korištenjem privhaća odredbe licence
čiji puni tekst se nalazi <a
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
<li>Moderan browser - Firefox, Opera, Chrome, IE9 najmanje. (IE6 ne radi, to nije moderan browser)</li>
</ul>
<h3>Linux instalacija</h3>
Ukratko:<br />
- Podesiti lamp (linux, apache, mysql i php)
<br />
- Raspakirati sadžaj programa u web root
<br />
- Pokrenuti instalaciju u browseru naredbom: http://localhost/Home-Booking/install/install.php
<br /> &nbsp;&nbsp; pratiti upute za instalaciju, biti ce postavljena baza podataka i konfiguracijske datoteke.
<p>
	Detaljniji opis kao i rješavanje eventualnih problema je <?php echo anchor('help/install','ovdje');  ?>
</p>

<h3>Windows instalacija</h3>
Može se instalirati wamp server koji ima podešen i konfiguriran apache, PHP i MySQL za windows.
<br>Download wamp servera je <a href="http://www.wampserver.com/en/#download-wrapper">ovdje</a>
<br /><br />
 &nbsp; - Nakon instalacije wamp servera, raspakirati program u web root: C:\wamp\www
 <br />&nbsp;- Pokrenuti instalaciju u browseru sa http://localhost/Home-Booking/install/install.php kao na slici 
 <br /><img src="<?php echo base_url(); ?>/help-pictures/install-url.jpg">
 <br />
 Napomena: ne kopirati ovaj link u google! Ništa nećete naštetiti, ali niti postići.
 <br />&nbsp;- Odgovoriti na nekoliko pitanja tokom instalacije
</div>

<p>
<h3>Instalacija na javnom serveru</h3>
Program je moguće koristiti na nekom dijeljenom serveru, ako vam tako odgovara.
<br />Instalira se na sličan način:
<br /> - Raspakirati sadržaj programa u direktorij, tipično <i>public_html</i> ili <i>www</i>
<br /> - U control panelu stvoriti bazu podataka i korisnika baze koji će imati sva prava nad bazom podataka.
<br /> - Pokrenuti instalaciju u browseru, (url bio bi sličan ovome: <i>http://mojadomena.com/home-booking/install/install.php</i>.
 Odgovoriti na postavljena pitanja, tj. upisati odgovarajuće podatke o bazi podataka, vlasniku baze podataka kojeg smo stvorili, 
url aplikacije bi u tom slučaju bio slican ovome: <i>http://mojadomena.com/home-booking/</i>
<br /><br />Naravno, za očekivati je da u takvom okruženju zaštitite pristup podataka autentikacijom koja se može podesiti na Apache serveru.
</p>

<p>
<h3>Credits</h3>
Korišteni su slijedeći programi, platforme i biblioteke:
<ul>
<li>Linux <a href="http://ubuntu.com">Ubuntu</a></li>
<li><a href="http://php.net">PHP</a></li>
<li><a href="http://www.mysql.com/">MySQL</a></li>
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





</div>

</body>
</html>
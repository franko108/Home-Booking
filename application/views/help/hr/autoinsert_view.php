<?php
$language = $this->lang->lang();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="<?php echo base_url(); ?>css/main.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>css/help.css" rel="stylesheet" type="text/css"  />
<title>Vrste uplata/isplata</title>
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

<h1 align="center">Postavljanje automatskog redovnog unosa prihoda ili rashoda</h1>
<p>
Opcija se nalazi na meniju: <i>Matični->fiksni unos</i>.
<br>Sučelje je kao na slici:
<br><img src="<?php echo base_url(); ?>help-pictures/hr/fixedPrihod.png" border="1">
</p>

<p>
Ideja je da prihode ili troškove koji su svaki mjesec identični ne morate ručno svaki mjesec upisivati nego ih postavite na ovom mjestu, a program će kod pokretanja
provjeriti postoje li ovi unosi za tekući mjesec i automatski ubaciti definirane prihode nakon postavljenog datuma u mjesecu.
</p>

<p>
Prvo treba popuniti podatke sa slike:
<ul>
	<li><i>Opis</i> - proizvoljan opis koji će se nalaziti u pregledu ukupnih prihoda i troškova</li>
	<li><i>Iznos</i>, može biti cijeli broj ili decimalni, ako se koristi decimalni, točka je oznaka za decimalno mjesto</li>
	<li><i>Datum u mjesecu za plaćanje</i> - Datum u mjesecu za plaćanje npr. broj 15</li>
	<li><i>Vrsta </i> troška ili prihoda</li>
	<li><i>Račun</i> sa kojega ili na koji će ići uplata/isplata</li>
	<li><i>Valuta</i> kao i vrsta i račun, predefinirani su u matičnim podacima</li>
	<li><i>Prihod ili trošak</i> - ako prebacimo sa prihoda na trošak ili obrnuto, automatski će se ažurirati i odgovarajuća vrsta prihoda ili rashoda</li>
</ul>

<h3>Kako radi</h3>
&nbsp; Program radi na slijedeći način - nakon što popunite potrebne podatke, kod svakog pokretanja programa, provjeriti će se da li postoje već uplate/isplate
u tekućem mjesecu koje odgovaraju definiranom datumu, vrsti (kategoriji uplate/isplate) i iznosu.
<br>Ako je npr. definirana uplata za 14-tog dana u mjesecu, program će kod pokretanja provjeriti da li je datum veći ili jednak definiranom datumu i da li već postoji
takav upis u bazi za tekući mjesec. Ako je takva situacija, pokrenuti će se upisivanje definiranog sadržaja kao prihod ili rashod.   

<br>Napomena: datum je bolje definirati da bude manji od 29-tog u mjesecu, naime, u veljači sa 28 dana, nikada se neće izvršiti ova naredba.
<p>
Kad želimo izmijeniti iznos ili više nemamo potrebu za automatskim unosom (npr. isplatili smo kredit), jednostavno obrišemo definirani unos iz tabele
fiksnih prihoda/rashoda.
<br>Ranije upisani prihodi ili troškovi neće se dirati iz baze nego jednostavno se više neće novi unosi automatski ubacivati.
</p>

<h3>Ograničenja</h3>
Program pokreće ovu provjeru kada se pokrene početna stranica. Ako imate u bookmarku nešto drugo, kao pregled svih prihoda ili rashoda, ili unos prihoda,
program se neće automatski pokrenuti.
<br>U takvom slučaju, eventualno možete na linku pokrenuti provjeru:
<br> <pre>Matični->Fiksni unos->Pokretanje ažuriranja redovnih uplata/isplata</pre>
<p>
Također, ako program ne pokrećete nekoliko mjeseci, neće se raditi provjera za prethodne mjesece. Provjera se uvijek obavlja za tekući mjesec.
<br>Eventualno bi se moglo definirati i timestamp, tj. početak postavljanja automatskih uplata/isplata i usporedbu za čitavo prethodno vrijeme.
<br>Ipak, ako se koristi ovaj program, za očekivati je da će se pokrenuti više puta mjesečno kako bi ažurirali stanje. 
</p>

<p>
&nbsp;</p>


</p>
</div>
</body>
</html>
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

<h1 align="center">Unos prihoda i rashoda</h1>
<p>
	Sučelje za unos prihoda i rashoda dobiva se pozivom na menu <i>Knjiženje->Prihod</i>.
	<br />Polja oznaćena zvjezdicom obavezna su za upis, u ovom slučaju iznos i datum.
	<br />Dakle, Upisujemo opis prihoda ili rashoda, iznos. Datum otvara kalendar sa kojega biramo datum
	koji mora biti u formi <i>dd.mm.gggg</i>
	<br /> Na vrhu kalendara imamo strelice za prethodni mjesec (strelica lijevo) ili idući mjesec (strelica desno).
	<br />
	<br />Ispod toga je padajući izbornik sa podacima definiranim u matičnim podacima, tj. vrsta prihoda ili rashoda,
	sa kojeg računa će biti obavljena isplata odnosno uplata, te valuta.
	<br />Ispod toga je opcija <i>Odgođeno</i> koja će upisanu uplatu/isplatu staviti na "čekanje" i neće još biti zbrojena
	sa ostalim prihodima i rashodima. 
	<br />Za izmjenu ovog statusa, idemo na tabelu gdje su prikazani svi unosi uplata i isplata, idemo na menu <i>Izvještaji->Svi unosi</i> 
	<br />Tabela je detaljnije  opisana 
	<?php echo anchor('help/allRecords','ovdje');  ?>
	<br /><br />
	Isti izgled i princip rada je za unos prihoda kao i za unos rashoda s razlikom da su za prihod ponuđene kategorije koje smo 
	definirali kao vrste prihoda a kod rashoda su prikazane kategorije koje smo definirali kao vrste rashoda.
	<br /><br />Slika 1.
	<br />
	<img src="<?php echo base_url(); ?>/help-pictures/hr/rashod.png" border="1">

</p>


</div>


</body>
</html>
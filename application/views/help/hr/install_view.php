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
<h1 align="center">Instalacija na linuxu</h1>
<h3>Instalacija Apache, PHP, MySQL</h3>
Na većini linux distribucija, instalacija web servera, PHP i MySQL je
jednostavna.<br>
- Na Ubuntu distribuciji dovoljno je upisati naredbu u shell:<br>
<pre>$ sudo tasksel install lamp-server
</pre>
Za vrijeme instalacije, trebati će postaviti root password MySQL. (treba li naglasiti kako je potrebno zapamtiti password)
<br />Na drugim instalacijama je također instalacija jednostavna. Za Debian, dovoljno je označiti u <i>Synaptic</i> pakete: php5-coomon, mysql-server, apache2
 i operativni sustav će podesiti sve instalacije i konfiguracije.

<br><br>
<u>Važna napomena:</u> web server mora imati uključenu opciju tzv. "clean url", kod Apache je to <i>mod_rewrite</i>
<br><br>
- Raspakirati sadržaj programa Home-Booking u root web servera. Na
Debian/Ubutnu je to <i>/var/www</i><br>
Obratite paženju da web server mora imati prava nad sadržajem programa.
Npr. naredba:<br>
<pre>$ sudo chown -R /var/www/Home-Booking</pre>

<br />
Pokretanje set-up kroz url:  <i>http://localhost/home-booking/install/install.php</i>
<br /><br />

<h3>Ručna instalacija aplikacije</h3>
Ako ne uspije instalacija preko browsera, ručno podesite konfiguraciju i restore baze podataka u nekoliko koraka:
<br/ > 
- Napraviti restore baze koja se nalazi u doc/database.sql naredbom:
<pre>
$ mysql -p -u db_username booking < database_empty.sql
</pre> 
<br />
- Podesiti <i>application/config/config.php</i> na liniji br.17 upisati liniju koja je ista kao i nazvani direktorij u kojem se nalazi aplikacija.
<pre>$config['base_url'] = 'http://localhost/Home-Booking/';</pre>
<br /> - Upisati u <i> application/config/database.php</i> odgovarajuće podatke o bazi. Npr.
<pre>$db['default']['username'] = 'your_db_username';
$db['default']['password'] = 'db_password';
$db['default']['database'] = 'booking';
</pre>
Pokrenute browser, upišite maloprije postavljeni link http://localhost/Home-Booking/ i koristite program po volji. 
</p>


</div>
</body>
</html>
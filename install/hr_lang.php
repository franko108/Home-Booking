<?php
$welcome = '<p>Setup proces za program u kojem treba biti postavljena baza podataka i konfiguracija za rad
na programu <b>Home-booking</b> </p>
<p>Welcome to setup process for program <b>Home-booking. Setup is for database and configuraion settings</b></p>';

$language = 'Odaberite jezik instalacije / Please, select the language for installation process';

$fill_out = 'Ispunite tražene podatke';
$license = 'Program je otvorenog koda (open source) pod licencom GPL v.2 i slobodan je za korištenje za osobnu ili komercijalnu upotrebu.<br>
Autor se ograđuje od bilo kakvih posljedica koje mogu nastati korištenjem programa.
<br>Puni tekst licence nalazi se <a href="http://www.gnu.org/licenses/gpl-2.0.html" target="_blank">ovdje</a>
<br>Instalacijom ovog programa podrazumijeva se pristanak na uvjete korištenja iz ove licence.<br>'; 

$writeAccess = 'Napomena: web server mora imati pravo pisanja (read, write, execute) nad direktorijem <br>
Nazivi ne mogu imati razmak, prazna polja, a samo lozinka  može imati znakove koji nisu brojevi ili slova.';

$webServer = 'Naziv ili IP web servera. Na lokalnoj mašini je tipično localhost:';

$sqlServer = 'Naziv ili IP MySQL servera.';
$sqlMore = 'Ako je na istom stroju kao i web server, ostaviti localhost';
$dbUser = 'Naziv database korisnika koji ima pravo stvaranja nove baze (ili stvaranja tabele u postojećoj bazi):';
$dbPasswd = 'Lozinka database korisnika:';
$dbWin = '(napomena za windows korisnike, ako ste tek instalirali wamp server, MySQL lozinka jos nije postavljena.)';
$dbName = 'Naziv baze podataka:';

$noDirectAccess = "Direktni pristup nije dozvoljen, pokrenute instalaciju od početka!";
$db_error = 'GREŠKA !<br> Naziv (ili IP) web servera, MySQL servera i korisnika baze ne mogu biti prazna polja, ako želite da aplikacija radi! ';
$connection_failure = 'Neuspješno spajanje na bazu';
$dbCreated = 'Stvorena baza podataka';
$dbErrorBase =  'Nesupješno stvaranje baze podataka:';
$failure_table = 'Nesuspjesno kreirana tabela:';

$errorOpeningFile = 'Neuspjelo otvaranje konfiguracijske datoteke. Provjerite ima li web server potrebna prava čitanja i pisanja nad cijelim direktorijem.';
$errorWritingFile = 'Neuspjelo zapisivanje konfiguracijske datoteke. Provjerite ima li web server potrebna prava čitanja i pisanja nad cijelim direktorijem.';

$submit = 'Unos';
$back = 'Natrag';

$confEnd = 'Kraj instalacije i konfiguracije.<br>Možete obrisati direktorij install iz programa. Ako se program nalazi 
na dijeljenom serveru, OBAVEZNO to napraviti.';
?>
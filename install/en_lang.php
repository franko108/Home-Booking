<?php
$welcome = '<p>Setup proces za program u kojem treba biti postavljena baza podataka i konfiguracija za rad
na programu <b>Home-booking</b> </p>
<p>Welcome to setup process for program <b>Home-booking</b></p>';

$language = 'Odaberite jezik instalacije / Please, select the language for installation process';

$fill_out = 'Fill required data';
$license = 'Program is open source under the license GPL v.2 and it is free for personal or commercial use. 
<br>
Author can not take any responsibility for any consequence due to program use.
<br>Full license text is <a href="http://www.gnu.org/licenses/gpl-2.0.html" target="_blank">here</a>
<br>
With instalation of this program you are accepting this license.'; 

$writeAccess = 'Note: web server must have read, write, execute permissions on directory
<br>Names can not have a spaces, only password can have non alpha numerical value but without spaces.';

$webServer = 'Name or IP of web server. On local computer is tipically localhost:';

$sqlServer = 'Name or IP of MySQL server;';
$sqlMore = 'If on the same computer as web server, leave localhost';
$dbUser = 'Database user name, must have permission to create a new database (or creating tables in existing database):';
$dbPasswd = 'Password of database user:';
$dbWin = '(note for windows users, if wamp server is just installed, MySQL password is not set.)';
$dbName = 'Database Name:';

$noDirectAccess = "Direct access is not allowed!";
$db_error = 'ERROR ! <br>Name (IP) of web server, MySQL server and database user can not be empty string, if you wish application to work properly!';
$failure_table = 'Failure on creating table';
$connection_failure = 'Could not connect';
$dbCreated = 'Database created'; 
$dbErrorBase =  'Error creating database:';
$failure_table = 'Failure in creating table:';

$errorOpeningFile = 'Could not open config file. Check if web server has read, write access over the complete directory.';
$errorWritingFile = 'Could not write config file. Check if web server has read, write access over the complete directory.';

$submit = 'Submit';
$back = 'Back';

$confEnd = 'Configuration finished <br>You may remove install directory from the root of application. If you are
on the shared server, it is MUST.';
?>
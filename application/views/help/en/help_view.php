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

<h1 align="center">About program</h1>
<p>
Program for evidence of a personal income and expenses.<br>
It doesn't use dual accounting, although it can be adjust for.
<br><br>
Intended to be very simple for use with a several features:

<ul>
<li>Booking of incomes or outcomes from the same interface, <br>
</li>
<li>One or more currencies (defined by user settings), <br>
</li>
<li>One or more accounts (user settings), <br>
</li>
<li>One or more categories of income and outcome (user settings), <br>
</li>
<li>Booking of income or outcome may be on pending. 
It will show different color on reports and amount will not be included in the sumaries.
</li>
<li>Transaction from one account to another,</li>
<li>Various reports according to date of income/outcome, categories, 
search through date of income/outcome. For instance it is shown the amount on account on that earilier date.
</li>
<li> search by description or the categories. <br>
</li>
<li>backup script in sql format. <br>
</li>
</ul>


<div id="license">
<h2>LICENSE</h2>
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
<br><br>
Full license text is
<a href="http://www.gnu.org/licenses/gpl-2.0.html">here</a><br>

<br><br>
Development and maintenance of program run <a href="http://istra-data.org">Istra-Data.</a>
</div>

<div id="inst">

<h2>INSTALLATION</h2>
&nbsp;&nbsp;&nbsp; Latest version of program is here:
<a href="https://github.com/franko108/Home-Booking/zipball/master">https://github.com/franko108/Home-Booking/zipball/master</a><br>
<br>
Program works on PHP/MySQL.<br>
<h3>Requirements</h3>
<ul>
<li>Web server, Apache or any other. Clean url, or mod_rewrite on Apache must be enabled.</li>
<li>MySQL 5</li>
<li>PHP 5.2</li>
<li>OS: Linux (recommended), Windows ili Mac OS</li>
<li>Modern browser - Firefox, Opera, Chrome, IE9 at least. (IE6 doesn't work, it's not a modern browser)</li>
</ul>
<h3>Linux installation</h3>
Short:<br />
- Configure lamp (linux, apache, mysql i php)
<br />
- Unzip program in web root
<br />
- Start with installation: http://localhost/Home-Booking/install/install.php
<br /> &nbsp;&nbsp; follow the instruction for installation, database  and configuration files will be setup.
<p>
	Detailed description and eventual troubleshooting is <?php echo anchor('help/install','here');  ?>
</p>

<h3>Windows installation</h3>
It can be installed wamp server that has configured apache, PHP and MySQL for windows.
<br>Download wamp servera is <a href="http://www.wampserver.com/en/#download-wrapper">here</a>
br>Wamp server shall be started after installation with icon as in the picture:
<br><img src="<?php echo base_url(); ?>/help-pictures/wamp.png">
<br>Check out if <i>rewrite modul</i> is enabled. 
Click on icon as on the picture: Apache -> Apache modules -> <i>rewrite_module </i>  shall be enabled as in the picture:
<br><img src="<?php echo base_url(); ?>/help-pictures/wamp-rewrite.png">
<br>Restart Apache server: click on wamp icon -> Restart All services
<br /><br />
 &nbsp; - After installation of wamp servera, unzip program in web root: C:\wamp\www
 <br />&nbsp;- Start with installation in the browser: http://localhost/Home-Booking/install/install.php as on the picture 
 <br /><img src="<?php echo base_url(); ?>/help-pictures/install-url.jpg">
 <br />
 Note: don't copy this link into the google. Nothing will be damaged, but nothing will be accomplished either.  
  <br />&nbsp;- Answer the questions during setup process.
</div>

<h3>Installation on shared server</h3>
It's possible to use the program on the shared server if convenient.
<br />Installation is on the similar manner:
<br /> - Unzip program in direcotry, typically <i>public_html</i> or <i>www</i>
<br /> - In control panel create database and database user that will have all privileges on that database.
<br /> - Run installacion in browser, (url something like this: <i>http://mydomain.com/home-booking/install/install.php</i>.
 Answer the question, fill information about database name, database user name and password.
  

<br /><br /> Of course, you should protect your data with some authentication, as Apache authentication or so.


<p>
<h3>Credits</h3>
The following programs, platforms and libraries are being used:
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

</div>

</body>
</html>
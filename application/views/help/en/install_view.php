<?php
$language = $this->lang->lang();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="<?php echo base_url(); ?>css/main.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>css/help.css" rel="stylesheet" type="text/css"  />
<title>Linux installation</title>
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
<h1 align="center">Installation on linuxu</h1>
<h3>Installation of Apache, PHP, MySQL</h3>
On the most linux distributions installation of web server, PHP and MySQL is simple.
<br>
- On Ubuntu command in shell:<br>
<pre>$ sudo tasksel install lamp-server
</pre>
During installation process, system will ask you to setup root MySQL password.
(shall we stress out that this password must be remembered)
<br />On most other distributions, installation is also simple.
On Debian, in <i>Synaptic</i> shall be marked: 
 php5-common, mysql-server, apache2
and OS will take care about installation and configuration.

<br><br>
<u>Important:</u> web server must have enabled  "clean url", on Apache is <i>mod_rewrite</i>
<br>At the end of chapter is description of activation rewrite_module for Ubuntu linux.
<br><br>
- Unzip the program in the directory that web server is looking. On Debian/Ubuntu is
<i>/var/www</i><br>
Web server must have read, write, execute privileges over the program directiory.
Command for changing:<br>
<pre>$ sudo chown -R www-data /var/www/Home-Booking</pre>

<br />
Set-up through url:  <i>http://localhost/home-booking/install/install.php</i>
<br>Follow the instruction on the screen.
<br /><br />

<h3>Manual installation of application</h3>
If preferred, or installation from web browser failed, manually configure  application and restore database: 
<br/ > 
- Restore database that is in <i>doc/database.sql</i> with command:
<pre>
$ mysql -p -u db_username booking < database_empty.sql
</pre> 
<br />
- Edit <i>application/config/config.php</i> on line no.17 write url that is the same as the name of directory where application is placed. 
<pre>$config['base_url'] = 'http://localhost/Home-Booking/';</pre>
<br /> - Edit <i> application/config/database.php</i> data about your database. For example:
<pre>$db['default']['username'] = 'your_db_username';
$db['default']['password'] = 'db_password';
$db['default']['database'] = 'booking';
</pre>
Fire browser, with previously setup link as http://localhost/Home-Booking/ and hope that program it will be useful. 
</p>

<h3>Apache clean_url</h3>
<p>
Check if rewrite_module ie enabled if Apache server is used, this is procedure for Ubuntu.
<br>- Command from shell:
<pre>
$ apache2ctl -M
</pre>
- If there is no <i>rewrite_module</i> on the list, command:
<pre>
$ sudo a2enmod rewrite
</pre>
- Edit configuration for  Apache in order that local <i>.htaccess</i> is being used. 
<br>Edit <i>/etc/apache2/sites-enabled/000-default</i> to look like this:
<pre>
DocumentRoot /var/www
   &lt;Directory />
      Options FollowSymLinks
      AllowOverride All
   &lt;/Directory>
   &lt;Directory /var/www/>
      Options Indexes FollowSymLinks MultiViews
      AllowOverride All
      Order allow,deny
      allow from all
   &lt;/Directory>
</pre>
- Restart Apache:
<pre>
$ sudo /etc/init.d/apache2 restart 
</pre>


</p>

</div>
</body>
</html>
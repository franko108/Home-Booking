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

<h1 align="center">Automatic regular insert of income or expense</h1>
<p>
The option is on the menu: <i>Settings->Fixed insert</i>.
<br>The interface is shown below:
<br><img src="<?php echo base_url(); ?>help-pictures/en/fixed_income.png" border="1">
</p>

<p>
The idea is that income and expenses that are identical each month don't have to be manually entered each month, but to define it on this module. 
The program will check for these entries in the current month and automatically insert defined income/outcome after a date that is setup as "Date in the month for payment". 
</p>

<p>
First, the data from the image shall be filled:
<ul>
	<li><i>Description</i> - arbitrary description which will be located in a review of total income and expenses</li>
	<li><i>Amount</i>, may be an integer or decimal, if used decimal, dot is delimiter for the decimal place</li>
	<li><i>Date in the month for payment </i> - The date of the month to pay, eg. number 15</li>
	<li><i>Category input </i> of income or outcome</li>
	<li><i>Account</i>  to be debited or to be pay on</li>
	<li><i>Currency</i> as well as the type and account is predefined in the settings</li>
	<li><i>Income or outcome</i> - if we shift from income to expense or vice versa, automatically will be  updated the appropriate category of income or expense</li>
</ul>

<h3>How does it work</h3>
&nbsp; The program works in the following way - once you fill the necessary information,
each time you start the program, it will check to be sure that already exist income or outcome 
in the current month that match the defined date, category input and the amount.
If there is no such a data, it will be inserted into database.

<br>
For example, if there is defined payment for the 14th day of the month, the program will check at startup if the date is greater than or equal to a defined date and 
whether it already exists such an entry  for the current month.

<br>Note: it's recommended that date is defined to be smaller than the 29th of the month, because in February with 28 days, program will never execute this command.
 
<p>
When we want to change the amount or there is no need for an automatic entry anymore, simply delete defined entry from the table for
fixed income / expense. 

<br>Previously enrolled revenues or costs will not be touched from the database, but simply new entries will not be inserted.
</p>

<h3>Cron job (linux) or scheduled task (windows)</h3>
Another option of automatic enrollment is calling scripts outside of browser, i.e, launch the script from the operating system.

<br>If there is a linux OS, cron job needs to be set up. For example, <i>lynx</i> or any browser shall launch <i>http://localhost/home-booking/hr/autoinsert/check</i>
<br>(where localhost/name is path to program)

<p>
If there is a windows OS, <i>scheduled task</i> may be set to launch the script, for example:
<pre>"C:\Program Files (x86)\Mozilla Firefox\Firefox" http://localhost/home-booking/hr/autoinsert/check</pre>
(instead of firefox, set the path for browser on your computer. Again, localhost/home-booking is path to the program, change it to fit your need).
</p>

<h3>Limitations</h3>
The program launches this check when you start home page.
If there is another path in your bookmark, such as view of all records or something else, program will not automatically update your data.
 
<br>In such a case, you may execute script on link:
<br> <pre>Settings->Fixed insert->Start update of regular income/outcome</pre>
<p>
If you don't run the program for several months, and there is no cron job or scheduled task, there will be no reviews for previous months.
Automatic insert will always run for the current month only.
<br>It's possible to define timestamp, start of setup automatic inserts and checking for previous months.
<br>Still, if this program is in use, it is expected that program will run several times per month in order to update the data.
</p>

<p>
&nbsp;</p>


</p>
</div>
</body>
</html>
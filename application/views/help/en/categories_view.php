<?php
$language = $this->lang->lang();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="<?php echo base_url(); ?>css/main.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>css/help.css" rel="stylesheet" type="text/css"  />
<title>Categories</title>
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

<h1 align="center">Sumaries  by income/outcome categories</h1>
<p>
This report is on the menu: <i>Reports->Categ.reports</i> and shows sum of income or outcome by defined categories.
<br><br>
As on overview of all records,  there is an option of filtering data by its date. 
By default, there are summaries by categories within all available dates.
<br>Bellow the line, there is sum of all income and all outcome divided by the currencies.
<br><br>
Table from picture shows sum overview of income or outcome by the category, click on the table header, we may sort data according to the value in the selected column.

<br>
<br>
<br>
<br>
Slika 1.
<br>
<img src="<?php echo base_url(); ?>/help-pictures/hr/kategorijeIzvj.png" border="1">
</p>
</div>
</body>
</html>
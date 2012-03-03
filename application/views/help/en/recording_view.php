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
	Booking of income and outcome is get from the menu <i>Booking - Income</i>
	<br />The fields marked with asteriks are required, in that case, amount and date.
	<br />Fill description of income/outcome, amount, date picker is available with calendar
	<br /> On top of calendar are arrows for previous/next month.
	<br />
	<br />Bellow is list with data defined in settings, categories of income or outcome, accounts and currencies.
	<br /> There is an option <i>Panding</> that income or outcome will put on “pending” and will not be in the summary with all others income or outcome. 
	<br />For editing of booking data, go to menu <i>Reports – All records</i>. 
	<br />Description of that table is : 
	<?php echo anchor('help/allRecords','here');  ?>
	<br /><br />
	Same gui and princip is for income entry as for outcome entry. For income 
will be list of categories defined as income categories, and for outcome as outcome catogires.
	<br /><br />Picture 1.
	<br />
	<img src="<?php echo base_url(); ?>/help-pictures/en/rashod.png" border="1">

</p>


</div>


</body>
</html>
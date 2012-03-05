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

<h1 align="center">All records view</h1>

<p>Table with overview of all incomes and outcomes is available from the menu: <i>Reports - All records </i>
<br><br>
All records are shown by default, and there is possibility to filter it by date.
If we pick date from 2012/02/02 – 2012/03/03 data beween thoe two dates will be shown and 
<i>Bill state:</i> at 2012/03/03  for all accounts.
<br>
<br>
<br>One page has 25 rows by default, it may be changed on 10, 25 or 50 rows on the table.
Bellow is pagination.
<br>Click on the header sorts the data by date, amount or description and so one.
<br><br>
Income or outcome that is on the pending has a red font color and that amount isn't summarized by the other incomes or outcomes.


<br><br>Picture 1 
<br><img src="<?php echo base_url(); ?>/help-pictures/en/allRecords.png" border="1">
</p>
</div>
</body>
</html>
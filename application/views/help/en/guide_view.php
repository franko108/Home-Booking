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

<h1 align="center">Use of program</h1>
<p>
	After successful installation, program is ready to be used.
<br />First is necessary to put the settings data, accounts, currency, category of income and outcome.
Without these data, booking of income/outcome is not possible.
<br />
<h3>Input and edit of currency</h3>
On the picture 1 is interface with overview of entered values for currency/currencies. At least one currency must be exist..
We may choose default currency for input of income or outcome.

<br />Bellow is the table with overview of currencies with options for editing and deleteing the currency.
However, the currency that is being used in booking can't be deleted.
<br ><br >
Picture 1.
<br >
<img src="<?php echo base_url(); ?>/help-pictures/en/currency.png" border="1"></img>
</p>

<div id="rn">
<h3>Input and edit of accounts</h3>
Picture 2 shows the form for input and editing of accounts. At least one account must exist, there is no limit for number of accounts. 
One account can be default for income or outcome.
<br />Bellow is the table with overview of accounts with options for editing and deleteing the account.
<br />It account is  used in booking can't be deleted.I
<br /><br />
Picture 2.
<br />
<img src="<?php echo base_url(); ?>/help-pictures/en/accounts.png" border="1">

</div>

<div id="vrste">
<h3>Input and edit of category of input and output</h3>
Picture 3 shows the form for input and editing of categories for income and outcome. At least one category for income and one for outcome must exist. 

<br />Bellow is the table with overview of accounts with options for editing and deleteing the category.

<br /><br />
Picture 3.
<br />
<img src="<?php echo base_url(); ?>/help-pictures/en/category.png" border="1">

</div>


</div>
</body>
</html>
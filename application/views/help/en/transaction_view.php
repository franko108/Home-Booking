<?php
$language = $this->lang->lang();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="<?php echo base_url(); ?>css/main.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>css/help.css" rel="stylesheet" type="text/css"  />
<title>Transfers</title>
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

<h1 align="center">Transaction</h1>
<p>
Transaction from one accounts to another. Clik on the menu <i>Booking - Transaction</i>
<br>- Choose the date
<br>- Fill the amount
<br>- Choise of currency
<br>- Choise from which account we take the money, and on which transaction goes.

<br /><br />Bellow is the table with previously made transfers with option for edit or delete transaction.

<br /><br />Picture 1.
	<br />
	<img src="<?php echo base_url(); ?>/help-pictures/en/transfer.png" border="1">
</p>
</div>
</body>
</html>
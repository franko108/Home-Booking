<?php 
$language = $this->lang->lang();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="<?php echo base_url(); ?>css/main.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>css/calendar.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url()."/js/".$language; ?>/calendar.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/js/jquery.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>/js/jquery.tablesorter.js"></script> 
<script type="text/javascript">
$(document).ready(function() { 
    // call the tablesorter plugin 
    $("#myTable").tablesorter({ 
        // sort on the first column , order desc 
        sortList: [[0,1]] 
    }); 
}); 
</script>
<title><?php echo lang('transaction'); ?></title>
</head>
<body>
<br />

<h1 align="center"><?php echo lang('transaction_records'); ?></h1>

<div class="form">
<br />
<?php echo form_open($action); ?>

	<?php echo form_hidden('language', $language); // just because of different date format
		  echo form_hidden('id', $id);
	?>

	<p><label for="inputDate"><?php echo lang('booking_date'); ?>:<span class="required"> *</span></label>
	<a href="javascript:void(0);" onclick="displayDatePicker('inputDate');"><img src="<?php echo base_url(); ?>/pictures/calendar.png" alt="calendar" border="0"></a>
		<input id="inputDate" type="text" name="inputDate" onclick="displayDatePicker('inputDate');" class="text" value="<?php echo set_value('inputDate', $inputDate); ?>"/>
		<?php echo form_error('inputDate','<div>','</div>'); ?>
	</p>
	
	<p><label for="transaction_amount"><?php echo lang('booking_amount'); ?>:<span class="required"> *</span></label>                                
		<input id="transaction_amount" type="text" name="transaction_amount" value="<?php echo set_value('transaction_amount', $transaction_amount); ?>" />
		<?php echo form_error('transaction_amount','<div>','</div>'); ?>
	</p>
	
	<p>
	<label for="currency"><?php echo lang('booking_currency'); ?>:</label> 
		<?php
			echo form_dropdown('currency', $curr_options, $default_currency);
		?>
	</p>
	
	<p>
		<label for="outAccount"><?php echo lang('transaction_out'); ?></label> 
		<?php
			echo form_dropdown('outAccount', $acc_options, $outcome_account);
		?>
		= >
		
		<label for="inAccount"><?php echo lang('transaction_in'); ?></label> 
		<?php
			echo form_dropdown('inAccount', $acc_options, $income_account); 
		?>
	</p>
	                                    
	<p>
	<?php echo form_submit( 'submit', lang('submit')); 
	?>
	<input type="button" onClick="location='<?php echo base_url()."".$language; ?>/booking/transaction' " value="<?php echo lang('cancel')?>">
	</p>

<?php echo form_close(); ?>
	 
</div>

</body>
</html>
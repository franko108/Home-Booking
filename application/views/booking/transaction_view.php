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
<title>Transaction</title>
</head>
<body>
<br />

<h1 align="center"><?php echo lang('transaction_records'); ?></h1>

<div class="form">
<br />
<?php echo form_open($action); ?>

	<?php echo form_hidden('language', $language); // just because of different date format?>

	<p><label for="inputDate"><?php echo lang('booking_date'); ?>:<span class="required"> *</span></label>
	<a href="javascript:void(0);" onclick="displayDatePicker('inputDate');"><img src="<?php echo base_url(); ?>/pictures/calendar.png" alt="calendar" border="0"></a>
		<input id="inputDate" type="text" name="inputDate" onclick="displayDatePicker('inputDate');" class="text" value=""/>
	</p>
	
	<p><label for="booking_amount"><?php echo lang('booking_amount'); ?>:<span class="required"> *</span></label>                                
		<input id="booking_amount" type="text" name="booking_amount" value=""  />
		<?php echo form_error('booking_amount','<div>','</div>'); ?>
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
			echo form_dropdown('outAccount', $acc_options, $default_accounts);
		?>
		= >
		
		<label for="inAccount"><?php echo lang('transaction_in'); ?></label> 
		<?php
			echo form_dropdown('inAccount', $acc_options, $default_accounts); 
		?>
	</p>
	                                    
	<p>
	<?php echo form_submit( 'submit', lang('submit')); 
	?>
	<input type="button" onClick="location='<?php echo base_url()."".$language; ?>/booking/booking/all_records' " value="<?php echo lang('cancel')?>">
	</p>

<?php echo form_close(); ?>

<hr />

<table id="myTable" class="tablesorter" border="1" cellspacing="1" width="1024 px"> 
<thead> 
<tr> 
    <th><?php echo lang('booking_date'); ?></th> 
    <th><?php echo lang('booking_description'); ?></th>
    <th><?php echo lang('accounts_name'); ?></th> 
    <th><?php echo lang('booking_amount'); ?></th> 
    <th>&nbsp;</th>
</tr> 
</thead> 
<tbody> 
	<?php 
	foreach($transaction_query->result() as $res){

		// "income" or "outcome" are parts of transcation
		if($res->outcome > 0){
			echo "<td>$res->dateEntry</td><td>$res->description</td><td>$res->myaccount => ";	
		}
		else {
			echo "$res->myaccount</td><td>$res->income $res->currency_name</td>";
			echo "<td>";
			echo anchor('booking/transaction/edit/'.$res->transaction, 'Update',  array('class'=>'update')) .'|' ;
			echo anchor('booking/transaction/delete/'.$res->transaction, 'Delete' , array('class'=>'delete','onclick'=>"return confirm('Delete $res->description $res->dateEntry ? ')"));
			echo "</td>
		</tr>";
		}
		
	}
	?>
</tbody>
</table>	 
</div>

</body>
</html>
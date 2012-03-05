<?php 
$language = $this->lang->lang();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="<?php echo base_url(); ?>css/main.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>css/tcal.css" rel="stylesheet" type="text/css"  />
<script type="text/javascript" src="<?php echo base_url()."/js/".$language; ?>/tcal.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/js/jquery.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>/js/jquery.tablesorter.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>/js/jquery.tablesorter.pager.js"></script>
<script type="text/javascript">
$(function() {
    $("#myTable")
        .tablesorter({widthFixed: true, widgets: ['zebra'],
        	dateFormat: 'dd.mm.yyyy',
            headers: {0:{sorter:'hrdate'}}
         }) ;
});

// check if transaction from and to accounts are the same
function checkAcc(msg) {
	
	var outAcc, inAcc;
	outAcc    = document.getElementById('outAccount').value;
	inAcc     = document.getElementById('inAccount').value;

	// same acount from and into value, continue ?	
	if(inAcc == outAcc){
		if (confirm(msg)) {
			return TRUE;
        }
        else {
            return false;
        }
	}

}
</script>
<title><?php echo lang('transaction'); ?></title>
</head>
<body>
<br />

<h1 align="center"><?php echo lang('transaction_records'); ?></h1>

<div class="form">
<br />
<?php
$msg = lang('same_acc'); // message - question about same account
$js = array('onSubmit' =>"return checkAcc('$msg');");  
echo form_open($action, $js);

// <form  action="transaction/add" method="post" name=submitform onSubmit="return checkAcc()">
	 echo form_hidden('language', $language); // just because of different date format
	 echo form_hidden('id', $id);  // for edit only
?>

	<p><label for="inputDate"><?php echo lang('booking_date'); ?>:<span class="required"> *</span></label>
	<input type="text" name="inputDate" class="tcal" size="9" value="<?php echo set_value('inputDate'); ?>" >
	
	</p>
	
	<p><label for="transaction_amount"><?php echo lang('booking_amount'); ?>:<span class="required"> *</span></label>                                
		<input id="transaction_amount" type="text" name="transaction_amount" value=""  />
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
			$js = 'id="outAccount" ';
			echo form_dropdown('outAccount', $acc_options, $default_accounts, $js);
		?>
		= >
		
		<label for="inAccount"><?php echo lang('transaction_in'); ?></label> 
		<?php
			$js = 'id="inAccount" ';
			echo form_dropdown('inAccount', $acc_options, $default_accounts, $js); 
		?>
	</p>
	                                    
	<p>
	<?php echo form_submit( 'submit', lang('submit')); 
	?>
	
	</p>

<?php echo form_close(); ?>

<hr />

<table id="myTable" class="tablesorter" border="1" cellspacing="1" width="1020 px"> 
<thead> 
<tr> 
    <th id="hrdate"><?php echo lang('booking_date'); ?></th> 
    <th><?php echo lang('booking_description'); ?></th>
    <th><?php echo lang('accounts_name'); ?></th> 
    <th><?php echo lang('booking_amount'); ?></th>
    <th>&nbsp;</th> 
    <th>&nbsp;</th>
</tr> 
</thead> 
<tbody> 
	<?php 
	foreach($transaction_query->result() as $res){

		// "income" or "outcome" are parts of transaction
		if($res->outcome > 0){
			echo "<td>$res->dateEntry</td><td>$res->description</td><td>$res->myaccount => ";	
		}
		else {
			echo "$res->myaccount</td><td>$res->income</td><td>$res->currency_name</td>";
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
<?php 
$language = $this->lang->lang();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="<?php echo base_url(); ?>css/main.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>css/tcal.css" rel="stylesheet" type="text/css"  />
<script type="text/javascript" src="<?php echo base_url(); ?>js/<?php echo $language; ?>/numbersonly.js"></script>
<title><?php echo lang('autoinsert_header'); ?></title>
<script type="text/javascript">
function showCategories(in_out) {
	
	if (window.XMLHttpRequest) 	{
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else {
		// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
		xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
		}
	}
		xmlhttp.open("GET","<?php echo base_url().''.$language; ?>/autoinsert/categories/"+in_out+"/1",true);
		xmlhttp.send();
}
</script>
</head>
<body>
<br />
<h1 align="center"><?php echo lang('autoinsert_header'); ?></h1>
<div class="form0">
<br />
<form  action="<?php echo base_url().''.$language.'/'.$action; ?>" method="post" name=submitform onSubmit="return checkFields()">
<?php     
	// because of different date format
	echo form_hidden('language', $language); 
	echo form_hidden('id', $id);
?>
		  
	<p><label for="booking_description"><?php echo lang('booking_description'); ?><span class="required"> *</span></label>                                
		<input id="booking_description" type="text" name="booking_description" value="<?php echo set_value('booking_description', $booking_description); ?>"  />
		<?php echo form_error('booking_description','<div>','</div>'); ?>
	</p>
	<p><label for="booking_amount"><?php echo lang('booking_amount'); ?><span class="required"> *</span></label>                                
		<input id="booking_amount" type="text" name="booking_amount" value="<?php echo set_value('booking_amount', $booking_amount); ?>"  />
		<?php echo form_error('booking_amount','<div>','</div>'); ?>
	</p>
	
	<p><label for="day_in_month"><?php echo lang('day_in_month'); ?><span class="required"> *</span></label>
 		<input  id="day_in_month" type="text" name="day_in_month"  size="9" value="<?php echo set_value('day_in_month', $day_in_month); ?>" onkeypress="return numbersonly(this, event)">
 		<?php echo form_error('day_in_month','<div>','</div>'); ?>
 	</p>
 	
	<div id="txtHint">
		<p><label for="input_group"><?php echo lang('booking_input'); ?>: </label> 
			<?php
				echo form_dropdown('input_group', $input_options, $default_input); 
			?>
		</p>
	</div>
	<p>
	<label for="accounts"><?php echo lang('booking_accounts'); ?>: </label> 
		<?php
			echo form_dropdown('accounts', $acc_options, $default_accounts);  
		?>
	</p>
	<p>
	<label for="currency"><?php echo lang('booking_currency'); ?>: </label> 
		<?php
			echo form_dropdown('currency', $curr_options, $default_currency); 
		?>
	</p>
	
	<p>
	<label for="income_outcome"><?php echo lang('cat_income'); ?>
		<input type="radio" name="income_outcome" value="1" <?php if($income_outcome == 1) {echo "checked";}?> onChange="showCategories(this.value)"><br>
	</label>
	<label for="income_outcome"><?php echo lang('cat_outcome'); ?>
		<input type="radio" name="income_outcome" value="0" <?php if($income_outcome == 0) {echo "checked";}?> onChange="showCategories(this.value)">
	</label>
	</p>
	                                    
	<p>
	<?php echo form_submit( 'submit', lang('submit')); 	?>
	<input type="button" onClick="location='<?php echo base_url()."".$language; ?>/autoinsert' " value="<?php echo lang('cancel')?>">
	</p>

</form>

</div>
</body>
</html>
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
<title><?php echo lang('autoinsert_header'); ?></title>
</head>
<body>
<br />

<h1 align="center"><?php echo lang('autoinsert_header'); ?></h1>
<div class="form0">


<br />
<?php     

echo form_open($action); 
	 
	
	echo form_hidden('language', $language); // just because of different date format ?>
		  
	<p><label for="booking_description"><?php echo lang('booking_description'); ?></label>                                
		<input id="booking_description" type="text" name="booking_description" value="<?php echo set_value('booking_description'); ?>"  />
		<?php echo form_error('booking_description','<div>','</div>'); ?>
	</p>
	<p><label for="booking_amount"><?php echo lang('booking_amount'); ?><span class="required"> *</span></label>                                
		<input id="booking_amount" type="text" name="booking_amount" value="<?php echo set_value('booking_amount'); ?>"  />
		<?php echo form_error('booking_amount','<div>','</div>'); ?>
	</p>
	<p><label for="inputDate"><?php echo lang('booking_date'); ?><span class="required"> *</span></label>
 <input type="text" name="inputDate" class="tcal" size="9" value="<?php echo set_value('inputDate'); ?>" >
 		<?php echo form_error('inputDate','<div>','</div>'); ?>

	                                
		
	</p>
	
	<p><label for="inputGroup"><?php echo lang('booking_input'); ?>: </label> 
		<?php
			echo form_dropdown('inputGroup', $input_options); 
		?>
	</p>
	<p>
	<label for="accounts"><?php echo lang('booking_accounts'); ?>: </label> 
		<?php
			echo form_dropdown('accounts', $acc_options);  
		?>
	</p>
	<p>
	<label for="currency"><?php echo lang('booking_currency'); ?>: </label> 
		<?php
			echo form_dropdown('currency', $curr_options); 
		?>
	</p>
	
	<p><label for="income_outcome"><?php echo lang('cat_income'); ?>                                
		<?php  echo form_radio('income_outcome', '1'); ?>
		</label>
		<br>
		<label for="income_outcome"><?php echo lang('cat_outcome'); ?></label>
		<?php  echo form_radio('income_outcome', '0', TRUE); ?>
	</p>
	                                    
	<p>
	<?php echo form_submit( 'submit', lang('submit')); 
	?>
	<input type="button" onClick="location='<?php echo base_url()."".$language; ?>/booking/booking/all_records' " value="<?php echo lang('cancel')?>">
	</p>

<?php echo form_close(); ?>
</div>
</body>
</html> 
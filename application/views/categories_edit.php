<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="<?php echo base_url(); ?>css/main.css" rel="stylesheet" type="text/css" />
<title>Currency</title>
</head>
<body>
<br />

<h1 align="center"><?php echo lang('categories_entry')?></h1>
<div class="form">
<?php     

echo form_open($action); ?>

	<?php echo form_hidden('id', $id); ?>
	<p><label for="name"><?php echo lang('categories_name'); ?><span class="required">*</span></label>                                
		<input id="name" type="text" name="name" value="<?php echo set_value('name', $name); ?>" size="40">
		<?php echo form_error('name','<div>','</div>'); ?>
		
	</p>
	<p>                                
		<?php  
			$income_label  = lang('cat_income');  // can't be put directly into form_label ....!%&)#
			$outcome_label = lang('cat_outcome');
			if($in_out == 1){
				echo form_label("$income_label", 'income_outcome');
				echo form_radio('income_outcome', '1', TRUE);
				
				echo "<br />".form_label("$outcome_label", 'income_outcome');
				echo form_radio('income_outcome', '0');
			}
			else {
				echo form_label("$income_label", 'income_outcome');
				echo form_radio('income_outcome', '1');
				
				echo "<br />".form_label("$outcome_label", 'income_outcome');
				echo form_radio('income_outcome', '0' , TRUE);
			}
		 ?>
		<?php // echo form_error('deff','<div>','</div>'); ?>
	</p>
	                                    
	<p>
	<?php echo form_submit( 'submit', lang('submit'));  
	$language = $this->lang->lang();
	?>
	<input type="button" onClick="location='<?php echo base_url()."/".$language; ?>/categories' " value="<?php echo lang('cancel')?>">
	</p>

<?php echo form_close(); ?>
</div>
</body>
</html> 
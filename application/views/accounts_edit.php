<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="<?php echo base_url(); ?>css/main.css" rel="stylesheet" type="text/css" />
<title><?php echo lang('accounts'); ?></title>
</head>
<body>
<br />

<h1 align="center"><?php echo lang('accounts_entry')?></h1>
<div class="form0">
<?php     
$language = $this->lang->lang();

echo form_open($action); ?>

	<?php echo form_hidden('id', $id); ?>
	<p><label for="name"><?php echo lang('accounts_name'); ?><span class="required">*</span></label>                                
		<input id="name" type="text" name="name" value="<?php echo set_value('name', $name); ?>"  
		><?php echo form_error('name','<div>','</div>'); ?>
		
	</p>
	
	<p><label for="deff"><?php echo lang('default');?></label> 
		<?php
		if($deff == 1) {
			echo form_checkbox('deff', '1', TRUE);
		} 
		else {
			echo form_checkbox('deff', '1');
		}
		?>
	</p>
	                                    
	<p>
	<?php echo form_submit( 'submit', lang('submit')); 
	 
	$language = $this->lang->lang();  // giving back the language that is in use
	?>
	<input type="button" onClick="location='<?php echo base_url()."".$language; ?>/accounts' " value="<?php echo lang('cancel')?>">
	</p>

<?php echo form_close(); ?>
</div>
</body>
</html> 
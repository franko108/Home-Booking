<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="<?php echo base_url(); ?>css/main.css" rel="stylesheet" type="text/css" />
<title>Currency</title>
</head>
<body>
<?php include('header.php');?>
<br />
<h1>Currency Entry</h1>
<?php     

echo form_open('currency/add'); ?>

	<p><label for="name">Name<span class="required">*</span></label>                                
		<input id="name" type="text" name="name" value="<?php echo set_value('name'); ?>"  />
		<?php echo form_error('name','<div>','</div>'); ?>
	</p>
	
	<p><label for="deff">Default</label>                                
		<input id="deff" type="checkbox" name="deff" value="1"  />
		<?php // echo form_error('deff','<div>','</div>'); ?>
	</p>
	                                    
	<p>
	<?php echo form_submit( 'submit', 'Submit'); ?>
	</p>

<?php echo form_close(); ?>
<hr>
<?php echo $table; ?>

</body>
</html> 
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="<?php echo base_url(); ?>css/main.css" rel="stylesheet" type="text/css" />
<title><?php echo lang('categories'); ?></title>
</head>
<body>
<br />
<h1 align="center"><?php echo lang('categories_entry');?></h1>


<div class="form0">
<?php     
$language = $this->lang->lang();

echo form_open('categories/add'); ?>

	<p><label for="name"><?php echo lang('categories_name'); ?><span class="required">*</span></label>                                
		<input id="name" type="text" name="name" value="<?php echo set_value('name'); ?>" size="40" />
		<?php echo form_error('name','<div>','</div>'); ?>
	</p>
	
	<p><label for="income_outcome"><?php echo lang('cat_income'); ?></label>                                
		<?php  echo form_radio('income_outcome', '1'); ?>
		<br>
		<label for="income_outcome"><?php echo lang('cat_outcome'); ?></label>
		<?php  echo form_radio('income_outcome', '0', TRUE); ?>
		<?php // echo form_error('deff','<div>','</div>'); ?>
	</p>
	                                    
	<p>
	<?php echo form_submit( 'submit', lang('submit')); ?>
	</p>

<?php echo form_close(); ?>
<hr>
</div>
<div class="form">
<?php echo $table; ?>

</div>

</body>
</html> 
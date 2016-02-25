<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="<?php echo base_url(); ?>css/superfish.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>css/header.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>css/main.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/hoverIntent.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/superfish.js"></script>

<script type="text/javascript">

// initialise plugins
jQuery(function(){
	jQuery('ul.sf-menu').superfish();
});

</script>
</head>
<body>
<div class="column1">
	<?php 
	echo anchor($this->lang->switch_uri('hr'),'Hrvatski')."<br />";
	echo anchor($this->lang->switch_uri('en'),'English');
	?>
</div>
<div class="column2">	

	<input type=hidden name=arav value="4*#*#*3*#*#*2*#*#*2*#*#*1">
	
	
	
	<ul class="sf-menu" id='nav'>
	
		<li><a href='#'><?php echo lang('menu_settings'); ?></a>
			<ul>
				<li><?php echo anchor('currency',lang('menu_currency'));  ?></li>
				<li><?php echo anchor('accounts',lang('menu_accounts'));  ?></li>
				<li><?php echo anchor('categories',lang('menu_category'));  ?></li>
				<li><?php echo anchor('autoinsert',lang('menu_autoinsert'));  ?></li>
			</ul>
		</li>	
			
		
		<li><a href='#'><?php echo lang('menu_booking');  ?></a>
			<ul>
				<li><?php echo anchor('booking/booking/in/1',lang('menu_income'));  ?></li>
				<li><?php echo anchor('booking/booking/in/0',lang('menu_outcome'));  ?></li>
				<li><?php echo anchor('booking/transaction/',lang('menu_transaction'));  ?></li>
			</ul>
		</li>
		
		<li><a href='#'><?php echo lang('menu_reports'); ?></a>
			<ul>
				<li><?php echo anchor('booking/booking/all_records',lang('menu_all_records'));  ?></li>
				<li><?php echo anchor('booking/booking/category_sum',lang('menu_category_reports'));  ?></li>
			</ul>
		</li>
		
		<li><?php echo anchor('help',lang('menu_help'));  ?>
			<ul>
				<li><?php echo anchor('backup', 'Back up');  ?></li>
			</ul>
			
		</li>
		
	</ul>	
	
</div>
<div class="column3">
	
<?php
	// search option
	$language = $this->lang->lang(); 
	echo form_open(base_url().''.$language.'/booking/booking/search'); 
	
	echo form_hidden('language', $language); 
?>
	
	<input class="transparent" type="text" name="search" size="11" height="15" placeholder="Search" onclick="clickclear(this, 'Search')" onblur="clickrecall(this, 'Search')" />
	<a href="javascript: submitform()"></a>
<?php echo form_close(); ?>

</div>
<br /><br />

</body>
</html>
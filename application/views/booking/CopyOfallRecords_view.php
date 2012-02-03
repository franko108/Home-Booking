<?php 
$language = $this->lang->lang();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="<?php echo base_url(); ?>css/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>/js/jquery.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>/js/jquery.tablesorter.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>/js/jquery.tablesorter.pager.js"></script>
 <script type="text/javascript">
$(document).ready(function() { 
    // call the tablesorter plugin 
    $("#myTable").tablesorter({	dateFormat: 'dd.mm.yyyy', headers: { 0:{sorter:'hrdate'}}
        
    }); 
}); 
</script>
<script type="text/javascript">
$(document).ready(function() { 
    $("#myTable")
    .tablesorter({widthFixed: true, widgets: ['zebra']}) 
    .tablesorterPager({container: $("#pager")}); 
}); 

</script>
<title>Booking</title>
</head>
<body>
<br />

<h1 align="center"><?php echo lang('review_records'); ?></h1>

<i><?php echo lang('acc_state');?></i>
<br>
 <?php 
	foreach ($account_amount_query->result() as $row) {
		echo "<u>- $row->myaccount = $row->amount $row->currency_name<br></u>";	
	}

	// echo "<div class='form1'>";
	
	 ?>

<script type="text/javascript">


</script>
<table id="myTable" class="tablesorter" border="1" cellspacing="1" width="1024 px"> 
<thead> 
<tr> 
    <th id="hrdate"><?php echo lang('booking_date'); ?></th> 
    <th><?php echo lang('booking_description'); ?></th> 
    <th><?php echo lang('category_name'); ?></th> 
    <th><?php echo lang('cat_income'); ?></th> 
    <th><?php echo lang('cat_outcome'); ?></th> 
    <th><?php echo lang('accounts_name'); ?></th>
    <th><?php echo lang('booking_pending'); ?></th>
    <th>&nbsp;</th>
</tr> 
</thead> 
<tbody> 
	<?php 

	foreach($query->result() as $res){
		
		// income or outcome value -for editing ?
		if($res->income){
			$in_out = 1;
		}
		else {
			$in_out = 0;
		}
		
		if($res->pending == 1){
			echo "<tr class='required'>";
		}
		else {
			echo "<tr>";
		}
		
		echo "
			<td id='hrdate'>$res->dateEntry</td><td>$res->description</td><td>$res->type</td><td>$res->income</td><td>$res->outcome</td><td>$res->myaccount</td>";
			if($res->pending == 1){
				$yes = lang('yes');
				echo "<td>$yes</td>";	
			}
			else {
				echo "<td></td>";
			}
			
			echo "<td>";
			echo anchor('booking/booking/edit/'.$in_out.'/'.$res->id, 'Update',  array('class'=>'update')) .'|' ;
			echo anchor('booking/booking/delete/'.$res->id, 'Delete' , array('class'=>'delete','onclick'=>"return confirm('Delete $res->description $res->dateEntry ? ')"));
			echo "</td>
		</tr>";
	}
	?>
</tbody>
</table>	
<br /><br />
<div id="pager" class="pager" >
	<form>
	<img class="first" src="<?php echo base_url(); ?>pictures/first-icon.png">
	<img class="prev" src="<?php echo base_url(); ?>pictures/prev-icon.png">
	<input class="pagedisplay" type="text">
	<img class="next" src="<?php echo base_url(); ?>pictures/next.png">
	<img class="last" src="../addons/pager/icons/last.png">
	<select class="pagesize">
	<option value="30" selected="selected">30</option>
	<option value="50">50</option>
	<option value="100">100</option>
	</select>
	</form>
</div> 
</div>
</body>
</html>
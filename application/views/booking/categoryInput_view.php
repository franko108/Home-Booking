<?php
$language = $this->lang->lang();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="<?php echo base_url(); ?>css/main.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>css/tcal.css" rel="stylesheet" type="text/css"  />
<script type="text/javascript" src="<?php echo base_url(); ?>/js/jquery.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>/js/jquery.tablesorter.js"></script> 
<script type="text/javascript" src="<?php echo base_url()."/js/".$language; ?>/tcal.js"></script>
<script type="text/javascript">
$(document).ready(function() { 
    // call the tablesorter plugin 
    $("#myTable").tablesorter({ 
        // sort on the first column and third column, order asc 
       //  sortList: [[0,0],[2,0]] 
    }); 
}); 

</script>
<title><?php echo lang('category_records'); ?></title>
</head>
<body>
<br />

<h1 align="center"><?php echo lang('category_income');?>:</h1>
<div>
<?php     
echo form_open('booking/booking/category_sum'); ?>
<span class="back_blue"><h2><?php echo lang('change_date'); ?>:</h2></span> 
<label for="dateFrom"><?php echo lang('date_from'); ?>
 <input  type="text" name="dateFrom" class="tcal" size="9" value="">



 <label for="dateTo"><?php echo lang('date_to'); ?>
 <input  type="text" name="dateTo" class="tcal" size="9" value="" >

<?php 
	echo form_submit( 'submit', lang('submit')); 
	echo form_close(); 
?>
</div>

<hr>
<div class="sum">
	<table>
	
	<?php 
		foreach ($sum_query->result() as $row) {
			echo "<tr><td><b>".lang('total_income')." =  $row->total_income $row->currency_name </b>&nbsp; &nbsp;</td> 
			<td><b>|  &nbsp; ".lang('total_outcome')." = $row->total_outcome $row->currency_name </b></td></trr>";	
		}
	 ?>
	 </table>
</div>


<i><?php echo lang('view_all');?>: <?php echo "$minDate - $maxDate"; ?></i>

<table id="myTable" class="tablesorter" border="1" cellspacing="1" width="1024 px"> 
<thead> 
<tr> 
    <th><?php echo lang('category');?></th> 
    <th><?php echo lang('sum_income');?></th> 
    <th><?php echo lang('sum_outcome');?></th> 
    <th><?php echo lang('currency');?></th> 
</tr> 
</thead> 
<tbody> 
	<?php 

	foreach($category_sum_query->result() as $res){
		echo "<tr>
			<td>$res->input_category</td><td>$res->sum_income</td><td>$res->sum_outcome</td><td>$res->currency_name</td></tr>";
	}
	?>
</tbody>
</table>

</body>
</html>
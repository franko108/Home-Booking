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
<script type="text/javascript">
$(document).ready(function() { 
    // call the tablesorter plugin 
    $("#myTable").tablesorter({ 
        // sort on the first column  order desc 
        sortList: [[0,1]] 
    }); 
}); 

</script> 
<title><?php echo lang('search_result'); ?></title>


</head>
<body>
<br />
<h1 align="center"><?php echo lang('search_result'); ?></h1>


<table id="myTable" class="tablesorter" border="1" cellspacing="1" width="1024 px"> 
<thead> 
<tr> 
    <th><?php echo lang('booking_date'); ?></th> 
    <th><?php echo lang('category_name'); ?></th> 
    <th><?php echo lang('booking_description'); ?></th> 
    <th><?php echo lang('cat_income'); ?></th> 
    <th><?php echo lang('cat_outcome'); ?></th>
    <th><?php echo lang('currency') ;?></th> 
    <th>&nbsp;</th>
</tr> 
</thead> 
<tbody> 
	<?php 

	foreach($query_search->result() as $res){
		$income = $res->income;
		$outcome = $res->outcome;
		// income or outcome ?
		if($income){
			$in_out = 1;
		}
		else {
			$in_out = 0;
		}
		
		echo "<tr>
				<td>$res->dateEntry</td><td>$res->name</td><td>$res->description</td><td>$res->income</td><td>$res->outcome </td>
				<td>$res->currency</td>";
		
		echo "<td>";
		echo anchor('booking/booking/edit/'.$in_out.'/'.$res->id, 'Update',  array('class'=>'update')) .'|' ;
        echo anchor('booking/booking/delete/'.$res->id, 'Delete' , array('class'=>'delete','onclick'=>"return confirm('Delete $res->description $res->dateEntry ? ')"));
        echo "</td>";		
		echo "</tr>";
			
	}
	?>
</tbody>
</table>




</body>
</html> 
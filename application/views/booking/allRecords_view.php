<?php
$language = $this->lang->lang();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="<?php echo base_url(); ?>css/main.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>css/tcal.css" rel="stylesheet" type="text/css"  />
<script type="text/javascript" src="<?php echo base_url(); ?>/js/jquery-latest.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/js/jquery.tablesorter.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/js/jquery.tablesorter.pager.js"></script>
<script type="text/javascript" src="<?php echo base_url()."/js/".$language; ?>/tcal.js"></script>
<script type="text/javascript">
    $(function() {
        $("#myTable")
            .tablesorter({widthFixed: true, widgets: ['zebra'],
                                  dateFormat: 'dd.mm.yyyy',
                                  headers: {0:{sorter:'hrdate'}}
                                  })
            .tablesorterPager({container: $("#pager")});
    });
</script>
<title><?php echo lang('all_records'); ?></title>
</head>
<body>
<br />

<h1 align="center"><?php echo lang('review_records'); ?></h1>


<div >
<?php     

echo form_open('booking/booking/all_records'); ?>
<span class="back_blue"><h2><?php echo lang('change_date'); ?>:</h2></span> 
<label for="dateFrom"><?php echo lang('date_from'); ?>
 <input  type="text" name="dateFrom" class="tcal" size="9" value="">
</label>


 <label for="dateTo"><?php echo lang('date_to'); ?>
 <input  type="text" name="dateTo" class="tcal" size="9" value="" >
</label>
<?php 
	echo form_submit( 'submit', lang('submit')); 
	echo form_close(); 
?>
</div>
<div class="form1">
<br />
<hr>
<i><?php echo lang('acc_state');
				echo " $maxDate";
	   ?>
</i>

<br/ >
 <?php
    foreach ($account_amount_query->result() as $row) {
        echo "<u>- $row->myaccount = $row->amount $row->currency_name<br></u>";   
    }
     ?>
<br />

<i><?php echo lang('view_all');?>: <?php echo "$minDate - $maxDate"; ?></i>

<table id="myTable" class="tablesorter" border="1" cellspacing="1" width="1024 px">
<thead>
<tr>
    <th id="hrdate"><?php echo lang('booking_date'); ?></th>
    <th><?php echo lang('booking_description'); ?></th>
    <th><?php echo lang('category_name'); ?></th>
    <th><?php echo lang('cat_income'); ?></th>
    <th><?php echo lang('cat_outcome'); ?></th>
    <th><?php echo lang('currency_name'); ?></th>
    <th><?php echo lang('accounts_name'); ?></th>
    <th><?php echo lang('booking_pending'); ?></th>
    <th>&nbsp;</th>
</tr>
</thead>
<tbody>
    <?php

    foreach($query->result() as $res){
       
    	$del = lang('delete');
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
            <td id='hrdate'>$res->dateEntry</td><td>$res->description</td><td>$res->type</td><td>$res->income </td><td>$res->outcome</td>
            <td>$res->currency_name</td><td>$res->myaccount</td>";
            if($res->pending == 1){
                $yes = lang('yes');
                echo "<td>$yes</td>";   
            }
            else {
                echo "<td></td>";
            }
           
            echo "<td>";
            echo anchor('booking/booking/edit/'.$in_out.'/'.$res->id, 'Update',  array('class'=>'update')) .'|' ;
            echo anchor('booking/booking/delete/'.$res->id, 'Delete' , array('class'=>'delete','onclick'=>"return confirm('$del $res->description $res->dateEntry ? ')"));
            echo "</td>
        </tr>";
    }
    ?>
</tbody>
</table>     
</div>

<div id="pager" class="pager">
    <form>
        <img src="<?php echo base_url(); ?>pictures/first2.png" class="first"/>
        <img src="<?php echo base_url(); ?>pictures/prev.png" class="prev"/>
        <input type="text" class="pagedisplay" size="5" readonly="readonly" />
        <img src="<?php echo base_url(); ?>pictures/next2.png" class="next"/>
        <img src="<?php echo base_url(); ?>pictures/last.png" class="last"/>
        <select class="pagesize">
            <option  value="10">10</option>
            <option selected="selected" value="25">25</option>
            <option  value="50">50</option>
        </select>
    </form>
</div>
</body>
</html>
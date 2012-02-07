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

    $(function() {
        $("#myTable")
            .tablesorter({widthFixed: true, widgets: ['zebra'],
                                  dateFormat: 'dd.mm.yyyy',
                                  headers: {0:{sorter:'hrdate'}}
                                  })
            .tablesorterPager({container: $("#pager")});
    });
   
 // $("#myTable").tablesorter({ dateFormat: 'dd.mm.yyyy', headers: {0:{sorter:'hrdate'}}  });
</script>
<title>Booking</title>
</head>
<body>
<br />

<h1 align="center"><?php echo lang('review_records'); ?></h1>


<div  >
<?php     

echo form_open('booking/booking/all_records'); ?>
<span class="back_blue"><h2>Izmjena datuma:</h2></span> 
<label for="dateFrom"><?php echo lang('date_from'); ?>
 <input type="text" name="dateFrom" size="7">

 <label for="dateTo"><?php echo lang('date_to'); ?>
 <input type="text" name="dateTo" size="7">

<?php 
	echo form_submit( 'submit', lang('submit')); 
	echo form_close(); 
?>
</div>
<br /><br />
<hr>
<i><?php echo lang('acc_state');?></i>
 <?php
    foreach ($account_amount_query->result() as $row) {
        echo "<u>- $row->myaccount = $row->amount $row->currency_name<br></u>";   
    }

    // echo "<div class='form1'>";
   
     ?>


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
            echo anchor('booking/booking/delete/'.$res->id, 'Delete' , array('class'=>'delete','onclick'=>"return confirm('Delete $res->description $res->dateEntry ? ')"));
            echo "</td>
        </tr>";
    }
    ?>
</tbody>
</table>     
</div>

<div id="pager" class="pager">
    <form>
        <img src="<?php echo base_url(); ?>pictures/first.png" class="first"/>
        <img src="<?php echo base_url(); ?>pictures/next1.png" class="prev"/>
        <input type="text" class="pagedisplay" size="5"/>
        <img src="<?php echo base_url(); ?>pictures/next.png" class="next"/>
        <img src="<?php echo base_url(); ?>pictures/last.gif" class="last"/>
        <select class="pagesize">
            <option  value="10">10</option>
            <option value="20">20</option>
            <option selected="selected" value="30">30</option>
            <option  value="40">40</option>
        </select>
    </form>
</div>
</body>
</html>
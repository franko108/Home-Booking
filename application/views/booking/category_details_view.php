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
<title><?php echo  lang('details'); ?></title>
</head>
<body>
<br />

<h1 align="center"><?php echo lang('review_records'); ?></h1>


<div class="form1">
<br />
<hr>

<i><?php echo lang('view_all').' - '.lang('details');?>: <?php echo "$minDate - $maxDate"; ?></i>

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
</tr>
</thead>
<tbody>
    <?php

    foreach($category_details->result() as $res){
       
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
           echo "</tr>";
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
<?php
$language = $this->lang->lang();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="<?php echo base_url(); ?>css/main.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>css/help.css" rel="stylesheet" type="text/css"  />
<title>Search result</title>
</head>
<body>
<p>&nbsp;</p>
<div class="col1">
	&nbsp;
</div>
<?php include('menu_help.php'); ?>

<p>&nbsp;</p><br /><br />
<hr class="hr" />
<div class="main">


<h1 align="center">Search of data</h1>
<p>
In upper right corner is option for search through entered data.
<br>Search works by description or name of category, then hit <i>Enter</i>. for submit. 
<br>Even part of the word is enough to make search properly.
<br>Output of the search also can change the sequence of rows with click of the header of table, i.e. by date, description or amount.
<br><br>
Picture 1.
<br>
<br><img src="<?php echo base_url(); ?>/help-pictures/en/search.png" border="1">
</p>

</div>
</body>
</html>
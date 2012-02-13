<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="<?php echo base_url(); ?>css/main.css" rel="stylesheet" type="text/css" />
</head>
<body>
<style type="text/css">
.tab{
font-family: san-serif, verdana;
font-size: 13px;
}
.asd
{
text-decoration: none;
font-family: san-serif, verdana;
font-size: 12px;
color:#ffffff;
}

/*****remove the list style****/
#nav {
margin:0;
padding:0;
list-style:none;
}

/*****LI display inline *****/
#nav li {
	float:left;
	display:block;
	width:150px;
	/* background: #b35312;  *//* */  /* #e3ad5f; pijesak*/   /* #3173ab; plava cool */  /* #1E5B91; plava tamna */
	position:relative;
	z-index:500;
	margin:0 1px;
	
	/* fr dodatak - radius. oval*/
	
    text-align: center;
    border: 1px solid black ;
    border-radius: 10px ;
    -moz-border-radius: 10px ;
    -webkit-border-radius: 10px ;

    background: #9b3b04; /* Old browsers */
    background: -moz-linear-gradient(top,  #9b3b04 0%, #ba9284 100%); /* FF3.6+ */
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#9b3b04), color-stop(100%,#ba9284)); /* Chrome,Safari4+ */
    background: -webkit-linear-gradient(top,  #9b3b04 0%,#ba9284 100%); /* Chrome10+,Safari5.1+ */
    background: -o-linear-gradient(top,  #9b3b04 0%,#ba9284 100%); /* Opera 11.10+ */
    background: -ms-linear-gradient(top,  #9b3b04 0%,#ba9284 100%); /* IE10+ */
    background: linear-gradient(top,  #9b3b04 0%,#ba9284 100%); /* W3C */
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#9b3b04', endColorstr='#ba9284',GradientType=0 ); /* IE6-9 */ 

}

/*****parent menu*****/
#nav li a {
	display:block;
	padding:8px 5px 0 5px;
	font-weight:700;
	height:23px;
	text-decoration:none;
	color:#ffeecc;
	text-align:center;
	color:#ffffff;
}

#nav li a:hover
{
	color:#470020;
}

/* style for default selected value */ #nav a.selected {
	color:#ffffff;
}
/* submenu */ #nav ul
{
	position:absolute;
	left:0;
	display:none;
	margin:0 0 0 -1px;
	padding:0;
	list-style:none;
}

#nav ul li
{
	width:150px;
	float:left;
	border-top:1px solid #fff;
}

/* display block will make the link fill the whole area of LI */ #nav ul a
{
	display:block;
	height:15px;
	padding: 8px 5px;
	color:#ffffff
}

#nav ul a:hover
{
	text-decoration:underline;
	padding-left:15px;
}

.column1 {
	float: left;
	display: inline;
	width: 150px;
	/* margin-right: 35px; */
	position: relative;
	
}

.column2 {
	float: left; 
	display: inline;
	text-align: left;  /* right */
	/* width: 1024px; */   
	margin-left: 1%; 
	position: relative; 
	margin: 0 auto; 
}

.column3 {
	float:left;
	display:inline;
	text-align:left;
	margin-left: 1em;
	position: relative;
}	

.transparent {
  /* IE 8 */
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=40)";

  /* IE 5-7 */
  filter: alpha(opacity=40);

  /* Netscape */
  -moz-opacity: 0.4;

  /* Safari 1.x */
  -khtml-opacity: 0.4;

  /* Good browsers */
  opacity: 0.7;
  
	height: 25px;  
  
}

.search {
	
}
</style>

<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.js"></script>
<script type="text/javascript">
function clickclear(thisfield, defaulttext) {
  if (thisfield.value == defaulttext) {
    thisfield.value = "";
  }
}
 
function clickrecall(thisfield, defaulttext) {
  if (thisfield.value == "") {
   thisfield.value = defaulttext;
  }
}
function submitform() {
  document.myform.submit();
}
</script>

<script type="text/javascript">
$(document).ready(function () {
$('#nav li').hover(
function () {
//show its submenu
$('ul', this).slideDown(350);
},
function () {
//hide its submenu
$('ul', this).slideUp(350);
}
);
});
</script>
<div class="column1">
	<img alt="" src="<?php echo base_url(); ?>pictures/nema-logo.jpg">
	<?php 
	echo anchor($this->lang->switch_uri('hr'),'Hrvatski')."<br />";
	echo anchor($this->lang->switch_uri('en'),'English');
	?>
</div>
<div class="column2">	

	<input type=hidden name=arav value="4*#*#*3*#*#*2*#*#*2*#*#*1"><ul id='nav'>
	
	
	
	 <li><a href='#'><?php echo lang('menu_settings'); ?></a>
	
	<ul>
	
			<li style='background-color:#1E5B91;'><?php echo anchor('currency',lang('menu_currency'));  ?></li>
			<li style='background-color:#1E5B91;'><?php echo anchor('accounts',lang('menu_accounts'));  ?></li>
			<li style='background-color:#1E5B91;'><?php echo anchor('categories',lang('menu_category'));  ?></li>
		</ul>
		<li> <?php echo anchor('#',lang('menu_booking'));  ?>
		<ul>
			<li style='background-color:#1E5B91;'><?php echo anchor('booking/booking/in/1',lang('menu_income'));  ?></li>
			<li style='background-color:#1E5B91;'><?php echo anchor('booking/booking/in/0',lang('menu_outcome'));  ?></li>
			<li style='background-color:#1E5B91;'><?php echo anchor('booking/transaction/',lang('menu_transaction'));  ?></li>
		</ul>
		<li> <a href='#'>Izvještaji</a>
		<ul>
			<li style='background-color:#1E5B91;'><?php echo anchor('booking/booking/all_records', 'Svi unosi');  ?></li>
			<li style='background-color:#1E5B91;'><?php echo anchor('booking/booking/category_sum', 'Grupirani izvj.');  ?></li>
			<li style='background-color:#1E5B91;'><a href=grupiranopomjesecima.php>Mjesečni</a></li>
		</ul>
		<li> <a href='#'>Help</a></li>
		
	</ul>
	
</div>
<div class="column3">
	
<?php
	$language = $this->lang->lang(); 
	echo form_open(base_url().''.$language.'/booking/booking/search'); 
	
	echo form_hidden('language', $language); 
?>
	
	<input class="transparent" type="text" name="search" size="11" height="15" value="Search" onclick="clickclear(this, 'Search')" onblur="clickrecall(this, 'Search')" />
	
	<a href="javascript: submitform()"></a>
</form>

</div>
<br /><br />

</body>
</html>
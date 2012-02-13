<?php
$con = mysqli_connect("localhost", "fivasic", "Brahman");

// $db = mysqli_connect($dbhost, $dbuser, $dbpass) or die (mysqli_error("Neuspjelo spajanje na bazu"));
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }

if (mysqli_query($con, "CREATE DATABASE ahaha"))
  {
  echo "Database created";
  }
else
  {
  echo "Error creating database: " . mysqli_error();
  }

mysqli_close($con);
?> 
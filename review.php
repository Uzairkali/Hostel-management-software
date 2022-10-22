<?php
$con = mysqli_connect("localhost:3306","root","","adarsha hostel");
$mode1=$_POST['mode1'];
$review = $_POST['ukreview'];

if ($mode1=='true') //mode is true when button is enabled 
{
  //nothing to execute
}

else if ($mode1=='false')  //mode is false when button is disabled
{
  $query = mysqli_query($con,"INSERT INTO reviews(review)VALUES('$review')");
} 
?>
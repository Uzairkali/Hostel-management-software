<?php
$dbuser="root";
$dbpass="";
$host="localhost:3306";
$db="adarsha hostel";
$mysqli =new mysqli($host,$dbuser, $dbpass, $db);

//for checking Registered user
if(!empty($_POST["room_no"])) 
{
$roomno=$_POST["room_no"];
$result ="SELECT room_no FROM rooms WHERE room_no=?";
$stmt = $mysqli->prepare($result);
$stmt->bind_param('s',$roomno);
$stmt->execute();
$stmt -> bind_result($result);
$stmt -> fetch();
$rmno=$result;
if($rmno==$roomno) 
echo "<span style='color:green'>Room already exists.</span>";
else echo "Room number does not exists";
}
?>
<?php
$dbuser="root";
$dbpass="";
$host="localhost:3306";
$db="adarsha hostel";
$mysqli =new mysqli($host,$dbuser, $dbpass, $db);


//for checking room availablility
if(!empty($_POST["roomno"])) 
{
$roomno=$_POST["roomno"];
$result ="SELECT count(*) FROM room_registration WHERE roomno=?";
$result1 ="SELECT seater FROM room_registration WHERE roomno=?";
$stmt = $mysqli->prepare($result);
$stmt->bind_param('i',$roomno);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();
$stmt1 = $mysqli->prepare($result1);
$stmt1->bind_param('i',$roomno);
$stmt1->execute();
$stmt1->bind_result($seat);
$stmt1->fetch();
$stmt1->close();
if($count>0 && $count==$seat) {
echo "<span style='color:red'>Room is full</span>";
}
elseif ($count>0) {
echo "<span style='color:red'>$count. Seats already full.</span>";
}
else {
	echo "<span style='color:red'>All Seats are Available</span>";
}
}
?>
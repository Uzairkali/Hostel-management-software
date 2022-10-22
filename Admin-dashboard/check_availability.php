<?php
$dbuser="root";
$dbpass="";
$host="localhost:3306";
$db="adarsha hostel";
$mysqli =new mysqli($host,$dbuser, $dbpass, $db);

//for checking Registered user
if(!empty($_POST["uname"])) 
{
$name=$_POST["uname"];
$result ="SELECT uname FROM userregistration WHERE uname=?";
$stmt = $mysqli->prepare($result);
$stmt->bind_param('s',$name);
$stmt->execute();
$stmt -> bind_result($result);
$stmt -> fetch();
$uuname=$result;
if($uuname==$name) 
echo "<span style='color:green'>Registered User .</span>";
else echo "User is not Registered";
}

$dbuser="root";
$dbpass="";
$host="localhost:3306";
$db="adarsha hostel";
$mysqli =new mysqli($host,$dbuser, $dbpass, $db);
$sql = mysqli_query($mysqli,"SELECT * FROM room_registration WHERE uname='$name'");
while($row = mysqli_fetch_assoc($sql)) {
	$room = $row["roomno"];
}

//for checking room booked user
if(!empty($_POST["uname"])) 
{
$name=$_POST["uname"];
$result ="SELECT uname FROM room_registration WHERE uname=?";
$stmt = $mysqli->prepare($result);
$stmt->bind_param('s',$name);
$stmt->execute();
$stmt -> bind_result($result);
$stmt -> fetch();
$nname=$result;
if($nname==$name) 
echo "<span style='color:green'>   Room no $room is already booked.</span>";
else echo "    " . "  Room is not booked ";
}

?>
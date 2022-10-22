<html>
<?php
$con = mysqli_connect("localhost:3306", "root", "", "adarsha hostel");
$un = $_POST["uname"];
$room = $_POST["rmno"];
$seat = $_POST["seat"];
$fee = $_POST["fee"];
$stay = $_POST["stayfrom"];
$duration = $_POST["duration"];

$sql = mysqli_query($con, "SELECT * FROM userregistration WHERE uname='$un'");
while ($row = mysqli_fetch_assoc($sql)) {
    $id = $row["ID"];
}

$query = "INSERT INTO rooms(ID,username,room_no,seats,fee,stayfrom,duration,Posting_time) VALUES('$id','$un','$room','$seat','$fee','$stay','$duration',CURRENT_TIMESTAMP)";
$result = mysqli_query($con, $query);
header("location: http://localhost/Project/Admin-dashboard/room.php");
?>

</html>
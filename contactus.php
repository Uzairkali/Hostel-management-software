<html>
<?php
$con = mysqli_connect("localhost:3306", "root", "", "adarsha hostel");

$un = $_POST['name'];
$em = $_POST['email'];
$ph = $_POST['phone'];
$mes = $_POST['message'];

if (!$con) {
    die('error in connection' . mysqli_error());
}

$query = "INSERT INTO contact(uname,uemail,uph,umessage)VALUES('$un','$em','$ph',$mes')";
$result = mysqli_query($con, $query);
header("location: http://localhost/Project/contact.html");
?>

</html>
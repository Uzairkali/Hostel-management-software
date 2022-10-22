<?php
session_start();
?>
<html>

<?php
$con = mysqli_connect("localhost:3306", "root", "", "adarsha hostel");

$mail = $_POST["ad_mail"];

if (!$con) {
    die("error in connection" . mysqli_error());
}

$sql = mysqli_query($con, "UPDATE admin SET email='$mail'");
header('Location: http://localhost/Project/Admin-dashboard/dashboard.php');
?>

</html>
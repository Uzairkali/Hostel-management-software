<?php
session_start();
?>
<html>
<?php
$con = mysqli_connect("localhost:3306", "root", "", "adarsha hostel");
$uid = $_SESSION['sess_uid'];
$com = $_POST['complaint'];

if (!$con) {
    die('error in connection' . mysqli_error());
}

$sql = mysqli_query($con, "SELECT * FROM userregistration WHERE ID='$uid'");
while ($row = mysqli_fetch_assoc($sql)) {
    $user = $row["uname"];
}
$query = "INSERT INTO complaints(ID,username,u_comp,Posting_time) VALUES('$uid','$user','$com',CURRENT_TIMESTAMP)";
$result = mysqli_query($con, $query);
header('location: http://localhost/Project/User-dashboard/complaint.php');
?>

</html>

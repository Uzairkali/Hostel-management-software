<html>

<?php
$con = mysqli_connect("localhost:3306", "root", "", "adarsha hostel");

$un = $_POST["uname"];
$pass = $_POST["u_psw"];
$Dob = $_POST["dob"];
$gender = $_POST["gender"];
$mail = $_POST["u_mail"];
$ph = $_POST["phno"];
$Fname = $_POST["fname"];
$Foccup = $_POST["foccup"];
$fph = $_POST["fphno"];
$Mname = $_POST["mname"];
$Moccup = $_POST["moccup"];
$mph = $_POST["mphno"];
$address = $_POST["adres"];
$State = $_POST["state"];
$cty = $_POST["city"];
$postal = $_POST["pstc"];
$course = $_POST["dept"];
$sem = $_POST["sem"];
$Admission = $_POST["admisno"];
$Year = $_POST["YOA"];
$fileinfo = PATHINFO($_FILES["photo"]["name"]);

if (!$con) {
    die('error in connection' . mysqli_error());
}

if (empty($fileinfo['filename'])) {
    $location = "";
} else {
    $newFilename = $fileinfo['filename'] . "_" . time() . "." . $fileinfo['extension'];
    move_uploaded_file($_FILES["photo"]["tmp_name"], "../Project/User-dashboard/uploads/" . $newFilename);
    $location = "uploads/" . $newFilename;
}

$query = "INSERT INTO userregistration(uname,ur_psw,ur_dob,gender,ur_mail,u_ph,Fn,
foc,fpho,Mn,moc,mpho,adres,sta,cty,pst,u_course,u_sem,u_admis,u_year,photo,Registering_time)
VALUES('$un','$pass','$Dob','$gender','$mail','$ph','$Fname','$Foccup','$fph',
'$Mname','$Moccup','$mph','$address','$State','$cty','$postal','$course','$sem','$Admission',
'$Year','$location',CURRENT_TIMESTAMP)";
$con->query($query);
mysqli_close($con);
header('location: http://localhost/Project/goback.html');
?>

</html>
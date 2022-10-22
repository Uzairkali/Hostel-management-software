<html>
<?php
require 'config1.php';

session_start();
$un = "";
$mail = "";
$password = "";

if (isset($_POST['uname'])) {
    $un = $_POST['uname'];
}
if (isset($_POST['u_mail'])) {
    $mail = $_POST['u_mail'];
}
if (isset($_POST['u_psw'])) {
    $password = $_POST['u_psw'];
}

$q = "SELECT ID,uname,ur_psw FROM userregistration WHERE uname='$un' AND ur_psw='$password' AND ur_mail='$mail'";

$query = $dbh->prepare($q);

$query->execute(array(':uname' => $un, ':ur_psw' => $password, ':ur_mail' => $mail));


if ($query->rowCount() == 0) {
    header('Location: login.html?err=1');
} else {

    $row = $query->fetch(PDO::FETCH_ASSOC);

    session_regenerate_id();
    $_SESSION['sess_username'] = $row['uname'];
    $name = $row['uname'];
    $_SESSION['sess_uid'] = $row['ID'];
    $id = $row['ID'];
    echo $_SESSION['sess_uid'];
    echo $_SESSION['sess_username'];
    session_write_close();

    if ($_SESSION['sess_uid'] == $id) {

        //loging time
        $conec = mysqli_connect("localhost:3306", "root", "", "adarsha hostel");

        $qw = mysqli_query($conec, "SELECT * FROM userregistration WHERE uname='$un'");
        while ($row = mysqli_fetch_assoc($qw)) {
            $iid = $row["ID"];
        }
        $q = "INSERT INTO  useraccess_log(ID,uname,loging_time)VALUES('$iid','$name',CURRENT_TIMESTAMP)";

        $re = mysqli_query($conec, $q);
        mysqli_close($conec);
        header('Location: http://localhost/Project/User-dashboard/dashboard.php');
    } else {
        header('Location: http://localhost/Project/login.html');
    }
}
?>

</html>
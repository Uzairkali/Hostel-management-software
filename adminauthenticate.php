<?php
require 'config.php';

session_start();

$username = "";
$password = "";

if (isset($_POST['ad_name'])) {
    $username = $_POST['ad_name'];
}
if (isset($_POST['password'])) {
    $password = $_POST['password'];
}

$q = 'SELECT * FROM admin WHERE username=:username AND password=:password';

$query = $dbh->prepare($q);

$query->execute(array(':username' => $username, ':password' => $password));


if ($query->rowCount() == 0) {
    header('Location: adminpage.html?err=1');
} else {

    $row = $query->fetch(PDO::FETCH_ASSOC);

    session_regenerate_id();
    $_SESSION['sess_user_id'] = $row['id'];
    $_SESSION['sess_username'] = $row['username'];

    echo $_SESSION['sess_username'];
    session_write_close();

    if ($_SESSION['sess_username'] == "admin") {
        header('Location: http://localhost/Project/Admin-dashboard/dashboard.php');
    } else {
        header('Location: http://localhost/Project/adminpage.html');
    }
}

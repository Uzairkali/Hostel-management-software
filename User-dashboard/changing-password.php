<?php
session_start();
//$user = $_SESSION['sess_username'];
//$un = $_SESSION['sess_username'];
$uid = $_SESSION['sess_uid'];
$uuid = $_SESSION['sess_uid'];
if (!isset($_SESSION['sess_uid']) || $uid != $uuid) {
    header('location:http://localhost/Project/login.html');
}
?>

<html>
<?php
$conn = mysqli_connect('localhost:3306', 'root', '', 'adarsha hostel') or
    die("Connection Error: " . mysqli_error($conn));

if (count($_POST) > 0) {
    $result = mysqli_query($conn, "SELECT * FROM userregistration 
    WHERE ID ='" . $uid . "'");
    $row = mysqli_fetch_array($result);
    if ($_POST['old_psw'] == $row['ur_psw']) {
        mysqli_query($conn, "UPDATE userregistration SET ur_psw='" . $_POST["new_psw"] . "'
        WHERE ID ='$uid'");
        mysqli_query($conn, "UPDATE userregistration SET pswUpdationTime = CURRENT_TIMESTAMP WHERE ID ='$uid'");
        echo "<script type='text/javascript'>alert('New Password was Successfully updated'); 
            location.href = 'http://localhost/Project/User-dashboard/changepsw.php'; </script>";
    } else {
        echo "<script type='text/javascript'>alert('Incorrect Password'); 
           location.href = 'http://localhost/Project/User-dashboard/changepsw.php'; </script>";
    }
}
mysqli_close($conn);
?>

</html>
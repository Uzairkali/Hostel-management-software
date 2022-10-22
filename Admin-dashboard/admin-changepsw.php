<?php
session_start();
$un = $_SESSION['sess_username'];
if (!isset($_SESSION['sess_username']) || $un != "admin") {
  header('location:http://localhost/Project/adminpage.html');
}
?>

<html>
<?php
$conn = mysqli_connect('localhost:3306', 'root', '', 'adarsha hostel') or
    die("Connection Error: " . mysqli_error($conn));

if (count($_POST) > 0) {
    $result = mysqli_query($conn, "SELECT * FROM admin
    WHERE username ='" . $un . "'");
    $row = mysqli_fetch_array($result);
    if ($_POST['old_psw'] == $row['password']) {
        mysqli_query($conn, "UPDATE admin SET password='" . $_POST["new_psw"] . "'
        WHERE username ='$un'");
        mysqli_query($conn, "UPDATE admin SET updationdate = CURRENT_TIMESTAMP WHERE username ='$un'");
        echo "<script type='text/javascript'>alert('New Password was Successfully updated'); 
            location.href = 'http://localhost/Project/Admin-dashboard/dashboard.php'; </script>";
    } else {
        echo "<script type='text/javascript'>alert('Incorrect Password'); 
           location.href = 'http://localhost/Project/Admin-dashboard/dashboard.php'; </script>";
    }
}
mysqli_close($conn);
?>

</html>
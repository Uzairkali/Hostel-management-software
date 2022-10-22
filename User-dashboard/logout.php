<html>

<?php
session_start();
if (session_destroy()) {
    header("location:/Project/login.html");
}
?>

</html>
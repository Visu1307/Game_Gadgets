<?php
session_start();
if ($_SESSION['admin_loggedin']) {
} else {
    echo '
    <script type="text/javascript">
    alert("You can not enter without logging in");
    window.location.href="../login.php";
    </script>';
}
include '../db_connect.php';
$user_id=$_GET['id'];
$sql="delete from users where id=$user_id";
$q=mysqli_query($conn,$sql);
header("Location: user.php");

?>
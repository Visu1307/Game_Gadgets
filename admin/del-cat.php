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
$cat_id = $_GET['id'];
include '../db_connect.php';
$sql="delete from categories where id={$cat_id}";
$result = mysqli_query($conn,$sql) or die("Query Failed");
header("Location: category.php");

?>
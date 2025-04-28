<?php 

include '../db_connect.php';
$q_id=$_GET['id'];
$sql="delete from contact_us where id={$q_id}";
$result=mysqli_query($conn,$sql) or die("Error");
header("Location: dashboard-admin.php");

?>
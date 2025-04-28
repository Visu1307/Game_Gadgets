<?php 
session_start();
include 'db_connect.php';
$pid=$_GET['id'];
$sql="delete from cart where pid=$pid and uid={$_SESSION['uid']}";
$result=mysqli_query($conn,$sql);
header("Location: cart.php");

?>
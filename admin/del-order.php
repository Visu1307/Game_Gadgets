<?php

session_start();
if (!$_SESSION['admin_loggedin']) {
    echo '
    <script type="text/javascript">
    alert("You can not enter without logging in");
    window.location.href="../login.php";
    </script>';
}
include '../db_connect.php';
$oid=$_GET['id'];
$sql="delete from orders where id={$oid}";
if(mysqli_query($conn,$sql)){
    if(mysqli_query($conn,"delete from order_details where order_id={$oid}")){
        header("location: order.php");
    }
    else{
        echo "Error";
    }
}


?>
<?php

session_start();
if ($_SESSION['loggedin']) {
} else {
    echo '
    <script type="text/javascript">
    alert("You can not enter without logging in");
    window.location.href="login.php";
    </script>';
}
include 'db_connect.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Placed</title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="icon/icons8-apple-arcade-50.png"/>
</head>

<body>
    <?php include 'header.php' ?>
    <div class="vh-50 mt-5">
        <center>
            <img src="icon/icons8-order-completed-100.png"><br><br>
            <h1>Your Order Has Been Placed Successfully</h1><br>
            <h1 class="display-6">Thank You
                <?php
                $sql = "select * from users where id={$_SESSION['uid']}";
                $result = mysqli_query($conn, $sql);
                $data = mysqli_fetch_assoc($result);
                echo $data['name'];
                ?>, For Shopping With Us.<br><br>
                <a href="index.php" class="btn btn-outline-dark">Continue Shopping</a>&nbsp;&nbsp;<a href="order.php" class="btn btn-outline-dark">Show My Order</a>
            </h1>
        </center>
    </div>
    <div class="card text-center mt-5">
        <div class="card-header">
            Game Quote
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <p> "No matter how long you spend climbing out, you can still fall back down in an instant."</p>
                <footer class="blockquote-footer my-1">Max Payne 2</footer>
            </blockquote>
        </div>
    </div>
    <?php include 'footer.php' ?>
    <script rel="text/javascript" src="./bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
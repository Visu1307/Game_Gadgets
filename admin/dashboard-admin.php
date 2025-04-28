<?php
session_start();
include '../db_connect.php';
if ($_SESSION['admin_loggedin']) {
} else {
    echo '
    <script type="text/javascript">
    alert("You can not enter without logging in");
    window.location.href="../login.php";
    </script>';
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="../icon/icons8-apple-arcade-50.png"/>
</head>

<body>
    <?php include 'admin-nav.php' ?>
    <div class="row">
        <div class="col"></div>
        <div class="col text-black text-decoration-underline my-4">
            <h1>Welcome To Dashboard</h1>
        </div>
        <div class="col"></div>
    </div>
    <!--Cards Started Here-->
    <div class="row">
        <div class="col">
            <div class="card mb-3 mx-1" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="img/users.png" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Total No. Of Users:-</h5>
                            <p class="card-text">
                                <b>
                                    <h1 class="display-2">
                                        <?php $first = "select * from users";
                                        $usr = mysqli_query($conn, $first);
                                        $usr_no = mysqli_num_rows($usr);
                                        echo $usr_no; ?>
                                    </h1>
                                </b>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="img/products.png" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Total No. Of Products:-</h5>
                            <p class="card-text">
                                <b>
                                    <h1 class="display-2">
                                        <?php $second = "select * from products";
                                        $prod = mysqli_query($conn, $second);
                                        $prod_no = mysqli_num_rows($prod);
                                        echo $prod_no; ?>
                                    </h1>
                                </b>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-4">
        <div class="col">
            <div class="card mb-3 mx-1" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="img/order.png" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Total No. Of Orders:-</h5>
                            <p class="card-text">
                                <b>
                                    <h1 class="display-2">
                                        <?php $third = "select * from orders";
                                        $order = mysqli_query($conn, $third);
                                        $order_no = mysqli_num_rows($order);
                                        echo $order_no; ?>
                                    </h1>
                                </b>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="img/category.png" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Total No. Of Categories:-</h5>
                            <p class="card-text">
                                <b>
                                    <h1 class="display-2">
                                        <?php $fourth = "select * from category";
                                        $cat = mysqli_query($conn, $fourth);
                                        $cat_no = mysqli_num_rows($cat);
                                        echo $cat_no; ?>
                                </b></h1>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-4">
        <div class="col">
            <div class="card mb-3 mx-1" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="img/coupon-256.png" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Total Promo Codes:-</h5>
                            <p class="card-text">
                                <b>
                                    <h1 class="display-2">
                                        <?php $fifth = "select * from promo_code";
                                        $code = mysqli_query($conn, $fifth);
                                        $code_no = mysqli_num_rows($code);
                                        echo $code_no; ?>
                                    </h1>
                                </b>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="img/user-query.png" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Total No. Of User Queries:-</h5>
                            <p class="card-text">
                                <b>
                                    <h1 class="display-2">
                                        <?php $sixth = "select * from contact_us";
                                        $user_query = mysqli_query($conn, $sixth);
                                        $query_no = mysqli_num_rows($user_query);
                                        echo $query_no; ?>
                                </b></h1>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Cards Ended Here-->

    <div class="row">
        <div class="col text-black mx-3">
            <h3>User Table:-</h3>
        </div>
        <div class="col"></div>
        <div class="col"></div>
    </div>
    <div class="overflow-auto mx-3">
        <table class="table table-striped table-bordered my-3 " >
            <tr>
                <th>Id</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Username</th>
                <th>Password</th>
            </tr>
            <?php while ($usr_row = mysqli_fetch_assoc($usr)) { ?>
                <tr>
                    <td><?php echo $usr_row['id']; ?></td>
                    <td><?php echo $usr_row['name']; ?></td>
                    <td><?php echo $usr_row['email']; ?></td>
                    <td><?php echo $usr_row['phno']; ?></td>
                    <td><?php echo $usr_row['username']; ?></td>
                    <td><?php echo $usr_row['password']; ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>

    <div class="row">
        <div class="col text-black mx-3">
            <h3>Contact Requests:-</h3>
        </div>
        <div class="col"></div>
        <div class="col"></div>
    </div>

    <div class="overflow-auto mx-3">
    <table class="table table-striped table-bordered my-3" >
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Operations</th>
        </tr>
        <?php
        $sql = "select * from contact_us";
        $q = mysqli_query($conn, $sql);
        while ($q_data = mysqli_fetch_assoc($q)) {
        ?>
            <tr>
                <td><?php echo $q_data['name']; ?></td>
                <td><?php echo $q_data['email']; ?></td>
                <td><?php echo $q_data['message']; ?></td>
                <td><a href="reply.php" class="btn btn-light"><img src="../icon/icons8-reply-30.png" class="img-fluid"></a>
                    &nbsp;&nbsp;<a href='del-query.php?id=<?php echo $q_data['id']; ?>' class="btn btn-light"><img src="../icon/icons8-delete-30.png" class="img-fluid"></td>
            </tr>
        <?php } ?>
    </table>
        </div>


    <script rel="text/javascript" src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Order Details</title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <style>
        .card {
            margin-bottom: 20px;
        }

        .address {
            margin-bottom: 20px;
        }
    </style>
    <link rel="icon" type="image/png" href="icon/icons8-apple-arcade-50.png"/>
</head>

<body>
    <?php
    session_start();
    if ($_SESSION['loggedin']) {
    } else {
        echo '
        <script type="text/javascript">
        alert("You can not enter without logging in");
        window.location.href="../login.php";
        </script>';
    }
    include 'db_connect.php';
    include 'header.php';
    ?>


    <?php
    $sql = "SELECT * FROM orders JOIN order_details ON orders.id = order_details.order_id where orders.uid={$_SESSION['uid']}";
    $result = mysqli_query($conn, $sql);
    $currentOrderId = null;
    $accordionFixer = 0;
    ?>

    <div class="mx-3 my-4">
        <?php
        if (mysqli_num_rows($result) > 0) {
            echo '<div class="text-dark mx-3 my-3 text-decoration-underline">
                <h2>
                    <center>My Orders</center>
                </h2>
            </div>';
            while ($row = mysqli_fetch_assoc($result)) {
                $accordionFixer++;
                if ($row['order_id'] !== $currentOrderId) {
                    $currentOrderId = $row['order_id']; ?>
                    <div class="card mb-4">
                        <div class="card-header">
                            Order ID: <?php echo $row['order_id']; ?>
                        </div>
                        <div class="card-body overflow-auto">
                            <h5 class="card-title">Order Details</h5>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "select * from order_details where order_id={$row['order_id']} and uid={$_SESSION['uid']}";
                                    $result1 = mysqli_query($conn, $sql);
                                    while ($row1 = mysqli_fetch_array($result1)) { ?>
                                        <tr>
                                            <td><img src="admin/Upload/<?php echo $row1['image']; ?>" alt="Product Image" height="50px" width="50px"></td>
                                            <td><?php echo $row1['name']; ?></td>
                                            <td><?php echo "₹" . $row1['price']; ?></td>
                                            <td><?php echo $row1['qty']; ?></td>
                                            <td><?php echo "₹" . $row1['price'] * $row1['qty']; ?></td>
                                        </tr>
                                    <?php }
                                    if (!empty($row['promo_code'])) { ?>
                                        <tr>
                                            <td colspan="4">Total Price</td>
                                            <td><s><?php echo "₹" . $row['total_price']; ?></s></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">Promo Code:&nbsp;<span><?php echo $row['promo_code']; ?>&nbsp;(<?php echo "-" . $row['rate'] . "%"; ?>)</span></td>
                                            <td><?php echo "-₹" . $row['discount']; ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4"><strong>Discounted Price</strong></td>
                                            <td><strong><?php echo "₹" . $row['discounted_price']; ?></strong></td>
                                        </tr>
                                    <?php } else { ?>
                                        <tr>
                                            <td colspan="4"><strong>Total Price</strong></td>
                                            <td><strong><?php echo "₹" . $row['total_price']; ?></strong></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="accordion" id="accordionExample<?php echo $accordionFixer; ?>">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $accordionFixer; ?>" aria-expanded="false" aria-controls="collapse<?php echo $accordionFixer; ?>">
                                        More Information
                                    </button>
                                </h2>
                                <div id="collapse<?php echo $accordionFixer; ?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample<?php echo $accordionFixer; ?>">
                                    <div class="accordion-body">
                                        <div class="row card-body">
                                            <div class="col col-sm-6 col-xl-8">
                                                <h5 class="card-title">Your Information</h5>
                                                <p class="card-text">
                                                    Name: <?php echo $row['full_name']; ?><br>
                                                    Email: <?php echo $row['email']; ?><br>
                                                    Phone: <?php echo $row['phno']; ?><br>
                                                    Address: <?php echo $row['address'] . ', ' . $row['city'] . ', ' . $row['state'] . ', ' . $row['country'] . ', ' . $row['zip']; ?>
                                                </p>
                                            </div>
                                            <div class="col col-sm-6 col-xl-4">
                                                <h5 class="card-title">Pricing Information</h5>
                                                <p class="card-text">
                                                    Payment Mode: <?php echo $row['pay_mode']; ?><br>
                                                    Promo Code: <?php if (empty($row['promo_code'])) {
                                                                    echo "NA";
                                                                } else {
                                                                    echo $row['promo_code'];
                                                                } ?><br>
                                                    Date: <?php echo $row['date']; ?><br>
                                                    Status: <?php if ($row['status'] == 1) {
                                                                echo "Shipped";
                                                            } elseif ($row['status'] == 2) {
                                                                echo "On The Way";
                                                            } elseif ($row['status'] == 3) {
                                                                echo "Delivered";
                                                            } ?>
                                                </p>
                                            </div>
                                            <div class="mt-3">
                                                <style>
                                                    /* Reset default list styles */
                                                    ul {
                                                        list-style-type: none;
                                                        padding: 0;
                                                        margin: 0;
                                                    }
                                                    .indicator-container {
                                                        display: flex;
                                                        justify-content: space-between;
                                                        width: 500px;
                                                        margin: 20px auto;
                                                    }
                                                    .step {
                                                        width: 150px;
                                                        height: 150px;
                                                        border-radius: 50%;
                                                        background-color: black;
                                                        display: flex;
                                                        align-items: center;
                                                        justify-content: center;
                                                        font-size: 20px;
                                                        color: white;
                                                    }
                                                    .step.active {
                                                        background-color: green;
                                                    }
                                                </style>
                                                <strong>
                                                    <h4 class="card-title text-center my-2">Current Order Status</h4>
                                                </strong>
                                                <div class="d-flex justify-content-center text-center">
                                                    <ul class="indicator-container">
                                                            <div class="row">
                                                            <div class="col-sm-12 col-md-4 col-lg-4 d-flex justify-content-center">
                                                                <li class="step <?php if($row['status']==1) {echo "active";} ?>">1<br>Shipped</li>
                                                            </div>
                                                            <div class="col-sm-12 col-md-4 col-lg-4 d-flex justify-content-center">
                                                                <li class="step <?php if($row['status']==2) {echo "active";} ?>">2<br>On The Way</li>
                                                            </div>
                                                            <div class="col-sm-12 col-md-4 col-lg-4 d-flex justify-content-center">
                                                                <li class="step <?php if($row['status']==3) {echo "active";} ?>">3<br>Delivered</li>
                                                            </div>
                                                        </div>
                                                        </ul>
                                                </div>
                                                <!-- <div class="row text-center">
                                                    <div class="col-4">
                                                        <strong>
                                                            <h5>1<br>Shipped</h5>
                                                        </strong>
                                                    </div>
                                                    <div class="col-4">
                                                        <strong>
                                                            <h5>2<br>On The Way</h5>
                                                        </strong>
                                                    </div>
                                                    <div class="col-4">
                                                        <strong>
                                                            <h5>3<br>Delivered</h5>
                                                        </strong>
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php }
            }
        } else { ?>

            <div class="vh-100 mt-5">
                <center>
                    <img src="icon/icons8-list-is-empty-100.png"><br>
                    <h3>Seems like your order list is empty</h3><br>
                    <h6 class="display-6"><a href="index.php" class="text-black">Order Now -></a></h6>
                </center>
            </div>

        <?php } ?>
    </div>
    <!--Quote Started-->
    <div class="card text-center">
        <div class="card-header">
            Game Quote
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <p>"You can’t undo what you’ve already done, but you can face up to it."</p>
                <footer class="blockquote-footer my-1">Silent Hill: Downpour</footer>
            </blockquote>
        </div>
    </div>
    <!--Quote Ended-->
    <?php include 'footer.php' ?>
    <script rel="text/javascript" src="./bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
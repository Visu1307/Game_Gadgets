<?php

include '../db_connect.php';
$changeStatus = false;
if (isset($_GET['id'])) {
    $oid = $_GET['id'];
    $changeStatus = true;
}

if (isset($_POST['s1'])) {
    $oid=$_POST['oid'];
    $status=$_POST['status'];
    $sql="update orders set status=".$status." where id=".$oid." ";
    $result=mysqli_query($conn,$sql);
    header("location: order.php");
}

if(isset($_POST['s2'])){
    $changeStatus=false;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Order Details</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <style>
        .card {
            margin-bottom: 20px;
        }

        .address {
            margin-bottom: 20px;
        }
    </style>
    <link rel="icon" type="image/png" href="../icon/icons8-apple-arcade-50.png"/>
</head>

<body>
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
    include 'admin-nav.php';
    ?>
    <link rel="stylesheet" href="../css/step_indicator.css">
    <div class="text-dark mx-3 my-3 text-decoration-underline">
        <h2>
            <center>Order Master</center>
        </h2>
    </div>

    <?php

    $sql = "SELECT * FROM orders JOIN order_details ON orders.id = order_details.order_id";
    $result = mysqli_query($conn, $sql);
    $accordionFixer = 100;
    $currentOrderId = null;
    ?>

    <div class="mx-3 my-4">
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $accordionFixer++;
                if ($row['order_id'] !== $currentOrderId) {
                    $currentOrderId = $row['order_id']; ?>
                    <div class="accordion mx-3 my-3" id="accordionExample<?php echo $accordionFixer; ?>">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $accordionFixer; ?>" aria-expanded="false" aria-controls="collapse<?php echo $accordionFixer; ?>">
                                    Order ID: <?php echo $row['order_id']; ?>
                                </button>
                                <div class="row mx-1 my-2">
                                    <form method="post">
                                        <?php if ($changeStatus == true && $row['order_id'] == $_GET['id']) { ?>
                                            <div class="col col-sm-2 col-xl-4">
                                                <h4>
                                                    <input type="hidden" name="oid" value="<?php echo $row['order_id']; ?>">
                                                    <select name="status">
                                                        <option value="1">Shipped</option>
                                                        <option value="2">On The Way</option>
                                                        <option value="3">Delivered</option>
                                                    </select>
                                                </h4>
                                            </div>
                                        <?php } else { ?>
                                            <div class="col col-sm-2 col-xl-4">
                                                <h4>
                                                    <?php echo "Status: ";
                                                    if ($row['status'] == 1) {
                                                        echo "Shipped";
                                                    } elseif ($row['status'] == 2) {
                                                        echo "On The Way";
                                                    } elseif ($row['status'] == 3) {
                                                        echo "Delivered";
                                                    }  ?></h4>
                                            </div>
                                        <?php }  ?>
                                        <div class="col col-sm-2 col-xl-4">
                                            <?php if ($changeStatus == true && $row['order_id'] == $_GET['id']) { ?>
                                                <input type="submit" name="s1" value="Update Status" class="btn btn-dark">
                                                <input type="submit" name="s2" class="btn btn-danger" value="Cancel" >
                                            <?php } else { ?>
                                                <a href="order.php?id=<?php echo $row['order_id'];  ?>" class="btn btn-dark">Change Status</a>
                                                <a href="del-order.php?id=<?php echo $row['order_id']; ?>" onclick="return confirm('Are you sure to remove following order?')" class="btn btn-danger">Remove Order</a>
                                            <?php } ?>
                                        </div>
                                    </form>
                                </div>
                            </h2>
                            <div id="collapse<?php echo $accordionFixer; ?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample<?php echo $accordionFixer; ?>">
                                <div class="accordion-body overflow-auto">
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
                                            $sql = "SELECT * FROM order_details where order_id={$row['order_id']}";
                                            $result1 = mysqli_query($conn, $sql);
                                            while ($row1 = mysqli_fetch_array($result1)) { ?>
                                                <tr>
                                                    <td><img src="Upload/<?php echo $row1['image']; ?>" alt="Product Image" height="50px" width="50px"></td>
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
                                <div class="accordion" id="accordionExample<?php echo $row['id']; ?>">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $row['id']; ?>" aria-expanded="false" aria-controls="collapse<?php echo $row['id'] ?>">
                                                More Information
                                            </button>
                                        </h2>
                                        <div id="collapse<?php echo $row['id']; ?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample<?php echo $row['id']; ?>">
                                            <div class="accordion-body">
                                                <div class="row card-body">
                                                    <div class="col col-sm-6 col-xl-8">
                                                        <h5 class="card-title">Customer Information</h5>
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        <?php }
            }
        } else {
            echo "0 results";
        }
        ?>
    </div>
    </div>

    <script rel="text/javascript" src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
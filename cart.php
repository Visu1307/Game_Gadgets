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
$sql = "select * from cart where uid={$_SESSION['uid']}";
$result = mysqli_query($conn, $sql);
$noOfItems = mysqli_num_rows($result);
$editMode = false;
if (isset($_POST['s1'])) {
    $pid = $_POST['pid'];
    $qty = $_POST['qty'];
    $sql = "update cart set qty=" . $qty . " where pid=" . $pid . " and uid=" . $_SESSION['uid'];
    $result = mysqli_query($conn, $sql);
    header("location: cart.php");
}
if (isset($_POST['s2'])) {
    header("location: cart.php");
}
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $editMode = true;
}

if (isset($_POST['empty'])) {
    $sql = "delete from cart where uid={$_SESSION['uid']}";
    $result = mysqli_query($conn, $sql);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="icon" type="image/png" href="icon/icons8-apple-arcade-50.png"/>
</head>
<link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">

<body>
    <?php include 'header.php' ?>
    <?php if ($noOfItems > 0) { ?>
        <div class="container m-sm-0 overflow-auto">
            <div class="display-4 mt-3">
                <img src="icon/cart.png" class="img-fluid" height="50px" width="50px">
                Shopping Cart
                <!-- <hr> -->
            </div>
            <div class="table-container" style="width:800px;">
                <table class="table table-hover my-4">
                    <tr>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Operations</th>
                    </tr>
                    <?php while ($data = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><img src='admin/Upload/<?php echo $data['image']; ?>' height="50px" width="50px"></td>
                            <td><?php echo $data['name']; ?></td>
                            <td><?php echo "₹" . $data['price']; ?></td>
                            <td>
                                <form method="post" id="changeQty">
                                    <?php
                                    if ($editMode == true && $data['pid'] == $product_id) {
                                        echo '<input type="hidden" name="pid" value=' . $data['pid'] . '>';
                                        echo '<input type="number" min="1" max="10" name="qty" value=' . $data['qty'] . '>';
                                    } else {
                                        echo $data['qty'];
                                    }
                                    ?>
                                    <!-- </form> -->
                            </td>
                            <td><?php echo "₹" . $data['qty'] * $data['price']; ?></td>
                            <td>
                                <?php
                                if ($editMode == true && $data['pid'] == $product_id) {
                                    echo '<button type="submit" name="s1" class="btn btn-light"><img src="icon/icons8-correct-black-30.png" class="img-fluid"></button>&nbsp;&nbsp;';
                                    echo '<button type="submit" name="s2" class="btn btn-light"><img src="icon/icons8-delete-x-30.png"></button>';
                                } else {
                                    echo '<a href="cart.php?id=' . $data['pid'] . '" class="btn btn-light"><img src="icon/icons8-change-30.png" class="img-fluid"></a>&nbsp;&nbsp;';
                                ?><a href="del-cart-pro.php?id=<?php echo $data['pid']; ?>" class="btn btn-light" onclick="return confirm('Are you surely want to delete following product?')"><img src="icon/icons8-delete-30.png"></a><?php
                                                                                                                                                                                                                }
                                                                                                                                                                                                                    ?>
                                <!-- <a href="del-cart-pro.php?id=<php echo $data['pid']; ?>" class="btn btn-outline-danger" onclick="return confirm('Are you surely want to delete following product?')">Delete</a> -->
                                </form>
                            </td>
                        </tr>
                    <?php $total_price += $data['qty'] * $data['price'];
                    }  ?>
                    <tr>
                        <td colspan="4"><b>Grand Total:-</b></td>
                        <td><b><?php echo "₹" . $total_price; ?></b></td>
                        <td>
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"><button type="submit" name="empty" onclick="return confirm('Are you sure to delete all products from your cart?');" class="btn btn-light text-right"><img src="icon/icons8-trash-30.png" class="img-fluid"></button></form>
                        </td>
                    </tr>
                </table>
            </div>
            <!-- <hr> -->
            <a href="index.php" class="btn btn-dark">Continue Shopping</a>&nbsp;&nbsp;
            <a href="checkout.php" class="btn btn-success">Proceed To Checkout</a>
        </div>
        <div class="card text-center mt-5">
            <div class="card-header">
                Game Quote
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <p>"Don't wish it were easier, wish you were better."</p>
                    <footer class="blockquote-footer my-1">Animal Crossing</footer>
                </blockquote>
            </div>
        </div>
    <?php } else { ?>
            <div class="vh-100 my-5 text-center">
                <img src="icon/empty-cart.png" height="100px" width="100px" class="img-fluid">
                <h3>Seems like your cart is empty</h3><br>
                <h6 class="display-6"><a href="index.php" class="text-black">Get Your Goodies Now -></a></h6>
            </div>
    <?php } ?>
    <?php include 'footer.php' ?>
    <script rel="text/javascript" src="./bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
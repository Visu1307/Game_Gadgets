<?php
session_start();
include 'db_connect.php';
$pid = $_GET['id'];

$sql = "select * from products where id={$pid}";
$products = mysqli_query($conn, $sql);


if (isset($_POST['s1'])) {
    $result = mysqli_query($conn, "SELECT pid FROM cart where uid={$_SESSION['uid']}");
    $column_array = array();
    while ($row = mysqli_fetch_array($result)) {
        $column_array[] = $row['pid'];
    }
    if (in_array($pid, $column_array)) {
        echo "<script>alert('Product Already Added To Cart :(');</script>";
    } else {
        $uid = $_SESSION['uid'];
        $pid = $_POST['pid'];
        $image = $_POST['image'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $qty = $_POST['qty'];
        $sql = "insert into cart(uid,pid,image,name,price,qty) values(" . $uid . "," . $pid . ",'" . $image . "','" . $name . "'," . $price . "," . $qty . ")";
        $result = mysqli_query($conn, $sql);
        header("location: cart.php");
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="css/product_details.css" rel="stylesheet">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="icon/icons8-apple-arcade-50.png" />
</head>
<body>
    <?php include 'header.php' ?>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <div class="pd-wrap">
        <div class="container">
            <?php while ($data = mysqli_fetch_assoc($products)) { ?>
                <div class="heading-section">
                    <h2>Product Details</h2>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div>
                            <div class="item">
                                <img class="img-fluid" src='admin/Upload/<?php echo $data['image']; ?>' alt="No img">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product-dtl">
                            <div class="product-info">
                                <div class="product-name"><?php echo $data['name']; ?></div>
                                <div class="product-price-discount"><span>₹<?php echo $data['selling_price']; ?></span><span class="line-through">₹<?php echo $data['mrp']; ?></span></div>
                            </div>
                            <div>
                                <b>Description:-</b><br>
                                <?php echo $data['description']; ?>
                            </div>
                            <div class="product-count">
                                <label for="size">Quantity</label>
                                <form method="post" class="display-flex">
                                    <input type="hidden" name="pid" value="<?php echo $data['id']; ?>">
                                    <input type="hidden" name="image" value="<?php echo $data['image']; ?>">
                                    <input type="hidden" name="name" value="<?php echo $data['name']; ?>">
                                    <input type="hidden" name="price" value="<?php echo $data['selling_price']; ?>">
                                    <div class="qtyminus">-</div>
                                    <input type="text" name="qty" min="1" max="10" readonly value="1" class="qty">
                                    <div class="qtyplus">+</div><br>
                            </div>
                            <?php if (isset($_SESSION['loggedin'])) { ?>
                                <input type="submit" name="s1" value="Add to cart" class="round-black-btn">
                            <?php } else { ?>
                                <a href="login.php" class="round-black-btn" onclick="return alert('Please Login First :(')">Add To Cart</a>
                            <?php } ?>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="card text-center mt-5">
        <div class="card-header">
            Game Quote
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <p>"The right man in the wrong place can make all the difference in the world."</p>
                <footer class="blockquote-footer my-1">Half-Life 2</footer>
            </blockquote>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="	sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script rel="text/javascript" src="js/product_details.js"></script>
    <script rel="text/javascript" src="./bootstrap/js/bootstrap.bundle.min.js"></script>
    <?php include 'footer.php' ?>
</body>

</html
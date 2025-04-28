<?php

session_start();
include 'db_connect.php';
$pid = $_GET['id'];
$sql = "select * from products where category_id={$pid}";
$rs = mysqli_query($conn, $sql) or die("Error");

if(isset($_POST['s1'])){
    echo "Success";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/product.css">
    <link rel="icon" type="image/png" href="icon/icons8-apple-arcade-50.png"/>
</head>
<style>
    .card:hover{
        box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
    }
</style>
<body>
    <?php include 'header.php'; ?>
    <div class="col">
        <h1 class="display-3 my-3 text-center">
            <?php
            $sql = mysqli_query($conn, "select category_id from products where category_id={$pid}");
            $sql2 = mysqli_query($conn, "select * from category");
            while ($row = mysqli_fetch_array($sql)) {
                $column_array[] = $row['category_id'];
            }
            while ($row2 = mysqli_fetch_assoc($sql2)) {
                if (in_array($row2['id'], $column_array)) {
                    echo $row2['category_nm'];
                }
            }
            ?>
        </h1>
    </div>
    <div class="row g-4 mx-3 mb-3">
        <?php while ($data = mysqli_fetch_assoc($rs)) {  ?>
            <div class="col">
                <div class="card" style="width: 300px;">
                    <div class="d-flex justify-content-center">
                        <img src="./admin/Upload/<?php echo $data['image']; ?>" class="card-img-top img-fluid product-img" alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $data['name']; ?></h5>
                        <p class="card-text"><b>₹<?php echo $data['selling_price']; ?></b><br><s>₹<?php echo $data['mrp']; ?></s></p>
                        <div>
                            <a href='add-to-cart.php?id=<?php echo $data['id']; ?>' class="btn btn-dark col-12 "><img src="icon/icons8-add-shopping-cart-32.png" class="img-fluid">&nbsp;Add To Cart</a>
                            <a href='product-details.php?id=<?php echo $data['id']; ?>' class="btn btn-light my-2 col-12" style="border: 1px solid black"><img src="icon/icons8-more-details-30.png" class="img-fluid">&nbsp;More Details</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="card text-center mt-5">
        <div class="card-header">
            Game Quote
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <p>"A hero need not speak. When he is gone, the world will speak for him."</p>
                <footer class="blockquote-footer my-1">Halo 3</footer>
            </blockquote>
        </div>
    </div>
    <?php include 'footer.php' ?>
    <script rel="text/javascript" src="./bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
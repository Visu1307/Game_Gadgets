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

$p_id = $_GET['id'];
$sel = "select * from products where id={$p_id}";
$p_data = mysqli_query($conn, $sel);


if (isset($_POST['btn1'])) {
    $pro_id = $_POST['t1'];
    $nm = $_POST['t2'];
    $mrp = $_POST['t3'];
    $sell = $_POST['t4'];
    $cat = $_POST['cat'];
    $desc = $_POST['t5'];
    $row = mysqli_fetch_assoc($p_data);
    if (empty($row['image'])) {
        $filename = $_FILES["img"]["name"];
        $tempname = $_FILES["img"]["tmp_name"];
        $folder = "Upload/" . $filename;
        move_uploaded_file($tempname, $folder);
        $upd = "update products set category_id = '{$cat}' ,  name = '{$nm}' , mrp = '{$mrp}' , selling_price = '{$sell}' , image = '{$filename}' , description = '{$desc}' where id = {$pro_id}";
        $result = mysqli_query($conn, $upd);
    } else {
        $upd = "update products set category_id = '{$cat}' , name = '{$nm}' , mrp = '{$mrp}' , selling_price = '{$sell}' , description = '{$desc}' where id = {$pro_id}";
        $result = mysqli_query($conn, $upd);
    }
    header("Location: product.php");
}

if (isset($_POST['btn2'])) {
    $product_id = $_POST['t1'];
    $blank = "";
    $sql = "update products set image='{$blank}' where id={$product_id}";
    $result = mysqli_query($conn, $sql) or die("Error");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="../icon/icons8-apple-arcade-50.png"/>
</head>

<body>
    <?php include './admin-nav.php'; ?>
    <div class="text-dark mx-3 my-3 text-decoration-underline">
        <h2>
            <center>Edit Product Details</center>
        </h2>
    </div>
    <div class="card card-body mx-3 my-4">
        <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
            <?php while ($product = mysqli_fetch_assoc($p_data)) { ?>
                <input type="hidden" value="<?php echo $product['id']; ?>" name="t1">
                <div class="row">
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                        Product Name:-<br>
                        <input type="text" name="t2" value="<?php echo $product['name']; ?>">
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        Product MRP:-<br>
                        <input type="text" name="t3" value="<?php echo $product['mrp']; ?>">
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        Product Selling Price:-<br>
                        <input type="text" name="t4" value="<?php echo $product['selling_price']; ?>">
                    </div>
                </div>
            <?php $GLOBALS['cat_id']=$product['category_id']; } ?>
            <div class="row my-2 mt-3">
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                    Category:-<br>
                    <select class="col-4" name="cat">
                        <?php
                        $sql = "select * from category";
                        $q = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($q)) { ?>
                            <option <?php if($cat_id==$row['id']) echo "selected"; ?> value="<?php echo $row['id']; ?>"><?php echo $row['category_nm']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                    <?php
                    $sql = "select * from products where id={$p_id}";
                    $res = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($res)) { ?>
                        <?php if (!empty($row['image'])) { ?>
                            Product Image:-
                            <img src="./Upload/<?php echo $row['image']; ?>" class="img-fluid" height="50px" width="50px">
                            <br />
                            <input type="submit" class="btn btn-danger" value="Delete Image" name="btn2">
                        <?php } ?>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                    <?php if (empty($row['image'])) { ?>
                        <div class="mb-3">
                            New Product Image:-
                            <input class="form-control w-75" type="file" id="formFile" name="img">
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
            </div>
            <div class="row">
                <div class="overflow-auto">
                    Description:-<br>
                    <?php
                    $desc = "select * from products where id={$p_id}";
                    $q = mysqli_query($conn, $desc);
                    while ($data = mysqli_fetch_assoc($q)) { ?>
                        <textarea cols="175" rows="2" name="t5"><?php echo $data['description']; ?></textarea>
                    <?php } ?>
                </div>
            </div>
            <div class="row my-2">
                <div class="col">
                    <input type="submit" class="btn btn-outline-dark" value="Update" name="btn1">&nbsp;&nbsp;
                    <a class="btn btn-outline-danger" href="product.php">Go Back</a>
                </div>
            </div>
        </form>
    </div>
    <script rel="text/javascript" src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
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
$sql = "select * from category";
$q = mysqli_query($conn, $sql);
if (isset($_POST['btn1'])) {
    $p_nm = $_POST['t1'];
    $p_mrp = $_POST['t2'];
    $p_sp = $_POST['t3'];
    $p_cat = $_POST['cat'];
    $p_desc = $_POST['desc'];
    $filename = $_FILES["img"]["name"];
    $tempname = $_FILES["img"]["tmp_name"];
    $folder = "Upload/" . $filename;
    $sql = "insert into products(category_id,name,mrp,selling_price,image,description) values ('$p_cat','$p_nm','$p_mrp','$p_sp','$filename','$p_desc')";
    mysqli_query($conn, $sql);
    if (move_uploaded_file($tempname, $folder)) {
        echo '<script type="text/javascript">alert("Product Added Successfully")</script>';
    } else {
        echo "<h3>Failed to upload image!</h3>";
    }
    header("Location: product.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Master</title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="../icon/icons8-apple-arcade-50.png"/>
</head>

<body>
    <?php include 'admin-nav.php'; ?>
    <div class="text-center mx-3 my-2 text-decoration-underline">
        <h2>
            Product Master
        </h2>
    </div>
    <!-- Adding Products -->
    <br />
    <div class="accordion" id="accordionExample">
        <div class="accordion-item mx-3">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Add Product
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                Product Name:-<br>
                                <input type="text" name="t1">
                            </div>
                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                Product MRP:-<br>
                                <input type="text" name="t2">
                            </div>
                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                Product Selling Price:-<br>
                                <input type="text" name="t3">
                            </div>
                        </div>
                        <div class="row my-2 mt-3">
                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                Category:-<br>
                                <select class="col-4" name="cat">
                                    <?php while ($row = mysqli_fetch_assoc($q)) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['category_nm']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="mb-3">
                                    Product Image:-
                                    <input class="form-control w-75" type="file" id="formFile" name="img">
                                </div>
                            </div>
                        </div>
                        <div class="overflow-auto">
                            Description:-
                            <textarea rows="3" cols="172" name="desc"></textarea>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="submit" class="btn btn-outline-dark" value="Add" name="btn1">
                                &nbsp;&nbsp;
                                <input type="reset" class="btn btn-outline-danger" value="Reset">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Displaying Records -->
    <div class="overflow-auto mx-3 mt-3">
        <table class="table table-bordered">
            <tr>
                <th>Image</th>
                <!-- <th>Id</th> -->
                <th>Product Name</th>
                <th style="width: 200px;">Selling Price</th>
                <th style="width: 650px;">Description</th>
                <th style="width: 150px;" class="text-center">Operations</th>
            </tr>
            <?php
            $sql = "select * from products";
            $res = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($res)) { ?>
                <tr>
                    <td><img src="./Upload/<?php echo $row['image']; ?>" class="img-fluid" height="50px" width="50px"></td>
                    <!-- <td><?php echo $row['id']; ?></td> -->
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['selling_price']; ?></td>
                    <td>
                        <?php
                        $desc = $row['description'];
                        if (strlen($desc) > 50) {
                            $new_string = substr($desc, 0, 85);
                            echo $new_string . "...";
                        } else {
                            echo $desc;
                        }
                        ?>
                    </td>
                    <td class="text-center">
                        <a class="btn btn-light my-2" href='edit-pro.php?id=<?php echo $row['id']; ?>'><img src="../icon/icons8-edit-30.png" class="img-fluid"></a>
                        <a class="btn btn-light" href='del-pro.php?id=<?php echo $row['id']; ?>' onclick="return confirm('Are you sure to delete this product?')"><img src="../icon/icons8-delete-30.png" class="img-fluid"></a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <script rel="text/javascript" src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
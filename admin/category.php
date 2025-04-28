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
if (isset($_GET['btn2'])) {
    $ins = "insert into category(category_nm) values('" . $_GET['t1'] . "')";
    if (mysqli_query($conn, $ins)) {
        echo '
        <script>alert("Category Added Successfully!");</script>
        ';
    }
}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Categories</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="../icon/icons8-apple-arcade-50.png"/>
</head>

<body>
    <?php include './admin-nav.php' ?>
    <div class="text-black my-3 text-decoration-underline">
        <center>
            <h2>Categories Master</h2>
        </center>
    </div>
    <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item mx-3">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Add Category
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <input class="form-control form-control-lg" type="text" placeholder="Enter Category Name" aria-label=".form-control-lg example" name="t1"><br />
                        <input type="submit" class="btn btn-outline-dark" value="Add Category" name="btn2">
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="overflow-auto mx-3 mt-3">
        <table class="table table-striped table-bordered">
            <tr>
                <th>Id</th>
                <th>Category</th>
                <th class="text-center">Operations</th>
            </tr>

            <?php

            $sql = "select * from category";
            $res = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($res)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['category_nm']; ?></td>
                    <td style="width: 200px;" class="text-center">
                        <a class="btn btn-light" href='del-cat.php?id=<?php echo $row['id']; ?>' onclick="return confirm('Are you sure to delete category?')"><img src="../icon/icons8-delete-30.png" class="img-fluid"></a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <script rel="text/javascript" src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
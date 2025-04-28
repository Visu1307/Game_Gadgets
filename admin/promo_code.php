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

if(isset($_POST['s1'])){
    $code=$_POST['t1'];
    $rate=$_POST['t2'];
    $sql="insert into promo_code(code,rate) values('".$code."',".$rate.")";
    $result=mysqli_query($conn,$sql);
    echo '<script>alert("Promo Code Added Successfully");</script>';
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Promo Codes</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="../icon/icons8-apple-arcade-50.png"/>
</head>

<body>
    <?php include './admin-nav.php' ?>
    <div class="text-center my-3 text-decoration-underline">
            <h2>Promo Codes Manager</h2>
    </div>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item mx-3">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Add Promo Code
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <input class="form-control form-control-lg" type="text" placeholder="Enter Promo Code Name" aria-label=".form-control-lg example" name="t1"><br />
                        <input class="form-control form-control-lg" type="text" placeholder="Enter Rate Of Discount" aria-label=".form-control-lg example" name="t2"><br />
                        <input type="submit" class="btn btn-outline-dark" value="Add" name="s1">
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="overflow-auto">
        <table class="table table-striped table-bordered mx-3 my-3" style="width: 1335px;">
            <tr>
                <th>Id</th>
                <th>Promo Code</th>
                <th>Rate Of Discount</th>
                <th style="width: 100px;" class="text-center">Operations</th>
            </tr>
            <?php
            $sql = "select * from promo_code";
            $res = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($res)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['code']; ?></td>
                    <td><?php echo $row['rate']; ?></td>
                    <td  class="text-center">
                        <a class="btn btn-light" href='del-promo.php?id=<?php echo $row['id']; ?>' onclick="return confirm('Are you sure to delete promo code?')"><img src="../icon/icons8-delete-30.png" class="img-fluid"></a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <script rel="text/javascript" src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
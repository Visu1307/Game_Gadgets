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
$emp_id = $_GET['id'];
$sql = "select * from users where id={$emp_id}";
$q = mysqli_query($conn, $sql);
if (isset($_POST['s1'])) {
    $user_id = $_POST['t1'];
    $nm = $_POST['t2'];
    $email = $_POST['t3'];
    $phno = $_POST['t4'];
    $username = $_POST['t5'];
    $password = $_POST['t6'];
    $upd = "update users set name = '{$nm}' , email = '{$email}' , phno = '{$phno}' , username = '{$username}', password = '{$password}' WHERE id =$user_id";
    $result = mysqli_query($conn, $upd) or die("Error");
    header("Location: user.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee Details</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="../icon/icons8-apple-arcade-50.png"/>
</head>

<body>
    <?php include '../admin/admin-nav.php'; ?>

    <div class="text-dark mx-3 my-3 text-decoration-underline">
        <h2>
            <center>Edit User Details</center>
        </h2>
    </div>

    <div class="card card-body mx-3 my-4">
        <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
            <?php while ($data = mysqli_fetch_assoc($q)) { ?>
                <input type="hidden" name="t1" value="<?php echo $data['id']; ?>">
                <div class="row">
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                        Full Name:-<br>
                        <input type="text" name="t2" value="<?php echo $data['name']; ?>">
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                        Email:-<br>
                        <input type="email" name="t3" value="<?php echo $data['email']; ?>">
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                        Contact:-<br>
                        <input type="text" name="t4" value="<?php echo $data['phno']; ?>">
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                        Username:-<br>
                        <input type="text" name="t5" value="<?php echo $data['username']; ?>">
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                        Password:-<br>
                        <input type="text" name="t6" value="<?php echo $data['password']; ?>">
                    </div>
                <?php } ?>
                <div class="row my-3">
                    <div class="col">
                        <input type="submit" class="btn btn-outline-dark" value="Update" name="s1">
                        &nbsp;&nbsp;
                        <a href="user.php" class="btn btn-outline-danger">Go Back</a>
                    </div>
                </div>
        </form>
    </div>
    <script rel="text/javascript" src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
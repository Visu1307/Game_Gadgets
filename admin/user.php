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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Master</title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="../icon/icons8-apple-arcade-50.png"/>
</head>

<body>
    <?php include 'admin-nav.php'; ?>
    <div class="text-center my-3 text-decoration-underline">
        <h2>User Master</h2>
    </div>

    <div class="overflow-auto">
    <table class="table table-striped table-bordered mx-3 my-3" style="width: 1335px;">
        <tr>
            <th>Full Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Username</th>
            <th>Password</th>
            <th style="width: 150px;" class="text-center">Operations</th>
        </tr>
        <?php
        $sql="select * from users";
        $q=mysqli_query($conn,$sql);
        while ($usr_row = mysqli_fetch_assoc($q)) { ?>
            <tr>
                <td><?php echo $usr_row['name']; ?></td>
                <td><?php echo $usr_row['email']; ?></td>
                <td><?php echo $usr_row['phno']; ?></td>
                <td><?php echo $usr_row['username']; ?></td>
                <td><?php echo $usr_row['password']; ?></td>
                <td><a href="edit-user.php?id=<?php echo $usr_row['id']; ?>" class="btn btn-light"><img src="../icon/icons8-edit-30.png" class="img-fluid"></a>&nbsp;&nbsp;
                <a href="del-user.php?id=<?php echo $usr_row['id']; ?>" class="btn btn-light" onclick="return confirm('Are you sure to delete this user?')"><img src="../icon/icons8-delete-30.png" class="img-fluid"></a></td>
            </tr>
        <?php } ?>
    </table>
        </div>
    <script rel="text/javascript" src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
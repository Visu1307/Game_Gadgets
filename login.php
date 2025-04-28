<?php
session_start();
include 'db_connect.php';
if (isset($_POST['s1'])) {
    $username = $_POST['t1'];
    $password = $_POST['t2'];
    $user_query = "select * from users where username='$username' AND password='$password' ";
    $admin_query = "select * from admin where username='$username' AND password='$password' ";
    $sql = mysqli_query($conn, $user_query);
    $data = mysqli_fetch_assoc($sql);
    if (mysqli_num_rows(mysqli_query($conn, $user_query)) == 1) {
        // session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['uid'] = $data['id'];
        $_SESSION['username'] = $username;
        header("Location: index.php");
    } elseif (mysqli_num_rows(mysqli_query($conn, $admin_query)) == 1) {
        // session_start();
        $_SESSION['admin_loggedin'] = true;
        $_SESSION['username'] = $username;
        header("Location: admin/dashboard-admin.php");
    } else {
        $isErr = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/png" href="icon/icons8-apple-arcade-50.png" />
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <?php include 'header.php' ?>
    <?php if ($isErr) echo '
<div class="d-flex justify-content-end">
    <div class="toast show text-bg-danger m-2" role="alert" aria-live="assertive" aria-atomic="true" style="position: absolute;z-index: 2;  ">
        <div class="toast-header">
            <img width="30" height="30" src="icon/icons8-error-30.png" class="rounded me-2" alt="error--v1" />
            <strong class="me-auto">Error</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Invalid Credentials :(
        </div>
    </div>';
    ?>
    </div>
    <section>
        <div class="content" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;">
            <div class="right">
                <div class="title">
                    <h2>Connect to Game Gadgets</h2>
                </div>
                <div class="form">
                    <form method="post">
                        <div class="inputbox">
                            <label>Username</label>
                            <input type="text" placeholder="Enter your username" name="t1" required>
                        </div>
                        <div class="inputbox">
                            <label>Password</label>
                            <input type="password" placeholder="Enter your Password" name="t2" required>
                        </div>
                        <div class="create">
                            <button type="submit" name="s1">Log In</button>
                        </div>
                        <div class="additional">
                            <p>Don't have an account ? <a href="register.php"><span>Register</span></a></p>
                        </div>
                    </form>
                </div>
            </div>
            <div class="left">
                <img src="icon/icons8-apple-arcade-100-white.png" alt="icon">
                <h1>GAME GADGETS</h1>
            </div>
        </div>
    </section>
    <div class="card text-center">
        <div class="card-header">
            Game Quote
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <p> "Gaming related content will redefine entertainment and I am looking forward to leading the way."</p>
                <footer class="blockquote-footer my-1">Dr. Disrespect</footer>
            </blockquote>
        </div>
    </div>
    <?php include 'footer.php' ?>
    <script rel="text/javascript" src="./bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
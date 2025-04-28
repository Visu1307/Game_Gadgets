<?php
$reg = false;
include 'db_connect.php';
if (isset($_POST['s1'])) {
    $query = "insert into users(name,email,phno,username,password) values('" . $_POST['t1'] . "','" . $_POST['t2'] . "','" . $_POST['t3'] . "','" . $_POST['t4'] . "','" . $_POST['t5'] . "')";
    if (mysqli_query($conn, $query)) {
        $reg = true;
    } else {
        echo '
        <div class="d-flex justify-content-end">
        <div class="toast align-items-center text-bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true" style="position:absolute; z-index:2;">
          <div class="toast-body text-bg-danger">
            Error creating account :(
          </div>
          <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
      </div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="icon" type="image/png" href="icon/icons8-apple-arcade-50.png" />
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/register.css">
</head>

<body>
<?php include 'header.php' ?>
    <section>
        <div class="content" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;">
            <?php if ($reg) { ?>
                <div class="d-flex justify-content-end">
                    <div class="toast show end-0" role="alert" aria-live="assertive" aria-atomic="true" style="position: absolute;z-index: 2;">
                        <div class="toast-body text-bg-success">
                            <img src="icon/icons8-tick.gif" height="25px" width=""> Your Account Has Been Created Successfully :)
                            <div class="mt-2 pt-2 border-top">
                                <a href="login.php" class="btn btn-dark btn-sm">Log In Now</a>&nbsp;&nbsp;
                                <a href class="btn btn-secondary btn-sm" data-bs-dismiss="toast">Close</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="left">
                <img src="icon/icons8-apple-arcade-100-white.png" alt="icon">
                <h1>GAME GADGETS</h1>
            </div>
            <div class="right">
                <div class="title">
                    <h2>Welcome to Game Gadgets</h2>
                </div>
                <div class="form">
                    <form method="post">
                        <div class="inputbox">
                            <label>Full Name</label>
                            <input type="text" placeholder="Enter your Name" name="t1" required>
                        </div>
                        <div class="inputbox">
                            <label>Email</label>
                            <input type="email" placeholder="Enter your Email ID" name="t2" required>
                        </div>
                        <div class="inputbox">
                            <label>Contact No</label>
                            <input type="number" placeholder="Enter your phone number" name="t3" required>
                        </div>
                        <div class="inputbox">
                            <label>Username</label>
                            <input type="text" placeholder="Choose your username" name="t4" required>
                        </div>
                        <div class="inputbox">
                            <label>Password</label>
                            <input type="password" placeholder="Choose your Password" name="t5" required>
                        </div>
                        <div class="create">
                            <button type="submit" name="s1">Create Account</button>
                        </div>
                        <div class="additional">
                            <p>Already have an account ?<a href="login.php"><span>Log In</span></a></p>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
    <div class="card text-center">
        <div class="card-header">
            Game Quote
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <p> "A famous explorer once said, that the extraordinary is in what we do, not who we are."</p>
                <footer class="blockquote-footer my-1">Lara Croft: Tomb Raider</footer>
            </blockquote>
        </div>
    </div>
    <?php include 'footer.php' ?>
    <script rel="text/javascript" src="./bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
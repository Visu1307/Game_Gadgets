<?php

error_reporting(0);
include 'db_connect.php';
$sql = "select * from category";
$q = mysqli_query($conn, $sql);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Game Gadgets</title>
</head>

<body>

    <!--Navbar Started-->
    <nav class="navbar bg-dark navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="icon/icons8-apple-arcade-35.png" class="img-fluid">&nbsp&nbspGame Gadgets</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" aria-placeholder="" id="navbarNavDropdown">
                <div class="ms-auto">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Categories
                            </a>
                            <ul class="dropdown-menu">
                                <?php while ($row = mysqli_fetch_assoc($q)) { ?>
                                    <li><a class="dropdown-item" href='product.php?id=<?php echo $row['id']; ?>'><?php echo $row['category_nm']; ?></a></li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact Us</a>
                        </li>
                        <?php if (isset($_SESSION['loggedin'])) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="cart.php">Cart
                                    (<?php
                                        $sql = "select * from cart where uid={$_SESSION['uid']}";
                                        $result = mysqli_query($conn, $sql);
                                        $noOfItems = mysqli_num_rows($result);
                                        echo $noOfItems;
                                        ?>)
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="order.php">My Orders</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Hi <?php echo $_SESSION['username']; ?>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                                </ul>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">Login</a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!--Navbar Ended-->
</body>

</html>
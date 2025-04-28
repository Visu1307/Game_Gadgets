<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>

<body>
    <!--Navbar Started-->
    <nav class="navbar bg-dark navbar-expand-lg bg-body-tertiary sticky-top" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="dashboard-admin.php"><img src="img/icons8-apple-arcade-35.png" class="img-fluid">&nbsp&nbspGame Gadgets</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" aria-placeholder="" id="navbarNavDropdown">
                <div class="ms-auto">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page" href="dashboard-admin.php">Dashboard</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Hi <?php echo $_SESSION['username']; ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-light" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                                ≡
                            </a>
                        </li>
                </div>
            </div>
        </div>
    </nav>
    <!--Navbar Ended-->
    <!--Offcanvas Started-->
    <div class="offcanvas offcanvas-start bg-black text-white" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title text-decoration-underline" id="offcanvasExampleLabel">Admin Panel</h5>
        </div>
        <div class="offcanvas-body">
            <div>
                You can customize each and every product, category, user, order from here.
            </div><br />
            <button class="btn btn-dark my-2"><a href="../admin/category.php" class="text-decoration-none text-white">Category
                    Master</a></button><br>
            <button class="btn btn-dark my-2"><a href="../admin/product.php" class="text-decoration-none text-white">Product
                    Master</a></button><br>
            <button class="btn btn-dark my-2"><a href="../admin/user.php" class="text-decoration-none text-white">User
                    Master</a></button><br>
            <button class="btn btn-dark my-2"><a href="order.php" class="text-decoration-none text-white">Order
                    Master</a></button><br>
            <button class="btn btn-dark my-2"><a href="promo_code.php" class="text-decoration-none text-white">Promo Code
                    Manager</a></button><br>

        </div>
    </div>
    <!--Offcanvas Ended-->
</body>

</html>
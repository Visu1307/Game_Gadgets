<?php

session_start();
if ($_SESSION['loggedin']) {
} else {
    echo '
    <script type="text/javascript">
    alert("You can not enter without logging in");
    window.location.href="login.php";
    </script>';
}
include 'db_connect.php';
$info = "select * from users where id={$_SESSION['uid']}";
$user = mysqli_query($conn, $info);
$isErr = false;
$sql = "select * from cart where uid={$_SESSION['uid']}";
$result = mysqli_query($conn, $sql);
$noOfItems = mysqli_num_rows($result);
$promoApplied = false;
$promos = mysqli_query($conn, "SELECT * FROM promo_code");
if (isset($_POST['s1'])) {
    $column_array = array();
    while ($row = mysqli_fetch_array($promos)) {
        $column_array[] = $row['code'];
    }
    $code = $_POST['promo_code'];
    if (in_array($code, $column_array)) {
        $promoApplied = true;
        $_SESSION['promo_code'] = $_POST['promo_code'];
    }
    else{
        $invalidPromo=true;
    }
}

if (isset($_POST['finalSubmit'])) {
    $uid = $_SESSION['uid'];
    $full_name = $_POST['t1'];
    $email = $_POST['t2'];
    $phno = $_POST['t3'];
    $address = $_POST['t4'];
    $city = $_POST['t5'];
    $country = $_POST['t6'];
    $state = $_POST['t7'];
    $zip = $_POST['t8'];
    $pay_mode = $_POST['t9'];
    $date = date('Y-m-d');
    $status = 1;
    if (isset($_SESSION['promo_code'])) {
        $ins = "insert into orders(uid,full_name,email,phno,address,city,country,state,zip,pay_mode,total_price,promo_code,rate,discount,discounted_price,date,status) values(" . $uid . ",'" . $full_name . "','" . $email . "'," . $phno . ",'" . $address . "','" . $city . "','" . $country . "','" . $state . "'," . $zip . ",'" . $pay_mode . "'," . $_SESSION['total_price'] . ",'" . $_SESSION['promo_code'] . "'," . $_SESSION['rate'] . "," . $_SESSION['discount'] . "," . $_SESSION['discounted_price'] . ",'" . $date . "','" . $status . "')";
    } else {
        $ins = "insert into orders(uid,full_name,email,phno,address,city,country,state,zip,pay_mode,total_price,date,status) values(" . $uid . ",'" . $full_name . "','" . $email . "'," . $phno . ",'" . $address . "','" . $city . "','" . $country . "','" . $state . "'," . $zip . ",'" . $pay_mode . "'," . $_SESSION['total_price'] . ",'" . $date . "','" . $status . "')";
    }
    if (mysqli_query($conn, $ins)) {
        $uid = $_SESSION['uid'];
        $order_id = mysqli_insert_id($conn);
        $sql = "select * from cart where uid={$_SESSION['uid']}";
        $result = mysqli_query($conn, $sql);
        while ($test = mysqli_fetch_assoc($result)) {
            $assoc_array = array('pid' => $test['pid'], 'image' => $test['image'], 'name' => $test['name'], 'price' => $test['price'], 'qty' => $test['qty']);
            $query = "INSERT INTO order_details(order_id,uid," . implode(",", array_keys($assoc_array)) . ") VALUES (" . $order_id . "," . $uid . ",'" . implode("','", array_values($assoc_array)) . "')";
            if (mysqli_query($conn, $query)) {
                if (mysqli_query($conn, "delete from cart where uid={$_SESSION['uid']}")) {
                    $orderPlaced = true;
                    unset($_SESSION['total_price']);
                    unset($_SESSION['promo_code']);
                    unset($_SESSION['discount']);
                    unset($_SESSION['discounted_price']);
                    unset($_SESSION['rate']);
                }
            }
        }
        if ($orderPlaced) {
            header("location: thankyou.php");
        } else {
            $isErr = true;
        }
    } else {
        $isErr = true;
    }
}
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <title>Checkout</title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="icon/icons8-apple-arcade-50.png" />
</head>

<body class="bg-body-tertiary">
    <?php include 'header.php'; ?>
    <div class="container">
        <?php if ($isErr) { ?>
            <div class="d-flex mt-3 justify-content-end">
                <div class="toast show text-bg-danger m-2" role="alert" aria-live="assertive" aria-atomic="true" style="position: absolute;z-index: 2;">
                    <div class="toast-header">
                        <img width="30" height="30" src="icon/icons8-error-30.png" class="rounded me-2" alt="error--v1" />
                        <strong class="me-auto">Error</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        Unable To Place Order :(
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php if ($invalidPromo) { ?>
            <div class="d-flex mt-3 justify-content-end">
                <div class="toast show text-bg-danger m-2" role="alert" aria-live="assertive" aria-atomic="true" style="position: absolute;z-index: 2;">
                    <div class="toast-header">
                        <img width="30" height="30" src="icon/icons8-error-30.png" class="rounded me-2" alt="error--v1" />
                        <strong class="me-auto">Error</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        Invalid Promotional Code :(
                    </div>
                </div>
            </div>
        <?php } ?>
        <main>
            <div class="py-5 text-center">
                <img class="d-block mx-auto" src="icon/icons8-checkout-100.png">
                <h2>Checkout form</h2>
            </div>
            <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-dark">Your cart</span>
                        <span class="badge bg-dark rounded-pill">
                            <?php echo $noOfItems; ?>
                        </span>
                    </h4>
                    <ul class="list-group mb-3">
                        <?php while ($data = mysqli_fetch_assoc($result)) { ?>
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0"><?php echo $data['name']; ?></h6>
                                </div>
                                <div>
                                    <h6 class="my-0"><?php echo "x" . $data['qty']; ?></h6>
                                </div>
                                <span class="text-body-secondary"><?php echo "₹" . $data['price'] ?></span>
                            </li>
                        <?php $total_price += $data['qty'] * $data['price'];
                            $_SESSION['total_price'] = $total_price;
                        } ?>
                        <?php if ($promoApplied) {  ?>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Total Price</span>
                                <s><?php echo "₹" . $total_price; ?></s>
                            </li>
                            <?php
                            $hello = "select * from promo_code where code like '%$code%' ";
                            $try = mysqli_query($conn, $hello);
                            while ($trail = mysqli_fetch_assoc($try)) {
                                $discount = $total_price * $trail['rate'] / 100;
                                $_SESSION['rate'] = $trail['rate'];
                                $_SESSION['discount'] = $discount;
                            ?>
                                <li class="list-group-item d-flex justify-content-between bg-body-tertiary">
                                    <div class="text-success">
                                        <h6 class="my-0">Promo Code</h6>
                                        <small><?php echo $trail['code']; ?></small>
                                    </div>
                                    <span class="text-success">−<?php echo $trail['rate'] . "%"; ?></span>
                                </li>
                            <?php } ?>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Discounted Price</span>
                                <strong><?php $discounted_price = $total_price - $discount;
                                        $_SESSION['discounted_price'] = $discounted_price;
                                        echo "₹" . $discounted_price; ?></strong>
                            </li>
                        <?php } else {
                            echo '
                            <li class="list-group-item d-flex justify-content-between">
                            <span>Total Price</span>
                            <strong>₹' . $total_price . ' </strong>
                            </li>';
                        }
                        ?>
                    </ul>
                    <?php if (!$promoApplied) { ?>
                        <form class="card p-2" method="post">
                            <div class="input-group">
                                <input type="text" name="promo_code" class="form-control" placeholder="Promo code">
                                <button type="submit" name="s1" class="btn btn-secondary">Redeem</button>
                            </div>
                        </form>
                    <?php } ?>
                </div>
                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3">Shipping address</h4>
                    <form class="needs-validation" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" novalidate>
                        <div class="row g-3">
                            <?php while ($userInfo = mysqli_fetch_assoc($user)) { ?>
                                <div class="col-12">
                                    <label for="fullName" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" id="firstName" name="t1" placeholder="Full Name" value="<?php echo $userInfo['name']; ?>" required>
                                    <div class="invalid-feedback">
                                        Valid first name is required.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="t2" value="<?php echo $userInfo['email']; ?>" id="email" placeholder="you@example.com">
                                    <div class="invalid-feedback">
                                        Please enter a valid email address for shipping updates.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="phno" class="form-label">Contact No.</label>
                                    <input type="number" class="form-control" id="phno" name="t3" value="<?php echo $userInfo['phno']; ?>" placeholder="123456789" required>
                                    <div class="invalid-feedback">
                                        Please enter your contact no.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" name="t4" placeholder="1234 Main St" required>
                                    <div class="invalid-feedback">
                                        Please enter your shipping address.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="city" class="form-label">City</label>
                                    <input type="text" class="form-control" id="city" name="t5" placeholder="Texas" required>
                                    <div class="invalid-feedback">
                                        Please enter your city.
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <label for="country" class="form-label">Country</label>
                                    <select class="form-select" id="country" name="t6" required>
                                        <option value="">Choose...</option>
                                        <option>India</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a valid country.
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="state" class="form-label">State</label>
                                    <select class="form-select" name="t7" id="state" required>
                                        <option value="">Choose...</option>
                                        <option>Gujarat</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please provide a valid state.
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="zip" class="form-label">Zip</label>
                                    <input type="text" class="form-control" name="t8" id="zip" placeholder="123456" required>
                                    <div class="invalid-feedback">
                                        Zip code required.
                                    </div>
                                </div>
                        </div>
                    <?php } ?>
                    <hr class="my-4">

                    <h4 class="mb-3">Payment</h4>

                    <div class="my-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDisabled" id="flexRadioDisabled" disabled>
                            <label class="form-check-label" for="flexRadioDisabled">
                                Credit Card
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDisabled" id="flexRadioDisabled" disabled>
                            <label class="form-check-label" for="flexRadioDisabled">
                                Debit Card
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDisabled" id="flexRadioDisabled" disabled>
                            <label class="form-check-label" for="flexRadioDisabled">
                                UPI
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" value="Cash On Delivery" type="radio" name="t9" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Cash On Delivery
                            </label>
                        </div>

                        <hr class="my-4">

                        <button class="w-100 btn btn-dark btn-lg" name="finalSubmit" type="submit">Place Order -></button>
                    </form>
                </div>
            </div>
        </main>
    </div>
    <div class="card text-center mt-5">
        <div class="card-header">
            Game Quote
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <p>"A sword wields no strength unless the hands that holds it has courage."</p>
                <footer class="blockquote-footer my-1">Legend of Zelda: Twilight Princess</footer>
            </blockquote>
        </div>
    </div>
    <?php include 'footer.php' ?>
    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script rel="text/javascript" src="./bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<!-- Add this script tag at the end of your HTML body -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Fetch the form element
        var form = document.querySelector('.needs-validation');

        // Prevent form submission and handle validation
        form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }

            form.classList.add('was-validated');
        }, false);
    });
</script>
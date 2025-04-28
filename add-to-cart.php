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
$pid=$_GET['id'];
$sql = "select * from products where id=$pid";
$products = mysqli_query($conn, $sql);

$result = mysqli_query($conn, "SELECT pid FROM cart where uid={$_SESSION['uid']}");
$column_array = array();
while ($row = mysqli_fetch_array($result)) {
    $column_array[] = $row['pid'];
}
if (in_array($pid, $column_array)) {
    echo 
    "<script>
        alert('Product Already Added To Cart :(');
        window.location.href='index.php';
    </script>";
} else {
    $data=mysqli_fetch_assoc($products);
    $uid = $_SESSION['uid'];
    $pid = $data['id'];
    $image = $data['image'];
    $name = $data['name'];
    $price = $data['selling_price'];
    $qty = 1;
    $sql = "insert into cart(uid,pid,image,name,price,qty) values(" . $uid . "," . $pid . ",'" . $image . "','" . $name . "'," . $price . "," . $qty . ")";
    $result = mysqli_query($conn, $sql);
    header("location: cart.php");
}
?>
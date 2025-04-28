<?php

session_start();
include 'db_connect.php';
if (isset($_POST['s1'])) {
  $name = $_POST['t1'];
  $email = $_POST['t2'];
  $message = $_POST['t3'];
  $ins = "insert into contact_us(name,email,message) values('$name','$email','$message')";
  $result = mysqli_query($conn, $ins);
  echo "
  <script>
    alert('Your response has been submitted successfully');
    window.location.href='index.php';
  </script>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us</title>
  <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/contact_us.css">
  <link rel="icon" type="image/png" href="icon/icons8-apple-arcade-50.png" />
</head>
<body>
  <?php include 'header.php' ?>
  <div>
    <div class="contact-form-wrapper d-flex justify-content-center">
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="contact-form">
        <h5 class="title">Contact us</h5>
        <p class="description">Feel free to contact us if you need any assistance, any help or another question.
        </p>
        <div>
          <input type="text" name="t1" class="form-control rounded border-white mb-3 form-input" id="name" placeholder="Name" required>
        </div>
        <div>
          <input type="email" name="t2" class="form-control rounded border-white mb-3 form-input" placeholder="Email" required>
        </div>
        <div>
          <textarea id="message" name="t3" class="form-control rounded border-white mb-3 form-text-area" rows="5" cols="30" placeholder="Message" required></textarea>
        </div>
        <div class="submit-button-wrapper">
          <input type="submit" name="s1" value="Send">
        </div>
      </form>
    </div>
  </div>
  <div class="card text-center">
    <div class="card-header">
      Game Quote
    </div>
    <div class="card-body">
      <blockquote class="blockquote mb-0">
        <p>"What is better – To be born good, or to overcome your evil nature through great effort?"</p>
        <footer class="blockquote-footer my-1">The Elder Scrolls V: Skyrim</footer>
      </blockquote>
    </div>
  </div>
  <?php include 'footer.php' ?>
  <script rel="text/javascript" src="./bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
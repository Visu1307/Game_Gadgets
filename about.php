<?php

session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>About Us</title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/about_us.css">
    <link rel="icon" type="image/png" href="icon/icons8-apple-arcade-50.png"/>
</head>

<body>
    <?php include 'header.php' ?>
    <section class="section_all bg-light" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title_all text-center">
                        <img src="icon/icons8-apple-arcade-100.png">
                        <h3 class="font-weight-bold">Welcome To <span class="text-custom">Game Gadgets</span></h3>
                        <p class="section_subtitle mx-auto text-muted">Your ultimate destination for all things gaming! We are more than just an ecommerce website; we're a community of passionate gamers who understand your insatiable thirst for immersive experiences, high-quality gear, and cutting-edge technology. </p>
                        <div class="">
                            <i class=""></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row vertical_content_manage mt-5">
                <div class="col-lg-6">
                    <div class="about_header_main mt-3">
                        <div class="about_icon_box">
                            <p class="text_custom font-weight-bold">Here at Game Gadgets, We're not just selling gaming products,<br>We deliver tools that enhance your gaming and elevate it to new heights.</p>
                        </div>
                        <h4 class="about_heading text-capitalize font-weight-bold mt-4">Our Mission</h4>
                        <p class="text-muted mt-3">At Game Gadgets, our mission is crystal clear: to fuel your gaming obsession by providing a curated selection of top-notch gaming products that cater to beginners, enthusiasts, and professionals alike.</p>

                        <p class="text-muted mt-3">We believe that gaming is more than a pastime – it's a way of life. Our goal is to empower you with the gear you need to excel, whether you're diving into virtual worlds, competing in esports tournaments, or simply enjoying quality gaming time with friends.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="img_about mt-3">
                        <img src="image/GAME GADGETS.png" alt="" class="img-fluid mx-auto d-block">
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-4">
                    <div class="about_content_box_all mt-3">
                        <div class="about_detail text-center">
                            <div class="about_icon">
                                <img src="icon/icons8-quality-assurance-75.png">
                            </div>
                            <h5 class="text-dark text-capitalize mt-3 font-weight-bold">Quality Assurance</h5>
                            <p class="edu_desc mt-3 mb-0 text-muted">We stand behind the quality of every product we offer. Each item is sourced from reputable brands and manufacturers.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="about_content_box_all mt-3">
                        <div class="about_detail text-center">
                            <div class="about_icon">
                                <img src="icon/icons8-customer-satisfaction-75.png">
                            </div>
                            <h5 class="text-dark text-capitalize mt-3 font-weight-bold">Customer Satisfaction</h5>
                            <p class="edu_desc mb-0 mt-3 text-muted">Your satisfaction is our top priority. We strive to deliver a seamless shopping experience, from browsing to checkout and beyond.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="about_content_box_all mt-3">
                        <div class="about_detail text-center">
                            <div class="about_icon">
                                <img src="icon/icons8-discovery-75.png">
                            </div>
                            <h5 class="text-dark text-capitalize mt-3 font-weight-bold">Continuos Innovation</h5>
                            <p class="edu_desc mb-0 mt-3 text-muted">The gaming industry evolves rapidly, and so do we. We stay up-to-date with the latest trends, technologies to keep our product range exciting.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-3"><strong>
                    Thank you for choosing Game Gadgets as your gaming companion.<br>
                    Game on!<br>
                    -The Game Gadgets Team</strong>
            </div>
        </div>
    </section>
    <div class="card text-center">
        <div class="card-header">
            Game Quote
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <p>"A strong man doesn’t need to read the future. He makes his own."</p>
                <footer class="blockquote-footer my-1">Metal Gear Solid</footer>
            </blockquote>
        </div>
    </div>
    <?php include 'footer.php' ?>
    <script rel="text/javascript" src="./bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
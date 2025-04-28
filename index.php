<?php

error_reporting(0);
session_start();

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php
        if ($_SESSION['loggedin']) {
            echo "Welcome " . $_SESSION['username'] . "!";
        } else {
            echo "Game Gadgets";
        }
        ?>
    </title>
    <link rel="icon" type="image/png" href="icon/icons8-apple-arcade-50.png"/>
    <link rel="stylesheet" href="carousel-03/css/owl.carousel.min.css">
    <link rel="stylesheet" href="carousel-03/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
    <link rel="stylesheet" href="carousel-03/css/style.css">
    <?php include './config/config.php' ?>
</head>

<body>
    <?php include 'header.php' ?>

    <!--Carousel Started-->
    <div id="carouselExampleCaptions" class="carousel slide carousel-fade">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="image/playstation-5-crop.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h4>PlayStation 5</h4>
                    <p>Unleash The Gamer Inside You</p>
                    <a href="product-details.php?id=1" class="text-decoration-none text-white"><button type="button" class="btn btn-outline-light">Shop Now</button></a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="image/controller11-crop.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <div class="text-light">
                        <h4>DualSense Wireless Controller</h4>
                        <p>Discover a deep, highly immersive gaming experience that brings the action to life in the palms of your
                            hands.</p>
                    </div>
                    <a href="product-details.php?id=8" class="text-decoration-none text-white"><button type="button" class="btn btn-outline-light">Shop Now</button></a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="image/rdr2-game.jpg" class="img-fluid" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h4>Red Dead Redemption 2</h4>
                    <p>RDR2 is a Western-themed action-adventure game. Played from a first- or third-person perspective, the game is set in an open-world environment featuring a fictionalized version of the United States in 1899.</p>
                    <a href="product-details.php?id=23" class="text-decoration-none text-white"><button type="button" class="btn btn-outline-light">Shop Now</button></a>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!--Carousel Ended-->

        <div class="text-center text-black my-3 text-decoration-underline">
            <h2>Shop By Category</h2>
        </div>

        <!--Cards Started-->
        <center>
            <div class="container-fluid col-sm-4 col-md-6 col-lg-10 col-xl-12">
                <div class="row">
                    <div class="col mx-4">
                        <div class="card" style="width: 18rem; height: 27rem; box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;">
                            <img src="image/xbox.jpeg" class="card-img-top img-fluid" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Gaming Consoles</h5>
                                <p class="card-text">Dive into the world of gaming.</p>
                                <a href="product.php?id=1" class="btn btn-outline-dark">Explore Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col mx-4">
                        <div class="card" style="width: 18rem; height: 27rem; box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;">
                            <img src="image/handheld.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Handheld Consoles</h5>
                                <p class="card-text">All gaming at your fingertips.</p>
                                <a href="product.php?id=2" class="btn btn-outline-dark">Explore Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col mx-4">
                        <div class="card" style="width: 18rem; height: 27rem; box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;">
                            <img src="image/monitor.jpeg" class="card-img-bottom" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Gaming Monitors</h5>
                                <p class="card-text">Enhance your view of gaming.</p>
                                <a href="product.php?id=4" class="btn btn-outline-dark">Explore Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </center>
        <!--Cards Ended-->


        <hr class="featurette-divider">

        <div class="text-center text-black text-decoration-underline">
            <h2>Featured Products</h2>
        </div>

        <!--Specialized Fields-->

        <div class="container-fluid col-sm-4 col-md-6 col-lg-10 col-xxl-12 my-3">
            <div class="row">
                <div class="col-md-6 my-5">
                    <h1>PlayStation VR2</h1>
                    <h5>Immerse yourself in epic worlds that go beyond reaility.</h5>
                    <p>Expirence the next generation of virtual reaility play with stunning 4K HDR visuals, genre-defining games and unique sensations from ground breaking PlaySation VR2 headset and PlayStation VR2 Sense Controller</p>
                    <a href="product-details.php?id=33" class="btn btn-outline-dark">Shop Now</a>
                </div>
                <div class="col-md-6">
                    <div><img src="image/vr2.png" class="img-fluid"></div>
                </div>
            </div>
        </div>

        <div class="container-fluid bg-black">
            <div class="row">
                <div class="col-md-6">
                    <div class="mx-5"><img src="image/rog-ally-PhotoRoom.png-PhotoRoom.png" class="img-fluid"></div>
                </div>
                <div class="col-md-6 text-white my-5">
                    <h2>ROG Ally</h2>
                    <p class="my-3">Get yourself the Asus ROG Ally Handheld Gaming PC, and let its outstanding performance appeal to your inner gamer.<br>
                        The ROG Ally is an incredibly powerful portable gaming system powered by RDNA 3 graphics and outfitted with AMDs innovative, customisable Ryzen Z1 Extreme CPUs, allowing you to game for an extended period of time without experiencing any issues.
                    </p>
                    <a href="product-details.php?id=25" class="btn btn-outline-light">Shop Now</a>
                </div>
            </div>
        </div>

        <div class="container-fluid col-sm-4 col-md-6 col-lg-10 col-xxl-12">
            <div class="row">
                <div class="col-md-6" style="padding:50px;">
                    <h2>Logitech G923 Racing Wheel and Pedals,Dual Clutch, for Motion Controller</h2>
                    <p class="my-3">You can enjoy your favourite racing games with the help of the Logitech G923 Racing Wheel Motion Controller.<br>
                        The PS4 and PS5 controls are placed on the steering wheel so that you can easily control this controller while racing.</p>
                    <a href="product-details.php?id=40" class="btn btn-outline-dark">Shop Now</a>
                </div>
                <div class=" col-md-6">
                    <div class="my-5 mx-5"><img src="product-images/logitech-steering-wheel.webp" class="img-fluid"></div>
                </div>
            </div>
        </div>

        <div class="container-fluid bg-black">
            <div class="row">
                <div class="col-md-6">
                    <div class="mx-5 my-5"><img src="image/samsung-monitor-PhotoRoom.png-PhotoRoom.png" class="img-fluid"></div>
                </div>
                <div class="col-md-6 text-white my-5">
                    <h2>
                        SAMSUNG Odyssey G8 34 inch Curved UWQHD VA Panel</h2>
                    <p class="my-3">See it all on one screen
                        For worlds of gaming and more.<br>
                        The 49-inch super ultra-wide curved panels 32:9 aspect ratio keeps games alive—even when you need to pause the game.
                    </p>
                    <a href="product-details.php?id=41" class="btn btn-outline-light">Shop Now</a>
                </div>
            </div>
        </div>

        <!-- <div class="container-fluid col-sm-4 col-md-6 col-lg-10 col-xxl-12 ">
            <div class="row">
                <div class="col-md-6 my-5">
                    <h2>PULSE 3D™ Wireless Headset</h2>
                    <h3>Built for new generation</h3>
                    <h4>Fine-tuned for 3D Audio</h4>
                    <p>The PULSE 3D wireless headset has been specifically tuned to deliver the 3D Audio made possible by the
                        PlayStation®5 console.</p>
                    <a href="#" class="btn btn-outline-dark">Shop Now</a>
                </div>
                <div class="col-md-6">
                    <div><img src="image/pulse3d-headset.jpg" class="img-fluid"></div>
                </div>
            </div>
        </div> -->
        <!--Self-Rotating Cards Started-->
        <section class="ftco-section">
            <div class="container-fluid col-sm-4 col-md-6 col-lg-10 col-xxl-12">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1 class="heading-section mb-5">Popular Gaming Discs</h1>
                    </div>
                    <div class="col-md-12">
                        <div class="featured-carousel owl-carousel">
                            <div class="item">
                                <div class="work">
                                    <div class="img d-flex align-items-end justify-content-center" style="background-image: url(image/rdr2-disc.jpg);">
                                        <div class="text w-100">
                                            <h3><a href="product-details.php?id=23" class="text-decoration-none">RDR2</a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="work">
                                    <div class="img d-flex align-items-end justify-content-center" style="background-image: url(image/miles-morales.jpg);">
                                        <div class="text w-100">
                                            <h3><a href="product-details.php?id=24" class="text-decoration-none">Miles Morales</a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="work">
                                    <div class="img d-flex align-items-end justify-content-center" style="background-image: url(image/fifa.jpg);">
                                        <div class="text w-100">
                                            <h3><a href="product-details.php?id=28" class="text-decoration-none">FIFA 23</a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="work">
                                    <div class="img d-flex align-items-end justify-content-center" style="background-image: url(image/gtav.jpg);">
                                        <div class="text w-100">
                                            <h3><a href="product-details.php?id=55" class="text-decoration-none">GTA V</a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="work">
                                    <div class="img d-flex align-items-end justify-content-center" style="background-image: url(image/unchartered.jpg);">
                                        <div class="text w-100">
                                            <h3><a href="product-details.php?id=36" class="text-decoration-none">UNCHARTERED</a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="work">
                                    <div class="img d-flex align-items-end justify-content-center" style="background-image: url(image/hogwarts-legacy-crop.jpg);">
                                        <div class="text w-100">
                                            <h3><a href="product-details.php?id=49" class="text-decoration-none">HOGWARTS LEGACY</a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Self-Rotating Cards Ended-->

        <hr>

        <!--End Specialized-->

        <div class="row">
            <div class="col"></div>
            <div class="col">
                <div class="text-black text-center my-4">
                    <h2>Gaming Bundles</h2>
                </div>
            </div>
            <div class="col"></div>
        </div>

        <!--CardGroup Started-->

        <div class="card-group container-fluid col-sm-4 col-md-6 col-lg-8 col-xl-12 my-3">
            <div class="card">
                <img src="product-images/ps5-cod.webp" class="card-img-top my-3 img-fluid" alt="...">
                <div class="card-body my-1">
                    <h5 class="card-title">PlayStation 5 + COD Morden Warfare 2</h5>
                    <p class="card-text">Brace yourself for a whole new world of possibilities as the PS5 unleashes unparalleled power and innovation.
                        Get ready to elevate your gaming experience to new heights with the Sony PlayStation 5 Console.</p>
                    <div class="d-grid gap-2">
                        <a href="product-details.php?id=29" class="text-decoration-none"><button class="btn btn-outline-dark col-12" type="button">Shop Now</button></a>
                    </div>
                </div>
            </div>
            <div class="card">
                <img src="product-images/xbox-diablo.webp" class="card-img-top my-5 img-fluid" alt="...">
                <div class="card-body my-3">
                    <h5 class="card-title">
                        Xbox Series X + Diablo IV</h5>
                    <p class="card-text">Join the endless battle between the High Heavens and Burning Hells with the Xbox Series X – Diablo® IV Bundle. Includes Diablo IV® & bonus in-game items</p>
                    <div class="d-grid gap-2">
                        <a href="product-details.php?id=31" class="text-decoration-none"><button class="btn btn-outline-dark col-12" type="button">Shop Now</button></a>
                    </div>
                </div>
            </div>
            <div class="card">
                <img src="product-images/nintendo-pokemon.webp" class="card-img-top my-5 img-fluid" alt="...">
                <div class="card-body my-5">
                    <h5 class="card-title">
NINTENDO Switch OLED Console with White Joy Con with Pokemon Legends Arceus</h5>
                    <p class="card-text">Nintendo Oled White Bundled With Pokémon Legends: Arceus
Take your gaming experience up a whole new level
The new system features a vibrant 7-inch OLED screen.</p>
                    <div class="d-grid gap-2">
                        <a href="product-details.php?id=52" class="text-decoration-none"><button class="btn btn-outline-dark col-12" type="button">Shop Now</button></a>
                    </div>
                </div>
            </div>
        </div>

        <!--CardGroup Ended-->

        <!--Quote Started-->

        <div class="card text-center">
            <div class="card-header">
                Game Quote
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <p>"Hope is what makes us strong. It is why we are here. It is what we fight with when all else is lost."</p>
                    <footer class="blockquote-footer my-1">God Of War 3</footer>
                </blockquote>
            </div>
        </div>
        <!--Quote Ended-->
        <?php include 'footer.php' ?>
        <script src="carousel-03/js/jquery.min.js"></script>
        <script src="carousel-03/js/popper.js"></script>
        <script src="carousel-03/js/bootstrap.min.js"></script>
        <script src="carousel-03/js/owl.carousel.min.js"></script>
        <script src="carousel-03/js/main.js"></script>
</body>

</html>
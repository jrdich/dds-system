<?php


session_start();
include_once "queries/dbConnection.php";




?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Gym Template">
    <meta name="keywords" content="Gym, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gym | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="template-files/css/bootstrap.min.css" type="text/css">
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="template-files/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="template-files/css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="template-files/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="template-files/css/barfiller.css" type="text/css">
    <link rel="stylesheet" href="template-files/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="template-files/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="template-files/css/style.css" type="text/css">

    <link rel="stylesheet" href="dist/sweetAlert/sweetalert2.min.css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Section Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <i class="fa fa-close"></i>
        </div>
        <div class="canvas-search search-switch">
            <i class="fa fa-search"></i>
        </div>
        <nav class="canvas-menu mobile-menu">
            <ul>
                <li><a href="./index.html">Home</a></li>
                <li><a href="./classes.html">Classes</a></li>
                <li><a href="./services.html">Services</a></li>
                <li><a href="./team.html">Our Team</a></li>
                <li><a href="#">Pages</a>
                    <ul class="dropdown">
                        <li><a href="./about-us.html">About us</a></li>
                        <li><a href="./class-timetable.html">Classes timetable</a></li>
                        <li><a href="./bmi-calculator.html">Bmi calculate</a></li>
                        <li><a href="./team.html">Our team</a></li>
                        <li><a href="./gallery.html">Gallery</a></li>
                        <li><a href="./blog.html">Our blog</a></li>
                        <li><a href="./404.html">404</a></li>
                    </ul>
                </li>
                <li><a href="./contact.html">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="canvas-social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-youtube-play"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
        </div>
    </div>
    <!-- Offcanvas Menu Section End -->

    <!-- Header Section Begin -->
    <header class="header-section p-2 bg-dark">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="logo">
                        <a href="./index.html">
                            <img src="dist/images/DDS.png" height="70px" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="nav-menu">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="#">BMI Calculator</a></li>
                            <li><a href="./class-details.html">Calendar</a></li>
                            <li class="active"><a href="#">Programs</a>
                                <ul class="dropdown">
                                    <li><a href="#">Diatary</a>
                                        <ul class="dropdown">
                                            <li><a href="./about-us.html">Loss Weight</a></li>
                                            <li><a href="./class-timetable.html">Gain Weight</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="./class-timetable.html">Exercise</a></li>
                                </ul>
                            </li>
                            <li><a href="./contact.html">Feedback</a></li>
                            <li><a href="./about-us.html">About Us</a></li>
                            <li><a href="./team.html">Settings</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="top-option">
                        <div>
                            <?php if (!isset($_SESSION['username'])) : ?>
                                <a href="userSignin.php">Sign in</a>
                            <?php endif; ?>
                            <?php if (isset($_SESSION['username'])) : ?>
                                <a href="userSignin.php"><?= $_SESSION['username']; ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="canvas-open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header End -->



    <!-- Classes Section Begin -->
    <section class="classes-section spad" style="height: 100vh;">
        <div class="container">
            <form action="" method="POST">
                <div class="row mt-5 justify-content-center">
                    <div class="col-3">
                        <fieldset class="form-group">
                            <select class="form-select" name="bmiRange" id="basicSelect">
                                <option>BMI Range</option>
                                <option value="Below 18.5">Below 18.5</option>
                                <option value="18.5 to 24.9">18.5 to 24.9</option>
                                <option value="25 to 29.9">25 to 29.9</option>
                                <option value="30 or Greater">30 or Greater</option>
                            </select>
                        </fieldset>
                    </div>
                    <div class="col-3">
                        <button class="btn btn-primary" name="submitBtn">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- ChoseUs Section End -->


    <!-- Gallery Section Begin -->
    <!-- <div class="gallery-section">
        <div class="gallery">
            <div class="grid-sizer"></div>
            <div class="gs-item grid-wide set-bg" data-setbg="img/gallery/gallery-1.jpg">
                <a href="img/gallery/gallery-1.jpg" class="thumb-icon image-popup"><i class="fa fa-picture-o"></i></a>
            </div>
            <div class="gs-item set-bg" data-setbg="img/gallery/gallery-2.jpg">
                <a href="img/gallery/gallery-2.jpg" class="thumb-icon image-popup"><i class="fa fa-picture-o"></i></a>
            </div>
            <div class="gs-item set-bg" data-setbg="img/gallery/gallery-3.jpg">
                <a href="img/gallery/gallery-3.jpg" class="thumb-icon image-popup"><i class="fa fa-picture-o"></i></a>
            </div>
            <div class="gs-item set-bg" data-setbg="img/gallery/gallery-4.jpg">
                <a href="img/gallery/gallery-4.jpg" class="thumb-icon image-popup"><i class="fa fa-picture-o"></i></a>
            </div>
            <div class="gs-item set-bg" data-setbg="img/gallery/gallery-5.jpg">
                <a href="img/gallery/gallery-5.jpg" class="thumb-icon image-popup"><i class="fa fa-picture-o"></i></a>
            </div>
            <div class="gs-item grid-wide set-bg" data-setbg="img/gallery/gallery-6.jpg">
                <a href="img/gallery/gallery-6.jpg" class="thumb-icon image-popup"><i class="fa fa-picture-o"></i></a>
            </div>
        </div>
    </div> -->
    <!-- Gallery Section End -->



    <!-- Footer Section Begin -->
    <section class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="copyright-text">
                        <p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | dietdiarysystem
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer Section End -->

    <!-- Search model Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- Js Plugins -->
    <script src="template-files/js/jquery-3.3.1.min.js"></script>
    <script src="template-files/js/bootstrap.min.js"></script>
    <script src="template-files/js/jquery.magnific-popup.min.js"></script>
    <script src="template-files/js/masonry.pkgd.min.js"></script>
    <script src="template-files/js/jquery.barfiller.js"></script>
    <script src="template-files/js/jquery.slicknav.js"></script>
    <script src="template-files/js/owl.carousel.min.js"></script>
    <script src="template-files/js/main.js"></script>
    <script src="dist/sweetAlert/sweetalert2.min.js"></script>

</body>




</html>
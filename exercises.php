<?php


session_start();
include_once "queries/dbConnection.php";

// if (isset($_POST['selectBtn'])) {

//     $find = "SELECT * FROM programs WHERE category = 'Dietary' AND (bmi_range = '$_POST[bmiRange]' AND p_select = '$_POST[program]')";
//     $findQuery = $conn->query($find);
//     $queryAssoc = $findQuery->fetch_all(MYSQLI_ASSOC);
// } else {
//     $find = "SELECT * FROM programs WHERE category = 'Dietary'";
//     $findQuery = $conn->query($find);
//     $queryAssoc = $findQuery->fetch_all(MYSQLI_ASSOC);
// }





?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Gym Template">
    <meta name="keywords" content="Gym, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DDS | Exercise</title>

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
                            <li><a href="bmiCalculator.php">BMI Calculator</a></li>
                            <!-- <li><a href="./class-details.html">Calendar</a></li> -->
                            <li class="active"><a href="#">Programs</a>
                                <ul class="dropdown">
                                    <li><a href="diatary.php">Dietary</a>
                                    </li>
                                    <li><a href="#">Exercise</a></li>
                                </ul>
                            </li>
                            <li><a href="./contact.html">Feedback</a></li>
                            <li><a href="about_us.php">About Us</a></li>
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
    <section class="classes-section spad">

        <form method="post">
            <div class="row justify-content-center align-items-center mt-4">
                <div class="col-3">
                    <label class="text-white">Select Your Program</label>
                    <select class="form-select" name="program">
                        <option value="Lose Weight">Stamina</option>
                        <option value="Gain Weight">Agility</option>
                        <option value="Gain Weight">Power/Strength</option>
                    </select>
                </div>
                <div class="col-3">
                    <label class="text-white">No need to select Your BMI RANGE</label>
                    <select class="form-select" name="bmiRange">
                        <option value="none">None</option>
                        <option value="Below 18.5">Below 18.5</option>
                        <option value="18.5 to 24.9">18.5 to 24.9</option>
                        <option value="25 to 29.9">25 to 29.9</option>
                        <option value="30 or Greater">30 or Greater</option>
                    </select>
                </div>
                <div class="col-1">
                    <button type="submit" class="btn btn-primary" name="selectBtn" style="margin-top: 2rem;">Select</button>
                </div>
                <div class="col-2">
                    <div class="text-end mt-4 mr-4">
                        <a href="history.php" class="" style="color: #cc5500;font-size:40px"><b>History</b></a>
                    </div>
                </div>

            </div>


        </form>



        <div class="container" style="margin-top:-3em">

            <div class="row">
                <?php foreach ($queryAssoc as $key => $row) : ?>
                    <?php if ($row['p_select'] == "Gain Weight") : ?>
                        <div class="col-4">
                            <div class="card" style="width: 18rem;">
                                <img src="<?= substr($row['content_image'], 3, strlen($row['content_image'])); ?>" class="card-img-top" alt="..." style="height: 180px">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $row['p_select'] ?></h5>
                                    <p class="card-text">Weight gain is an increase in body weight. This can involve an increase in muscle mass, fat deposits, excess fluids such as water or other factors. Weight gain can be a symptom of a serious medical condition.</p>
                                    <a href="userProgress.php?programId=<?= $row['programs_id'] ?>&username=<?= $_SESSION['username'] ?>" class="btn btn-primary">Confirm</a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if ($row['p_select'] == "Lose Weight") : ?>
                        <div class="col-4">

                            <div class="card" style="width: 18rem;">
                                <img src="<?= substr($row['content_image'], 3, strlen($row['content_image'])); ?>" class="card-img-top" alt="..." style="height: 180px">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $row['p_select'] ?></h5>
                                    <p class="card-text">Weight loss, in the context of medicine, health, or physical fitness, refers to a reduction of the total body mass, by a mean loss of fluid, body fat (adipose tissue).</p>
                                    <a href="userProgress.php?programId=<?= $row['programs_id'] ?>&username=<?= $_SESSION['username'] ?>" class="btn btn-primary">Confirm</a>

                                </div>

                            </div>


                        </div>

                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>

    </section>
    <!-- ChoseUs Section End -->




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

<script>
    // var clearBtn = document.querySelector(".clearBtn");
    // var weightInput = document.querySelector(".weightInput");
    // var heightInput = document.querySelector(".heightInput");

    // clearBtn.addEventListener("click", () => {

    //     weightInput.value = '';
    //     heightInput.value = '';

    // });
</script>

<?php

// if (isset($_POST['computeBtn'])) {

//     $userExist = "SELECT * FROM bmi_tracker WHERE username = '$_SESSION[username]'";

//     $queryResult = $conn->query($userExist);


//     if ($queryResult->num_rows > 0) {

//         $weight = $_POST['weight'];
//         $height = $_POST['height'];

//         $hightForm = $height ** 2;

//         $BMIFromula =  $weight / $hightForm;

//         $formula = number_format($BMIFromula, 2);

//         $insertBMI = "UPDATE bmi_tracker
//         SET username = '$_SESSION[username]', 
//         height = '$height',
//         weight = '$weight', 
//         bmiResult = '$formula'
//         WHERE username = '$_SESSION[username]'";

//         $conn->query($insertBMI);

//         echo "
//         <script>
//         window.location.href = 'bmiCalculator.php?bmiResult=" . $formula . "';
//         </script>
//         ";
//     } else {
//         $weight = $_POST['weight'];
//         $height = $_POST['height'];

//         $hightForm = $height ** 2;

//         $BMIFromula =  $weight / $hightForm;

//         $formula = number_format($BMIFromula, 2);

//         $insertBMI = "INSERT INTO bmi_tracker (username, height, weight, bmiResult)
//         VALUES ('$_SESSION[username]', '$height', '$weight', '$formula')";

//         $conn->query($insertBMI);

//         echo "
//         <script>
//         window.location.href = 'bmiCalculator.php?bmiResult=" . $formula . "';
//         </script>
//         ";
//     }
// }


?>

</html>
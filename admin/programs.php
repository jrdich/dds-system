<?php

include_once "../queries/dbConnection.php";

include_once "randomString.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DDS System - ADMIN</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="template/assets/css/bootstrap.css">

    <link rel="stylesheet" href="template/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="template/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="template/assets/css/app.css">
    <link rel="stylesheet" href="template/assets/vendors/quill/quill.bubble.css">
    <link rel="stylesheet" href="template/assets/vendors/quill/quill.snow.css">
    <link rel="shortcut icon" href="template/assets/images/favicon.svg" type="image/x-icon">

    <link rel="stylesheet" href="../dist/sweetAlert/sweetalert2.min.css">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><img src="template/assets/images/logo/logo.png" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item  ">
                            <a href="index.html" class='sidebar-link'>
                                <i class="bi bi-people-fill"></i>
                                <span>Users</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="programs.php" class="sidebar-link">
                                <i class="bi bi-collection-fill"></i>
                                <span>Programs</span>
                            </a>
                            <ul class="submenu" style="display: block;">
                                <li class="submenu-item ">
                                    <a href="programsList.php">Programs List</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="index.html" class='sidebar-link'>
                                <i class="bi bi-chat-left-text-fill"></i>
                                <span>Feedbacks</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="index.html" class='sidebar-link'>
                                <i class="bi bi-power"></i>
                                <span>Log out</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Programs</h3>

                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Programs</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Programs List</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <section class="section">
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <h6>Category</h6>
                                        <fieldset class="form-group">
                                            <select class="form-select" name="categorySelect" id="basicSelect">
                                                <option>Select Category</option>
                                                <option value="Dietary">Dietary</option>
                                                <option value="Exercise">Exercise</option>
                                            </select>
                                        </fieldset>
                                        <div class="row" id="dietarySelect" style="display: none">
                                            <div class="col-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" value="Loss Weight" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        Loss Weight
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" value="Gain Weight" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        Gain Weight
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-4 mt-3">
                                                <fieldset class="form-group">
                                                    <select class="form-select" name="gender" id="basicSelect">
                                                        <option>Gender</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-4 mt-3">
                                                <fieldset class="form-group">
                                                    <label for="">BMI RANGE</label>
                                                    <select class="form-select" name="bmiRange" id="basicSelect">
                                                        <!-- <option>BMI Range</option> -->
                                                        <option value="Below 18.5">Below 18.5</option>
                                                        <option value="18.5 to 24.9">18.5 to 24.9</option>
                                                        <option value="25 to 29.9">25 to 29.9</option>
                                                        <option value="30 or Greater">30 or Greater</option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="row" id="exerciseSelect" style="display: none">
                                            <div class="col-4 ">
                                                <div class=" form-check">
                                                    <input class="form-check-input" type="radio" value="Stamina" name="flexRadioDefault" id="flexRadioDefault1">
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        Stamina
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-4 ">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="Agility" name="flexRadioDefault" id="flexRadioDefault1">
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        Agility
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-4 ">
                                                <div class="form-check">
                                                    <input class="form-check-input" value="Power/Strength" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        Power/Strength
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-4 mt-3">
                                                <fieldset class="form-group">
                                                    <select class="form-select" name="gender" id="basicSelect">
                                                        <option>Gender</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-4 mt-3">
                                                <fieldset class="form-group">
                                                    <label for="">BMI RANGE</label>
                                                    <select class="form-select" name="bmiRange" id="basicSelect">
                                                        <option value="Below 18.5">Below 18.5</option>
                                                        <option value="18.5 to 24.9">18.5 to 24.9</option>
                                                        <option value="25 to 29.9">25 to 29.9</option>
                                                        <option value="30 or Greater">30 or Greater</option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="section">
                        <div class="card p-3">
                            <div class="row">
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Content Image</label>
                                        <input class="form-control" type="file" name="content_image" id="formFile">
                                    </div>
                                </div>
                                <div class="col-3 mt-3">
                                    <div class="form-group">
                                        <label for="basicInput">Content Video Link</label>
                                        <input type="url" name="video_link" class="form-control" id="basicInput">
                                    </div>
                                </div>
                                <div class="col-3 mt-3">
                                    <div class="form-group">
                                        <label for="basicInput">Days</label>
                                        <input type="number" name="days" class="form-control" id="basicInput">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Step 1</label>
                                        <textarea class="form-control" name="1" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Step 2</label>
                                        <textarea class="form-control" name="2" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Step 3</label>
                                        <textarea class="form-control" name="3" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Step 4</label>
                                        <textarea class="form-control" name="4" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Step 5</label>
                                        <textarea class="form-control" name="5" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Step 6</label>
                                        <textarea class="form-control" name="6" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Step 7</label>
                                        <textarea class="form-control" name="7" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Step 8</label>
                                        <textarea class="form-control" name="8" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Steps 9</label>
                                        <textarea class="form-control" name="9" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Step 10</label>
                                        <textarea class="form-control" name="10" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <button type="submit" name="submitBtn" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </form>
            </div>

        </div>
    </div>
    <script src="template/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="template/assets/js/bootstrap.bundle.min.js"></script>
    <script src="template/assets/vendors/quill/quill.min.js"></script>
    <script src="template/assets/js/mazer.js"></script>
    <script src="template/assets/js/pages/form-editor.js"></script>

    <script src="../dist/sweetAlert/sweetalert2.min.js"></script>
</body>


<script>
    var select = document.querySelector("#basicSelect");
    var dietarySelect = document.querySelector("#dietarySelect");
    var exerciseSelect = document.querySelector("#exerciseSelect");


    select.addEventListener("change", () => {

        if (select.value == "Dietary") {
            exerciseSelect.style.display = "none";
            dietarySelect.style.display = "inline";

        } else {

            dietarySelect.style.display = "none";
            exerciseSelect.style.display = "inline";
        }
    })
</script>

<?php

if (isset($_POST['submitBtn'])) {

    $contentArray = [];

    for ($start = 1; $start <= 10; $start++) {
        array_push($contentArray, $_POST[$start]);
    }





    $category = $_POST['categorySelect'];
    $categorySelect = $_POST['flexRadioDefault'];
    // $content = $_POST['content'];
    $days = $_POST['days'];
    $videoLink = $_POST['video_link'];

    if ($_POST['gender'] == "Male") {
        $gender = "Male";
    } else {
        $gender = "Female";
    }

    // <option value="Below 18.5">Below 18.5</option>
    // <option value="18.5 to 24.9">18.5 to 24.9</option>
    // <option value="25 to 29.9">25 to 29.9</option>
    // <option value="30 or Greater">30 or Greater</option>

    if ($_POST['bmiRange'] == "Below 18.5") {
        $bmiRange = "Below 18.5";
    } else if ($_POST['bmiRange'] == "Below 18.5") {
        $bmiRange = "18.5 to 24.9";
    } else if ($_POST['bmiRange'] == "25 to 29.9") {
        $bmiRange = "25 to 29.9";
    } else if ($_POST['bmiRange'] == "30 or Greater") {
        $bmiRange = "30 or Greater";
    }

    // $gender = $_POST['gender'];
    $programImages = "";
    // $contentImage = $_POST['content_image'];


    $filename1 = $_FILES["content_image"]["name"];
    $tempname1 = $_FILES["content_image"]["tmp_name"];
    $folder1 = "../dist/programImages/" . randomString(8) . "/" . $filename1;

    mkdir(dirname($folder1));

    if (move_uploaded_file($tempname1, $folder1)) {
        $programImages = $folder1;
    }



    $insert = "INSERT INTO programs (category, p_select, bmi_range, content_image, content_video_link, days, gender)
    VALUES ('$category', '$categorySelect', '$bmiRange', '$programImages', '$videoLink', '$days', '$gender')";

    $conn->query($insert);
    $last_id = $conn->insert_id;

    for ($i = 0; $i < 10; $i++) {

        if ($contentArray[$i] != "") {
            $insert1 = "INSERT INTO program_steps (program_id, program_steps)
            VALUES ('$last_id', '$contentArray[$i]')";
            $conn->query($insert1);
        } else {
            continue;
        }
    }





    echo "<script>";
    echo "Swal.fire(";
    echo "'Program',";
    echo "'Is successfuly added',";
    echo " 'success'";
    echo " )";
    echo "</script>";
}

?>

</html>
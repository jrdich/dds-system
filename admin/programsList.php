<?php

include_once "../queries/dbConnection.php";

include_once "randomString.php";

$selectPrograms = "SELECT * FROM programs";
$query1 = $conn->query($selectPrograms);
$programs = $query1->fetch_all(MYSQLI_ASSOC);

$countNumberOfPrograms = "SELECT COUNT(programs_id) as numberOFPrograms FROM programs";
$countNumberOfProgramsquery = $conn->query($countNumberOfPrograms);
$numberOfPrograms = $countNumberOfProgramsquery->fetch_assoc();



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
                        <li class="sidebar-item ">
                            <a href="index.html" class='sidebar-link'>
                                <i class="bi bi-chat-left-text-fill"></i>
                                <span>Feedbacks</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="../userSignin.php" class='sidebar-link'>
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
                            <h3>Programs List</h3>
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
            </div>

            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon purple text-center">
                                    <i class="bi bi-collection-fill"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Program Lists</h6>
                                <h6 class="font-extrabold mb-0"> <span><?= $numberOfPrograms['numberOFPrograms']; ?></span></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <section class="section">
                <div class="row" id="table-head">
                    <div class="col-12">
                        <div class="card">
                            <!-- <div class="card-header">

                            </div> -->
                            <div class="card-content">
                                <!-- <div class="card-body">

                                </div> -->
                                <!-- table head dark -->
                                <div class="table-responsive p-3">
                                    <table class="table mb-0">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>#</th>
                                                <th>Category</th>
                                                <th>Category Type</th>
                                                <th>BMI Range</th>
                                                <th>Days</th>
                                                <th>Gender</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($programs as $key => $program) : ?>
                                                <tr>
                                                    <td><?= $key + 1; ?></td>
                                                    <td><?= $program['category']; ?></td>
                                                    <td><?= $program['p_select']; ?></td>
                                                    <td><?= $program['bmi_range']; ?></td>
                                                    <td><?= $program['days']; ?></td>
                                                    <td><?= $program['gender']; ?></td>
                                                    <td>
                                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#default<?= $key; ?>">Edit</button>

                                                        <a href="delete.php?deleteId=<?= $program['programs_id']; ?>" class="btn btn-danger">Delete</a>

                                                        <form method="POST" action="editProgram.php" enctype="multipart/form-data">
                                                            <div class=" modal fade text-left" id="default<?= $key; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="myModalLabel1">Basic Modal</h5>
                                                                            <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                                                                <i data-feather="x"></i>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <input type="hidden" name="programsId" value="<?= $program['programs_id']; ?>">

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
                                                                                        <label>Gender</label>
                                                                                        <select class="form-select" name="gender" id="basicSelect">
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
                                                                                        <label>Gender</label>
                                                                                        <select class="form-select" name="gender" id="basicSelect">

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
                                                                            <div class="mb-3">
                                                                                <label for="formFile" class="form-label">Content Image</label>
                                                                                <input class="form-control" type="file" name="content_image" id="formFile">
                                                                            </div>
                                                                            <div class="mt-3">
                                                                                <div class="form-group">
                                                                                    <label for="basicInput">Content Text</label>
                                                                                    <input type="text" name="content_text" class="form-control" id="basicInput" value="<?= $program['content_text']; ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="mt-3">
                                                                                <div class="form-group">
                                                                                    <label for="basicInput">Content Video Link</label>
                                                                                    <input type="url" name="video_link" class="form-control" value="<?= $program['content_video_link']; ?>" id="basicInput">
                                                                                </div>
                                                                            </div>
                                                                            <div class="mt-3">
                                                                                <div class="form-group">
                                                                                    <label for="basicInput">Days</label>
                                                                                    <input type="number" name="days" class="form-control" value="<?= $program['days']; ?>" id="basicInput">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn" data-bs-dismiss="modal">
                                                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                                                <span class="d-none d-sm-block">Close</span>
                                                                            </button>
                                                                            <button type="submit" class="btn btn-primary ml-1">
                                                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                                                <span class="d-none d-sm-block">Update</span>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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

<?php if (isset($_GET['success'])) : ?>

    <script>
        Swal.fire({
            icon: 'sucess',
            title: 'Program',
            text: 'Is successfully deleted'
        });
    </script>
<?php endif; ?>

<?php if (isset($_GET['edit'])) : ?>

    <script>
        Swal.fire({
            icon: 'sucess',
            title: 'Program',
            text: 'Is successfully Updated'
        });
    </script>
<?php endif; ?>

</html>
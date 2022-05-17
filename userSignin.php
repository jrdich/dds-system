<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="dist/sweetAlert/sweetalert2.min.css">
</head>

<body class="bg-dark">

    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="col-4 shadow p-3 bg-white">
                <!-- Pills navs -->
                <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true">Login</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="#pills-register" role="tab" aria-controls="pills-register" aria-selected="false">Register</a>
                    </li>
                </ul>
                <!-- Pills navs -->

                <!-- Pills content -->
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                        <form method="post" method="POST">
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="email" id="loginName" name="email" class="form-control" />
                                <label class="form-label" for="loginName">Email</label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input type="password" id="loginPassword" name="password" class="form-control" />
                                <label class="form-label" for="loginPassword">Password</label>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block mb-4" style="background-color: #CC5500;" name="signinBtn">Sign in</button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                        <form method="post">
                            <!-- Name input -->
                            <div class="form-outline mb-4">
                                <input type="text" name="fullname" id="registerName" class="form-control" />
                                <label class="form-label" for="registerName">Full Name</label>
                            </div>

                            <!-- Username input -->
                            <div class="form-outline mb-4">
                                <input type="text" name="username" id="registerUsername" class="form-control" />
                                <label class="form-label" for="registerUsername">Username</label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input type="date" name="birthdate" id="registerPassword" class="form-control" />
                                <label class="form-label" for="registerPassword">Birth Date</label>
                            </div>

                            <div class="form-outline mb-4">
                                <h5>Gender</h5>
                                <!-- Default radio -->
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" value="Male" id="flexRadioDefault1" />
                                    <label class="form-check-label" for="flexRadioDefault1"> Male </label>
                                </div>

                                <!-- Default checked radio -->
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" value="Female" id="flexRadioDefault2" checked />
                                    <label class="form-check-label" for="flexRadioDefault2"> Female </label>
                                </div>
                            </div>

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="email" name="email" id="registerEmail" class="form-control" />
                                <label class="form-label" for="registerEmail">Email</label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input type="password" name="password" id="registerPassword" class="form-control" />
                                <label class="form-label" for="registerPassword">Password</label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" />
                                <label class="form-label" for="registerPassword">Confirm Password</label>
                            </div>
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block mb-3" style="background-color: #CC5500;" name="registerBtn">Register</button>
                        </form>
                    </div>
                </div>
                <!-- Pills content -->
            </div>
        </div>
    </div>

</body>
<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>
<script src="dist/sweetAlert/sweetalert2.min.js"></script>

</html>



<?php

if (isset($_POST['registerBtn'])) {

    include_once "queries/dbConnection.php";
    $emailExist = "SELECT * FROM bodybuilders WHERE email = '$_POST[email]'";
    $queryResult = $conn->query($emailExist);

    if ($queryResult->num_rows > 0) {
        echo "<script>";
        echo " Swal.fire({";
        echo "icon: 'error',";
        echo "title: 'Email',";
        echo " text: 'Has been used',";
        echo "  })";
        echo "</script>";
    } else {
        $sql = "INSERT INTO bodybuilders (username, password, fullname, bday, gender, email)
        VALUES ('$_POST[username]', '$_POST[password]', '$_POST[fullname]', '$_POST[birthdate]', '$_POST[gender]', '$_POST[email]')";
        $conn->query($sql);
        echo "<script>";
        echo "Swal.fire(";
        echo "'Good job!',";
        echo "'You clicked the button!',";
        echo " 'success'";
        echo " )";
        echo "</script>";
    }
}

if (isset($_POST['signinBtn'])) {

    include_once "queries/dbConnection.php";
    $userExist = "SELECT * FROM bodybuilders WHERE email = '$_POST[email]' AND password = '$_POST[password]'";
    $queryResult = $conn->query($userExist);

    if ($queryResult->num_rows > 0) {

        $row = $queryResult->fetch_assoc();
        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['fullname'] = $row['fullname'];
        $_SESSION['bday'] = $row['bday'];
        $_SESSION['gender'] = $row['gender'];
        $_SESSION['email'] = $row['email'];
        echo "
        <script>
        window.location.href = 'index.php';
        </script>
        ";

        // header("Location: index.php");
    } else {
        echo "<script>";
        echo " Swal.fire({";
        echo "icon: 'error',";
        echo "title: 'Email or Password',";
        echo " text: 'Is incorrect',";
        echo "  })";
        echo "</script>";
    }
}


?>
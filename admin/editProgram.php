<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dds-db";

include_once "randomString.php";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$programsId = $_POST['programsId'];
$categorySelect = $_POST['categorySelect'];
$flexRadioDefault = $_POST['flexRadioDefault'];
$gender = $_POST['gender'];
$bmiRange = $_POST['bmiRange'];
$gender = $_POST['gender'];
// $content_image = $_POST['content_image'];
$video_link = $_POST['video_link'];
$days = $_POST['days'];
$content_text = $_POST['content_text'];


$programImages = "";
// $contentImage = $_POST['content_image'];


$filename1 = $_FILES["content_image"]["name"];
$tempname1 = $_FILES["content_image"]["tmp_name"];
$folder1 = "../dist/programImages/" . randomString(8) . "/" . $filename1;

mkdir(dirname($folder1));

if (move_uploaded_file($tempname1, $folder1)) {
    $programImages = $folder1;
}

$sql = "UPDATE programs
SET category = '$categorySelect', p_select = '$flexRadioDefault', bmi_range = '$bmiRange', content_text = '$content_text', content_image = '$programImages', content_video_link = '$video_link', days= '$days', gender = '$gender'
WHERE programs_id = '$programsId'";


if ($conn->query($sql) == TRUE) {

    header("Location: programsList.php?edit=1");
} else {
    echo "Error";
}



// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";

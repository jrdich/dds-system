<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dds-db";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "DELETE FROM programs WHERE programs_id = '$_GET[deleteId]'";

$query = $conn->query($sql);


header("Location: programsList.php?success=1");

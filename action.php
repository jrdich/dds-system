<?php

include_once "queries/dbConnection.php";


$countSteps = "SELECT COUNT(program_steps_id) AS programSteps FROM program_steps WHERE program_id = '$_GET[programId]'";
$countStepsQuery = $conn->query($countSteps);
$queryAssoc1 = $countStepsQuery->fetch_assoc();

$sql = "INSERT INTO user_steps (username, program_id, completed, steps_to_complete)
VALUES ('$_GET[username]', '$_GET[programId]', '0', '$queryAssoc1[programSteps]')";
$conn->query($sql);



header("Location: myProgram.php?programId=" .  $_GET['programId'] . "&username=" . $_GET['username'] . "");

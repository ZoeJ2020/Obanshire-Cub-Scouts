<?php
include '../../../../auth/dbConfig.php';

$stmt = $conn->prepare(
    "INSERT INTO obanshire.event
    (title, location, date, requirements) 
    VALUES(?, ?, ?, ?);");

$stmt->bind_param("ssss", $_POST['title'], $_POST['location'], $_POST['date'], $_POST['requirements']);
$stmt->execute();
$conn->close();

header('Location: ../../../../../pages/news');

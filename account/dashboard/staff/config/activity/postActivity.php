<?php
include '../../../../auth/dbConfig.php';

$stmt = $conn->prepare(
    "INSERT INTO obanshire.activity
    (title, brief, equipment, instructions) 
    VALUES(?, ?, ?, ?);");

$stmt->bind_param("ssss", $_POST['title'], $_POST['brief'], $_POST['equipment'], $_POST['instructions']);
$stmt->execute();
$conn->close();

header('Location: ../../../../../pages/news');
?>

<?php

include '../../../../auth/dbConfig.php';

$id = $_GET['id'];

$stmt = $conn->prepare('UPDATE event
    set
    title = ?,
    location = ?,
    date = ?,
    requirements = ?
    where id = '.$id.' ');

$stmt->bind_param("ssss", $_POST['title'], $_POST['location'], $_POST['date'],  $_POST['requirements']);
$stmt->execute();
$conn->close();

header("Location: ../../");
?>
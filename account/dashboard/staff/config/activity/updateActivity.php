<?php

include '../../../../auth/dbConfig.php';

$id = $_GET['id'];

$stmt = $conn->prepare('UPDATE activity
    set
    title = ?,
    brief = ?,
    equipment = ?,
    instructions = ?
    where id = '.$id.' ');

$stmt->bind_param("ssss", $_POST['title'], $_POST['brief'], $_POST['equipment'],  $_POST['instructions']);
$stmt->execute();
$conn->close();

header("Location: ../../");
?>
<?php

include '../../../../auth/dbConfig.php';

$id = $_GET['id'];

$stmt = $conn->prepare('UPDATE event
    set
    published = 0
    where id = '.$id.' ');

$stmt->execute();
$conn->close();

header("Location: ../../");
?>

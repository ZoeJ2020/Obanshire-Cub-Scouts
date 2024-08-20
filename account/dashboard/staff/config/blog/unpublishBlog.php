<?php

include '../../../../auth/dbConfig.php';

$id = $_GET['id'];

$stmt = $conn->prepare('UPDATE blog b
    set
    b.published = 0
    where b.id = '.$id.' ');

$stmt->execute();
$conn->close();

header("Location: ../../");
?>

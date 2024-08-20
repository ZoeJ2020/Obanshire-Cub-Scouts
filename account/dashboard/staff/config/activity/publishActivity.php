<?php

include '../../../../auth/dbConfig.php';

$id = $_GET['id'];
$stmt = $conn->prepare('UPDATE activity
    set
    published = 1
    where id = '.$id.' ');

$stmt->execute();
header("Location: ../../");
?>

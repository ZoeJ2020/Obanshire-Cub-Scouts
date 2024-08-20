<?php

include '../../../../auth/dbConfig.php';

$id = $_GET['id'];
$stmt = $conn->prepare('UPDATE activity
    set
    published = 0
    where id = '.$id.' ');

$stmt->execute();
header("Location: ../../");
?>

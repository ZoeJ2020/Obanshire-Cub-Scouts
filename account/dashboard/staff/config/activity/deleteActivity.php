<?php

include '../../../../auth/dbConfig.php';

$id = $_GET['id'];

$stmt = $conn->prepare('DELETE from activity
    where id = '.$id.' ');

$stmt->execute();
$conn->close();

header("Location: ../../");
?>

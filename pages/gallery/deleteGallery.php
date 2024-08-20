<?php

include '../../account/auth/dbConfig.php';

$imgID = $_GET['imgID'];

$stmt = $conn->prepare('DELETE from gallery
    where id = '.$imgID.' ');

$stmt->execute();
$conn->close();

header('Location: ../gallery');
?>

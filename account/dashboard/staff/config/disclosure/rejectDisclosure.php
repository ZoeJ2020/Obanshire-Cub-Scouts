<?php

include '../../../../auth/dbConfig.php';

$dID = $_GET['did'];

$stmt = $conn->prepare('DELETE from disclosure
    where id = '.$dID.' ');

$stmt->execute();
$conn->close();

header("Location: ../../");
?>

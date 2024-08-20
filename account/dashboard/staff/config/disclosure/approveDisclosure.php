<?php

include '../../../../auth/dbConfig.php';

$dID = $_GET['did'];

$stmt = $conn->prepare('UPDATE disclosure
    set
    approved = 1
    where id = '.$dID.' ');

$stmt->execute();

header("Location: ../../");
?>

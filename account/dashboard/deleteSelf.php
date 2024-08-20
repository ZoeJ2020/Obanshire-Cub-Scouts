<?php

include '../../account/auth/dbConfig.php';

$id = $_GET['id'];

$delAva = $conn->prepare('DELETE from availability
    where fk_ava_user_id = '.$id.' ');

$delUser = $conn->prepare('DELETE from users
    where id = '.$id.' ');

$delAva->execute();
$delUser->execute();

$conn->close();

header('Location: ../../account/auth/logout.php?');
?>

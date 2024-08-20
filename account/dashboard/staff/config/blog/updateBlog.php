<?php

include '../../../../auth/dbConfig.php';

$id = $_GET['id'];

$stmt = $conn->prepare('UPDATE blog b
    set
    b.title = ?,
    b.blog_content = ?
    where b.id = '.$id.' ');

$stmt->bind_param("ss", $_POST['title'], $_POST['blog_content']);
$stmt->execute();
$conn->close();

header("Location: ../../");
?>

<?php
include '../../../../auth/dbConfig.php';

$stmt = $conn->prepare(
    "INSERT INTO blog
    (title, blog_content) 
    VALUES(?, ?);");

$stmt->bind_param("ss", $_POST['title'], $_POST['blog_content']);
$stmt->execute();
$conn->close();

header('Location: ../../../../../pages/news');

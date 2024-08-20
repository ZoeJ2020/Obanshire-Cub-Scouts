<?php
include 'dbConfig.php';

// We need to check if the account with that username exists.
$stmt = $conn->prepare('SELECT id, password FROM obanshire.users WHERE username = ? ');
$stmt->bind_param('s', $_POST['username']);
$stmt->execute();
$stmt->store_result();
// Store the result so we can check if the account exists in the database.
if ($stmt->num_rows > 0) {
    // Username already exists
    echo 'Username exists! Please choose another.';
} else {
    $stmt->close();
    // Username doesnt exists, insert new account
    $stmt = $conn->prepare("INSERT INTO obanshire.users (username, password, type) VALUES(?, ?, ?);");
   
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
    $stmt->bind_param('sss', $_POST['username'], $password, $_POST['type']);
    $stmt->execute();
    $conn->close();

}

header('Location: ../../pages/login');

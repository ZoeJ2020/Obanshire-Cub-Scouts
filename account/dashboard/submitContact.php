<?php 
    session_start(); 
    include '../../account/auth/dbConfig.php';

    $id = $_GET['id'];

    $stmt = $conn->prepare('UPDATE users
    set
    phone1 = ?,
    phone2 = ?
    where id = ?');
    
    $stmt->bind_param("iii", $_POST['phone1'], $_POST['phone2'], $id);
    $stmt->execute();
    $conn->close();

    header('Location: ../../');
?>

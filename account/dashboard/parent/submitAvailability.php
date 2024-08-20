<?php 
    session_start(); 
    include '../../../account/auth/dbConfig.php';

    $id = $_GET['id'];

      $check = $conn->prepare(
        'SELECT COUNT(1)
        FROM availability
        WHERE fk_ava_user_id = ?');

      $check->bind_param("i", $id);
      $check->execute();
      $check->store_result();
      $check->bind_result($count);
      $check->fetch();
    
    //   if user already has a column in availability database
      if($count == 1){
        // update table
        $stmt = $conn->prepare('UPDATE availability
        set
        description = ?
      
        where fk_ava_user_id = ?');
        
        $stmt->bind_param("si", $_POST['description'], $id);
        $stmt->execute();

      } else if($count == 0) {
        
        // user does not have a column, insert new one
        $stmt = $conn->prepare(
            "INSERT INTO availability 
            (description, fk_ava_user_id) 
            VALUES(?, ?);");
       
        $stmt->bind_param('si', $_POST['description'], $id);
        $stmt->execute();
        
      }

    header('Location: ../parent');
    $conn->close();
?>
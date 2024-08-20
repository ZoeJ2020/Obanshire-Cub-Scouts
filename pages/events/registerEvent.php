<?php 
    session_start();
    include '../../account/auth/dbConfig.php';
    
    $eventID = $_GET['eid'];
    $userID = $_GET['uid'];

    $stmt = $conn->prepare(
      'INSERT INTO registered
      (fk_reg_event_id, 
      fk_reg_user_id) 

      VALUES (?, ?)');

    $stmt->bind_param('ii', $eventID, $userID);
    $stmt->execute();

    header('Location: eventDetails.php?id='. $eventID .'');
?>
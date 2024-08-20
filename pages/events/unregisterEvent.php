<?php 
    session_start();
    include '../../account/auth/dbConfig.php';
    
    $eventID = $_GET['eid'];
    $userID = $_GET['uid'];

    $stmt = $conn->prepare(
      'DELETE from registered
      WHERE fk_reg_event_id = ? AND fk_reg_user_id = ?');

    $stmt->bind_param('ii', $eventID, $userID);
    $stmt->execute();

    header('Location: ../../account/dashboard/learner');
?>
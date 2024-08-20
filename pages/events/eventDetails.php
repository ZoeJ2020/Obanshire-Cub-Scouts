<?php 
    session_start();
    include '../../account/auth/dbConfig.php';
    include '../../components/header.php';
  
    include '../../components/navbar.php'; 
    
    $eventID = $_GET['id'];

    $event = $conn->prepare(
      'SELECT
      title, 
      date, 
      location,
      requirements
      FROM `event` 
      WHERE id = '. $eventID .'');

      $event->execute();
      $event->store_result();
      $event->bind_result( $eventTitle, $eventDate, $eventLocation, $eventRequirements);
      $event->fetch();

      if (isset($_SESSION['id']) == TRUE){
        
        $uid = $_SESSION['id'];

        $check = $conn->prepare(
            'SELECT COUNT(1)
            FROM registered
            WHERE fk_reg_event_id = '. $eventID .' 
            AND fk_reg_user_id = '. $uid .' ');
          $check->execute();
          $check->store_result();
          $check->bind_result($count);
          $check->fetch();

      }

?>

<!-- individual blog section  -->
<div class="post-wrap w-100">
    <div class="event-head-wrap">
        <h2><?= $eventTitle ?></h2>
        <small>on <?= $eventDate ?></small>
        <p>at <?= $eventLocation ?></p>
        <?php if (isset($_SESSION['loggedin']) == TRUE && ($_SESSION['type']) == "learner"): ?>
            <?php if ($count > 0): ?>
                <p>Already Registered</p>
                <button type="button" class="btn w-25" disabled>Register</button>
            <?php endif ?>
            <?php if ($count == 0): ?>
                <a href="registerEvent.php?uid=<?= $uid ?>&eid=<?= $eventID ?>" class="btn w-25">Register</a>
            <?php endif ?>
        <?php endif ?>
    </div>
    <div class="event-head-wrap">
        <h3>What You'll Need:</h3>
        <p><?= $eventRequirements ?></p>
    </div>
</div>

<?php
    include '../../components/footer.php';
?>
<?php 
    session_start();
    include '../../account/auth/dbConfig.php';
    include '../../components/header.php';
  
    include '../../components/navbar.php'; 
    
    $actID = $_GET['id'];

    $act = $conn->prepare(
      'SELECT
      title, 
      brief, 
      equipment,
      instructions
      FROM `activity` 
      WHERE id = '. $actID .'');

      $act->execute();
      $act->store_result();
      $act->bind_result( $actTitle, $actBrief, $actEquipment, $actInstructions);
      $act->fetch();

?>

<!-- individual blog section  -->
<div class="post-wrap w-100">
    <div class="blog-wrap">
        <h2><?= $actTitle ?></h2>
        <p><?= $actBrief ?></p>
        <button onclick="window.print();" class="btn">Print Guide</a>
    </div>

    <div class="blog-wrap">
        <h3>What You'll Need:</h3>
        <p><?= $actEquipment ?></p>
    </div>

    <div class="blog-wrap">
        <h3>Instructions</h3>
        <p><?= $actInstructions ?></p>    
    </div>
</div>

<?php
    include '../../components/footer.php';
?>
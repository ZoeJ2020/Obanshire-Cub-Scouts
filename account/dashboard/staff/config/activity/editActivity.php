<?php 
  session_start(); 
  include '../../../../auth/dbConfig.php';
  include '../../../../../components/header.php';
  include '../../../../../components/navbar.php';

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
    $act->bind_result( $actTitle, $actBrief, $actEquipmemt, $actInstructions);
    $act->fetch();
?>

<h1 class="link-yellow text-center">Update Existing Activity</h1>
<div class="form-wrap">
  <form action="<?= ROOT_DIR ?>account/dashboard/staff/config/activity/updateActivity.php?id=<?= $actID ?>" method="post">

  <!-- title -->
  <div class="form-group">
    <label for="title">Activity Title</label>
    <input value="<?= $actTitle ?>" type="text" name="title" class="form-control" id="title" placeholder="Activity Title" required>
  </div>
  <!-- location -->
  <div class="form-group">
    <label for="brief">Brief</label>
    <input value="<?= $actBrief ?>" type="text" name="brief" class="form-control" id="brief" placeholder="Brief" required>
  </div>
  <!-- date -->
  <div class="form-group">
    <label for="equipment">Equipment</label>
    <input value="<?= $actEquipmemt ?>" type="text" name="equipment" class="form-control" id="equipment" placeholder="Equipment" required>
  </div>
  <!-- requirements -->
  <div class="form-group">
    <label for="instructions">Instructions</label>
    <input value="<?= $actInstructions ?>" type="text" name="instructions" class="form-control" id="instructions" placeholder="Instructions" required>
  </div>
  <div class="form-group text-center">
    <button type="submit" class="btn btn-primary btn-orange">Update Activity</button>
  </div>
  </form>
</div>

<?php 
  include '../../../../../components/footer.php';
?>
<?php 
  session_start(); 
  include '../../../../../components/header.php';
  include '../../../../../components/navbar.php';
?>

<h1 class="link-yellow text-center">Add New Activity</h1>
<div class="form-wrap">
  <form action="<?= ROOT_DIR ?>account/dashboard/staff/config/activity/postActivity.php" method="post">
  <!-- title -->
  <div class="form-group">
    <label for="title">Activity Title</label>
    <input type="text" name="title" class="form-control" id="title" placeholder="Activity Title" required>
  </div>
  <!-- location -->
  <div class="form-group">
    <label for="brief">Brief</label>
    <input type="text" name="brief" class="form-control" id="brief" placeholder="Brief" required>
  </div>
  <!-- date -->
  <div class="form-group">
    <label for="equipment">Equipment</label>
    <input type="text" name="equipment" class="form-control" id="equipment" placeholder="Equipment" required>
  </div>
  <!-- requirements -->
  <div class="form-group">
    <label for="instructions">Instructions</label>
    <input type="text" name="instructions" class="form-control" id="instructions" placeholder="Instructions" required>
  </div>
  <div class="form-group text-center">
    <button type="submit" class="btn btn-primary btn-orange">New Activity</button>
  </div>
  </form>
</div>

<?php 
  include '../../../../../components/footer.php';
?>
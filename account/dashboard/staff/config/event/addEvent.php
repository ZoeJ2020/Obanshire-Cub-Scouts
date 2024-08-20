<?php 
  session_start(); 
  include '../../../../../components/header.php';
  include '../../../../../components/navbar.php';
?>

<h1 class="link-green text-center">Add New Event</h1>
<div class="form-wrap">
  <form action="<?= ROOT_DIR ?>account/dashboard/staff/config/event/postEvent.php" method="post">
  <!-- title -->
  <div class="form-group">
    <label for="title">Event Title</label>
    <input type="text" name="title" class="form-control" id="title" placeholder="Event Title" required>
  </div>
  <!-- location -->
  <div class="form-group">
    <label for="location">Location</label>
    <input type="text" name="location" class="form-control" id="location" placeholder="Location" required>
  </div>
  <!-- date -->
  <div class="form-group">
    <label for="Date">Date</label>
    <input type="date" name="date" class="form-control" id="date" placeholder="Date" required>
  </div>
  <!-- requirements -->
  <div class="form-group">
    <label for="requirements">Requirements</label>
    <input type="text" name="requirements" class="form-control" id="requirements" placeholder="Requirements" required>
  </div>
  <div class="form-group text-center">
    <button type="submit" class="btn btn-primary btn-orange">New Event</button>
  </div>
  </form>
</div>

<?php 
  include '../../../../../components/footer.php';
?>
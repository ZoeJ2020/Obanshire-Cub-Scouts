<?php 
  session_start(); 
  include '../../../../auth/dbConfig.php';
  include '../../../../../components/header.php';
  include '../../../../../components/navbar.php';

  $eventID = $_GET['id'];

  $event = $conn->prepare(
    'SELECT
    title, 
    location,
    date,
    requirements
    FROM `event` 
    WHERE id = '. $eventID .'');

    $event->execute();
    $event->store_result();
    $event->bind_result( $eventTitle, $eventLocation, $eventDate, $eventRequirements);
    $event->fetch();
?>

<h1 class="link-green text-center">Update Existing Event</h1>
<div class="form-wrap">
  <form action="<?= ROOT_DIR ?>account/dashboard/staff/config/event/updateEvent.php?id=<?= $eventID ?>" method="post">
  <!-- title -->
  <div class="form-group">
    <label for="title">Event Title</label>
    <input value="<?= $eventTitle ?>" type="text" name="title" class="form-control" id="title" placeholder="Event Title" required>
  </div>
  <!-- blog_content -->
  <div class="form-group">
    <label for="location">Location</label>
    <input value="<?= $eventLocation ?>" type="text" name="location" class="form-control" id="location" placeholder="Location" required>
  </div>
    <!-- date -->
    <div class="form-group">
    <label for="date">Date</label>
    <input value="<?= $eventDate ?>" type="date" name="date" class="form-control" id="date" placeholder="Date" required>
  </div>
  <div class="form-group">
    <label for="requirements">Requirements</label>
    <input value="<?= $eventRequirements ?>" type="text" name="requirements" class="form-control" id="requirements" placeholder="Requirements" required>
  </div>
  <div class="form-group text-center">
    <button type="submit" class="btn btn-primary btn-orange">Update Event</button>
  </div>
  </form>
</div>

<?php 
  include '../../../../../components/footer.php';
?>
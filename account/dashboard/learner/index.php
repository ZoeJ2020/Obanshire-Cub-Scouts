<?php 
  session_start(); 
  include '../../../account/auth/dbConfig.php';
  include '../../../components/header.php';
  include '../../../components/navbar.php';

  $name = $_SESSION['name'];
  $id = $_SESSION['id'];

  $event = $conn->prepare(
        'SELECT event.id, event.title, event.location, event.date
        FROM registered
        INNER JOIN event ON registered.fk_reg_event_id=event.id
        INNER JOIN users ON registered.fk_reg_user_id=users.id
        WHERE users.id = '. $id .';');
  
  $event->execute();
  $event->store_result();
  $event->bind_result($eventID, $eventTitle, $eventLocation, $eventDate);

?>

<h1 class="text-center">Dashboard</h1>
<div class="bloglist-wrap">
  <div class="account-section">
    <h2 class="text-center m-0"><?php echo $name;?></h2>

    <div class="text-center">
      <a href="../editContact.php?id=<?php echo $id;?>" class="btn btn-primary">Edit Contact Info</a>
      <a href="../deleteSelf.php?id=<?php echo $id;?>" class="btn btn-danger">Delete Account</a>
    </div>
  </div>

<?php if($event->num_rows > 0): ?>
  <div class="event-wrap">
    <h2 class="link-green m-0">Your Registered Events</h2>
    <div class="eventlist row row-cols-1 row-cols-md-2 g-4">
    <?php while ($event->fetch()): ?>
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><?= $eventTitle ?></h5>
              <small class="card-text"><?= $eventDate ?></small>
              <p class="card-text"><?= $eventLocation ?></p>
              <a href="../../../pages/events/unRegisterEvent.php?uid=<?= $id ?>&eid=<?= $eventID ?>" class="btn btn-danger">Unregister</a>
            </div>
          </div>
        </div>
    <?php endwhile ?>
  </div>
<?php endif ?>

  <div class="amusement-wrap py-3 ">
    <h2 class="text-center m-0">Latest Games Available!</h2>

    <!-- card design with img and text here -->
    <div class="card mx-auto py-3" style="width: 18rem;">
      <img src="../../../assets/img/amusement/cover.jpg" class="card-img-top" alt="Vegetables VS Chef thumbnail">
      <div class="card-body">
        <h5 class="card-title">Vegetables VS Chef</h5>
        <p class="card-text">Time your jumps carefully and avoid the spinning blades!</p>
        <a href="amusement" class="btn btn-primary">Play Now!</a>
      </div>
    </div>    
  </div>
</div>

<?php include '../../../components/footer.php'; ?>
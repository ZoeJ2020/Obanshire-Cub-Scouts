<?php 
  session_start(); 
  include '../../../account/auth/dbConfig.php';
  include '../../../components/header.php';
  include '../../../components/navbar.php';

  $name = $_SESSION['name'];
  $id = $_SESSION['id'];

  $blog = $conn->prepare(
    'SELECT id,
    title, 
    SUBSTRING(blog_content, 1, 30), 
    created_on 
    FROM `blog` 
    WHERE published = 1;');

    $blog->execute();
    $blog->store_result();
    $blog->bind_result($blogID, $blogTitle, $blogContent, $blogCreated);

  $unBlog = $conn->prepare(
      'SELECT id,
      title, 
      SUBSTRING(blog_content, 1, 30), 
      created_on 
      FROM `blog` 
      WHERE published = 0;');
  
      $unBlog->execute();
      $unBlog->store_result();
      $unBlog->bind_result($unBlogID, $unBlogTitle, $unBlogContent, $unBlogCreated);

    $event = $conn->prepare(
        'SELECT id,
        title, 
        location,
        date
         
        FROM `event` 
       WHERE published = 1;');

      $event->execute();
      $event->store_result();
      $event->bind_result($eventID, $eventTitle, $eventLocation, $eventDate);


    $unEvent = $conn->prepare(
      'SELECT id,
      title, 
      location,
      date
       
      FROM `event` 
     WHERE published = 0;');

    $unEvent->execute();
    $unEvent->store_result();
    $unEvent->bind_result($unEventID, $unEventTitle, $unEventLocation, $unEventDate);

    $act = $conn->prepare(
        'SELECT id,
        title, 
        brief
         
        FROM `activity` 
        WHERE published = 1;');

    $act->execute();
    $act->store_result();
    $act->bind_result($actID, $actTitle, $actBrief);

    $unAct = $conn->prepare(
      'SELECT id,
      title, 
      brief
       
      FROM `activity` 
      WHERE published = 0;');

    $unAct->execute();
    $unAct->store_result();
    $unAct->bind_result($unActID, $unActTitle, $unActBrief);

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

    <div class="text-center my-3 py-4">
        <a href="config/blog/addBlog.php" class="btn btn-primary btn-orange py-3 fs-4">+ New Blog</a>
        <a href="config/event/addEvent.php" class="btn btn-primary btn-green py-3 fs-4">+ New Event</a>
        <a href="config/activity/addActivity.php" class="btn btn-primary btn-yellow py-3 fs-4">+ New Activity</a>
    </div>

    <!-- unpublished posts -->
  <?php if($unBlog->num_rows > 0): ?>
    <h2 class="m-0">Unpublished Blogs</h2>
      <div class="row">
      <?php while ($unBlog->fetch()): ?>
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><?= $unBlogTitle ?></h5>
            <p class="card-text"><?= $unBlogContent ?>...</p>
            <a href="config/blog/publishBlog.php?id=<?= $unBlogID ?>" class="btn btn-primary">Publish Blog</a>
            <a href="config/blog/editBlog.php?id=<?= $unBlogID ?>" class="btn btn-warning">Edit Blog</a>
            <a href="config/blog/deleteBlog.php?id=<?= $unBlogID ?>" class="btn btn-danger">Delete Blog</a>
          </div>
        </div>
      </div>
      <?php endwhile ?>
      </div>
  <?php endif ?>

  <?php if($unEvent->num_rows > 0): ?>
    <h2 class="m-0">Unpublished Events</h2>
    <div class="row">
    <?php while ($unEvent->fetch()): ?>
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title"><?= $unEventTitle ?></h5>
          <p class="card-text"><?= $unEventDate ?>...</p>
          <a href="config/event/publishEvent.php?id=<?= $unEventID ?>" class="btn btn-primary">Publish Event</a>
          <a href="config/event/editEvent.php?id=<?= $unEventID ?>" class="btn btn-warning">Edit Event</a>
          <a href="config/event/deleteEvent.php?id=<?= $unEventID ?>" class="btn btn-danger">Delete Event</a>
        </div>
      </div>
    </div>
    <?php endwhile ?>
    </div>
  <?php endif ?>
    

  <?php if($unAct->num_rows > 0): ?>
    <h2 class="m-0">Unpublished Activities</h2>
    <div class="row">
    <?php while ($unAct->fetch()): ?>
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title"><?= $unActTitle ?></h5>
          <p class="card-text"><?= $unActBrief ?>...</p>
          <a href="config/activity/publishActivity.php?id=<?= $unActID ?>" class="btn btn-primary">Publish Event</a>
          <a href="config/activity/editActivity.php?id=<?= $unActID ?>" class="btn btn-warning">Edit Event</a>
          <a href="config/activity/deleteActivity.php?id=<?= $unActID ?>" class="btn btn-danger">Delete Event</a>
        </div>
      </div>
    </div>
    <?php endwhile ?>
    </div>
  <?php endif ?>

    <!-- published posts -->
  <?php if($blog->num_rows > 0): ?>
    <h2 class="m-0">Published Blogs</h2>
    <div class="row">
    <?php while ($blog->fetch()): ?>
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title"><?= $blogTitle ?></h5>
          <p class="card-text"><?= $blogContent ?>...</p>
          <a href="config/blog/unpublishBlog.php?id=<?= $blogID ?>" class="btn btn-primary">Unpublish Blog</a>
          <a href="config/blog/editBlog.php?id=<?= $blogID ?>" class="btn btn-warning">Edit Blog</a>
          <a href="config/blog/deleteBlog.php?id=<?= $blogID ?>" class="btn btn-danger">Delete Blog</a>
        </div>
      </div>
    </div>
    <?php endwhile ?>
    </div>
  <?php endif ?>

  <!-- published events -->
  <?php if($event->num_rows > 0): ?>
    <h2 class="m-0">Published Events</h2>
    <div class="row">
    <?php while ($event->fetch()): ?>
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title"><?= $eventTitle ?></h5>
          <p class="card-text"><?= $eventDate ?></p>
          <a href="config/event/unpublishEvent.php?id=<?= $eventID ?>" class="btn btn-primary">Unpublish Event</a>
          <a href="config/event/editEvent.php?id=<?= $eventID ?>" class="btn btn-warning">Edit Event</a>
          <a href="config/event/deleteEvent.php?id=<?= $eventID ?>" class="btn btn-danger">Delete Event</a>
        </div>
      </div>
    </div>
    <?php endwhile ?>
    </div>
  <?php endif ?>

  <!-- published activities -->
  <?php if($act->num_rows > 0): ?>
    <h2 class="m-0">Published Activities</h2>
    <div class="row">
      <?php while ($act->fetch()): ?>
      <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title"><?= $actTitle ?></h5>
          <p class="card-text"><?= $actBrief ?>...</p>
          <a href="config/activity/unpublishActivity.php?id=<?= $actID ?>" class="btn btn-primary">Unpublish Blog</a>
          <a href="config/activity/editActivity.php?id=<?= $actID ?>" class="btn btn-warning">Edit Blog</a>
          <a href="config/activity/deleteActivity.php?id=<?= $actID ?>" class="btn btn-danger">Delete Blog</a>
        </div>
      </div>
    </div>
    <?php endwhile ?>
  <?php endif ?>

  <?php include '../../../components/accountList.php'; ?>

  <?php include '../../../components/disclosureList.php'; ?>

  </div>
</div>

<?php include '../../../components/footer.php'; ?>

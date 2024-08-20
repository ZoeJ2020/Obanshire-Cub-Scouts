<?php 
    session_start();
    include '../../account/auth/dbConfig.php';
    include '../../components/header.php';
    include '../../components/navbar.php';
  
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

      $act = $conn->prepare(
        'SELECT id,
        title, 
        brief
         
        FROM `activity` 
        WHERE published = 1;');

      $act->execute();
      $act->store_result();
      $act->bind_result($actID, $actTitle, $actBrief);
?>

<h1 class="text-center link-green">News</h1>

<div class="body-wrap">
  <div class="bloglist-wrap">

  <h2 class="link-orange" style="margin=0;">Blogs</h2>
  <div class="bloglist row row-cols-1 row-cols-md-2 g-4">
    <?php while ($blog->fetch()): ?>
      <a href="../blogs/blogDetails.php?id=<?= $blogID ?>" class="text-decoration-none">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><?= $blogTitle ?></h5>
              <small class="card-text"><?= $blogCreated ?></small>
              <p class="card-text"><?= $blogContent ?>...</p>
            </div>
          </div>
        </div>
      </a>
    <?php endwhile ?>
  </div>

  <h2 class="link-green">Events</h2>
  <div class="eventlist row row-cols-1 row-cols-md-2 g-4">
    <?php while ($event->fetch()): ?>
      <a href="../events/eventDetails.php?id=<?= $eventID ?>" class="text-decoration-none">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><?= $eventTitle ?></h5>
              <small class="card-text"><?= $eventDate ?></small>
              <p class="card-text"><?= $eventLocation ?></p>
            </div>
          </div>
        </div>
      </a>
    <?php endwhile ?>
  </div>

  <h2 class="link-yellow">Activities</h2>
  <div class="activitylist row row-cols-1 row-cols-md-2 g-4">
    <?php while ($act->fetch()): ?>
      <a href="../activities/activityDetails.php?id=<?= $actID ?>" class="text-decoration-none">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><?= $actTitle ?></h5>
              <p class="card-text"><?= $actBrief ?></p>
            </div>
          </div>
        </div>
      </a>
    <?php endwhile ?>
  </div>
  </div>
</div>

<?php
    include '../../components/footer.php';
?>
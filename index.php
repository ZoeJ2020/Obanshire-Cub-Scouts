<?php 
    session_start();
    include 'account/auth/dbConfig.php';
    include 'components/header.php';
  
    include 'components/navbar.php'; 
    
    $blog = $conn->prepare(
      'SELECT id,
      title, 
      SUBSTRING(blog_content, 1, 30), 
      created_on 
      FROM `blog` 
      WHERE published = 1
      LIMIT 2;');

      $blog->execute();
      $blog->store_result();
      $blog->bind_result($blogID, $blogTitle, $blogContent, $blogCreated);

      $event = $conn->prepare(
        'SELECT id,
        title, 
        location,
        date
         
        FROM `event` 
        WHERE published = 1
        LIMIT 2;');

      $event->execute();
      $event->store_result();
      $event->bind_result($eventID, $eventTitle, $eventLocation, $eventDate);
    ?>

<!-- hero section -->
<div class="hero-div border border-white border-5 rounded">
  <img src="<?= ROOT_DIR ?>assets/img/group-map.png" alt="">
  <div class="hero-text-box">
    <h1>Join Our Scouts!</h1>
    <p>We are a local-based cub scouts group in Obanshire.</p>
    <a href="<?= ROOT_DIR ?>pages/news">> Newest Posts</a>
  </div>
</div>

<div class="hero-mob-text-box border-5 border-white">
    <h1>Join Our Scouts!</h1>
    <p>We are a local-based cub scouts group in Obanshire.</p>
    <a href="<?= ROOT_DIR ?>pages/news">> Newest Posts</a>
  </div>

<!-- quote section -->
<div class="quote-section">
  <div class="quote-info-wrap justify-content-center">
    <div class="quote-btn-wrap">
      <div class="quote-text-box">
        <p>Taking part in the cub scouts is fun. I can make new friends and go on adventures in nature.</p>
        <span>Brian, age 10</span>
      </div>
      <a href="<?= ROOT_DIR ?>pages/gallery" class="btn btn-primary btn-lg m-2">View Gallery</a>
    </div>
    <div class="quote-img-wrap">
      <img class="border border-white border-3 d-block m-auto" src="<?= ROOT_DIR ?>assets/img/quote-brian.png" alt="">
    </div>
  </div>
</div>

<!-- blog and events section -->
<div class="post-section">
  <h2 class="link-orange">Obanshire's Blog!</h2>
  <div class="bloglist row row-cols-1 row-cols-md-2 g-4">
    <?php while ($blog->fetch()): ?>
        <a href="pages/blogs/blogDetails.php?id=<?= $blogID ?>" class="text-decoration-none">
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

  <h2 class="text-center link-green">Recent Events</h2>
  <div class="bloglist row row-cols-1 row-cols-md-2 g-4">
    <?php while ($event->fetch()): ?>
        <a href="pages/events/eventDetails.php?id=<?= $eventID ?>" class="text-decoration-none">
          <div class="col">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title"><?= $eventTitle ?></h5>
                <small class="card-text"><?= $eventLocation ?></small>
                <p class="card-text"><?= $eventDate ?></p>
              </div>
            </div>
          </div>
        </a>
      <?php endwhile ?>
   </div>
  
</div>

<!-- signup cta section -->
<div class="cta-section">
  <div class="img-wrap">
    <img class="rounded mx-auto img-fluid" src="./assets/img/front-view-binoculars.jpg" alt="">
  </div>
    <div class="text-wrap text-center">
      <h2>Create an account today!</h2>
      <p class="py-5">With an account you can register for events, play games and more!</p>
      <div class="button-wrap">
        <a href="pages/register" class="btn btn-reg">Register</a>
        <a href="pages/login" class="btn btn-primary">Login</a>
      </div>
    </div>
</div>

<?php include 'components/footer.php'; ?>
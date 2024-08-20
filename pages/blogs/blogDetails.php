<?php 
    session_start();
    include '../../account/auth/dbConfig.php';
    include '../../components/header.php';
  
    include '../../components/navbar.php'; 
    
    $blogID = $_GET['id'];

    $blog = $conn->prepare(
      'SELECT
      title, 
      blog_content, 
      created_on 
      FROM `blog` 
      WHERE id = '. $blogID .'');

      $blog->execute();
      $blog->store_result();
      $blog->bind_result( $blogTitle, $blogContent, $blogCreated);
      $blog->fetch();

?>

<!-- individual blog section  -->
<div class="post-wrap w-100">
    <div class="blog-wrap">
        <h2><?= $blogTitle ?></h2>
        <small>Uploaded on <?= $blogCreated ?></small>
        <p><?= $blogContent ?></p>
    </div>
</div>

<?php
    include '../../components/footer.php';
?>
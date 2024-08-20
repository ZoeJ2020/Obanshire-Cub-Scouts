<?php 
  session_start(); 
  include '../../../../auth/dbConfig.php';
  include '../../../../../components/header.php';
  include '../../../../../components/navbar.php';

  $blogID = $_GET['id'];

  $blog = $conn->prepare(
    'SELECT
    title, 
    blog_content
    FROM `blog` 
    WHERE id = '. $blogID .'');

    $blog->execute();
    $blog->store_result();
    $blog->bind_result( $blogTitle, $blogContent);
    $blog->fetch();
?>

<h1 class="link-orange text-center">Update Existing Blog</h1>
<div class="form-wrap">
  <form action="<?= ROOT_DIR ?>account/dashboard/staff/config/blog/updateBlog.php?id=<?= $blogID ?>" method="post">
  <!-- title -->
  <div class="form-group">
    <label for="title">Blog Title</label>
    <input value="<?= $blogTitle ?>" type="text" name="title" class="form-control" id="title" placeholder="Blog Title" required>
  </div>
  <!-- blog_content -->
  <div class="form-group">
    <label for="blog_content">Blog Content</label>
    <textarea name="blog_content" class="form-control" id="blog_content" placeholder="Blog content..." required>
    <?= $blogContent ?>
    </textarea>
  </div>
  <div class="form-group text-center">
    <button type="submit" class="btn btn-primary btn-orange">Update Blog</button>
  </div>
  </form>
</div>

<?php 
  include '../../../../../components/footer.php';
?>
<?php 
  session_start(); 
  include '../../../../../components/header.php';
  include '../../../../../components/navbar.php';
?>

<h1 class="link-orange text-center">Add New Blog</h1>
<div class="form-wrap">
  <form action="<?= ROOT_DIR ?>account/dashboard/staff/config/blog/postBlog.php" method="post">
  <!-- title -->
  <div class="form-group">
    <label for="title">Blog Title</label>
    <input type="text" name="title" class="form-control" id="title" placeholder="Blog Title" required>
  </div>
  <!-- blog_content -->
  <div class="form-group">
    <label for="blog_content">Blog Content</label>
    <textarea name="blog_content" class="form-control" id="blog_content" placeholder="Blog content..." required>
    </textarea>
  </div>
  <div class="form-group text-center">
    <button type="submit" class="btn btn-primary btn-orange">New Blog</button>
  </div>
  </form>
</div>

<?php 
  include '../../../../../components/footer.php';
?>
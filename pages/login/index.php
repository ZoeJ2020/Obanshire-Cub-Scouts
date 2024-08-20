<?php 
    include '../../components/header.php';
    include '../../components/navbar.php';
?>

<h1 class="link-yellow text-center">Login</h1>
  <div class="form-wrap">
    <form action="<?= ROOT_DIR ?>account/auth/authenticate.php" method="post">
    <!-- username -->
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" name="username" class="form-control" id="username" placeholder="Username" required>
    </div>
    <!-- password -->
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
    </div>
    <div class="form-group text-center">
      <button type="submit" class="btn btn-primary btn-orange">Login</button>
    </div>
    </form>
  </div>

<?php
    include '../../components/footer.php';
?>
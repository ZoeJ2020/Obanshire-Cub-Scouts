<?php 
    include '../../components/header.php';
    include '../../components/navbar.php';
?>


<h1 class="link-orange text-center">Register</h1>
  <div class="form-wrap">
    <form action="<?= ROOT_DIR ?>account/auth/register.php" method="post">
      <!-- select buttons for account type -->
      <div class="form-group text-center">
      <label for="type">Account Type</label>
      <select multiple name="type" class="form-control" id="type" required>
        <option value="learner">Learner</option>
        <option value="parent">Parent</option>
        <!-- A staff option was here during testing - it has been removed. -->
      </select>
    </div>
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
      <button type="submit" class="btn btn-primary btn-orange">Register</button>
    </div>
    </form>
  </div>

<?php
    include '../../components/footer.php';
?>
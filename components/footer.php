<div class="container">
  <footer class="py-3 my-3">
    <ul class="nav justify-content-center border-bottom border-white pb-3 mb-3">
      <li class="nav-item foot-item">
        <a href="<?= ROOT_DIR ?>" class="nav-link px-2 text-body-secondary">Home</a>
      </li>
      <?php if (isset($_SESSION['loggedin']) == TRUE && ($_SESSION['type']) == "learner"): ?>
        <li class="nav-item foot-item">
          <a href="<?= ROOT_DIR ?>account/dashboard/learner" class="nav-link px-2 text-body-secondary">Dashboard</a>
        </li>
      <?php endif ?>
      <?php if (isset($_SESSION['loggedin']) == TRUE && ($_SESSION['type']) == "parent"): ?>
        <li class="nav-item foot-item">
          <a href="<?= ROOT_DIR ?>account/dashboard/parent" class="nav-link px-2 text-body-secondary">Dashboard</a>
        </li>
      <?php endif ?>
      <?php if (isset($_SESSION['loggedin']) == TRUE && ($_SESSION['type']) == "staff"): ?>
        <li class="nav-item foot-item">
          <a href="<?= ROOT_DIR ?>account/dashboard/staff" class="nav-link px-2 text-body-secondary">Dashboard</a>
        </li>
      <?php endif ?>
      <li class="nav-item foot-item">
          <a class="nav-link px-2 text-body-secondary" href="<?= ROOT_DIR ?>pages/badges">Badges</a>
      </li>
      <li class="nav-item foot-item">
          <a class="nav-link px-2 text-body-secondary" href="<?= ROOT_DIR ?>pages/news">News</a>
      </li>
      <!-- unregistered only -->
      <?php if (isset($_SESSION['loggedin']) == FALSE): ?>
        <li class="nav-item foot-item">
          <a class="nav-link px-2 text-body-secondary" href="<?= ROOT_DIR ?>pages/login">Login</a>
        </li>
        <li class="nav-item foot-item">
          <a class="nav-link px-2 text-body-secondary" href="<?= ROOT_DIR ?>pages/register">Register</a>
        </li>
      <?php endif ?>

      <!-- ALL registered only -->
      <?php if (isset($_SESSION['loggedin']) == TRUE): ?>
        <li class="nav-item foot-item">
          <a class="nav-link px-2 text-body-secondary" href="<?= ROOT_DIR ?>account/auth/logout.php">Logout</a>
        </li>
      <?php endif ?>
    </ul>
    <p class="text-center text-body-secondary">© 2023 Zoe Johnston</p>
  </footer>
</div>
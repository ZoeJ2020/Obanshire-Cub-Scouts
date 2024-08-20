<nav class="navbar sticky-top navbar-expand-lg bg-transparent mx-5">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= ROOT_DIR ?>">
        <img src="<?= ROOT_DIR ?>assets/img/obanLogo.png" alt="Obanshire Cub Scouts" width="160" height="160">    
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end " id="navbarTogglerDemo02">
      <ul class="navbar-nav mb-2 mb-lg-0">
      <li class="nav-item px-2">
          <a class="nav-link link-green" href="<?= ROOT_DIR ?>">Home</a>
        </li>
        <!-- learner only dashboard -->
        <?php if (isset($_SESSION['loggedin']) == TRUE && ($_SESSION['type']) == "learner"): ?>
          <li class="nav-item px-2">
            <a class="nav-link link-yellow" href="<?= ROOT_DIR ?>account/dashboard/learner">Dashboard</a>
          </li>
        <?php endif ?>
        <!-- parent only dashboard -->
        <?php if (isset($_SESSION['loggedin']) == TRUE && ($_SESSION['type']) == "parent"): ?>
          <li class="nav-item px-2">
            <a class="nav-link link-yellow" href="<?= ROOT_DIR ?>account/dashboard/parent">Dashboard</a>
          </li>
        <?php endif ?>
        <!-- staff only dashboard -->
        <?php if (isset($_SESSION['loggedin']) == TRUE && ($_SESSION['type']) == "staff"): ?>
          <li class="nav-item px-2">
            <a class="nav-link link-yellow" href="<?= ROOT_DIR ?>account/dashboard/staff">Dashboard</a>
          </li>
        <?php endif ?>
        <!-- all users get news and badges -->
        <li class="nav-item px-2">
          <a class="nav-link link-orange" href="<?= ROOT_DIR ?>pages/badges">Badges</a>
        </li>
        <li class="nav-item px-2">
          <a class="nav-link link-green" href="<?= ROOT_DIR ?>pages/news">News</a>
        </li>
        <!-- unregistered only -->
        <?php if (isset($_SESSION['loggedin']) == FALSE): ?>
        <li class="nav-item px-2">
          <a class="nav-link link-yellow" href="<?= ROOT_DIR ?>pages/login">Login</a>
        </li>
        <li class="nav-item px-2">
          <a class="nav-link link-orange" href="<?= ROOT_DIR ?>pages/register">Register</a>
        </li>
        <?php endif ?>

        <!-- ALL registered only -->
        <?php if (isset($_SESSION['loggedin']) == TRUE): ?>
        <li class="nav-item px-2">
          <a class="nav-link link-orange" href="<?= ROOT_DIR ?>account/auth/logout.php">Logout</a>
        </li>
        <?php endif ?>
      </ul>
    </div>
  </div>
</nav>

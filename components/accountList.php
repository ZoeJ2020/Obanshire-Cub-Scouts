<?php 
    $stmt = $conn->prepare(
      'SELECT u.id, 
      u.username,
      u.type, 
      u.phone1, 
      u.phone2,
      ava.description 
      FROM obanshire.users u
      LEFT JOIN availability ava ON u.id = ava.fk_ava_user_id');
  
      $stmt->execute();
      $stmt->store_result();
      $stmt->bind_result($userID, $name, $type, $phone1, $phone2, $help);
?>


<h1 class="text-center">Account List</h1>

<div class="row row-cols-1 row-cols-md-2 g-4">
  <?php while ($stmt->fetch()): ?>
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title"><?= $name ?></h5>
          <p class="card-text"><?= $type ?> account</p>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Phone: <?= $phone1 ?></li>
            <li class="list-group-item">Secondary phone: <?= $phone2 ?></li>
          </ul>
          <!-- parents only -->
          <?php if ($type === "parent"): ?>
            <dl class="row">
              <dt class="col-sm-3">Availability</dt>
              <dd class="col-sm-9"><?= $help ?></dd>
            </dl>
          <?php endif ?>
          <div class="btn-wrap">
            <a href="../editContact.php?id=<?= $userID ?>" class="btn btn-primary">Edit Contact</a>
            <a href="../deleteUser.php?id=<?= $userID ?>" class="btn btn-danger">Delete User</a>
          </div>
        </div>
      </div>
    </div>
  <?php endwhile ?>
</div>
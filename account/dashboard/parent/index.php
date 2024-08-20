<?php 
  session_start(); 
  include '../../../account/auth/dbConfig.php';
  include '../../../components/header.php';
  include '../../../components/navbar.php';

  $name = $_SESSION['name'];
  $id = $_SESSION['id'];

  $ava = $conn->prepare(
    'SELECT description
     
    FROM availability
    WHERE fk_ava_user_id = ?');
  $ava->bind_param('i', $id);
  $ava->execute();
  $ava->store_result();
  $ava->bind_result($desc);
  $ava->fetch();


  $dis = $conn->prepare(
    'SELECT approved
     
    FROM disclosure
    WHERE fk_dis_user_id = ?');

  $dis->bind_param('i', $id);
  $dis->execute();
  $dis->store_result();
  $dis->bind_result($approved);
  $dis->fetch();

?>
 
<h1 class="text-center">Dashboard</h1>
<div class="bloglist-wrap">
  <div class="account-section">
    <h2 class="text-center m-0"><?php echo $name;?></h2>

    <div class="text-center">
      <a href="../editContact.php?id=<?php echo $id;?>" class="btn btn-primary">Edit Contact Info</a>
      <a href="../deleteSelf.php?id=<?php echo $id;?>" class="btn btn-danger">Delete Account</a>
    </div>
  </div>

  <div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Availability</h5>
        <p class="card-text">Your current availability is "<?php echo $desc;?>"</p>
        <a href="editAvailability.php?id=<?php echo $id;?>" class="btn btn-primary">Update Availability</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Disclosure</h5>


        <!-- if parent has uploaded disclosure -->
        <?php if($dis->num_rows == 1): ?>
          <!-- if not yet approved -->
          <?php if($approved == 0): ?>
            <p>Your disclosure submission is pending.</p>
          <?php endif ?>
          <!-- if approved -->
          <?php if($approved == 1): ?>
            <p>You have been approved for disclosure.</p>
          <?php endif ?>
        <?php endif ?>
        <!-- if parent has not uploaded disclosure -->
        <?php if($dis->num_rows == 0): ?>
          <p>You have not yet applied for disclosure.</p>
            <form action="uploadDisclosure.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                <input name="file" class="form-control" type="file" id="imgUpload" required>
                </div>
                <button name="submit" type="submit" class="btn btn-primary">+ Submit File</button>
            </form>
        <?php endif ?>
      </div>
    </div>
  </div>
</div>

</div>

<?php include '../../../components/footer.php'; ?>
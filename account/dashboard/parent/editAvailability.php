<?php 
  session_start(); 
  include '../../../account/auth/dbConfig.php';
  include '../../../components/header.php';
  include '../../../components/navbar.php';

  $id = $_GET['id'];

  $stmt = $conn->prepare(
    'SELECT description
     
    FROM availability 
    WHERE fk_ava_user_id = ?;');
  $stmt->bind_param('i', $id);
  $stmt->execute();
  $stmt->store_result();
  $stmt->bind_result($description);
  $stmt->fetch();
?>

    <h2 class="text-center">Update Availability</h2>
    <div class="form-wrap">
      <form action="submitAvailability.php?id=<?php echo $id;?>" method="post">
          <div class="form-group">
              <label for="phone2">Please describe when you are available to assist Obanshire Cub Scouts.</label>
              <textarea type="text" name="description" class="form-control" id="phone2" placeholder="Description"><?php echo $description;?></textarea>
          </div>
          <div class="form-group text-center">
            <button type="submit" class="btn btn-primary btn-orange">Save Changes</button>
          </div>
      </form>
    </div>

<?php include '../../../components/footer.php'; ?>

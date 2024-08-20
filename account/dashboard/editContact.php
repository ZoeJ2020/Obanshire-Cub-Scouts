<?php 
  session_start(); 
  include '../../account/auth/dbConfig.php';
  include '../../components/header.php';
  include '../../components/navbar.php';

  $id = $_GET['id'];

  $stmt = $conn->prepare(
    'SELECT phone1,
    phone2 
     
    FROM `users` 
    WHERE id = '. $id .';');

  $stmt->execute();
  $stmt->store_result();
  $stmt->bind_result($phone1, $phone2);
  $stmt->fetch();
?>

<h2 class="text-center">Contact Information</h2>
<div class="form-wrap">
    <form action="../dashboard/submitContact.php?id=<?php echo $id;?>" method="post">
        <div class="form-group">
            <label for="phone1">Phone number</label>
            <input value="<?= $phone1 ?>" type="number" name="phone1" class="form-control" id="phone" placeholder="Phone number" required>
        </div>
        <div class="form-group">
            <label for="phone2">Secondary phone number (optional)</label>
            <input value="<?= $phone2 ?>" type="number" name="phone2" class="form-control" id="phone2" placeholder="Secondary phone number">
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary btn-orange">Save Changes</button>
        </div>
    </form>
</div>


<?php
    include '../../components/footer.php';
?>
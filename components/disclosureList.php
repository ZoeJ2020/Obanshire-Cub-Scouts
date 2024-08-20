<?php 
    $stmt = $conn->prepare(
      'SELECT 
      u.username,
      dis.id,
      dis.file_name
    
      FROM obanshire.users u
      LEFT JOIN disclosure dis ON u.id = dis.fk_dis_user_id
      WHERE dis.file_name IS NOT NULL 
      AND dis.approved = 0;');
  
      $stmt->execute();
      $stmt->store_result();
      $stmt->bind_result($posterName, $id ,$fileName);
?>

<?php if($stmt->num_rows > 0): ?>
    <div class="disclosure-wrap">
        <h2 class="text-center m-0">Disclosure Pending Approval</h2>

        <!-- card design with img and text here -->

        <div class="row row-cols-1 row-cols-md-2 g-4">
            <?php while ($stmt->fetch()): ?>
                <div class="col">
                    <div class="card">
                    <img src="<?= ROOT_DIR ?>account/dashboard/parent/uploads/<?= $fileName ?>" class="card-img-top img-disclosure" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $posterName ?></h5>
                        <p class="card-text"><?= $posterName ?> has just submitted their disclosure.</p>
                        <a href="../staff/config/disclosure/approveDisclosure.php?did=<?= $id ?>" class="btn btn-primary">Approve</a>
                        <a href="../staff/config/disclosure/rejectDisclosure.php?did=<?= $id ?>" class="btn btn-warning">Reject</a>
                    </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php endif ?>
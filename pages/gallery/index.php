<?php 
    session_start();
    include '../../account/auth/dbConfig.php';
    include '../../components/header.php';
    include '../../components/navbar.php';
    
    // get file name, id and date from gallery table
    
    $gallery = $conn->prepare(
        'SELECT gallery.id, gallery.date_uploaded, gallery.file_name, users.username FROM gallery
        INNER JOIN users ON gallery.fk_gallery_user_id = users.id;');
  
    $gallery->execute();
    $gallery->store_result();
    $gallery->bind_result($imgID, $dateUploaded, $fileName, $postUser);
?>

<h1 class="text-center">Gallery</h1>
<div class="body-wrap">
    
<section class="gallery-block grid-gallery">
	<div class="container w-75 m-auto">

        <?php if (isset($_SESSION['loggedin']) == TRUE): ?>
            <form action="uploadGallery.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                <input name="file" class="form-control" type="file" id="imgUpload" required>
                </div>
                <button name="submit" type="submit" class="btn btn-primary">+ Add Photo</button>
            </form>
        <?php endif ?>

        <div class="row">
            <?php while ($gallery->fetch()): ?>
            <div class="col-md-6 col-lg-4 item position-relative">
                <img class="img-fluid image scale-on-hover" src="<?= ROOT_DIR ?>pages/gallery/uploads/<?= $fileName ?>">
                <?php if (isset($_SESSION['loggedin']) == TRUE): ?>
                    <?php if (($_SESSION['type']) === "staff"): ?>
                        <a class="remove-image" href="deleteGallery.php?imgID=<?= $imgID ?>" style="display: inline;">&#215;</a>
                        <div class="alert alert-light" role="alert">
                            Uploaded by <?= $postUser ?><br>On <?= $dateUploaded ?>
                        </div>
                    <?php endif ?>
                <?php endif ?>
            </div>
            <?php endwhile ?>
        </div> 
	</div>
</div>
<?php
$conn->close();
?>
<?php
    include '../../components/footer.php';
?>
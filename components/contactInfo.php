<?php  $id = $_SESSION['id']  ?>

<div class="contact-info col">
    <h2>Contact Information</h2>
    <p>Phone number:</p>
    <p>Secondary phone number (optional):</p>
    <a href="../account/dashboard/editContact.php?id=<?php echo $id;?>" class="btn btn-primary">Edit</a>
</div>

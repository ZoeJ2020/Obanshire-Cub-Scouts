<?php 
    session_start();
    include '../../components/header.php';
    include '../../components/navbar.php';
?>

<img class="d-flex m-auto badgeimg" src="../../assets/img/badges/badge-1.png" alt="Cubs Backwoods Cooking Activity Badge">
<h1 class="text-center">Cubs Backwoods Cooking Activity Badge</h1>
<button class="btn btn-primary d-flex m-auto" onclick="window.print();">Print Badge Information</button>

<div class="post-wrap w-100">
    <div class="blog-wrap">
        <p>The Cubs Backwoods Cooking Activity badge is earned by Cub Scouts who demonstrate proficiency in outdoor cooking skills, including fire safety, equipment usage, and meal preparation.</p>
    </div>
    <div class="bloglist-wrap">
        <h3>How To Obtain</h3>
        <ol>
            <li>Show how to light a fire.</li>
            <li>Help someone prepare a fire for cooking on.</li>
            <li>Cook something in the embers of a fire.</li>
            <li>Cook something on a stick.</li>
            <li>Show how to make the fire safe when you have finished with it. Extinguish the fire and make the area safe.</li>
        </ol>
    </div>
</div>

<?php
    include '../../components/footer.php';
?>
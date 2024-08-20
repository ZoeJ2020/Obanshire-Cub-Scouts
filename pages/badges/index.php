<?php
    session_start();
    include '../../components/header.php';
    include '../../components/navbar.php';
?>

<h1 class="text-center link-orange">Badges</h1>
<div class="body-wrap">
<div class="bloglist-wrap">
        <div class="badge-wrap">
            <div class="badge-list">
                <a href="backwoods.php">
                <div class="badge">
                    <img src="../../assets/img/badges/badge-1.png" alt="">
                    <p>Cubs Backwoods Cooking Activity Badge</p>
                </div>
                </a>
                <a href="challenge.php">
                <div class="badge">
                    <img src="../../assets/img/badges/badge2.png" alt="">
                    <p>Cubs Our Skills Challenge Award</p>
                </div>
                </a>
            </div>
        </div>
    </div>
</div>


<?php
    include '../../components/footer.php';
?>
<?php 
    session_start();
    include '../../components/header.php';
    include '../../components/navbar.php';
?>

<img class="d-flex m-auto badgeimg" src="../../assets/img/badges/badge2.png" alt="Cubs Our Skills Challenge Award">
<h1 class="text-center">Cubs Our Skills Challenge Award</h1>
<button class="btn btn-primary d-flex m-auto" onclick="window.print();">Print Badge Information</button>

<div class="post-wrap w-100">
    <div class="blog-wrap">
        <p>The Cubs Our Skills Challenge Award recognizes Cub Scouts who've shown proficiency in practical skills. It's about problem-solving, resourcefulness, and self-reliance. By pursuing this award, Scouts learn to tackle challenges ingeniously. </p>
    </div>
    <div class="bloglist-wrap">
        <h3>How To Obtain</h3>
        <ol>
            <li>Try two new sports of physical activities at least once.</li>
            <li>Take part in three activities that help you be healthy.</li>
            <li>Pick two creative things to try, and show your leader what you've done.</li>
            <li>Take part in at least two problem solving activities that you haven't done before.</li>
        </ol>
    </div>
</div>

<?php
    include '../../components/footer.php';
?>
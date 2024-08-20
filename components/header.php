<?php 
    //display PHP errors to make debugging easier
// Comment this out when you are finished with the website.
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    // for use on laptop
    define('ROOT_DIR', 'http://localhost:8888/obanshire/');
    define('AUTH_DIR', 'http://localhost:8888/obanshire/account/dashboard/');
?>
<!doctype html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Obanshire Cub Scouts</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@200;300;400;500;600;800&display=swap" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="stylesheet" href="<?= ROOT_DIR ?>assets/css/main.css">
    <link rel="stylesheet" href="<?= ROOT_DIR ?>assets/css/blog.css">
    <link rel="stylesheet" href="<?= ROOT_DIR ?>assets/css/footer.css">

    </head>
<body>


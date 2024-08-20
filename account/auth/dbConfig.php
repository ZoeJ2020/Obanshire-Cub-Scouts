<?php


$hn = "localhost";
$un = "zoe_admin";
$pw = "lrz@-r(QqyuYwIw6";
$db = "obanshire";

// Create database connection
$conn = new mysqli($hn, $un, $pw, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

?>
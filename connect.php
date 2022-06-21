<?php

$serverName = "localhost";
$user = "eceha";
$password = "asker9";
$dbName = "shopping";
$link = mysqli_connect($serverName, $user, $password, $dbName);
if (!$link) {
    header("location:index.php?error=2");
    exit;
}
mysqli_query($link, "set names 'utf-8'");

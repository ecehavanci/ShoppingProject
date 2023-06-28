<?php

$serverName = "localhost";
$user = "";
$password = "";
$dbName = "";
$link = mysqli_connect($serverName, $user, $password, $dbName);
if (!$link) {
    header("location:index.php?error=2");
    exit;
}
mysqli_query($link, "set names 'utf-8'");

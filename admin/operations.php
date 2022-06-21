<?php
session_start();
ob_start();

if (!(isset($_SESSION["checkValue"]) && ($_SESSION["checkValue"] == md5($_SERVER["HTTP_USER_AGENT"])))) {
    header("location:../index.php");
    exit;
}

if (!isset($_GET["id"])) {
    header("location:main.php");
    exit;
} else {
    $id = $_GET["id"];
}

if (!isset($_GET["x"])) {
    header("location:main.php");
    exit;
} else {
    $id = $_GET["x"];
}

include("../connect.php");
if ($x == 1) {
    //update
    header("location:update.php");
    exit;
} else if ($x == 2) {
    //delete
    $query = "delete from users where email='$id'";
    mysqli_query($link, $query);
    header("location:main.php");
    exit;
} else {
    header("location:index.php?err=4");
    exit;
}


ob_end_flush();

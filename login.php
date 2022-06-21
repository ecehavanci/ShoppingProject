<?php
session_start();
//Session variables hold information about one single user, and are available to all pages in one application.
ob_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>

<body>
    <?php

    //we do the login 

    if (strlen(trim($_POST["uname"])) == 0) {
        header("location:index.php?error=1");
        exit;
    }
    if (strlen(trim($_POST["pswd"])) == 0) {
        header("location:index.php?error=1");
        exit;
    }

    $uname = $_POST["uname"];
    $pswd = $_POST["pswd"];

    include("connect.php");

    $query = "select * from users where email='" . $uname . "' and pswd='" . md5($pswd) . "' and enabled=1";
    //we have to query the results with md5 because we are storing in phpmyadmin with md5 secure algorithm

    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) != 1) {
        header("location:index.php?error=3");
        exit;
    }

    $row = mysqli_fetch_row($result);
    -$_SESSION["uname"] = $row[0];
    $_SESSION["name"] = $row[1];
    $_SESSION["sname"] = $row[2];
    $_SESSION["admin"] = $row[9];
    $_SESSION["checkValue"] = md5($_SERVER["HTTP_USER_AGENT"]);

    if ($row[9] == 1) {
        header("location:admin/main.php");  //if user is a admin
        exit();
    } else {
        header("location:main.php");     //normal user
        exit();
    }
    ?>
</body>

</html>
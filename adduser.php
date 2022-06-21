<?php
session_start();
ob_start();

include("connect.php");

if (!((isset($_SESSION["checkValue"])) && ($_SESSION["checkValue"] == md5($_SERVER["HTTP_USER_AGENT"])))) {
    header("location:index.php");
    exit;
}

$email = $_POST["email"];
$name = $_POST["name"];
$surname = $_POST["surname"];
$password = md5($_POST["p1"]);
//$p2 = $_POST["p2"];
$phone = $_POST["phone"];
$country = $_POST["country"];
$city = $_POST["city"];
$postCode = $_POST["postCode"];
$gender = $_POST["gender"];

$query = "INSERT INTO `users` (`email`, `name`, `sname`, `pswd`, `phone`, `country`, `city`, `postcode`, `gender`, `admin`, `enabled`) VALUES (\'$email\', \'$name\', \'$surname\', \'$password\', \'$phone\', \'$country\', \'$city\', \'$postCode\', \'$gender\', \'0\', \'1\');";;
mysqli_query($link, $query);

mysqli_close($link);
header("location:index.php");
ob_end_flush();

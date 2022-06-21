<?php
session_start();
ob_start();

if (!((isset($_SESSION["checkValue"])) && ($_SESSION["checkValue"] == md5($_SERVER["HTTP_USER_AGENT"])))) {
    header("location:index.php");
    exit;
}
include("connect.php");
$country = $_POST["country"];
$query  = "select * from cities where countryId=$country order by city";
$results = mysqli_query($link, $query);
$data = array();

while ($row = mysqli_fetch_array($results)) {
    $data[$row[0]] = $row[1];
}

echo json_encode($data);
ob_end_flush();
?>
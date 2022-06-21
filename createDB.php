<?php

$serverName = "localhost";
$user = "eceha";
$password = "asker9";
$dbName = "myDB";

$conn = mysqli_connect($serverName, $user, $password, $dbName);

if (!$conn) {
    die("connection failed" . mysqli_connect_error());
} else {
    echo "connected";
}

/*$sql = "create table students(
    id INT(8) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    surname VARCHAR(50) NOT NULL,
    reg_data timestamp DEFAULT current_timestamp on update current_timestamp);
    ";*/
$sql = "insert into students(name,surname) values ('veli','Havancı')";

if (mysqli_query($conn, $sql)) {
    echo "table is created";
}

mysqli_close($conn);

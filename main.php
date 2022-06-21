<?php
session_start();
ob_start();

if (!(isset($_SESSION["checkValue"]) && ($_SESSION["checkValue"] == md5($_SERVER["HTTP_USER_AGENT"])))) {
    header("location:index.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
</head>

<body>
    <h1>Welcome <?php echo $_SESSION["name"] . " " . $_SESSION["sname"] ?></h1>
    <a href="logout.php">Log Out</a>
</body>

</html>

<?php
ob_end_flush();
?>
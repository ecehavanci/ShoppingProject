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
    <h1>Welcome ADMIN <?php echo $_SESSION["name"] . " " . $_SESSION["sname"] ?></h1>
    <a href="logout.php">Log Out</a>

    <?php
    include("../connect.php");
    $query = "select * from users";
    $results = mysqli_query($link, $query);
    $c0 = '$FFFFFF';
    $c1 = "$00FF33";
    echo "<table align='center' width='80%'>";
    if (isset($_GET["err"])) {
        include("../errorCodes.php");
        echo "<tr><td colspan=11>" . $error[$_GET["err"]] . "</td></tr>";
    }
    echo "<tr bgcolor='#009933'>";
    echo "<td>Email</td>
    <td>Name</td>
    <td>Surname</td>
    <td>Phone</td>
    <td>Country</td>
    <td>City</td>
    <td>Post Code</td>
    <td>Gender</td>
    <td>Admin</td>
    <td>Enabled</td>
    <td>Operations</td>
</tr>";
    $x = 0;
    while ($row = mysqli_fetch_array($results)) {
        if ($row[0] == $_SESSION["uname"])
            continue;
        $x++;
        echo "<tr bgcolor=" . ${"c" . ($x % 2)} . ">";
        echo "<td>$row[0]</td>";
        echo "<td>$row[1]</td>";
        echo "<td>$row[2]</td>";
        echo "<td>$row[4]</td>";
        echo "<td>$row[5]</td>";
        echo "<td>$row[6]</td>";
        echo "<td>$row[7]</td>";
        echo "<td>$row[8]</td>";
        if ($row[9]) $r = "Admin";
        else $r = "User";
        echo "<td>$r</td>";
        if ($row[10]) $r = "Enabled";
        else $r = "Disabled";
        echo "<td>$r</td>";
        echo '<td>
        <a href="operations.php?id=$row[0]&x=1"><img src="../images/edit.png" width="25px" height="25px"></a>
        <a href="operations.php?id=$row[0]&x=2"><img src="../images/delete.png" width="25px" height="25px"></a>
    </td>';
        echo "</tr>";
    }
    echo "</table>";
    ?>
</body>

</html>

<?php
ob_end_flush();
?>
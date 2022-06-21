<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="login.php" method="POST">
        <table align="center" border="0">
            <?php 
               include("errorCodes.php");

                if(isset($_GET["error"])){
                    echo "<tr>
                    <td align='center' colspan='2'><span style='color:red'>".$error[$_GET["error"]]."</span></td>
                </tr>";
                }
            ?>
            <tr>
                <td>Username</td>
                <td><input type="text" name="uname" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="pswd" id="" required></td>
            </tr>
            <tr align="center" colspan="2">
                <td><button>Enter</button></td>
            </tr>
            <tr align="center" colspan="2">
                <td ><a href="register.php">Register</a><br>
                    <a href="forgot.php">Forgot password</a>
                </td>
            </tr>
        </table>

    </form>
</body>

</html>
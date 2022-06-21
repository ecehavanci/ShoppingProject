<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
</script>

<script>
    function fillCities() {
        $.ajax({
            type: "POST",
            url: "cities.php",
            data: {
                country: document.getElementById("country").value
            },
            success: function(results) {
               
                clearSelect();
                $.each($.parseJSON(results), function(index, value) {
                    var element;
                    element = '<option value="' + index + '">' + value + '</option>';
                    $("#city").append(element);
                });
            }
        })
    }

    function clearSelect() {
        var a = document.getElementById("city");
        var x = a.length;
        for (var i = 0; i < x; i++) {
            a.remove(0);
        }
    }

    function checkPassword() {
        a = true;
        if (document.getElementById("p1").value != document.getElementById("p2").value) {
            alert("Password doesn't match");
            return false;
        }
        return true;
    }
</script>

<body>
    <form action="adduser.php" method="POST" onsubmit="return checkPassword()">
        <table align="center">
            <tr>
                <td>Email</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td>Sur Name</td>
                <td><input type="text" name="surname"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="text" name="p1" id="p1"></td>
            </tr>
            <tr>
                <td>Password (again)</td>
                <td><input type="text" name="p2" id="p2"></td>
            </tr>
            <tr>
                <td>Phone</td>
                <td><input type="text" name="phone"></td>
            </tr>
            <tr>
                <td>Country</td>
                <td><select name="country" id="country" onchange="fillCities()">
                        <?php
                        include("connect.php");
                        $query  = "select * from countries order by country";
                        $results = mysqli_query($link, $query);
                        while ($row = mysqli_fetch_array($results)) {
                            print($row[0]) ;
                            echo "<option value=$row[0]>$row[1]</option>";
                        }
                        ?>
                </td>
                </select>
            </tr>
            <tr>
                <td>City</td>
                <td><select name="city" id="city" placeholder="Please select a country">
                        <option>Please select a country</option>
                </td>
            </tr>
            <tr>
                <td>Post Code</td>
                <td><input type="text" name="postCode"></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td><input type="radio" name="gender" value="Male">Male
                    <input type="radio" name="gender" value="Female">Female
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Register" >
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>

    </form>

</body>

</html>
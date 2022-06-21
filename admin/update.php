<form action="updateuser.php" method="POST">
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
                        print($row[0]);
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
            <td>Admin</td>
            <td><input type="radio" name="admin" value="1">Admin
                <input type="radio" name="admin" value="2">User
            </td>
        </tr>
        <tr>
            <td>Enabled</td>
            <td><input type="radio" name="enabled" value="1">Enabled
                <input type="radio" name="enabled" value="0">Disabled
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" value="Register">
                <input type="reset" value="Reset">
            </td>
        </tr>
    </table>

</form>
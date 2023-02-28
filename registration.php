<?php
require_once 'config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username','$email','$password')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
<?php include 'header.php';
?>
<form action="registration.php" method="POST">
    <label for="username"> Username </label>
    <input type="username" name="username" id="">

    <label for="email"> Email </label>
    <input type="email" name="email" id="">

    <label for="password"> Password</label>
    <input type="password" name="password" id="">

    <label for="password"> Confirm Password</label>
    <input type="password" name="confirm_password" id="">

    <input type="submit" value="Register">
    <a href="index.php"> <input type="button" value="Login"></a>
</form>



</body>

</html>
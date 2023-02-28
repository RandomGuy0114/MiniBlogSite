<?php
session_start();

if (isset($_SESSION["loggedin"])) {
    header("location: dashboard.php");
    exit;
}?>
<?php include 'header.php';
?>
<form action="auth/register.php" method="POST">
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
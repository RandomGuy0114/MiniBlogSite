<?php include('config/database.php');?>
<?php include('header.php') ;
?>
    <form action="auth/login.php" method="post">
        <label for="email"> Email </label>
        <input type="email" name="email" id="">
        <label for="password"> Password</label>
        <input type="password" name="password" id="">
        <input type="submit" value="Login">

        <a href="registration.php"><input type="button" value="Register"></a>
    </form>
</body>
</html>
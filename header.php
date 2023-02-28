<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Blog</title>
</head>

<body>
    <?php if (isset($_SESSION["loggedin"])) : ?>
        <div class="topnav" id="myTopnav">
        <a href="dashboard.php" class="active">MiniBlog</a>
            <a href="dashboard.php" class="active">Home</a>
            <a >Hi <?= $_SESSION["username"];?></a>
            <a href="auth/logout.php">Logout</a>
          
        </div>
        <?php elseif (!isset($_SESSION["loggedin"])) : ?>
            <div class="topnav" id="myTopnav">
        <h1><a href="index.php" class="active">MiniBlog</a></h1>
            <a href="index.php" class="active">Login</a>
            <a href="registration.php" class="active">Register</a>
            
        </div>
    <?php endif ?>
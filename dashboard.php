<?php
session_start();

if (!isset($_SESSION["loggedin"])) {
    header("location: login.php");
    exit;
}

//Include config file
require_once 'config/database.php';

?>

<?php include('header.php'); ?>


<?php
if (isset($successMessage)) {
    echo '<div >';
    echo $successMessage;
    echo '</div>';
}

?>
<a class="nav-link" href="auth/logout.php">Logout</a>

</body>

</html>
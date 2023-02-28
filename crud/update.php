
<?php
session_start();

if (!isset($_SESSION["loggedin"])) {
    header("location: index.php");
    exit;
}
//Include config file
require_once '../config/database.php';

include('../header.php');
$sql = "SELECT id, title, content FROM blogs WHERE id=?";

?>

<form action="crud/update.php" method="post">
    <label for="title"> Title </label>
    <input type="text" name="title" id="">
    <label for="content"> Content</label>
    <textarea name="content" rows="4" cols="50">
</textarea>
    <input type="submit" value="POST">
</form>

<div>
    <a href="../dashboard.php" type="button"><input type="button" value="CANCEL" /></a>
</div>




</body>
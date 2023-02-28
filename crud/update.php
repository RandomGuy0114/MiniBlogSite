
<?php
session_start();

if (!isset($_SESSION["loggedin"])) {
    header("location: index.php");
    exit;
}
//Include config file
require_once '../config/database.php';

include('../header.php');
if (isset($_POST["id"])) {
    $blog_id = $_POST["id"];
    $title = $_POST["title"];
    $content = $_POST["content"];

}
?>

<form action="upd.php" method="post">
    <input type="hidden" name="id" value="<?= $blog_id ?>">
    <label for="title"> Title </label>
    <input type="text" name="title" id="" value="<?= $title ?>">
    <label for="content"> Content</label>
    <textarea name="content" rows="4" cols="50"><?= $content ?></textarea>
    <input type="submit" value="UPDATE">
</form>

<div>
    <a href="../dashboard.php" type="button"><input type="button" value="CANCEL" /></a>
</div>




</body>
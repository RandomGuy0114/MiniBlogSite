<?php
session_start();
if (!isset($_SESSION["loggedin"])) {
    header("location: index.php");
    exit;
}
//Include config file
require_once 'config/database.php';

include('header.php');
?>
<?php include('crud/read.php'); ?>
<div>
    <a href="crud/create.php" type="button"><input  type="button" value="CREATE NEW POST"/></a>
</div>


</body>

</html>
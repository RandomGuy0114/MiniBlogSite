<?php 
require_once '../config/database.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["title"]) && !empty($_POST["content"])) {
        $user_id =  $_SESSION['id'];
            // to prevent sql injections of users
            $sql = "INSERT INTO blogs (title, content, user_id) VALUES (?,?,?)";

            if ($stmt = mysqli_prepare($conn, $sql)) {
                $param_title = $_POST["title"];
                $param_content = $_POST["content"];
              
                mysqli_stmt_bind_param($stmt, "sss", $param_title, $param_content, $user_id);

                if (mysqli_stmt_execute($stmt)) {
                    header("location: ../dashboard.php");
                } else {
                    $errorMessage = "error";
                }
                mysqli_stmt_close($stmt);
            }
     
    } else {
        $errorMessage = "Input fields must not be empty!";
    }

    mysqli_close($conn);
}

?>

<?php
//Include config file
require_once '../config/database.php';

include('../header.php');
?>

<form action="create.php" method="post">
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

</html>
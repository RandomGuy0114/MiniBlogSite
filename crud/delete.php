<?php 
require_once '../config/database.php';

if (isset($_GET["id"])) {
    $blog_id = $_GET["id"];
    
    $sql = "DELETE FROM blogs WHERE id = $blog_id";
    if (mysqli_query($conn, $sql)) {
        header("Location: ../dashboard.php");
        exit();
    } else {
        echo "Error deleting blog: " . mysqli_error($conn);
    }
}

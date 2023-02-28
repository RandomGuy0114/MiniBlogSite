<?php 
session_start();

if (!isset($_SESSION["loggedin"])) {
    header("location: index.php");
    exit;
}
//Include config file
require_once '../config/database.php';
if (isset($_POST["id"]) && isset($_POST["title"]) && isset($_POST["content"])) {
    $blog_id = $_POST["id"];
    $title = $_POST["title"];
    $content = $_POST["content"];

    $sql = "UPDATE blogs SET title=?, content=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $title, $content, $blog_id);
    $stmt->execute();
    $stmt->close();

    header("location: ../dashboard.php");
    exit;
} else {
    // Retrieve blog from database
    $blog_id = $_POST["id"];
    $sql = "SELECT id, title, content FROM blogs WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $blog_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $blog = $result->fetch_assoc();

    $title = $blog["title"];
    $content = $blog["content"];
}
?>

?>
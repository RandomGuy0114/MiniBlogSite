<?php
// Initialize the session
session_start();

// Check if the user is already logged in
if (isset($_SESSION["loggedin"])) {
    header("location: ../dashboard.php");
    exit;
}

// include config file
require_once '../config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sql = "SELECT id, email, username, password FROM users WHERE email = ?";

    if ($stmt = mysqli_prepare($conn, $sql)) {

        mysqli_stmt_bind_param($stmt, "s", $_POST["email"]);

        if (mysqli_stmt_execute($stmt)) {

            mysqli_stmt_store_result($stmt);

            if (mysqli_stmt_num_rows($stmt) ==  1) {

                mysqli_stmt_bind_result($stmt, $id, $_POST["email"],$username, $password);

                if (mysqli_stmt_fetch($stmt)) {
                    if (password_verify($_POST["password"], $password)) {

                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["email"] = $_POST["email"];
                        $_SESSION["username"] = $username;
                        header("location: ../dashboard.php");
                        $successMessage = "Logged in!";

                    } else {
                        $errorMessage = "Invalid email or password!";
                    }
                } else {
                    $errorMessage = "Something went wrong! Try again later.";
                }
                mysqli_stmt_close($stmt);
            } else {
                $errorMessage = "Email not found!";
            }
        }
    }
    mysqli_close($conn);
}

?>

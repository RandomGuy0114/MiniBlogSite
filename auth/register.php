<?php
require_once '../config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["username"]) && !empty($_POST["email"]) &&  !empty($_POST["password"])) {

        if ($_POST["password"] == $_POST["confirm_password"]) {

            // to prevent sql injections of users
            $sql = "INSERT INTO users (username, email, password) VALUES (?,?,?)";

            if ($stmt = mysqli_prepare($conn, $sql)) {
                $param_username = $_POST["username"];
                $param_email = $_POST["email"];
                $param_password = password_hash($_POST["password"], PASSWORD_DEFAULT);
                mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_email, $param_password);

                if (mysqli_stmt_execute($stmt)) {
                    header("location: ../index.php");
                } else {
                    $errorMessage = "Username already exists!";
                }
                mysqli_stmt_close($stmt);
            }
        } else {
            $errorMessage = "Passwords do not match!";
        }
    } else {
        $errorMessage = "Input fields must not be empty!";
    }

    mysqli_close($conn);
}
?>
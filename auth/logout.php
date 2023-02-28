<?php

session_start();
unset($_SESSION["loggedin"]);
unset($_SESSION["id"]);
session_destroy();
header("location: ../index.php");


?>
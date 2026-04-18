<?php

session_start();
if (isset($_SESSION["email"]) && isset($_SESSION["id"])){
    unset($_SESSION["email"]);
    unset($_SESSION["id"]);
}

session_destroy();
header("Location:login.php");
die();
?>
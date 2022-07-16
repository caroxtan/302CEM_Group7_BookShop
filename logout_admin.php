<?php
session_start();

unset($_SESSION["username"]);
session_destroy();
$url = "adminlogin.php";

header("Location:$url");

?>
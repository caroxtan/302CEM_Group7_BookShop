<?php
session_start();

unset($_SESSION["username"]);
session_destroy();
$url = "user/login.php";

header("Location:$url");

?>
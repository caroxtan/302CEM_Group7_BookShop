<?php
session_start();

unset($_SESSION["username"]);
session_destroy();
$url = "admin/login.php";

header("Location:$url");

?>
<?php
session_start();

unset($_SESSION['name']);
unset($_SESSION['register']);
unset($_SESSION['login']);
unset($_SESSION['course']);


session_destroy();

header("Location: index.php");
?>
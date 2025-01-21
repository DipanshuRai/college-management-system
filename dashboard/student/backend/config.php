<?php 
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: http://localhost/College Management System/config/login.php");
    exit;
}

if (isset($_SESSION["id"])) {
    $id = $_SESSION["id"];
}

require_once "C:\\xampp\\htdocs\\College Management System\\config\\config.php";
?>
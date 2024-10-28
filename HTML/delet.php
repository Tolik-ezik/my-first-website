<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("function.php");
session_start();

if ($_SESSION["admin"] != null) {
    $result = delete_news($conn);
    header('Location: http://127.0.1.1/HTML/new.php');
} else {
    header('Location: http://127.0.1.1/HTML/new.php');
}

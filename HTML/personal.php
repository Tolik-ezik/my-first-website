<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("function.php");
session_start();

if ($_SESSION["login"] == $_GET["id"]) {
    header("Location: http://127.0.1.1/HTML/home.php");
}

$conn = mysqli_connect("localhost:3306", "root", "qazmlp123.", "New");
if (!$conn) {
    die("Ошибка: " . mysqli_connect_error());
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php include 'vars.php';
    $result = get_user($conn, $_GET["id"]);
    if ($result[1] == 0 || empty($_GET['id'])) {
        echo "Nothing found"; 
        echo "<br>";
        echo "Ха лох";
    } else {
        foreach ($result[0] as $value) {
            echo "<h1>" . $value['login'] . "</h1>";

            $result = get_user_news($conn, $value["id"]);
            foreach ($result as $value2){
                echo '<h2>' . $value2['title'] . '</h2>';
                echo "<img src='http://127.0.1.1/HTML/pict/" . $value2['file'] . "' >";
                echo '<p>' . $value2['article'] . '</p>';
            }

            if (!empty($value["admin"])) {
                echo "Админ";
            } else {
                echo "Не Админ";
            }
        }
    } ?>

</body>
</html>
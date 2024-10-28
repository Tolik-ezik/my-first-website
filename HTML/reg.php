<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("function.php");
session_start();


if (isset($_POST["login"]) == false || isset($_POST["password"]) == false) {
    // echo "Заполните поля";
} else {
    $login = $_POST["login"];
    $password = $_POST["password"];
    if (strlen($_POST["login"]) >= 50 || strlen($_POST["password"]) >= 50) {
        $lox = "Ты лох";
        echo $lox;
    } else {
        echo "Ты не лох, ";
        $conn = mysqli_connect("localhost:3306", "root", "qazmlp123.", "New");
        if (!$conn) {
            die("Ошибка: " . mysqli_connect_error());
        }

        $sql = "INSERT INTO User (login, password) VALUES ('$login', '$password')";
        if (mysqli_query($conn, $sql)) {
            $_SESSION["login"] = $login;
            $_SESSION["password"] = $password;
            mysqli_data_seek($result, 0);
            $row = mysqli_fetch_row($result);
            $_SESSION["admin"] = $row[3];
            $_SESSION["id"] = $row[0];
            header("Location: http://127.0.1.1/HTML/home.php");
        } else {
            echo "Ошибка: " . mysqli_error($conn);
        }
    }
}
//ввести логику если у нас есть уже такой пользователь
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body class="reg" style="background-color: #B0C4DE;">
        <form method="post" class="form">
            <label style="font-size: 1.6em;"> Введите логин: </label> <br>
            <input type="text" name="login" style="padding-right: 2.8em; padding-bottom: 0.8em; border-radius: 0.2em;"> <br>
            <label style="font-size: 1.6em; margin-top: 0.5em;"> Введите пароль: </label> <br>
            <input type="password" name="password" style="padding-right: 2.8em; padding-bottom: 0.8em; border-radius: 0.2em;"> <br>
            <input type="submit" value="Зарегистрироваться" class="button"> <br>
            <a href="http://127.0.1.1/HTML/avt.php" class="ant" style="background-color: #B0C4DE;"> Аунтефикация </a>
        </form>
</body>

</html>
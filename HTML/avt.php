<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("function.php");
session_start();


if (isset($_POST["login"]) == true && isset($_POST["password"]) == true) {
    $login = $_POST["login"];
    $password = $_POST["password"];
    $result = avt_user($conn, $login, $password);
    if ($result > 0) {
        $_SESSION["login"] = $login;
        $_SESSION["password"] = $password;

        $result1 = get_row($conn, $login, $password);
        $_SESSION["admin"] = $result1[3];
        $_SESSION["id"] = $result1[0];
        header("Location: http://127.0.1.1/HTML/home.php");
    } else {
        echo "Невереный логин или пароль";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Авторизация</title>
</head>

<body class="avt" style="background-color: #20B2AA;">
    <form method="post" class="form">
        <label style="font-size: 1.6em;"> Введите логин: </label> <br>
        <input type="text" name="login" style="padding-right: 2.8em; padding-bottom: 0.8em; border-radius: 0.2em;"> <br>
        <label style="font-size: 1.6em; margin-top: 0.5em;"> Введите пароль: </label> <br>
        <input type="password" name="password"> <br>
        <input type="submit" value="Вход" class="button"> <br>
        <a href="http://127.0.1.1/HTML/reg.php" class="reg"> Регистрация </a>
    </form>
</body>

</html>
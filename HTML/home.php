<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require_once("function.php");

if (isset($_POST["password"]) == true) {
    $login = $_SESSION["login"];
    $password = $_POST["password"];
    $result = update_pasw($conn, $password, $login);
}

if (isset($_POST["exit"])) {
    session_destroy();
    header("Location: http://127.0.1.1/HTML/avt.php");
}


//отправление статьи в базу данных
if (isset($_POST["title"]) == true && isset($_POST["article"]) == true) {
    $title = $_POST["title"];
    $article = $_POST["article"];
    $id_user = $_SESSION["id"];
    //отправление файла на сервер
    if (isset($_FILES["filename"]) == true) {
        $result1 = upload_file($_FILES["filename"]["error"], $_FILES["filename"]["size"], $_FILES["filename"]["tmp_name"], $_FILES["filename"]["name"]);
        if (isset($result1) != 0) {
            $result = create_news1($conn, $_SESSION["id"], $_POST["title"], $_POST["article"], $result1);
            echo 'Картинка и статья отправлены';
        } else {
            $result = create_news2($conn, $_SESSION["id"], $_POST["title"], $_POST["article"]);
            echo 'Статья отправлена';
        }
    }
} else {
    echo "Напишите заголовок и статью";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
</head>

<body class=''>
    <?php include 'vars.php'; ?>

    <form method="post" enctype="multipart/form-data">
        <label> Введите пароль: </label> <br>
        <input type="text" name="password"> <br>
        <input type="submit" value="Смена пароля"> <br> <br>

        <label> Введите запись: </label> <br>
        <input type="text" name="title" placeholder="Заголовок"> <br>
        <input type="text" name="article" placeholder="Статья"> <br>
        <input type="file" name="filename"> <br>
        <input type="submit" value="Отправить"> <br>
        <label> Выйти из аккаунта: </label>
        <input type="submit" name="exit" value="Выход"> <br>

        <?php $result = user_news($conn); ?>
        <?php if ($result[1] > 0) { ?>
            <?php foreach ($result[0] as $value) : ?>
                <h1> <?= $value['title'] ?></h1>
                <img src="http://127.0.1.1/HTML/pict/<?= $value['file'] ?>">
                <h1> <?= $value['article'] ?> </h1>
                <a href="http://127.0.1.1/HTML/change.php?id=<?= $value['id']; ?>"> Изменить запись</a> <br>
                <hr>
            <?php endforeach; ?>
        <?php } else { ?>
            <?= "У тебя нет записей" ?>
        <?php } ?>

</body>

</html>
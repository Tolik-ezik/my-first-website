<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("function.php");
session_start();

$result = get_news_id($conn, $_GET["id"]);
foreach ($result as $value) {
    $title = $value['title'];
    $article = $value['article'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Изменение</title>
</head>

<body>
    <a href="http://127.0.1.1/HTML/home.php"> <-На главную </a>
            <img src="http://127.0.1.1/HTML/pict/<?= $value['file'] ?>">
            <?= "<form method='post' enctype='multipart/form-data'>
    <input type='text' name='title' value='$title'>
    <input type='text' name='article' value='$article'>
    <input type='submit' value='Сохранить'>
    </form>"; ?>
            <?php
            if (isset($_POST["title"]) == true || isset($_POST["article"]) == true) {
                if ($value['file'] != 0) {
                    $result = update_news1($conn, $_POST["title"], $_POST["article"], $value['file'], $_GET['id']);
                } else {
                    $result = update_news2($conn, $_POST["title"], $_POST["article"], $_GET['id']);
                }
                echo 'Статья обновлена';
            } else {
                echo 'Внесите изменения в статью';
            }

            ?>
            <!-- удаление картинки -->
            <form method="post">
                <input type='submit' value='удалить файл'>
                <input type='hidden' name='hidden' value='<?= $value['id'] ?>'>
            </form>
            <!-- удаление всей статьи -->
            <form method="post">
                <input type='submit' value='удалить статью'>
                <input type='hidden' name='hidden1' value='<?= $value['id'] ?>'>
            </form>

            <!-- изменение картинки -->
            <a href="http://127.0.1.1/HTML/file.php/id=<?= $value['id']; ?>">Изменить картинку</a>

            <?php
            if (isset($_POST['hidden'])) {
                $result1 = name_file($conn, $_POST['hidden']);
                foreach ($result1 as $value) {
                    unlink("pict/" . $value['file']);
                }
                $result = update_file($conn, $_POST['hidden']);
            }

            if (isset($_POST['hidden1'])) {
                $result1 = name_file($conn, $_POST['hidden1']);
                foreach ($result1 as $value) {
                    unlink("pict/" . $value['file']);
                }
                $result = delete_file($conn, $_POST['hidden1']);
            }
            ?>
</body>

</html>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("function.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сcайт</title>
</head>

<body class=''>
    <?php include 'vars.php'; ?>
    <div class=''>
        <?php $result = get_news($conn); ?>
        <?php foreach ($result as $value) {
            echo "<article>";
            echo "<h2>" . $value["title"] . "</h2>";

            //выведение ника автора
            $result = name_user($conn, $value["id_user"]);
            echo '<a href="http://127.0.1.1/HTML/personal.php?id=' . $result[0] . '">' . $result[0] . '</a>';

            echo "<img src='http://127.0.1.1/HTML/pict/" . $value['file'] . "' >";
            echo "<p>" . $value["article"] . "</p>";
            echo "<br>";
            echo "</article>";

            if (!empty($_SESSION["admin"])) {
                if ($_SESSION["admin"] != null) {
                    echo '<a href="http://127.0.1.1/HTML/delet.php?id=' . $value['id'] . '">' . 'Удалить' . '</a>';
                }
            }
            echo "<hr>";
        } ?>
    </div>
</body>

</html>
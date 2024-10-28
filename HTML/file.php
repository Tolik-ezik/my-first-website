<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("function.php");
session_start();

if (isset($_FILES["filename"]) == true) {
    $result = upload_file($_FILES["filename"]["error"], $_FILES["filename"]["size"], $_FILES["filename"]["tmp_name"], $_FILES["filename"]["name"]);
    if (isset($result) != 0) {
        echo 'Картинка и статья обновлены'; 
    }
}else{
    echo "Произошла ошибка", '<br>'; 
}

var_dump($_FILES);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" enctype="multipart/form-data">
        <input type='file' name='filename'>
        <input type='submit' value='Сохранить'>
    </form>
</body>

</html>

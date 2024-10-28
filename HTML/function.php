<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$conn = mysqli_connect("localhost:3306", "root", "qazmlp123.", "New");
if (!$conn) {
    die("Ошибка: " . mysqli_connect_error());
}

//функция для отправления на сервер и хранения
function upload_file($error, $size, $tmp_name, $name)
{
    if ($error == UPLOAD_ERR_OK && $size < 3 * 1024 * 1024) {
        if (move_uploaded_file($tmp_name, 'pict/' . $name)) {
            return ($name);
        } else {
            return 'Произошла ошибка либо ваш файл превышает 3 Мг';
        }
    }
}

function user_news($conn)
{
    $sql = "SELECT * FROM `News` WHERE '$_SESSION[id]' = id_user";
    $result2 = mysqli_query($conn, $sql);
    $row_cnt = mysqli_num_rows($result2);
    return ([$result2, $row_cnt]);
}
function get_news($conn)
{
    $sql = "SELECT * FROM `News`";
    $result2 = mysqli_query($conn, $sql);
    return ($result2);
}
function name_user($conn, $id_user)
{
    $sql = "SELECT `login` FROM `User` INNER JOIN `News` ON '$id_user' = User.id";
    $result2 = mysqli_query($conn, $sql);
    mysqli_data_seek($result2, 0);
    $row = mysqli_fetch_row($result2);
    return ($row);
}
function name_file($conn, $id)
{
    $sql = "SELECT `file` FROM `News` WHERE `id` = $id";
    $result2 = mysqli_query($conn, $sql);
    return ($result2);
}
function avt_user($conn, $login, $password)
{
    $sql =  "SELECT * FROM User WHERE `login` = '$login' AND `password` = '$password'";
    $result2 = mysqli_query($conn, $sql);
    $row_cnt = mysqli_num_rows($result2);
    return ($row_cnt);
}
function get_row($conn, $login, $password)
{
    $sql =  "SELECT * FROM User WHERE `login` = '$login' AND `password` = '$password'";
    $result2 = mysqli_query($conn, $sql);
    mysqli_data_seek($result2, 0);
    $row = mysqli_fetch_row($result2);
    return ($row);
}
function update_pasw($conn, $password, $login)
{
    $sql = "UPDATE `User` SET password = '$password' WHERE login ='$login'";
    $result2 = mysqli_query($conn, $sql);
    return ($result2);
}
function update_file($conn, $hidden)
{
    $sql = "UPDATE `News` SET `file` = 0 WHERE `id` = '$hidden'";
    $result2 = mysqli_query($conn, $sql);
    return ($result2);
}
function get_news_id($conn, $id)
{
    $sql = "SELECT * FROM `News` WHERE id = '$id'";
    $result2 = mysqli_query($conn, $sql);
    return ($result2);
}
function delete_file($conn, $hidden1)
{
    $sql = "DELETE FROM `News` WHERE `id` = '$hidden1'";
    $result2 = mysqli_query($conn, $sql);
    return ($result2);
}
function update_news1($conn, $title, $article, $name, $id)
{
    $sql = "UPDATE `News` SET `title` = '$title', `article` = '$article', `file` = '$name' WHERE id = '$id'";
    $result2 = mysqli_query($conn, $sql);
    return ($result2);
}
function update_news2($conn, $title, $article, $id)
{
    $sql = "UPDATE `News` SET `title` = '$title', `article` = '$article', `file` = 0 WHERE id = '$id'";
    $result2 = mysqli_query($conn, $sql);
    return ($result2);
}
function create_news1($conn, $id_user, $title, $article, $name)
{
    $sql = "INSERT INTO `News` (`id_user`,`title`,`article`, `file`) VALUES ($id_user, '$title', '$article', '$name')";
    $result2 = mysqli_query($conn, $sql);
    return ($result2);
}
function create_news2($conn, $id_user, $title, $article)
{
    $sql = "INSERT INTO `News` (`id_user`,`title`,`article`, `file`) VALUES ($id_user, '$title', '$article', 0)";
    $result2 = mysqli_query($conn, $sql);
    return ($result2);
}
function delete_news($conn)
{
    $sql = "DELETE FROM `News` WHERE `id` = '$_GET[id]'";
    $result2 = mysqli_query($conn, $sql);
    return ($result2);
}
function get_user($conn, $id)
{
    $sql = "SELECT * FROM User WHERE `login` = '$id'";
    $result2 = mysqli_query($conn, $sql);
    $row_cnt = mysqli_num_rows($result2);
    return ([$result2, $row_cnt]);
}
function get_user_news($conn, $id)
{
    $sql = "SELECT * FROM `News` INNER JOIN `User` ON $id = News.id_user";
    $result2 = mysqli_query($conn, $sql);
    return ($result2);
}

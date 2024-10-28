<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Cooking</title>
</head>

<body class="bg-sky-50">
    <header class="flex my-5">
        <div class="flex justify-start w-1/4 pl-10">
            <a href="main.php" class="transition ease-in-out delay-150 text-xl hover:bg-lime-200 hover:scale-110 duration-300 rounded-md py-2 px-4">главная</a>
        </div>
        <div class="flex justify-center w-1/2">
            <form method="get" class="mt-2 pd-3 w-3/4 h-7 flex flex-nowrap">
                <input type="text" name="search" class="w-full rounded-md shadow-lg border-2 border-gray-700 outline outline-2 outline-offset-0 outline-lime-200">
            </form>
        </div>
        <div class="flex justify-end w-1/4 pr-10">
            <a href="abоut.php" class="transition ease-in-out delay-150 text-xl hover:bg-lime-200 hover:scale-110 duration-300 rounded-md py-2 px-4">о нас</a>
        </div>
    </header>
</body>
</html>


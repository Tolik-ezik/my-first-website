<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$conn = mysqli_connect("localhost:3306", "root", "qazmlp123.", "New");
if (!$conn) {
    die("Ошибка: " . mysqli_connect_error());
}

$sql = "SELECT * FROM `Food` WHERE `id` = '$_GET[id]'";
$result = mysqli_query($conn, $sql);
$row_cnt = mysqli_num_rows($result);
if($_GET["id"] == 0 || $row_cnt == 0){
    header("Location: http://127.0.1.1/WB/error.php?text=0");
}

if (!empty($_GET["search"])) {
    $sql = "SELECT * FROM `Food` WHERE `title` = '$_GET[search]'";
    $result = mysqli_query($conn, $sql);
    $row_cnt = mysqli_num_rows($result);
    if ($row_cnt == 0) {
        header("Location: http://127.0.1.1/WB/error.php?text=1");
    }
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
    <?php include 'nav_bar.php'; ?>
    <div class="flex bg-lime-300">
        <div class="h-screen w-1/4 bg-sky-50">
        </div>
        <div class="h-screen w-1/2 border-2 border-black">
            <form method="get" class="flex grid grid-cols-4 gap-1 text-center my-3 text-xl ">
                <div class="transition ease-in-out delay-150 hover:scale-110 duration-300 rounded-md p-1">
                    <a href="http://127.0.1.1/WB/main.php">всё</a>
                </div>
                <div class="transition ease-in-out delay-150 hover:scale-110 duration-300 rounded-md p-1">
                    <a href="http://127.0.1.1/WB/main.php?food=1">первое</a>
                </div>
                <div class="transition ease-in-out delay-150 hover:scale-110 duration-300 rounded-md p-1">
                    <a href="http://127.0.1.1/WB/main.php?food=2">второе</a>
                </div>
                <div class="transition ease-in-out delay-150 hover:scale-110 duration-300 rounded-md p-1">
                    <a href="http://127.0.1.1/WB/main.php?food=3">салат</a>
                </div>
            </form>
            <div>
                <?php foreach ($result as $row) : ?>
                    <p class="flex justify-center text-xl lowercase"><?= $row["title"] ?></p>
                    <div class="flex flex-row">
                        <div class="w-1/4"></div>
                        <img class="w-1/2 border-2 border-gray-700 rounded-md " src="<?= $row["picture"] ?>">
                        <div class="w-1/4"></div>
                    </div>
                    <p class="text-center lowercase text-xl">вам понадобится:</p>
                    <p class="text-center lowercase text-xl"><?= $row["ingredients"] ?></p> <br>
                    <p class="text-center text-wrap lowercase text-xl"><?= $row["recipe"] ?></p>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="justify-end h-screen w-1/4 bg-sky-50">
        </div>
    </div>
</body>

</html>
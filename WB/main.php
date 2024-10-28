<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$conn = mysqli_connect("localhost:3306", "root", "qazmlp123.", "New");
if (!$conn) {
    die("Ошибка: " . mysqli_connect_error());
}
$sql = "SELECT * FROM `Food`";
if (!empty($_GET["food"])) {
    if ($_GET["food"] == 1) {
        $sql = "SELECT * FROM `Food` WHERE `tape_food` = 1";
    } elseif ($_GET["food"] == 2) {
        $sql = "SELECT * FROM `Food` WHERE `tape_food` = 2";
    } elseif ($_GET["food"] == 3) {
        $sql = "SELECT * FROM `Food` WHERE `tape_food` = 3";
    }
}
if (!empty($_GET["search"])) {
    $sql = "SELECT * FROM `Food` WHERE `title` = '$_GET[search]'";
}
$result = mysqli_query($conn, $sql);
$row_cnt = mysqli_num_rows($result);

if ($row_cnt == 0){
    header("Location: http://127.0.1.1/WB/error.php?text=1");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AAAAAAAAA</title>
</head>

<body>
    <?php include 'nav_bar.php'; ?>
    <div class="flex rounded-md bg-lime-300">
        <div class="h-screen w-1/4 bg-sky-50">
        </div>
        <div class="h-lvh w-1/2 rounded-md border-2 border-black">
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
            <div class="text-lg">
                <?php foreach ($result as $row) : ?>
                    <a class="flex justify-center text-xl lowercase no-underline hover:underline decoration-dashed decoration-1" href="http://127.0.1.1/WB/recipe.php?id=<?= $row["id"] ?>"><?= $row["title"] ?></a>
                    <div class="grid grid-rows-2 grid-flow-col gap-3 shadow-lg mx-5 mb-2 rounded-md border border-gray-700">
                        <img class="row-span-2 rounded-md" src="<?= $row["picture"] ?>">
                        <div class="flex flex-col">
                            <div class="h-3/4"></div>
                            <p class="h-1/4 text-center row-span-2 col-span-1 lowercase"><?= $row["ingredients"] ?></p>
                            <div class="h-1/5"></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="justify-end h-screen w-1/4 bg-sky-50">
        </div>
    </div>
</body>

</html>
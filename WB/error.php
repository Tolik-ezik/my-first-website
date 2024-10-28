<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Ошибка</title>
</head>

<body>
    <div class="flex bg-sky-50">
        <div class="flex h-screen w-1/4 ">
        </div>
        <div class="flex flex-col h-screen w-1/2 ">
            <div class="h-1/2">
            </div>
            <div class="flex flex-col h-1/4 uppercase bg-lime-300 shadow-lg rounded-md border border-gray-700 ">
                <div class="h-1/2">
                    <a class="flex w-1/4 text-xl rounded-md py-2 px-4 lowercase transition ease-in-out delay-150 hover:scale-110 duration-300 " href="http://127.0.1.1/WB/main.php">На главную</a>
                </div>
                <?php if ($_GET["text"] == 1) {
                    echo '<div class="text-center text-2xl h-1/4">' . "Блюдо не найдено" . '</div>';
                } elseif ($_GET["text"] == 0) {
                    echo '<div class="text-center text-2xl h-1/4">' . "Прекрати играть с ссылкой, просто пользуйся сайтом" . '</div>';
                }else {
                    echo '<div class="text-center text-2xl h-1/4">' . "Я знаю где ты живёшь и я уже еду" . '</div>';
                }
                ?>
                <div class="h-1/2"></div>
            </div>
            <div class="h-1/2"></div>
        </div>
        <div class="justify-end h-screen w-1/4">

        </div>
    </div>
</body>

</html>
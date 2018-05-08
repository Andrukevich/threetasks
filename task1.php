<?php

// подключает composer для автолоадеров
require_once "vendor/autoload.php";
// подключает функций
require_once "inc/functions.php";
// создает объект faker для заполнения случайными данными
$faker = Faker\Factory::create();

function generate() {
    global $faker;
    $str = '';
    for ($i=0; $i<=$faker->numberBetween($min = 3, $max = 6); $i++) {
        $str .= $faker->randomDigit . ' ';
    }
    return $str;
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $arr = explode(" ", getData('arr'));
    $task1 = new App\Task1($arr);
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP_Andrukevich</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-3.1.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/ts.js"></script>
</head>
<body>

<header>
    <h2>Задание Андрукевич</h2>
</header>

<article>

    <section id="task1">

        1. Составление наибольшего числа.<br><br>
        Реализуйте функцию arrangeBiggestNumber, которая составляет самое большое число из переданного массива чисел и
        возвращает его строковое представление. Например из чисел [3, 24, 4] мы можем составить такие: 3244, 3424,
        2434, 2443, 4324, 4243 и самое больше из них это 4324.<br><br>
        Пример:
        998764543431 == arrangeBiggestNumber([1 34 3 98 9 76 45 4]);
        <hr>

        <div class="row">
            <div class="col-md-6 left-content">

                <form class="form-inline" method="get" action="<?= $_SERVER['REQUEST_URI'] ?>">
                    <h2>Сгенерировать последовательности</h2><br>
                    <button type="submit" class="btn btn-primary">Сгенерировать</button><br>
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                        $str_generate = generate();
                        echo " Ваша поcледовательность: " . $str_generate;
                        $arr = explode(" ", $str_generate);
                        $task1 = new App\Task1($arr);
                    } ?>
                </form>

                <?php if ($_SERVER['REQUEST_METHOD'] == 'GET' && strlen(max($task1->get_mas_check())) > 0) : ?>
                    <h2 class="result"><?= "РЕЗУЛЬТАТ: " . max($task1->get_mas_check()); ?></h2>
                <?php endif ?>


            </div>

            <div class="col-md-6 right-content">

                <form class="form-inline" method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
                    <h2>Формат ввода чисел через пробел</h2>
                    <input type="text" class="form-control" placeholder="Последовательность" name="arr">
                    <br>
                    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && strlen(max($task1->get_mas_check())) > 0) {
                        echo " Ваша поcледовательность: " . join($task1->get_array(), " ");
                    } ?>
                    <br>
                    <button type="submit" class="btn btn-primary">Найти наибольшее число</button>
                    <br>
                </form>

                <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && array_count_values($task1->get_mas_check()) > 0) : ?>
                    <h2 class="result"><?= "РЕЗУЛЬТАТ: " . max($task1->get_mas_check()); ?></h2>
                <?php endif ?>

            </div>
        </div>

    </section>

</article>

<footer>

</footer>

</body>
</html>
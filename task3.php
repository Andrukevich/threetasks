<?php

// подключает composer для автолоадеров
require_once "vendor/autoload.php";
// подключает функций
require_once "inc/functions.php";
// создает объект faker для заполнения случайными данными
$faker = Faker\Factory::create();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $task3 = new App\Task3(getData('arr'));
}

function generate() {
    global $faker;
    $str = '';
    for ($i=0; $i<=$faker->numberBetween($min = 10, $max = 20); $i++) {
        $str .= $faker->regexify('[a-zA-Z]');
    }
    return $str;
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

    <section id="task3">

        3. Самая длинная подстрока<br><br>
        Реализуйте функцию longestLength принимающую на вход строку и возвращающую длину максимальной
        последовательности из неповторяющихся символов. Подстрока может состоять из одного символа.
        Например в строке qweqrty, можно выделить следующие подстроки: qwe, weqrty. Самой длинной будет weqrty.
        <br><br>
        Пример:<br>
        longestLength('abcdeef'); // 5<br>
        longestLength('jabjcdel'); // 7
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
                        $task3 = new App\Task3($str_generate);
                    } ?>
                </form>

                <?php if ($_SERVER['REQUEST_METHOD'] == 'GET' && strlen($task3->get_long_str()) > 0) : ?>
                    <h2 class="result"><?= "РЕЗУЛЬТАТ: " . strlen($task3->get_long_str()). "->" . $task3->get_long_str(); ?></h2>
                <?php endif ?>

            </div>

            <div class="col-md-6 right-content">

                <form class="form-inline" method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
                    <h2 style="margin: 0; padding: 0;">Формат ввода согласно задания</h2>
                    <h3 style="margin: 0px 0px 15px 0px; padding: 0;">(строчные и прописные буквы анг. алфавита)</h3>
                    <input type="text" class="form-control" placeholder="Последовательность" name="arr">
                    <br>
                    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && strlen($task3->get_long_str()) > 0) {
                        echo " Ваша поcледовательность: " . $task3->get_primary_str();
                    } ?>
                    <br>
                    <button type="submit" class="btn btn-primary">Найти список диапозонов</button>
                    <br>
                </form>

                <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && strlen($task3->get_long_str()) > 0) : ?>
                    <h2 class="result"><?= "РЕЗУЛЬТАТ: " . strlen($task3->get_long_str()). "->" . $task3->get_long_str(); ?></h2>
                <?php endif ?>

            </div>
        </div>

    </section>

</article>

<footer>

</footer>

</body>
</html>
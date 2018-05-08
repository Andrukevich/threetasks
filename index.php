<?php

//вывод всех типов ошибок на страницу
error_reporting(E_ALL);
ini_set('display_errors', 'true');

// подключает composer для автолоадеров
require_once "vendor/autoload.php";

// подключает функций
require_once "inc/functions.php";

// создает объект faker для заполнения случайными данными
$faker = Faker\Factory::create();



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

    <section>
        <a href="task1.php" class="btn btn-primary btn-lg active" role="button" target="_blank">Заданние 1</a>
    </section>

    <section>
        <a href="task2.php" class="btn btn-primary btn-lg active" role="button" target="_blank">Заданние 2</a>
    </section>

    <section>
        <a href="task3.php" class="btn btn-primary btn-lg active" role="button" target="_blank">Заданние 3</a>
    </section>

</article>

<footer>

</footer>

</body>
</html>
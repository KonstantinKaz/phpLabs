<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="css/my_reset.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body class="body body__index">

    <?php require "blocks/header.php" ?>

    <main class="main__index">
        <h1 class="index__title">Список работ</h1>

        <div class="index__links">
            <a class="index__link" href="lab1.php">Лабораторная 1</a>
            <a class="index__link" href="lab2-1.php">Лабораторная 2</a>
            <a class="index__link" href="presintation/index.html">Презентация</a>
            <a class="index__link" href="lab4.php">Лабораторная 4</a>
            <a class="index__link" href="lab5.php">Лабораторная 5</a>
            <a class="index__link" href="lab6/index.php">Лабораторная 4</a>
        </div>
    </main>

    <footer class="footer">
        <?php require "blocks/footer.php" ?>
    </footer>

</body>

</html>
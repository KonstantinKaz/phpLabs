<?php

require_once 'connect.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">

</head>

<body class="main">


    <form class="form" action="vendor/create2.php" method="post">
        <legend>Введите свои данные</legend>
        <label class="width">Фамилия</label>
        <input class="width" type="text" name="surname">
        <label class="width">Имя</label>
        <input class="width" type="text" name="name">
        <label class="width">Отчество</label>
        <input class="width" type="text" name="lastname">
        <input class="width" type="radio" name="sex" value="male">Мужчина
        <input class="width" type="radio" name="sex" value="female">Женщина
        <label class="width">Дата Рождения</label>
        <input class="width" type="date" name="date">
        <label class="width">Телефон</label>
        <input class="width" type="tell" name="number">
        <label class="width">Адрес</label>
        <input class="width" type="text" name="address">
        <label class="width">E-mail</label>
        <input class="width" type="email" name="email">
        <label class="width">Комментарий</label>
        <textarea class="width" name="description" cols="30" rows="10"></textarea> <br>
        <button type="submit">Создать нового пользователя</button>
    </form>
</body>

</html>

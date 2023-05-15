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

    <?php
    // include "nav-bar2.php"
    ?>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Отчество</th>
            <th>Пол</th>
            <th>Дата Рождения</th>
            <th>Телефон</th>
            <th>Адрес</th>
            <th>E-mail</th>
            <th>Описание</th>
        </tr>

        <?php
        $allData = mysqli_query($connect, "SELECT * FROM userdata");
        $allData = mysqli_fetch_all($allData);
        foreach ($allData as $userdata) {
            ?>
            <tr>
                <td>
                    <?= $userdata[0] ?>
                </td>
                <td>
                    <?= $userdata[1] ?>
                </td>
                <td>
                    <?= $userdata[2] ?>
                </td>
                <td>
                    <?= $userdata[3] ?>
                </td>
                <td>
                    <?= $userdata[4] ?>
                </td>
                <td>
                    <?= $userdata[5] ?>
                </td>
                <td>
                    <?= $userdata[6] ?>
                </td>
                <td>
                    <?= $userdata[7] ?>
                </td>
                <td>
                    <?= $userdata[8] ?>
                </td>
                <td>
                    <?= $userdata[9] ?>
                </td>
                <td><a href="update.php?id=<?= $userdata[0] ?>">UpDate</a></td>
            </tr>
            <?php
        }
        ?>
    </table>
</body>

</html>
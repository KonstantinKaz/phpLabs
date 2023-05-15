<?php

    require_once 'connect.php';

    $user_id = $_GET['id'];
    $updateData = mysqli_query($connect, "SELECT * FROM `userdata` WHERE `id` = '$user_id'");
    $updateData = mysqli_fetch_assoc($updateData);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UpDate</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="main">

    <div>
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
                        <td><?= $userdata[0] ?></td>
                        <td><?= $userdata[1] ?></td>
                        <td><?= $userdata[2] ?></td>
                        <td><?= $userdata[3] ?></td>
                        <td><?= $userdata[4] ?></td>
                        <td><?= $userdata[5] ?></td>
                        <td><?= $userdata[6] ?></td>
                        <td><?= $userdata[7] ?></td>
                        <td><?= $userdata[8] ?></td>
                        <td><?= $userdata[9] ?></td>
                        <td><a href="update.php?id=<?= $userdata[0] ?>">UpDate</a></td>
                    </tr>

                <?php
            }

        ?>

        </table>


        <form class="form" action="vendor/update2.php" method="post">
            <input type="hidden" name="id" value="<?= $updateData['id'] ?>">
            <legend>Измените данные</legend>
            <label class="width">Фамилия</label>
            <input class="width" type="text" name="surname" value="<?= $updateData['surname'] ?>">
            <label class="width">Имя</label>
            <input class="width" type="text" name="name" value="<?= $updateData['name'] ?>">
            <label class="width">Отчество</label>
            <input class="width" type="text" name="lastname" value="<?= $updateData['lastname'] ?>">
            <input class="width" type="radio" name="sex" value="male" value="<?= $updateData['sex'] ?>"> Мужчина<br>
            <input class="width" type="radio" name="sex" value="female" value="<?= $updateData['sex'] ?>"> Женщина<br>
            <label class="width">Дата Рождения</label>
            <input class="width" type="date" name="date" value="<?= $updateData['date'] ?>">
            <label class="width">Телефон</label>
            <input class="width" type="tell" name="number" value="<?= $updateData['number'] ?>">
            <label class="width">Адрес</label>
            <input class="width" type="text" name="address" value="<?= $updateData['address'] ?>">
            <label class="width">E-mail</label>
            <input class="width" type="email" name="email" value="<?= $updateData['email'] ?>">
            <label class="width">Комментарий</label>
            <textarea class="width" name="description" cols="30" rows="10"><?= $updateData['description'] ?></textarea> <br>
            <button type="submit">Обновить</button>
        </form>
    </div>

    
</body>
</html>


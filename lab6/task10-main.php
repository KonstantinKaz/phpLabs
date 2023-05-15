<?php
  if (isset($_POST['submit'])) {
    setcookie('birthdate', $_POST['birthdate'], time() + 60 * 60 * 24 * 30);
    header("Location: task10-module.php");
  }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>День рождения</title>
</head>
<body>
    <h1>Введите вашу дату рождения</h1>
    <form action="task10-main.php" method="post">
        <input type="date" name="birthdate" required>
        <input type="submit" name="submit" value="Отправить">
    </form>
</body>
</html>
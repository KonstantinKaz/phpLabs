<?php
session_start(); // Запускаем сессию

$_SESSION['text'] = 'Текст Сессии'; // Записываем значение в сессию
?>

<!DOCTYPE html>
<html>
<head>
	<title>Страница 1</title>
</head>
<body>
	<h1>Страница 1</h1>
	<p>Значение записано в сессию.</p>
	<a href="tast2-2.php">Перейти на страницу 2</a>
</body>
</html>

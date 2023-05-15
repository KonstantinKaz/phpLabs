<?php
session_start(); // Запускаем сессию

$_SESSION['text'] = 'test'; // Записываем значение в сессию
?>

<!DOCTYPE html>
<html>
<head>
	<title>Сессии в PHP</title>
</head>
<body>
	<h1>Сессии в PHP</h1>
	<p>Содержимое сессии: <?php echo $_SESSION['text']; ?></p>
</body>
</html>
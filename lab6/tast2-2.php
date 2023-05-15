<?php
session_start(); // Запускаем сессию

$text = isset($_SESSION['text']) ? $_SESSION['text'] : 'Значение не найдено'; // Получаем значение из сессии или устанавливаем значение по умолчанию

?>

<!DOCTYPE html>
<html>
<head>
	<title>Страница 2</title>
</head>
<body>
	<h1>Страница 2</h1>
	<p>Значение из сессии: <?php echo $text; ?></p>
</body>
</html>

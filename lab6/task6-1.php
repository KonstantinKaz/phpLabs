<?php
session_start(); // Запускаем сессию

if (isset($_POST['email'])) {
	$_SESSION['email'] = $_POST['email'];
	header('Location: task6-2.php'); // Переходим на другую страницу
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Форма для ввода email</title>
</head>
<body>
	<h1>Введите ваш email</h1>
	<form method="post">
		<label>Ваш email:</label>
		<input type="email" name="email">
		<button type="submit">Отправить</button>
	</form>
</body>
</html>

<?php
session_start(); // Запускаем сессию

if (isset($_POST['country'])) {
	$_SESSION['country'] = $_POST['country'];
	header('Location: task4-test.php');
	exit;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Запись страны в сессию</title>
</head>
<body>
	<h1>Запись страны в сессию</h1>
	<form method="post">
		<label for="country">Страна:</label>
		<input type="text" name="country" id="country">
		<input type="submit" value="Отправить">
	</form>
</body>
</html>

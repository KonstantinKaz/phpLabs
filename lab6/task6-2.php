<?php
session_start(); // Запускаем сессию

$email = isset($_SESSION['email']) ? $_SESSION['email'] : ''; // Получаем email из сессии, если он есть

// Обрабатываем отправку формы
if (isset($_POST['submit'])) {
	// Обработка формы
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Форма с автозаполнением email</title>
</head>
<body>
	<h1>Введите данные</h1>
	<form method="post">
		<label>Имя:</label>
		<input type="text" name="name"><br>
		<label>Фамилия:</label>
		<input type="text" name="surname"><br>
		<label>Пароль:</label>
		<input type="password" name="password"><br>
		<label>Email:</label>
		<input type="email" name="email" value="<?php echo $email; ?>"><br> <!-- Автозаполнение поля email -->
		<button type="submit" name="submit">Отправить</button>
	</form>
</body>
</html>

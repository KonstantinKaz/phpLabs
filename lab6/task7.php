<?php
setcookie('test', '123');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Куки</title>
</head>
<body>
	<h1>Куки</h1>
	<p>Значение куки "test": <?php echo empty($_COOKIE['test']) ? 'Нет куки, обновите страницу' : $_COOKIE['test']; ?></p>
    <a href="task8.php">Удалить куки</a>
</body>
</html>

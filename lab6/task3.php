<?php
session_start();

if (!isset($_SESSION['count'])) {
	$_SESSION['count'] = 0;
	echo 'Вы еще не обновляли страницу';
} else {
	$_SESSION['count']++;
}

$count = $_SESSION['count'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Счетчик обновлений страницы</title>
</head>
<body>
	<h1>Счетчик обновлений страницы</h1>
	<p>Количество обновлений: <?php echo $count; ?></p>
	<p><a href="<?php echo $_SERVER['PHP_SELF']; ?>">Обновить страницу</a></p>
</body>
</html>

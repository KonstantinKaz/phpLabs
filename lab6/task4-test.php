<?php
session_start();

if (!isset($_SESSION['country'])) {
	header('Location: index.php');
	exit;
}

$country = $_SESSION['country'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Страна пользователя</title>
</head>
<body>
	<h1>Страна пользователя</h1>
	<p>Ваша страна: <?php echo $country; ?></p>
</body>
</html>

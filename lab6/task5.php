<?php
session_start();

if (!isset($_SESSION['timestamp'])) {
	$_SESSION['timestamp'] = time();
}

$seconds_ago = time() - $_SESSION['timestamp'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Время захода на сайт</title>
</head>
<body>
	<h1>Время захода на сайт</h1>
	<p>Вы зашли на сайт <?php echo $seconds_ago; ?> секунд назад.</p>
</body>
</html>

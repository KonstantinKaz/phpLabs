<?php 
setcookie('test', '', time() - 3600);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Куки</title>
</head>
<body>
	<?php 
    echo isset($_COOKIE['test']) ? 'Куки удален' : 'Ошибка удаления, куки не найден';
    ?>
</body>
</html>

<?php
  if (!isset($_COOKIE['birthdate'])) {
    header("Location: task10-main.php");
    exit();
  }

  $birthdate = strtotime($_COOKIE['birthdate']);
  $now = time();
  $currentYearBD = strtotime(date("Y") . "-" . date("m", $birthdate) . "-" . date("d", $birthdate));

  if ($currentYearBD < $now) {
    $nextBD = strtotime("+1 year", $currentYearBD);
  } else {
    $nextBD = $currentYearBD;
  }

  $daysLeft = ceil(($nextBD - $now) / 86400);

  if ($daysLeft == 0) {
      $message = "С днем рождения!";
  } else {
      $message = "До вашего дня рождения осталось $daysLeft дней";
  }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>До дня рождения</title>
</head>
<body>
    <h1><?= $message ?></h1>
    <p><a href="task10-main.php">Ввести другую дату рождения</a></p>
</body>
</html>
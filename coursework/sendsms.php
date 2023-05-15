<form method="post">
  <label for="channel">Канал отправки:</label>
  <input type="text" id="channel" name="channel">
  <label for="message">Сообщение:</label>
  <textarea id="message" name="message"></textarea>
  <input type="submit" value="Отправить">
</form>
<?php
// начинаем сессию
session_start();

// проверяем, авторизован ли пользователь
if (!isset($_SESSION['user_id'])) {
  // если пользователь не авторизован, перенаправляем на страницу авторизации
  header('Location: ?menu=signin');
  exit;
}
if (isset($_POST['channel']) && isset($_POST['message'])) {

// получаем данные из формы
$channel = $_POST['channel'];
$message = $_POST['message'];

// соединяемся с базой данных
include 'connect.php';

// проверяем, существует ли канал отправки
$channel_id = 0;
$result = $conn->query("SELECT id FROM channel WHERE name='$channel'");
if ($result->num_rows > 0) {
  // канал существует, получаем его ID
  $row = $result->fetch_assoc();
  $channel_id = $row['id'];
} else {
  // канала нет, добавляем его в таблицу Channel
  $stmt = $conn->prepare("INSERT INTO channel (name) VALUES (?)");
  $stmt->bind_param("s", $channel);
  $stmt->execute();
  $channel_id = $conn->insert_id;
  $stmt->close();
}

// добавляем сообщение в таблицу SMS
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("INSERT INTO sms (user_id, channel_id, message) VALUES (?, ?, ?)");
$stmt->bind_param("iis", $user_id, $channel_id, $message);
$stmt->execute();
$sms_id = $conn->insert_id;
$stmt->close();

// ищем хэштеги в сообщении и добавляем их в таблицу #
preg_match_all("/#([\p{Cyrillic}\w]+)/u", $message, $matches);
foreach ($matches[1] as $tag) {
  $stmt = $conn->prepare("INSERT INTO hashtag (name, sms_id) VALUES (?, ?)");
  $stmt->bind_param("si", $tag, $sms_id);
  $stmt->execute();
  $stmt->close();
}
$conn->close();
}
?>
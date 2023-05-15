<?php
// начинаем сессию
session_start();

// уничтожаем сессию
session_destroy();

// перенаправляем пользователя на страницу входа
header("Location: ./?menu=signin");
exit;
?>
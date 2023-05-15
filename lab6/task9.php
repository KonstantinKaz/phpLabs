<?php
$cookie_name = "visit_counter";
$cookie_value = 1;
$expire_time = time() + (86400 * 30); 

if(isset($_COOKIE[$cookie_name])) {
  $cookie_value = $_COOKIE[$cookie_name] + 1;
}

setcookie($cookie_name, $cookie_value, $expire_time, "/");

echo "Вы посетили наш сайт " . $cookie_value . " раз!";
?>

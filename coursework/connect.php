<?php
$servername = "std-mysql";
$username = "std_2157_course";
$password = "123123123";
$dbname = "std_2157_course";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  echo die("Connection failed: " . $conn->connect_error);
}
?>
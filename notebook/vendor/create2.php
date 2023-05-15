<?php
require_once '../connect.php';

$surname = $_POST['surname'];
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$sex = $_POST['sex'];
$date = $_POST['date'];
$number = $_POST['number'];
$address = $_POST['address'];
$email = $_POST['email'];
$description = $_POST['description'];

mysqli_query($connect, "INSERT INTO `userdata` (`id`, `surname`, `name`, `lastname`, `sex`, `date`, `number`, `address`, `email`, `description`) VALUES (Null , '$surname', '$name', '$lastname', '$sex', '$date', '$number', '$address', '$email', '$description')");

header('Location: ../notebook.php');
?>
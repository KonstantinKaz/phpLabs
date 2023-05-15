<?php

require_once '../connect.php';

$id = $_POST['id'];
$surname = $_POST['surname'];
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$sex = $_POST['sex'];
$date = $_POST['date'];
$number = $_POST['number'];
$address = $_POST['address'];
$email = $_POST['email'];
$description = $_POST['description'];

mysqli_query($connect, "UPDATE `userdata` SET `surname` = '$surname', `name` = '$name', `lastname` = '$lastname', `sex` = '$sex', `date` = '$date', `number` = '$number', `address` = '$address', `email` = '$email', `description` = '$description' WHERE `userdata`.`id` = '$id'");

header('Location: ../notebook.php');
?>
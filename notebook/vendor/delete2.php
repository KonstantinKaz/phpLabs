<?php

require_once '../connect.php';

$id = $_GET['id'];

mysqli_query($connect, "DELETE FROM `userdata` WHERE `userdata`.`id` = '$id'");

header('Location: ../notebook.php');
?>

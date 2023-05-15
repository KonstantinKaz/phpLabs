<?php
$servername = "std-mysql";
$username = "std_2157_phplab6";
$password = "123123123";
$dbname = "std_2157_phplab6";

$connect = mysqli_connect($servername, $username, $password, $dbname);
if (!$connect) {
    die('Error connect to database!');
}


// $connect = mysqli_connect(host: 'localhost', user: 'root', password: '', database:'crud');

// if (!$connect) {
//     die('Error connect to database!');
// }

?>
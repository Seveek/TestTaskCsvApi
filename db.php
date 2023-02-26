<?php
$servername = 'localhost';
$username = 'root';
$password = 'mysql';
$dbname = "test";
$conn = mysqli_connect($servername, $username, $password, "$dbname");
if (!$conn) {
    die('Невозможно подключиться к БД');
}

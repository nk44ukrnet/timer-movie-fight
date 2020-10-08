<?php
/*
$sql = mysqli_connect("localhost", "u_ticket", "DfrWcaZk", "ticket");

if (!$sql) {
    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Соединение с MySQL установлено!" . PHP_EOL;
echo "Информация о сервере: " . mysqli_get_host_info($sql) . PHP_EOL;

*/
session_start();
// connect to database
//old name $conn
$conn = mysqli_connect("localhost", "root", "", "tickets");
//$conn = new PDO($DSN,'root','');

if (!$conn) {
    die("Error connecting to database: " . mysqli_connect_error());
}
//echo 'Connected to database MySQL.'; // . PHP_EOL;
//echo "Server info: "; // . mysqli_get_host_info($sql) . mysqli_get_host_info($conn) . PHP_EOL;
// define global constants
//define ('ROOT_PATH', realpath(dirname(__FILE__)));
//define('BASE_URL', 'http://robotica.ua/ticket/');
?>



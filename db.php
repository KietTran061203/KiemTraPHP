<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'Test1';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>

<?php
require 'db.php';

$MaSV = $_GET['MaSV'];

$stmt = $conn->prepare("DELETE FROM SinhVien WHERE MaSV = ?");
$stmt->execute([$MaSV]);

header('Location: index.php');
exit;
?>

<?php
$servername = "localhost";
$username = "MinhDwc";
$password = "Duc123";
$dbname = "shoesstore";
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connect successfully";
} catch (PDOException $e) {
    echo "Lỗi kết nối đến CSDL: " . $e->getMessage();
}

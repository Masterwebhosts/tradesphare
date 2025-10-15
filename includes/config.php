<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'tradesphare_db';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'Database connection failed: ' . $e->getMessage();
}
?>

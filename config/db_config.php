<?php
$host = '127.0.0.1';
$username = 'root';
$password = '';
$dbname = 'db_ems';

try {
    $conn = new mysqli($host, $username, $password, $dbname);
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }
} catch (Exception $e) {
    echo 'Database connection error: ' . $e->getMessage();
    header('Location: db/setup.php');
    exit();
}
?>
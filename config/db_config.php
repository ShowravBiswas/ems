<?php
$host = '127.0.0.1';
$username = 'root';
$password = '';
$dbname = 'db_ems';

try {
    $conn = new mysqli($host, $username, $password, $dbname);
    if ($conn->connect_error) {
        $_SESSION['flash_message'] = ['message' => 'Something went wrong. Please try again!', 'type' => 'danger'];
    }
} catch (Exception $e) {
    header('Location: db/setup.php');
        $_SESSION['flash_message'] = ['message' => 'Something went wrong. Please try again!', 'type' => 'danger'];
}
?>
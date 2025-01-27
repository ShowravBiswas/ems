<?php
// Database connection details
$host = '127.0.0.1'; // Or your database host
$username = 'root'; // Database username
$password = ''; // Database password (leave empty if none)
$dbname = 'db_ems'; // Replace with your database name

// Connect to the MySQL database
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Path to your SQL file
$sqlFile = __DIR__ . '/create_users_table.sql'; // Replace with actual file path

echo $sqlFile;

// Read the SQL file
$sql = file_get_contents($sqlFile);

// Execute the SQL commands
if ($conn->multi_query($sql)) {
    echo "Users table created successfully.";
} else {
    echo "Error executing SQL: " . $conn->error;
}

// Close the connection
$conn->close();
?>

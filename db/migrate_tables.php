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

// Array of SQL files you want to execute
$sqlFiles = [
    __DIR__ . '/create_users_table.sql', // Replace with actual file paths
    __DIR__ . '/create_events_table.sql', // Another example
    __DIR__ . '/create_event_attendees_table.sql', // Another example
];

// Function to check if a table exists
function tableExists($conn, $tableName) {
    $result = $conn->query("SHOW TABLES LIKE '$tableName'");
    return $result->num_rows > 0;
}

// Loop through the SQL files and execute them
foreach ($sqlFiles as $sqlFile) {
    if (file_exists($sqlFile)) {
        // Read the SQL file
        $sql = file_get_contents($sqlFile);

        // Get the table name from the SQL file (assuming each file creates one table)
        preg_match('/CREATE TABLE `?(\w+)`?/i', $sql, $matches);
        if (isset($matches[1])) {
            $tableName = $matches[1];

            // Check if the table already exists
            if (tableExists($conn, $tableName)) {
                echo "Table '$tableName' already exists. Skipping the migration for this file: $sqlFile.<br>";
                continue; // Skip to the next file
            }
        }

        // Execute the SQL commands
        if ($conn->multi_query($sql)) {
            echo "Executed SQL from: $sqlFile successfully.<br>";
        } else {
            echo "Error executing SQL from $sqlFile: " . $conn->error . "<br>";
        }
    } else {
        echo "SQL file not found: $sqlFile<br>";
    }
}

// Close the connection
$conn->close();
?>
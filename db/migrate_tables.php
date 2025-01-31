<?php
include_once('config/db_config.php');

// Array of SQL files you want to execute
$sqlFiles = [
    __DIR__ . '/create_users_table.sql', // Replace with actual file paths
    __DIR__ . '/create_events_table.sql', // Another example
    __DIR__ . '/create_event_attendees_table.sql', // Another example
];

// Function to check if a table exists
function tableExists($conn, $tableName) {
    $result = $conn->query("SHOW TABLES LIKE '$tableName'");
    $_SESSION['flash_message'] = ['message' => $tableName .'table already exist', 'type' => 'error'];
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
                $_SESSION['flash_message'] = ['message' => $tableName .' table already exist', 'type' => 'error'];
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

$sqlFile = __DIR__ . '\db_backup.sql'; // Adjust the path if necessary

// Function to execute an SQL file
function importSqlFile($conn, $sqlFile) {
    if (file_exists($sqlFile)) {
        $sql = file_get_contents($sqlFile);

        if ($conn->multi_query($sql)) {
            do {
                $conn->next_result(); // Move to the next query result
            } while ($conn->more_results());
        } else {
            die("Error executing SQL file: " . $conn->error);
        }
    } else {
        die("SQL file not found: $sqlFile");
    }
}

// Import the database from the SQL file
importSqlFile($conn, $sqlFile);

// Close the connection
$conn->close();
?>
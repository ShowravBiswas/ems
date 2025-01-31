<?php
session_start();
include '../helper/helpers.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db_host = "127.0.0.1"; // Host (can be changed to user input if needed)
    $db_name = $_POST["db_name"];
    $db_user = $_POST["db_user"];
    $db_pass = $_POST["db_pass"];

    try {
        // Test Database Connection
        $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

        // Check if connection failed
        if ($conn->connect_error) {
            echo "s";
            throw new Exception("Connection failed: " . $conn->connect_error);
        }

        // Save DB Credentials in config.php
        $config_content = "<?php\n";
        $config_content .= "\$host = '$db_host';\n";
        $config_content .= "\$username = '$db_user';\n";
        $config_content .= "\$password = '$db_pass';\n";
        $config_content .= "\$dbname = '$db_name';\n";
        $config_content .= "\n";
        $config_content .= "try {\n";
        $config_content .= "    \$conn = new mysqli(\$host, \$username, \$password, \$dbname);\n";
        $config_content .= "    if (\$conn->connect_error) {\n";
        $config_content .= "        \$_SESSION['flash_message'] = ['message' => 'Something went wrong. Please try again!', 'type' => 'danger'];\n";
        $config_content .= "    }\n";
        $config_content .= "} catch (Exception \$e) {\n";
        $config_content .= "    header('Location: db/setup.php');\n";
        $config_content .= "        \$_SESSION['flash_message'] = ['message' => 'Something went wrong. Please try again!', 'type' => 'danger'];\n";
        $config_content .= "}\n";
        $config_content .= "?>";

        file_put_contents("../config/db_config.php", $config_content);

        // Redirect to a new page after successful setup (optional)
        require_once('migrate_tables.php');
        // After migration, seed a user (e.g., admin user)
        $_SESSION['flash_message'] = ['message' => 'Database setup successful! Tables and seed data have been added.', 'type' => 'success'];
        header("Location: ../index.php");
        //exit;
    } catch (Exception $e) {
        $_SESSION['flash_message'] = ['message' => 'Something went wrong.Please try again!', 'type' => 'danger'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Setup</title>
    <!-- Add Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="col-md-6 col-lg-4 p-4 bg-white rounded shadow-sm">
        <h2 class="text-center mb-4">Database Setup</h2>
        <form method="post">
            <div class="mb-3">
                <label for="db_name" class="form-label">Database Name</label>
                <input type="text" name="db_name" class="form-control" id="db_name" required>
            </div>
            <div class="mb-3">
                <label for="db_user" class="form-label">Database User</label>
                <input type="text" name="db_user" class="form-control" id="db_user" required>
            </div>
            <div class="mb-3">
                <label for="db_pass" class="form-label">Database Password</label>
                <input type="password" name="db_pass" class="form-control" id="db_pass">
            </div>
            <button type="submit" class="btn btn-primary w-100">Setup Database</button>
        </form>
    </div>
</div>

<!-- Add Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<?php
flash_message_handler();
?>
</body>
</html>


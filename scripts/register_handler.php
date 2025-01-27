<?php
session_start(); // Start the session to enable flash messages
include 'helper/helpers.php';

require_once('config/db_config.php'); // database connection logic

// Initialize variables and error array
$errors = [];
$name = $email = $phone_no = $password = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate input data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone_no = htmlspecialchars(trim($_POST['phone_no']));
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirmPassword']);

    // Basic input validation
    if (empty($name)) $errors['name'] = 'Name is required.';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors['email'] = 'Invalid email format.';
    if (empty($phone_no) || !preg_match('/^[0-9]{11}$/', $phone_no)) $errors['phone_no'] = 'Invalid phone number. Must be 11 digits.';
    if (empty($password)) $errors['password'] = 'Password is required.';
    if ($password !== $confirmPassword) $errors['confirmPassword'] = 'Passwords do not match.';

    // If no errors, proceed with database operations
    if (empty($errors)) {
        // Check if the email already exists
        $stmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // Email already exists
            $errors['email'] = 'The email address is already registered.';
            $stmt->close(); // Close the email check query
        } else {

            // Check if the phone number already exists
            $stmt = $conn->prepare("SELECT phone_no FROM users WHERE phone_no = ?");
            $stmt->bind_param("s", $phone_no);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                // Phone number already exists
                $errors['phone_no'] = 'The phone number is already registered.';
            } else {
                // Hash the password
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

                // Prepare SQL query
                $stmt = $conn->prepare("INSERT INTO users (name, email, phone_no, password, is_approved, created_at) VALUES (?, ?, ?, ?, ?, NOW())");
                $stmt->bind_param("ssssi", $name, $email, $phone_no, $hashedPassword, $is_approved);

                // Set default values
                $is_approved = 0; // Not approved by default

                // Execute the query and check for success
                if ($stmt->execute()) {
                    // Set a flash message for successful registration
                    $_SESSION['flash_message'] = ['message' => 'User created successfully!', 'type' => 'success'];
                    header('Location: login.php');
                    exit();
                } else {
                    $_SESSION['flash_message'] = ['message' => 'Error occurred while registering the user.', 'type' => 'danger'];
                    $errors['database'] = 'Failed to register. Please try again.';
                }
            }
            // Close the statement
            $stmt->close();
        }
    }

    // Close the database connection
    $conn->close();
}
?>
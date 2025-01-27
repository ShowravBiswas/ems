<?php
require_once('config/db_config.php'); // Database connection logic

// Initialize variables and error array
$errors = [];
$email = $password = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate input data
    $email = htmlspecialchars(trim($_POST['email']));
    $password = trim($_POST['password']);

    // Input validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email format.';
    }
    if (empty($password)) {
        $errors['password'] = 'Password is required.';
    }

    // If no errors, proceed with database operations
    if (empty($errors)) {
        // Prepare a SQL statement to fetch the user by email
        $stmt = $conn->prepare("SELECT id, name, email, password, phone_no, is_approved FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        // Check if a user with the provided email exists
        if ($stmt->num_rows === 1) {
            // Bind all 6 variables
            $stmt->bind_result($userId, $userName, $userEmail, $hashedPassword, $phoneNo, $isApproved);
            $stmt->fetch();

            // Verify the password
            if (password_verify($password, $hashedPassword)) {
                // Check if the user is approved
                if ($isApproved == 1) {
                    // Set session variables for logged-in user
                    session_start();
                    $_SESSION['user'] = [
                        'id' => $userId,
                        'name' => $userName,
                        'email' => $userEmail,
                        'phone_no' => $phoneNo, // Optional
                    ];

                    // Redirect to the dashboard
                    header('Location: dashboard.php');
                    exit();
                } else {
                    $errors['general'] = 'Your account is not approved yet. Please contact with admin';
                }
            } else {
                $errors['password'] = 'Invalid password. Please try again.';
            }
        } else {
            $errors['email'] = 'No account found with that email address.';
        }

        // Close the statement
        $stmt->close();
    }

    // Close the database connection
    $conn->close();
}
?>
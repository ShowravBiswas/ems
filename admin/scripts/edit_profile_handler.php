<?php
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phoneNo = $_POST['phone_no'];
    $isApproved = $_POST['is_approved'];
    $userid = $_GET['uid'];

    // Check if the email is unique (excluding the current user)
    $email_check = mysqli_query($conn, "SELECT id FROM users WHERE email='$email' AND id != '$userid'");
    if (mysqli_num_rows($email_check) > 0) {
        echo "<script>alert('Email is already taken by another user.');</script>";
    } else {
        // Check if the phone number is unique (excluding the current user)
        $phone_check = mysqli_query($conn, "SELECT id FROM users WHERE phone_no='$phoneNo' AND id != '$userid'");
        if (mysqli_num_rows($phone_check) > 0) {
            echo "<script>alert('Phone number is already taken by another user.');</script>";
        } else {
            // Update the user profile
            $msg = mysqli_query($conn, "UPDATE users SET name='$name', email='$email', phone_no='$phoneNo', is_approved='$isApproved'
             WHERE id='$userid'");

            if ($msg) {
                echo "<script>alert('Profile updated successfully');</script>";
                echo "<script type='text/javascript'> document.location = 'manage-users.php'; </script>";
            } else {
                echo "<script>alert('Error updating profile.');</script>";
            }
        }
    }
}
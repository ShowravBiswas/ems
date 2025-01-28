<?php
if (isset($_POST['create_event'])) {
    // Retrieve POST data
    $name = $_POST['name'];
    $eventDateTime = $_POST['event_datetime'];
    $maxCapacity = $_POST['max_capacity'];
    $createdBy = $_SESSION['user']['id'];
    $venue = $_POST['venue'];
    $description = $_POST['description'];

    // Validate that all fields are provided
    if (empty($name) || empty($eventDateTime) || empty($maxCapacity) || empty($venue) || empty($description)) {
        echo "<script>alert('All fields are required!');</script>";
    } else {
        // Optionally validate max capacity to be a number
        if (!is_numeric($maxCapacity) || $maxCapacity <= 0) {
            echo "<script>alert('Max capacity should be a positive number!');</script>";
        } else {
            // Insert the event into the database
            $insert_query = "INSERT INTO events (name, description, event_datetime, max_capacity, created_by, venue) 
                             VALUES ('$name', '$description', '$eventDateTime', '$maxCapacity', '$createdBy', '$venue')";
            $msg = mysqli_query($conn, $insert_query);

            if ($msg) {
                echo "<script>alert('Event created successfully!');</script>";
                echo "<script type='text/javascript'> document.location = 'manage-events.php'; </script>";
            } else {
                echo "<script>alert('Error creating event.');</script>";
            }
        }
    }
}

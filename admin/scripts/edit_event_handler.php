<?php
if (isset($_POST['update'])) {
    $eventId = $_GET['id'];
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $dateTime = trim($_POST['event_datetime']);
    $maxCapacity = trim($_POST['max_capacity']);
    $venue = trim($_POST['venue']);
    $createdBy = $_SESSION['user']['id'];

    // Validation: Ensure no empty fields
    if (empty($name) || empty($description) || empty($dateTime) || empty($maxCapacity) || empty($venue)) {
        echo "<script>alert('All fields are required!');</script>";
    } elseif (!is_numeric($maxCapacity) || $maxCapacity <= 0) {
        echo "<script>alert('Max capacity should be a positive number!');</script>";
    } else {
        // Prepare SQL statement to update event details
        $stmt = $conn->prepare("UPDATE events SET name = ?, description = ?, event_datetime = ?, max_capacity = ?, venue = ? WHERE id = ?");
        $stmt->bind_param("sssisi", $name, $description, $dateTime, $maxCapacity, $venue, $eventId);

        if ($stmt->execute()) {
            echo "<script>alert('Event updated successfully!');</script>";
            echo "<script type='text/javascript'> document.location = 'manage-events.php'; </script>";
        } else {
            echo "<script>alert('Error updating event.');</script>";
        }

        $stmt->close();
    }

    $conn->close();
}

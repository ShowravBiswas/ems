<?php
include_once('../config/db_config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $event_id = intval($_POST['event_id']);
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone_no']);
    $address = trim($_POST['address']);

    // Prepare to get max capacity and registered attendees count
    $stmt = $conn->prepare("SELECT max_capacity, (SELECT COUNT(*) FROM event_attendees WHERE event_id = ?) as registered 
                            FROM events WHERE id = ?");
    $stmt->bind_param("ii", $event_id, $event_id);
    if (!$stmt->execute()) {
        echo json_encode(["status" => "error", "message" => "Database query failed."]);
        exit();
    }

    $result = $stmt->get_result();
    $event = $result->fetch_assoc();
    $stmt->close();

    // Check if the event is full
    if ($event['registered'] < $event['max_capacity']) {
        // Check if the attendee with this phone number or email is already registered for the event
        $stmt = $conn->prepare("SELECT 1 FROM event_attendees WHERE event_id = ? AND (phone_no = ? OR email = ?)");
        $stmt->bind_param("iss", $event_id, $phone, $email);
        if (!$stmt->execute()) {
            echo json_encode(["status" => "error", "message" => "Database query failed."]);
            exit();
        }

        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            // If there's already a registration with the same phone number or email for the event
            echo json_encode(["status" => "duplicate", "message" => "This phone number or email is already registered for this event."]);
        } else {
            // Insert the new attendee record
            $stmt = $conn->prepare("INSERT INTO event_attendees (event_id, name, email, phone_no, address) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("issss", $event_id, $name, $email, $phone, $address);
            if ($stmt->execute()) {
                echo json_encode(["status" => "success", "message" => "Registration successful!"]);
            } else {
                // Handle specific error codes for duplicate entry
                if (mysqli_errno($conn) == 1062) {
                    echo json_encode(["status" => "duplicate", "message" => "Duplicate entry for this phone number or email."]);
                } else {
                    echo json_encode(["status" => "error", "message" => "Registration failed due to a database error."]);
                }
            }
            $stmt->close();
        }
    } else {
        echo json_encode(["status" => "full", "message" => "Sorry, this event is fully booked."]);
    }
}
?>
<?php
include_once('../config/db_config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $event_id = intval($_POST['event_id']);
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone_no']);
    $address = trim($_POST['address']);

    $stmt = $conn->prepare("SELECT max_capacity, (SELECT COUNT(*) FROM event_attendees WHERE event_id = ?) as registered 
                            FROM events WHERE id = ?");
    $stmt->bind_param("ii", $event_id, $event_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $event = $result->fetch_assoc();
    $stmt->close();

    if ($event['registered'] < $event['max_capacity']) {
        $stmt = $conn->prepare("INSERT INTO event_attendees (event_id, name, email, phone_no, address) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("issss", $event_id, $name, $email, $phone, $address);
        $stmt->execute();
        $stmt->close();

        echo json_encode(["status" => "success", "message" => "Registration successful!"]);
    } else {
        echo json_encode(["status" => "full", "message" => "Sorry, this event is fully booked."]);
    }
}
?>

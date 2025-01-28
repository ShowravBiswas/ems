<?php
include_once('../config/db_config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['event_id'])) {
    $event_id = intval($_POST['event_id']);

    $stmt = $conn->prepare("SELECT name, description, event_datetime, venue, max_capacity, 
                                   (SELECT COUNT(*) FROM event_attendees WHERE event_id = events.id) as registered 
                            FROM events WHERE id = ?");
    $stmt->bind_param("i", $event_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $event = $result->fetch_assoc();
    $stmt->close();

    if ($event && $event['registered'] < $event['max_capacity']) {
        echo json_encode([
            "status" => "available",
            "event_name" => $event['name'],
            "description" => $event['description'],
            "event_date" => date("F j, Y, g:i A", strtotime($event['event_datetime'])),
            "venue" => $event['venue']
        ]);
    } else {
        echo json_encode(["status" => "full"]);
    }
}
?>

<?php
include_once('../../config/db_config.php');

if (isset($_GET['event_id']) && is_numeric($_GET['event_id'])) {
    $event_id = intval($_GET['event_id']);

    // Fetch event details
    $event_query = mysqli_query($conn, "SELECT name FROM events WHERE id = $event_id");
    $event = mysqli_fetch_assoc($event_query);
    if (!$event) {
        die("Invalid event ID.");
    }

    // Fetch attendees for this event
    $query = "SELECT name, email, phone_no, address FROM event_attendees WHERE event_id = $event_id";
    $result = mysqli_query($conn, $query);

    // Set CSV headers
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="event_attendees_' . strtolower(str_replace(' ', '_', $event['name'])) . '.csv"');

    // Open output stream
    $output = fopen('php://output', 'w');

    // Add CSV column headers
    fputcsv($output, ['Name', 'Email', 'Phone Number', 'Address']);

    // Add data rows
    while ($row = mysqli_fetch_assoc($result)) {
        fputcsv($output, $row);
    }

    // Close file pointer
    fclose($output);
    exit;
}

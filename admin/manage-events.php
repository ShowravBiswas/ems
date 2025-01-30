<?php
session_start();
$title = "Event List";
include_once('../config/db_config.php');
include_once('../helper/helpers.php');
if (!isset($_SESSION['user'])) {
    header('location:logout.php');
} else {
// For deleting user
if (isset($_GET['id'])) {
    $eventId = $_GET['id'];
    $msg = mysqli_query($conn, "DELETE FROM events WHERE id='$eventId'");
    if ($msg) {
        echo "<script>alert('Data deleted');</script>";
    }
}
?>

<?php include_once('includes/header.php'); ?>
<?php include_once('includes/navbar.php'); ?>
<div id="layoutSidenav">
    <?php include_once('includes/sidebar.php'); ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Manage events</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Manage events</li>
                </ol>

                <!-- Create Event Button -->
                <a href="create-event.php" class="btn btn-primary mb-4">
                    <i class="fas fa-plus"></i> Create Event
                </a>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Event Details
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                            <tr>
                                <th>Sl.</th>
                                <th>Title</th>
                                <th>Date & Time</th>
                                <th>Max Capacity</th>
                                <th>Registered Attendee</th>
                                <th>Venue</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Sl.</th>
                                <th>Title</th>
                                <th>Date & Time</th>
                                <th>Max Capacity</th>
                                <th>Registered Attendee</th>
                                <th>Venue</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php
                            $query = "SELECT e.*, 
                 COALESCE(COUNT(a.id), 0) AS total_attendees 
          FROM events e
          LEFT JOIN event_attendees a ON e.id = a.event_id
          GROUP BY e.id
          ORDER BY e.event_datetime ASC";
                            $cnt = 1;
                            $ret = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($ret)) { ?>
                                <tr>
                                    <td><?php echo $cnt; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo formatEventDateTime($row['event_datetime']); ?></td>
                                    <td class="text-center"><?php echo $row['max_capacity']; ?></td>
                                    <td class="text-center">
                                        <span class="badge rounded-pill <?php echo ($row['total_attendees'] >= $row['max_capacity']) ? 'bg-danger' : 'bg-primary'; ?>">
                                        <?php echo $row['total_attendees']; ?></span> |
                                        <a href="scripts/download_attendee_csv_report.php?event_id=<?php echo $row['id']; ?>" class="btn btn-sm btn-success">Download CSV</a>
                                    </td>
                                    <td><?php echo $row['venue']; ?></td>
                                    <td>
                                        <a href="event-detail.php?id=<?php echo $row['id'];?>">
                                            <i class="fas fa-edit"></i></a>
                                        <a href="manage-events.php?id=<?php echo $row['id'];?>" onClick="return confirm('Do you really want to delete');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                                <?php $cnt = $cnt + 1; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        <?php include('includes/footer.php'); ?>
        <?php } ?>

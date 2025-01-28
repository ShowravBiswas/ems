<?php
session_start();
$title = "Create Event";
include_once('../config/db_config.php');

if (!isset($_SESSION['user'])) {
    header('location:logout.php');
} else {
?>

<?php
include_once('scripts/create_event_handler.php');
include_once('includes/header.php');
include_once('includes/navbar.php');
?>
<div id="layoutSidenav">
    <?php include_once('includes/sidebar.php'); ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Create Event</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="manage-events.php">Manage Events</a></li>
                    <li class="breadcrumb-item active">Create Event</li>
                </ol>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-plus-circle"></i> Create New Event
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <th>Event Title</th>
                                    <td><input class="form-control" id="name" name="name" type="text" required /></td>
                                </tr>
                                <tr>
                                    <th>Event Date & Time</th>
                                    <td><input class="form-control" id="event_datetime" name="event_datetime" type="datetime-local" required /></td>
                                </tr>
                                <tr>
                                    <th>Max Capacity</th>
                                    <td><input class="form-control" id="max_capacity" name="max_capacity" type="number" required /></td>
                                </tr>
                                <tr>
                                    <th>Venue</th>
                                    <td><input class="form-control" id="venue" name="venue" type="text" required /></td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>
                                        <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align:center;">
                                        <button type="submit" class="btn btn-primary btn-block" name="create_event">Create Event</button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <?php include('../includes/footer.php'); ?>
        <?php } ?>

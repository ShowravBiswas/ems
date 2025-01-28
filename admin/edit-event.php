<?php
session_start();
$title = "Edit Event";
include_once('../config/db_config.php');

if (!isset($_SESSION['user'])) {
    header('location:logout.php');
} else {
?>
<?php include_once('scripts/edit_event_handler.php'); ?>
<?php include_once('includes/header.php'); ?>
<?php include_once('includes/navbar.php'); ?>
<div id="layoutSidenav">
    <?php include_once('includes/sidebar.php'); ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <?php
                $eventId = $_GET['id'];
                $query = mysqli_query($conn, "SELECT * FROM events WHERE id='$eventId'");
                while ($result = mysqli_fetch_array($query)) {
                    ?>
                    <h1 class="mt-4">Event Details</h1>
                    <div class="card mb-4">
                        <form method="post">
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <th>Event Title</th>
                                        <td><input class="form-control" id="name" name="name" type="text" value="<?php echo $result['name']; ?>" required /></td>
                                    </tr>
                                    <tr>
                                        <th>Event Date & Time</th>
                                        <td><input class="form-control" id="event_datetime" name="event_datetime" type="datetime-local" value="<?php echo $result['event_datetime']; ?>" required /></td>
                                    </tr>
                                    <tr>
                                        <th>Max Capacity</th>
                                        <td colspan="3"><input class="form-control" id="max_capacity" name="max_capacity" type="number" value="<?php echo $result['max_capacity']; ?>" required /></td>
                                    </tr>
                                    <tr>
                                        <th>Venue</th>
                                        <td colspan="3"><input class="form-control" id="venue" name="venue" type="text" value="<?php echo $result['venue']; ?>" required /></td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td colspan="3"><input class="form-control" id="description" name="description" type="text" value="<?php echo $result['description']; ?>" required /></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" style="text-align:center;">
                                            <button type="submit" class="btn btn-primary btn-block" name="update">Update</button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                <?php } ?>
            </div>
        </main>
        <?php include('../includes/footer.php'); ?>
        <?php } ?>

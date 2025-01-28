<?php
include_once('helper/helpers.php');
include_once('config/db_config.php');
include_once('includes/header.php');
include_once('includes/navbar.php');
include_once('includes/home_banner.php');
?>

<!-- Upcoming Events section-->
<section class="bg-light py-5 border-bottom">
    <div class="container px-5">
        <div class="text-center mb-5">
            <h2 class="fw-bolder">Upcoming Events</h2>
        </div>
        <div class="row d-flex flex-wrap">
            <!-- Event Card -->
            <?php
            $query = "SELECT e.*, 
                 (e.max_capacity - COALESCE(a.attendee_count, 0)) AS available_seats
          FROM events e
          LEFT JOIN (
              SELECT event_id, COUNT(*) AS attendee_count 
              FROM event_attendees 
              GROUP BY event_id
          ) a ON e.id = a.event_id
          WHERE e.event_datetime >= NOW()
          ORDER BY e.event_datetime ASC";

            $ret = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_array($ret)) { ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="assets/images/demo-event-pic.jpg" class="card-img-top" alt="Event Image" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($row['name']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($row['description']); ?></p>
                            <p class="bg-warning px-1 text-white fw-bold">
                                Date: <?php echo formatEventDateTime($row['event_datetime']); ?>
                            </p>
                            <p class="text-muted">Location: <?php echo htmlspecialchars($row['venue']); ?></p>
                            <p class="text-success fw-bold">
                                Available Seats: <?php echo max($row['available_seats'], 0); ?>
                            </p>
                            <div class="d-grid">
                                <a href="javascript:void(0);" class="btn btn-dark fw-bold register-btn" data-id="<?php echo $row['id']; ?>">Register Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- Footer-->
<?php
include_once('includes/event_register_modal.php');
include_once('includes/footer.php');
?>


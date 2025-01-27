<?php
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
        <div class="row gx-5 justify-content-center">
            <!-- Event Card 1 -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100">
                    <img src="assets/images/demo-event-pic.jpg" class="card-img-top" alt="Event 1" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Tech Conference 2025</h5>
                        <p class="card-text">Join us for an inspiring day of innovation and networking. Perfect for tech enthusiasts!</p>
                        <p class="text-muted">Date: February 15, 2025</p>
                        <p class="text-muted">Location: New York City</p>
                        <div class="d-grid">
                            <a href="#" class="btn btn-dark fw-bold">Register Now</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Event Card 2 -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100">
                    <img src="assets/images/demo-event-pic.jpg" class="card-img-top" alt="Event 2" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Music Fest 2025</h5>
                        <p class="card-text">Experience an unforgettable night of live music, featuring top artists from around the globe.</p>
                        <p class="text-muted">Date: March 10, 2025</p>
                        <p class="text-muted">Location: Los Angeles</p>
                        <div class="d-grid">
                            <a href="#" class="btn btn-dark fw-bold">Register Now</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Event Card 3 -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100">
                    <img src="assets/images/demo-event-pic.jpg" class="card-img-top" alt="Event 3" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Art Expo 2025</h5>
                        <p class="card-text">Explore stunning artworks from renowned and emerging artists. A visual treat awaits!</p>
                        <p class="text-muted">Date: April 20, 2025</p>
                        <p class="text-muted">Location: Chicago</p>
                        <div class="d-grid">
                            <a href="#" class="btn btn-dark fw-bold">Register Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer-->
<?php include_once('includes/footer.php'); ?>


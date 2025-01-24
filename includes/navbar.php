<?php
$current_page = basename($_SERVER['PHP_SELF']); // Get current page name

// Active class function
function isActive($page, $current_page) {
    return $page === $current_page ? 'active' : '';
}
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container px-5">
        <a class="navbar-brand" href="index.php">EMS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link <?php echo isActive('index.php', $current_page); ?>" aria-current="page" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link <?php echo isActive('about.php', $current_page); ?>" href="about.php">About</a></li>
                <li class="nav-item"><a class="nav-link <?php echo isActive('login.php', $current_page); ?>" href="login.php">Login</a></li>
            </ul>
        </div>
    </div>
</nav>
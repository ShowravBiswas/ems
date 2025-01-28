<?php
$current_page = basename($_SERVER['PHP_SELF']); // Get current page name

// Active class function
function isActive($page, $current_page) {
    return $page === $current_page ? 'active' : '';
}
?>

<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">EMS</div>
                <a class="nav-link <?php echo isActive('dashboard.php', $current_page); ?>" href="dashboard.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link <?php echo isActive('manage-users.php', $current_page); ?>" href="manage-users.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Manage Users
                </a>
                <a class="nav-link <?php echo isActive('manage-events.php', $current_page); ?>" href="manage-events.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-calendar-alt"></i></div>
                    Manage Events
                </a>
                <a class="nav-link" href="logout.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                    Signout
                </a>
            </div>
        </div>

    </nav>
</div>
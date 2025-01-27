<?php session_start();
include_once('../config/db_config.php');
if (!isset($_SESSION['user'])) {
    header('location:logout.php');
} else{

    ?>


    <?php include_once('includes/header.php');?>
    <?php include_once('includes/navbar.php');?>
    <div id="layoutSidenav">
        <?php include_once('includes/sidebar.php');?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <div class="row">
                        <?php
                        $query=mysqli_query($conn,"select id from users");
                        $totalusers=mysqli_num_rows($query);
                        ?>

                        <div class="col-xl-4 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Total Registered Users
                                    <span style="font-size:22px;"> <?php echo $totalusers;?></span></div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="manage-users.php">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                </div>
            </main>
            <?php include_once('includes/footer.php'); ?>
<?php } ?>

<?php
session_start();
$title = "Edit User Profile";
include_once('../config/db_config.php');

if (!isset($_SESSION['user'])) {
    header('location:logout.php');
} else {
?>
<?php include_once('scripts/edit_profile_handler.php'); ?>
<?php include_once('includes/header.php'); ?>
<?php include_once('includes/navbar.php'); ?>
<div id="layoutSidenav">
    <?php include_once('includes/sidebar.php'); ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <?php
                $userid = $_GET['uid'];
                $query = mysqli_query($conn, "SELECT * FROM users WHERE id='$userid'");
                while ($result = mysqli_fetch_array($query)) {
                    ?>
                    <h1 class="mt-4"><?php echo $result['name']; ?>'s Profile</h1>
                    <div class="card mb-4">
                        <form method="post">
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <th>Name</th>
                                        <td><input class="form-control" id="name" name="name" type="text" value="<?php echo $result['name']; ?>" required /></td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td><input class="form-control" id="email" name="email" type="email" value="<?php echo $result['email']; ?>" required /></td>
                                    </tr>
                                    <tr>
                                        <th>Phone No.</th>
                                        <td colspan="3"><input class="form-control" id="phoneNo" name="phone_no" type="text" value="<?php echo $result['phone_no']; ?>" required /></td>
                                    </tr>
                                    <tr>
                                        <th>Is Approved</th>
                                        <td colspan="3">
                                            <select class="form-control" id="isApproved" name="is_approved" required>
                                                <option value="1" <?php echo ($result['is_approved'] == 1) ? 'selected' : ''; ?>>Yes</option>
                                                <option value="0" <?php echo ($result['is_approved'] == 0) ? 'selected' : ''; ?>>No</option>
                                            </select>
                                        </td>
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

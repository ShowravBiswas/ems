<?php
session_start();
$title = "User Profile";
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
                        
<?php 
$userid=$_GET['uid'];
$query=mysqli_query($conn,"select * from users where id='$userid'");
while($result=mysqli_fetch_array($query))
{?>
                        <h1 class="mt-4"><?php echo $result['name'];?>'s Profile</h1>
                        <div class="card mb-4">
                     
                            <div class="card-body">
                                <a href="edit-profile.php?uid=<?php echo $result['id'];?>">Edit</a>
                                <table class="table table-bordered">
                                    <tbody>
                                       <tr>
                                        <th>Name</th>
                                           <td><?php echo $result['name'];?></td>
                                       </tr>
                                       <tr>
                                           <th>Email</th>
                                           <td colspan="3"><?php echo $result['email'];?></td>
                                       </tr>
                                         <tr>
                                           <th>Phone No.</th>
                                           <td colspan="3"><?php echo $result['phone_no'];?></td>
                                       </tr>
                                        <tr>
                                           <th>Is Approved</th>
                                            <td colspan="3"><?php echo $result['is_approved'] ? '<span class="badge rounded-pill text-bg-success">Approved</span>'
                                                    : '<span class="badge rounded-pill text-bg-danger">Not Approved</span>'; ?></td>
                                            <td>
                                       </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
<?php } ?>
                    </div>
                </main>
          <?php include('includes/footer.php');?>
<?php } ?>

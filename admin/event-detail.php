<?php
session_start();
$title = "Event Detail";
include_once('../config/db_config.php');
include_once('../helper/helpers.php');
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
$adminId=$_GET['id'];
$query=mysqli_query($conn,"select * from events where id='$adminId'");
while($result=mysqli_fetch_array($query))
{?>
                        <h1 class="mt-4"><?php echo $result['name'];?> Detail</h1>
                        <div class="card mb-4">
                     
                            <div class="card-body">
                                <a href="edit-event.php?id=<?php echo $result['id'];?>">Edit</a>
                                <table class="table table-bordered">
                                    <tbody>
                                       <tr>
                                        <th>Event Title</th>
                                           <td><?php echo $result['name'];?></td>
                                       </tr>
                                       <tr>
                                           <th>Event Date & Time</th>
                                           <td colspan="3"><?php echo formatEventDateTime($result['event_datetime']); ?></td>
                                       </tr>
                                         <tr>
                                           <th>Max Capacity</th>
                                           <td colspan="3"><?php echo $result['max_capacity'];?></td>
                                       </tr>
                                       <tr>
                                           <th>Venue</th>
                                           <td colspan="3"><?php echo $result['venue'];?></td>
                                       </tr>
                                       <tr>
                                           <th>Description</th>
                                           <td colspan="3"><?php echo $result['description'];?></td>
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

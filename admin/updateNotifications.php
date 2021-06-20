<!DOCTYPE html>
<html lang="en">
   <?php include 'includes/head.php';
   
    $message="";
    
    if(isset($_POST['add'])){
        $notification = mysqli_real_escape_string($con, $_POST['notification']);
        $add = "INSERT INTO notifications (notification) VALUES ('".$notification."');";
        
        if(mysqli_query($con, $add)){
            $message = "Vehicle Information Added";
        } else {
          $message = "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    
    if(isset($_GET['delete'])){
        $id = mysqli_real_escape_string($con, $_GET['delete']);
        $delete = "DELETE FROM notifications WHERE id='".$id."'";
        if(mysqli_query($con, $delete)){
            $message = "Notification Deleted.";
        } else {
            $message = "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    
    $notificationssql = "SELECT * FROM notifications order by timestamp";

    $notifications = mysqli_query($con, $notificationssql);
    
    
    ?>
   <body>
      <div class="wrapper">
         <?php include 'includes/nav.php';?>
         <div class="main">
            <?php include 'includes/navtop.php';?>
            <main class="content">
               <div class="container-fluid p-0">
                  <h1 class="h3 mb-3">Update News and Notifications</h1>
                  <div class="row">
                     <div class="col-12">
                        <div class="card">
                           <div class="card-body">
                               <form action=""method="POST" class="form-inline">
										<label class="sr-only" for="inlineFormInputName2">Notification</label>
										<input type="text" class="form-control mb-2 mr-sm-2 col-8" name="notification" placeholder="Type your notification here...">

										<button name="add" type="submit" class="btn btn-primary mb-2 col-2">Add Notification</button>
									</form>
                           </div>
                        </div>
                     </div>
                  </div>
                    <div class="row">
                     <div class="col-12">
                        <div class="card">
                           <div class="card-header">
                              <h5 class="card-title mb-0"><?php echo $message; ?></h5>
                           </div>
                           <div class="card-body">
                               	<table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Notification</th>
                                        <th>Created on</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                            <?php
                            if (mysqli_num_rows($notifications) > 0) {
                              // output data of each row
                              while($row = mysqli_fetch_assoc($notifications)) {
                                
                                echo '<tr>
                                    <td>'.$row['notification'].'</td>
                                    <td>'.date('l jS \of F Y h:i:s A', strtotime($row['timestamp'])).'</td>
                                    <td class="table-action">
												<a href="?delete='.$row['id'].'" type="button" class="btn"><i class="align-middle" data-feather="delete"></i> Remove</a>
											</td>
                                </tr>';
                            
                                  ?> 
                            
                            <?php;
                              }
                            } else {
                                echo '<tr>
                                        <td colspan="3">No Data</td>
                                    </tr>';
                            }
                          ?> 
        </tbody>
        <tfoot>
            <tr>
                <th>Notification</th>
                <th>Created on</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
    
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </main>
            <?php include 'includes/footer.php';?>
         </div>
      </div>
      <?php include 'includes/scripts.php';?>
   </body>
</html>
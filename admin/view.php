<!DOCTYPE html>
<html lang="en">
   <?php include 'includes/head.php';
   
        
        $sql = "SELECT q.id, q.last_update, q.vehicle_type, q.in_time, q.out_time, sert.type as 'service_type', q.status_type as 'status_type', st.name as 'status', q.owner_name, q.vehicle_number from service_type sert, queue q, status_type st where st.id = q.status_type AND q.service_type=sert.id ORDER BY q.status_type ASC LIMIT 1000";
        
        $result = mysqli_query($con, $sql);
        
        $message="";
        
    $vehicle_typesql = "SELECT * FROM vehicle_type";
    $service_typesql = "SELECT * FROM service_type";

    $vehicle_type = mysqli_query($con, $vehicle_typesql);
    $service_type = mysqli_query($con, $service_typesql);
    
    if(isset($_POST['submit'])){
        
        $owner_email = mysqli_real_escape_string($con, $_POST['owner_email']);
        $owner_name = mysqli_real_escape_string($con, $_POST['owner_name']);
        $owner_phone = mysqli_real_escape_string($con, $_POST['owner_phone']);
        $owner_address = mysqli_real_escape_string($con, $_POST['owner_address']);
        $vehicle_type2 = mysqli_real_escape_string($con, $_POST['vehicle_type']);
        $vehicle_number = mysqli_real_escape_string($con, $_POST['vehicle_number']);
        $service_type2 = mysqli_escape_string($con, $_POST['service_type']);
        $datum = new DateTime();
        $in_time = $datum->format('Y-m-d H:i:s');
        
        $insert = "INSERT INTO queue (owner_email, owner_name, owner_phone, owner_address, vehicle_type, vehicle_number, service_type, in_time) VALUES ('$owner_email', '$owner_name', '$owner_phone', '$owner_address', $vehicle_type2, '$vehicle_number', $service_type2, '$in_time') ON DUPLICATE KEY UPDATE owner_email='$owner_email', owner_name='$owner_name', owner_phone='$owner_phone', owner_address='$owner_address', service_type='$service_type2';";
        
        if(mysqli_query($con, $insert)){
            $message = "Vehicle Information Added";
        } else {
          $message = "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
    }
            
            ?>
   <body>
      <div class="wrapper">
         <?php include 'includes/nav.php';?>
         <div class="main">
            <?php include 'includes/navtop.php';?>
            <main class="content">
               <div class="container-fluid p-0">
                  <h1 class="h3 mb-3">View All Vehicles</h1>
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
                                        <th>ID</th>
                                        <th>Vehicle Number</th>
                                        <th>Owner</th>
                                        <th>Car Wash Type</th>
                                        <th>Status</th>
                                        <th>Registration Time</th>
                                         <th>Last Update</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                            <?php
                            if (mysqli_num_rows($result) > 0) {
                              // output data of each row
                              while($row = mysqli_fetch_assoc($result)) {
                                $icon = 'fa-car';
                                $status = 'text-success';
                                
                                if($row["status_type"] == '2'){
                                    $status = 'text-warning';
                                }else if($row["status_type"] == '0'){
                                    $status = 'text-danger';
                                }else if($row["status_type"] == '1'){
                                    $status = 'text-primary';
                                }else if($row["status_type"] == '4'){
                                    $status = 'text-alert';
                                }else if($row["status_type"] == '3'){
                                    $status = 'text-success';
                                }
                                
                                if($row["vehicle_type"]== '1'){
                                    $icon = 'fa-car';
                                }else if($row["vehicle_type"]== '2'){
                                    $icon = 'fa-shuttle-van';
                                }else if($row["vehicle_type"]== '3'){
                                    $icon = 'fa-taxi';
                                }else if($row["vehicle_type"]== '4'){
                                    $icon = 'fa-truck';
                                }else{
                                    $icon = 'fa-car';
                                }
                                
                                echo '<tr>
                                    <td>'.$row['id'].'</td>
                                    <td><i class="align-middle fa '.$icon.'"> </i> '.$row['vehicle_number'].'</td>
                                    <td>'.$row['owner_name'].'</td>
                                    <td>'.$row['service_type'].'</td>
                                    <td><span class="'.$status.'">'.$row['status'].'</span></td>
                                    <td>'.date('l jS \of F Y h:i:s A', strtotime($row['in_time'])).'</td>
                                    <td>'.($row['last_update'] != '' ? date('l jS \of F Y h:i:s A', strtotime($row['out_time'])) : null).'</td>
                                    <td class="table-action">
												<a onclick="loadData('.$row['id'].')" data-id="'.$row['id'].'" type="button" class="btn" data-toggle="modal" data-target="#deleteModal"><i class="align-middle" data-feather="edit"></i> UPDATE</a>
											</td>
                                </tr>';
                            
                                  ?> 
                            
                            <?php
                              }
                            } else {
                                echo '<tr>
                                        <td colspan="5">No Data</td>
                                    </tr>';
                            }
                          ?> 
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Vehicle Number</th>
                <th>Owner</th>
                <th>Car Wash Type</th>
                <th>Status</th>
                <th>Registration Time</th>
                <th>Last Update</th>
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
      
      
      									<!-- BEGIN delete modal -->
									<div class="modal fade deleteModal" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog modal-lg" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title">Update Records</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
												</div>
												<div class="modal-body m-3" id="formData">

												</div>
												
											</div>
										</div>
									</div>
									<!-- END delete modal -->
									
      <?php include 'includes/scripts.php';?>
   </body>
</html>
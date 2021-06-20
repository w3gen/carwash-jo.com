<?php

    include 'dbconfig.php';
    include 'functions.php';

    if(isset($_POST['delete'])){
        $id = mysqli_real_escape_string($con, $_POST['delete']);
        $delete = "DELETE FROM queue WHERE id='".$id."'";
        if(mysqli_query($con, $delete)){
            $message = "Record Deleted.";
        } else {
            $message = "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        echo $message;
        header("Location: https://www.carwash-jo.com/admin/view.php");
        die();
    }

    if(isset($_POST['update'])){
        $message;
        $id =  mysqli_real_escape_string($con, $_POST['id']);
        $owner_email = mysqli_real_escape_string($con, $_POST['owner_email']);
        $owner_name = mysqli_real_escape_string($con, $_POST['owner_name']);
        $owner_phone = mysqli_real_escape_string($con, $_POST['owner_phone']);
        $owner_address = mysqli_real_escape_string($con, $_POST['owner_address']);
        $vehicle_type2 = mysqli_real_escape_string($con, $_POST['vehicle_type']);
        $status_type2 = mysqli_real_escape_string($con, $_POST['status_type']);
        $vehicle_number = mysqli_real_escape_string($con, $_POST['vehicle_number']);
        $service_type2 = mysqli_escape_string($con, $_POST['service_type']);
        $datum = new DateTime();
        $in_time = $datum->format('Y-m-d H:i:s');
        
        $insert = "UPDATE queue SET status_type='".$status_type2."', owner_email='".$owner_email."', owner_name='".$owner_name."', owner_phone='".$owner_phone."', owner_address='".$owner_address."', vehicle_type='".$vehicle_type2."', vehicle_number='".$vehicle_number."', service_type='".$service_type2."' WHERE id='".$id."';";
        
        if(mysqli_query($con, $insert)){
            $message = "Vehicle Information Updated";
            $id_get = mysqli_query($con, "SELECT * FROM status_type WHERE id='".$status_type2."' LIMIT 1");
            $id = mysqli_fetch_array($id_get);
            
            $subject = "Car Wash Jo | Your Carwash Status - " . $id['name'] . ".";
            
            $description = "The status of your carwash is " . $id['name'] . ".";
            if(sendMail($owner_email, $subject, $owner_name, $description, $vehicle_number)){
                    $message = $message . " Tracking information sent to the customer's email.";
                }else{
                    $message = $message . " Faild to send tracking information to the customer.";
                }
        } else {
          $message = "Error: " . $sql . "<br>" . mysqli_error($con);
        }
        
        echo $message;
        header("Location: https://www.carwash-jo.com/admin/view.php");
        die();
        
    }
    
if(isset($_GET['info'])){
            $id = mysqli_real_escape_string($con, $_GET['info']);
            
            $sql = "SELECT q.last_update, q.service_type, q.id, q.vehicle_type, q.status_type as 'status_type', st.name as 'status', q.owner_name, q.owner_address, q.owner_email, q.owner_phone, q.vehicle_number from queue q, status_type st where st.id = q.status_type AND q.id = '".$id."'";
            
            $vehicle_typeSQL = "SELECT * FROM vehicle_type";
            $vehicle_type = mysqli_query($con, $vehicle_typeSQL);
            $service_typeSQL = "SELECT * FROM service_type";
            $service_type = mysqli_query($con, $service_typeSQL);
            $status_typeSQL = "SELECT * FROM status_type";
            $status_type = mysqli_query($con, $status_typeSQL);
            
            $result = mysqli_query($con, $sql);
            
            if (mysqli_num_rows($result) == 1) {
                                while($track = mysqli_fetch_assoc($result)) {
                                    ?> 
                                    
                                    
                                    
                                    
                                   										
                                   	<form action="includes/loadVehicleData.php" method="POST">
										<div class="form-row">
											<div class="form-group col-md-6">
												<label for="inputEmail4">Owner's Name</label>
												<input value="<?php echo $track['owner_name']; ?>" type="text" name="owner_name" class="form-control" placeholder="Owner's Name">
											</div>
											<div class="form-group col-md-3">
												<label for="inputPassword4">Vehicle Number</label>
												<input value="<?php echo $track['vehicle_number']; ?>" type="text" class="form-control" name="vehicle_number" placeholder="Vehicle Number">
											</div>
																															<div class="form-group col-md-3">
												<label for="inputState">Vehicle Type</label>
                        				<select name="vehicle_type" class="form-control">
                                        <?php
                                            if (mysqli_num_rows($vehicle_type) > 0) {
                                                while($type = mysqli_fetch_assoc($vehicle_type)) {
                                                   echo '<option'; ?>
                                                   
                                        <?php if($track['vehicle_type'] == $type['id']){ echo 'selected';
                                        }; ?>
                                                   
                                                   <?php echo ' value="'.$type["id"].'">'.$type["name"].'</option>'; 
                                                }
                                                
                                            }
                                                ?>
                                      </select>
                        											</div>
										</div>
										
																				<div class="form-row">
        	                            <div class="form-group col-md-6">
        												<label for="service_type">Car Wash Type</label>
                                				<select name="service_type" class="form-control">
                                                <?php
                                                    if (mysqli_num_rows($service_type) > 0) {
                                                        while($servicetype = mysqli_fetch_assoc($service_type)) {
                                                           echo '<option'; ?>
                                                   
                                        <?php if($track['service_type'] == $servicetype['id']){ echo 'selected';
                                        }; ?>
                                                   
                                                   <?php echo ' value="'.$servicetype["id"].'">'.$servicetype["type"].'</option>'; 
                                                }
                                                
                                            }
                                                ?>
                                              </select>
                        											</div>
                        											
                        											
											<div class="form-group col-md-4">
												<label for="owner_email">Email (To send status updates)</label>
										<input value="<?php echo $track['owner_email']; ?>" type="email" class="form-control" name="owner_email">
											</div>
											<div class="form-group col-md-2">
												<label for="owner_phone">Phone Number</label>
												<input value="<?php echo $track['owner_phone']; ?>" type="text" class="form-control" name="owner_phone">
											</div>
										</div>
										
										
										<div class="form-group">
											<label for="owner_address">Address</label>
											<textarea type="text" class="form-control" name="owner_address" placeholder=""><?php echo $track['owner_address']; ?></textarea>
										</div>
										
																				
											<div class="row">
												<div class="col-8">
													<div class="form-check form-check-inline">
													                            <?php
                                                    if (mysqli_num_rows($status_type) > 0) {
                                                        while($statustype2 = mysqli_fetch_assoc($status_type)) {
                                                           echo '<label class="custom-control custom-radio col-3"><input '; ?>
                                                   
                                        <?php if($track['status_type'] == $statustype2['id']){ echo 'checked';
                                        }; ?>
                                                   
                                                   <?php echo ' name="status_type" value="'.$statustype2['id'].'" type="radio" class="custom-control-input">
                    <span class="custom-control-label">'.$statustype2['name'].'  </span>
                  </label>'; 
                                                }
                                                
                                            }
                                                ?>
													</div>
												</div>
											</div>
										
										<hr>
										
										<button name="update" type="submit" class="btn btn-success btn-lg col-4 float-right">Update</button>
										<button name="delete" type="submit" class="btn btn-danger">Delete</button>

                                        <input name="id" value="<?php echo $track['id']; ?>" style="visibility:hidden" />

									</form> 
                                    
                                    
                                    
                                    <?php
                                }
            }
}
?>
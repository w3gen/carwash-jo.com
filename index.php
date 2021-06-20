<?php

include 'admin/includes/dbconfig.php';
    
if(isset($_GET['track'])){
            $id = mysqli_real_escape_string($con, $_GET['track']);
            
            $sql = "SELECT q.last_update, q.id, q.vehicle_type, q.status_type as 'status_type', st.name as 'status', q.owner_name, q.vehicle_number from queue q, status_type st where st.id = q.status_type AND (q.vehicle_number = '".$id."' or q.id = '".$id."')";
        
            $result = mysqli_query($con, $sql);
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body id="body">
	<div class="wrapper">
		<div class="main-panel2">
			<div class="content">
				<div class="page-inner">
				    <div  style="min-height:30px" class="card ticker-container bubble-shadow" id="new_ticker">
                    </div>
                    <form  data-background-color="dark" class="card nav-search mr-md-3" action="" method="GET" >
						<div class="input-group">
							<div class="input-group-prepend">
								<button type="submit" class="btn btn-search pr-1">
									<i class="fa fa-search search-icon"></i>
								</button>
							</div>
							<input autofocus style="color: black;" type="text" placeholder="Search Tracking ID or Vehicle Number..." name="track" class="form-control">
						</div>
					</form>
					<div class="row">
						<?php
                            if (mysqli_num_rows($result) > 0) {
                                while($track = mysqli_fetch_assoc($result)) {
                                    
                                        $status = 'primary';
                                        
                                        if($track["status_type"] == '2'){
                                            $status = 'warning';
                                        }else if($track["status_type"] == '0'){
                                            $status = 'danger';
                                        }else if($track["status_type"] == '1'){
                                            $status = 'primary';
                                        }else if($track["status_type"] == '4'){
                                            $status = 'alert';
                                        }else if($track["status_type"] == '3'){
                                            $status = 'success';
                                        }
    
                                    echo '<div class="col-12">
                							<div class="card card-'.$status.' bg-'.$status.'-gradient">
                								<div class="card-body">
                									<h4 class="mb-1 fw-bold text-center">'.$track["vehicle_number"].' - '.$track["status"].'</h4>
                								</div>
                							</div>
                						</div>';
                						
                					echo '<div class="col-12">
                    							<div class="card">
                    								<div class="card-header">
                    									<div class="card-title">Status Updates</div>
                    								</div>
                    								<div class="card-body">
                    									<ol class="activity-feed">';
                    									
                					$sqlstatus = "SELECT * from status_updates, status_type, queue WHERE queue_id=queue.id AND status_updates.status_id=status_type.id AND status_updates.queue_id = '".$track["id"]."'";
                					
                					$resultstatus = mysqli_query($con, $sqlstatus);
                					if (mysqli_num_rows($resultstatus) > 0) {
                                        while($status = mysqli_fetch_assoc($resultstatus)) {
                                            
                                                                                $statusId = 'primary';
                                        
                                        if($status["status_id"] == '2'){
                                            $statusId = 'warning';
                                        }else if($status["status_id"] == '0'){
                                            $statusId = 'danger';
                                        }else if($track["status_id"] == '1'){
                                            $statusId = 'primary';
                                        }else if($status["status_id"] == '4'){
                                            $statusId = 'alert';
                                        }else if($status["status_id"] == '3'){
                                            $statusId = 'success';
                                        }
                                        
                                    echo '<li class="feed-item feed-item-'.$statusId.'">
                    											<time class="date" datetime="9-25">'.date("F j, Y, g:i a", strtotime($status['time'])).'</time>
                    											<span class="text">Your car wash status is '.$status["name"].'. '.$status['description'].'</span>
                    										</li>';
                                        }
                					}else{
                					    echo '<li class="feed-item feed-item-'.$status.'">
                    											<time class="date" datetime="9-25">'.date("F j, Y, g:i a", strtotime($track['last_update'])).'</time>
                    											<span class="text">Your car wash status is '.$track["status"].'</span>
                    										</li>';
                					}
                					
                					echo '</ol>
                    								</div>
                    							</div>
                    						</div>';
                            }
                        }else{
                            echo '<div class="row"  id="dashboard"></div>';
                        }
                        ?>

					</div>
				</div>
				<?php if(isset($_GET['track'])) { include 'includes/footer.php';} ?>
			</div>
		</div>
	</div>
<?php include 'includes/scripts.php'; ?>
</body>
</html>
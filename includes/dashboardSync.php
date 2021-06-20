<?php include '../admin/includes/dbconfig.php';

$sql = "SELECT q.id, q.vehicle_type, q.status_type as 'status_type', st.name as 'status', q.owner_name, q.vehicle_number from queue q, status_type st where st.id = q.status_type AND q.status_type != 4 ORDER BY q.status_type DESC LIMIT 24";

$result = mysqli_query($con, $sql);

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
    
    echo '<div class="col-sm-6 col-md-3">
        	<div class="card card-stats card-round">
        		<div class="card-body">
        		
        			<div class="row">
        				<div class="col-icon">
        					<div class="icon-big text-center icon-primary bubble-shadow-small">
        						<i class="fa '.$icon.'"></i>
        					</div>
        				</div>
        				<div class="col col-stats ml-3 ml-sm-0">
        					<div class="numbers">
        						<p class="card-category '.$status.'">'.$row["status"].'</p>
        						<h4 class="card-title">'.$row["vehicle_number"].'</h4>
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>';

      ?> 

<?php
  }
} else {
    echo '<div class="col-12">
    	<div class="card card-stats card-round">
    		<div class="card-body ">
    			<div class="row align-items-center">
    				<div class="col col-stats ml-3 ml-sm-0">
    					<div class="numbers">
    						<h4 class="card-title">No Data</h4>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>';

  ?> 
  
    <script>
        //Notify
        $.notify({
        	icon: 'flaticon-alarm-1',
        	title: 'No Data',
        	message: 'You do not have data to be displayed',
        },{
        	type: 'warning',
        	placement: {
        		from: "bottom",
        		align: "right"
        	},
        	time: 1000,
        });
    </script>

<?php

}

mysqli_close($con);

?>

    <script>
        //Notify
        $.notify({
        	icon: 'flaticon-alarm-1',
        	title: 'Updated',
        	message: 'Dashboard updated with latest status',
        },{
        	type: 'info',
        	placement: {
        		from: "bottom",
        		align: "right"
        	},
        	time: 1000,
        });
    </script>
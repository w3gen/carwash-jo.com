<?php include '../admin/includes/dbconfig.php';

$sql2 = "SELECT notification from notifications ORDER BY timestamp DESC LIMIT 10";

$result2 = mysqli_query($con, $sql2);

if (mysqli_num_rows($result2) > 0) {
    
    echo '<div class="ticker-caption"><p>Notifications</p></div><ul id="new_ticker">';
    
      while($row2 = mysqli_fetch_assoc($result2)) {
            echo '<div><li><span>'.$row2["notification"].'</span></li></div>';
      }
    
    echo '</ul>';
}
                      
?>

<!DOCTYPE html>
<html lang="en">
   <?php include 'includes/head.php';
    ?>
   <body>
      <div class="wrapper">
         <?php include 'includes/nav.php';?>
         <div class="main">
            <?php include 'includes/navtop.php';?>
            <main class="content">
               <div class="container-fluid p-0">
                  <div class="row">
                     <div class="col-12">
                        <div class="card">
                           <div class="card-header">
                              <h5 class="card-title mb-0">Stats for <?php echo date("Y");?></h5>
                           </div>
                           <div class="card-body">
                               <canvas id="myChart"></canvas>
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
      <?php include 'includes/loadBarChart.php';?>
   </body>
</html>
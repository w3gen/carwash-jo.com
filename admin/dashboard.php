<!DOCTYPE html>
<html lang="en">
   <?php include 'includes/head.php';?>
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
                              <h5 class="card-title mb-0">Vehicle Status <a class="float-right" href="https://www.carwash-jo.com/status/" target="_blank"><small>Screen Viewer <i class="align-middle mr-2" data-feather="log-in"></i></small></a></h5>
                           </div>
                           <div class="card-body" id="dashboard">
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
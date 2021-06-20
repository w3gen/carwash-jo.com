<!DOCTYPE html>
<html lang="en">
    <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Check your car wash status online!">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.carwash-jo.com/">
    <meta property="og:title" content="Car Wash Jo | Login">
    <meta property="og:description" content="Check your car wash status online!">
    <meta property="og:image" content="../../assets/banner.jpg">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://www.carwash-jo.com/">
    <meta property="twitter:title" content="Car Wash Jo">
    <meta property="twitter:description" content="Check your car wash status online!">
    <meta property="twitter:image" content="../../assets/banner.jpg">

	<link rel="shortcut icon" href="../../admin/img/ico.png" />
	

	<title>Car Wash Jo - Login</title>

	<link href="css/app.css" rel="stylesheet">
	
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	
	
</head>
   <?php 
        require 'includes/dbconfig.php';
        session_start();
        $message="";
        if(isset($_POST["submit"])) {
            $result = mysqli_query($con,"SELECT * FROM users WHERE username='" . $_POST["username"] . "' and password = '". $_POST["password"]."'");
            $row  = mysqli_fetch_array($result);
            if(is_array($row)) {
                $_SESSION["id"] = $row['id'];
                $_SESSION["username"] = $row['username'];
                header("Location:index.php");
            } else {
             $message = "Invalid Username or Password!";
            }
        }else if(isset($_POST["forgot"])){
            $message = "Your password has been sent to the administrator's email.";
        }
?>
   <body>
      <div class="wrapper">
         <div class="main">
            <main class="content">
               <div class="container-fluid p-0">
                  <h1 class="h3 mb-3 text-center">Administrator Login</h1>
                  <div class="row justify-content-center">
                     <div class="col-6">
                        <div class="card">
                              <?php if($message!=""){ echo '<div class="card-header alert alert-info"><p class="text-center">'.$message.'</p></div>';} ?>
                           <div class="card-body">
                               	<form action="" method="POST">
										<div class="form-row">
											<div class="form-group col-md-12">
												<label for="inputEmail4">Username</label>
												<input type="text" class="form-control" name="username" id="username" placeholder="Username">
											</div>
											<div class="form-group col-md-12">
												<label for="inputPassword4">Password</label>
												<input type="password" class="form-control" name="password"  placeholder="Password">
											</div>
										</div>


										<button type="submit" name="submit" class="btn btn-primary">Login</button> 
										
										<button type="submit" name="forgot" class="btn">Forgot Password</button>
									</form>
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
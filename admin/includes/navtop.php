<nav class="navbar navbar-expand navbar-light navbar-bg">
   <a class="sidebar-toggle d-flex">
   <i class="hamburger align-self-center"></i>
   </a>
   <form method="GET" action="https://www.carwash-jo.com/" class="form-inline d-none d-sm-inline-block">
      <div class="input-group input-group-navbar">
         <input type="text" class="form-control" placeholder="Search Status…" aria-label="Search Status" name="track">
         <div class="input-group-append">
            <button class="btn" type="submit">
            <i class="align-middle" data-feather="search"></i>
            </button>
         </div>
      </div>
   </form>
   <div class="navbar-collapse collapse">
      <ul class="navbar-nav navbar-align">
         <li class="nav-item dropdown">
            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
            <i class="align-middle" data-feather="settings"></i>
            </a>
            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown"><span class="text-dark">Hi, <?php echo $_SESSION["username"]; ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
               <!--<a class="dropdown-item" href="pages-profile.html"><i class="align-middle mr-1" data-feather="user"></i> Update Profile</a>-->
               <div class="dropdown-divider"></div>
               <a class="dropdown-item" href="logout.php">Log out</a>
            </div>
         </li>
      </ul>
   </div>
</nav>
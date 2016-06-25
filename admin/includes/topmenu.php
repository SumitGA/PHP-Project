
<header class="main-header">
        <!-- Logo -->
        <a href="index.php" class="logo"><b>Orchid</b>Admin</b>Control</a>
        <!-- Header Navbar: style can be found in header.less -->
       <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
       
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  
                  <span class="hidden-xs"><img src="../uploads/admin_images/<?php echo $_SESSION['image_link']; ?>" heigth="25px" width="35px" /><?php echo $_SESSION['user_name']; ?></span>
                </a>
               
                
                
                <ul class="dropdown-menu">
                
                
                  <!-- User image -->
                  <li class="user-header">
                  <img src="../uploads/admin_images/<?php echo $_SESSION['image_link']; ?>" class="img-circle" alt="User Image" height="160px" width= "160px" />
                    
                    <p>
                      <?php echo $_SESSION['user_name']; ?>
                      </p>
                      <small>Member since:<?php echo $_SESSION['registration_date']; ?></small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                
                  <!-- Menu Footer-->
                  <li class="user-footer">
                   
                    <div class="pull-right">
                      <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav> 
      </header>
<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="../uploads/admin_images/<?php echo $_SESSION['image_link']; ?>" class="img-circle" alt="User Image" height ="160px" width="160px"/>
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION['user_name']; ?></p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
<!-----------------User Settings Blocks-------------------->
            <li class="treeview">
               <a href="index.php">
                <i class="fa fa-th"></i> <span>Users Settings</span> <small class="label pull-right bg-green">3</small>
              </a>
            
            <ul class="treeview-menu">
           
            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Admin settings</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="index.php?menu=admins&action=view_admin"><i class="fa fa-circle-o"></i>View Admins</a></li>
                <li><a href="index.php?menu=admins&action=add_admin"><i class="fa fa-circle-o"></i>Add Admins</a></li>
                
                <li><a href="index.php?menu=admins&action=change_password"><i class="fa fa-circle-o"></i>Change Password</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Teachers settings</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="index.php?menu=teachers&action=add_teachers"><i class="fa fa-circle-o"></i> Add Teachers</a></li>
               
                <li><a href="index.php?menu=teachers&action=view_teachers"><i class="fa fa-circle-o"></i>View Teachers</a></li>
                
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i> <span>Students Settings</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="index.php?menu=students&action=add_students"><i class="fa fa-circle-o"></i> Add Students</a></li>
               
                <li><a href="index.php?menu=students&action=view_students"><i class="fa fa-circle-o"></i> View Student</a></li>
              </ul>
            </li>
          </ul>
          </ul>
          
          
          
 <!--------------Slider Settings Blocks-------------------->
    		      
        <ul class="sidebar-menu">
            
            <li class="treeview">
               <a href="index.php">
                <i class="fa fa-th"></i> <span>Sliders Settings</span> <small class="label pull-right bg-green">2</small>
              </a>
            
            <ul class="treeview-menu">
           
            <li class="treeview">
              <a href="index.php?menu=sliders&action=add_sliders">
                <i class="fa fa-laptop"></i>
                <span>Add Sliders</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              
            </li>
            <li class="treeview">
              <a href="index.php?menu=sliders&action=view_sliders">
                <i class="fa fa-laptop"></i>
                <span>View Sliders</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              
            </li>
           
          </ul>
          </ul>
          </ul>
          
 <!------------------Gallery-------------------------------->
           <ul class="sidebar-menu">
            
            <li class="treeview">
               <a href="index.php">
                <i class="fa fa-th"></i> <span>Gallery Settings</span> <small class="label pull-right bg-green">2</small>
              </a>
            
            <ul class="treeview-menu">
           
            <li class="treeview">
              <a href="index.php?menu=gallery&action=add_images&id=<?php echo $_SESSION['admin_id']; ?> ">
                <i class="fa fa-laptop"></i>
                <span>Add Images</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              
            </li>
            <li class="treeview">
              <a href="index.php?menu=gallery&action=view_images">
                <i class="fa fa-laptop"></i>
                <span>View Images</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              
            </li>
           
          </ul>
          </ul>
          </ul>
 <!---------------------Notice Sections -------------------->
          <ul class="sidebar-menu">
                    
                    <li class="treeview">
                       <a href="index.php">
                        <i class="fa fa-th"></i> <span>Notice Settings</span> <small class="label pull-right bg-green">2</small>
                      </a>
                    
                    <ul class="treeview-menu">
                   
                    <li class="treeview">
                      <a href="index.php?menu=notices&action=add_notices">
                        <i class="fa fa-laptop"></i>
                        <span>Add Notices</span>
                        <i class="fa fa-angle-left pull-right"></i>
                      </a>
                      
                    </li>
                    <li class="treeview">
                      <a href="index.php?menu=notices&action=view_notices">
                        <i class="fa fa-laptop"></i>
                        <span>View Notices</span>
                        <i class="fa fa-angle-left pull-right"></i>
                      </a>
                      
                    </li>
                   
                  </ul>
                  </ul>
          </ul>         
          
          
 <!---------------------Notes Sections---------------------->
  <ul class="sidebar-menu">
                    
                    <li class="treeview">
                       <a href="index.php">
                        <i class="fa fa-th"></i> <span>Notes Settings</span> <small class="label pull-right bg-green">2</small>
                      </a>
                    
                    <ul class="treeview-menu">
                   
                    <li class="treeview">
                      <a href="index.php?menu=notes&action=add_notes">
                        <i class="fa fa-laptop"></i>
                        <span>Add Notes</span>
                        <i class="fa fa-angle-left pull-right"></i>
                      </a>
                      
                    </li>
                    <li class="treeview">
                      <a href="index.php?menu=notes&action=view_notes">
                        <i class="fa fa-laptop"></i>
                        <span>View Notes</span>
                        <i class="fa fa-angle-left pull-right"></i>
                      </a>
                      
                    </li>
                   
                  </ul>
                  </ul>
          </ul>         
                   
        </section>
        <!-- /.sidebar -->
      </aside>
<?php require_once('bootstrap.php'); ?>

<?php require_once('includes/header.php'); ?>
  <body class="skin-blue">
    <div class="wrapper">
      
      <?php require_once('includes/topmenu.php'); ?>
      <!-- Left side column. contains the logo and sidebar -->
      <?php require_once('includes/leftnav.php'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <!-- /.row -->
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable">
              <!-- Custom tabs (Charts with tabs)-->
              <div class="nav-tabs-custom">
              <!-- Alerts Danger and Success-->
         <?php if(isset($_GET['error'])) {?>     
              
              <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    <?php echo $_GET['error']; ?>
                  </div>
                  
                 <?php  } ?>
                 
          <?php if(isset($_GET['success'])){ ?>       
                
             <!-- put your contents here-->
             
             <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4>	<i class="icon fa fa-check"></i> Alert!</h4>
                    <?php echo $_GET['success']; ?>
                  </div>
             <?php } ?>
             
             <?php require_once($page_to_load); ?>  
              
             
            </section><!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5 connectedSortable">
             

             
              

            </section><!-- right col -->
          </div><!-- /.row (main row) -->

        </section>
      </div><!-- /.content-wrapper -->
     <?php require_once('includes/footer.php');?>
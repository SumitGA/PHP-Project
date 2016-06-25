<?php 
//connection to the databse
require_once('../class/connection.class.php');
require_once('../class/user.class.php');

//create an object 
$teachers_list=new Users();

//call the function 
$teachers_list=$teachers_list->view_teachers_details('1');


?>




<div class="box-body table-responsive no-padding">


                  <table class="table table-hover">
                    <tr>
                      <th>Teachers ID</th>
                      <th>Teachers Name</th>
                      <th>Registation Date</th>
                      <th>Teacher_Status</th>
                      <th>Email</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                    <?php if($teachers_list >0 ){ 
  foreach($teachers_list as $key=>$value){ ?>
                    <tr>
                      <td><?php echo $value['user_id']; ?></td>
                      <td><?php echo $value['username']; ?></td>
                      <td><?php echo $value['registrationdate']; ?></td>
                      <td><span class="label label-success"><?php if($value['user_status']==1){echo "Active"; } else { ?></span><span class="label label-danger"><?php  echo "Inactive" ;} ?></span></td>
                      <td><?php echo $value['email']; ?></td>
                       <td><a href="index.php?menu=teachers&action=edit_teachers&id=<?php echo $value['user_id']; ?>">Edit</a></td>
                       <td><a href="index.php?menu=teachers&action=delete_teachers&id=<?php echo $value['user_id']; ?> "> Delete</a></td>

                   <?php }}
				   
				   else{ ?>   
                    </tr>
                    <tr>
                   No Records Found
                   <?php }?>
                   </tr>
                  </table>
                  
                              
                   </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
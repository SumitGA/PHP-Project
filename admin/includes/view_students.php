<?php 
//connection to the databse
require_once('../class/connection.class.php');
require_once('../class/user.class.php');

//create an object 
$students_list=new Users();

//call the function 
$students_list=$students_list->view_students_details('0');


?>




<div class="box-body table-responsive no-padding">


                  <table class="table table-hover">
                    <tr>
                      <th width="104">Students ID</th>
                      <th width="171">Students Name</th>
                      <th width="133">Registation Date</th>
                      <th width="148">Student_Status</th>
                      <th width="100">Email</th>
                      <th width="95">Edit</th>
                      <th width="218">Delete</th>
                    </tr>
                    <?php if($students_list >0 ){ 
  foreach($students_list as $key=>$value){ ?>
                    <tr>
                      <td><?php echo $value['user_id']; ?></td>
                      <td><?php echo $value['username']; ?></td>
                      <td><?php echo $value['registrationdate']; ?></td>
                      <td><span class="label label-success"><?php if($value['user_status']==1){echo "Active"; } else { ?></span><span class="label label-danger"><?php  echo "Inactive" ;} ?></span></td>
                      <td><?php echo $value['email']; ?></td>
                       <td><a href="index.php?menu=students&action=edit_students&id=<?php echo $value['user_id']; ?>">Edit</a></td>
                       <td><a href="index.php?menu=students&action=delete_students&id=<?php echo $value['user_id']; ?> "> Delete</a></td>

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
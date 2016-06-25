<?php 
//connection to the databse
require_once('../class/connection.class.php');
require_once('../class/admin.class.php');

//create an object 
$user_list=new Admin();

//call the function 
$user_list=$user_list->view_admin_detials();


?>




<div class="box-body table-responsive no-padding">


                  <table class="table table-hover">
                    <tr>
                      <th>Admins ID</th>
                      <th>Admins Name</th>
                      <th>Registation Date</th>
                      <th>Image </th>
                      <th>Admin_Status</th>
                      <th>Email</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                    <?php if($user_list >0 ){ 
  foreach($user_list as $key=>$value){ ?>
                    <tr>
                      <td><?php echo $value['admin_id']; ?></td>
                      <td><?php echo $value['user_name']; ?></td>
                      <td><?php echo $value['registration_date']; ?></td>
                      <td><img src="../uploads/admin_images/<?php echo $value['image_link']; ?>" height="100px"  width="100px"/></td>
                      <td><span class="label label-success"><?php if($value['user_status']==1){echo "Active"; } else { ?></span><span class="label label-danger"><?php  echo "Inactive" ;} ?></span></td>
                      <td><?php echo $value['email']; ?></td>
                       <td><a href="index.php?menu=admins&action=edit_admins&id=<?php echo $value['admin_id']; ?>">Edit</a></td>
                       <td><a href="index.php?menu=admins&action=delete_admin&id=<?php echo $value['admin_id']; ?> "> Delete</a></td>

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
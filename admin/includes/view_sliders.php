<?php 
//connection to the databse
require_once('../class/connection.class.php');
require_once('../class/slider.class.php');

//create an object 
$slider_list=new Slider();

//call the function 
$slider_list=$slider_list->view_sliders();
/*echo "</pre>";
print_r($slider_list);
echo "</pre>";*/


?>


<div class="box-body table-responsive no-padding">


                  <table class="table table-hover">
                    <tr>
                      <th>Slider_Id</th>
                      <th>Image</th>
                      <th>Slider_Title</th>
                      <th>Slider_Description</th>
                      <th>Slider_Status</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                 <?php if($slider_list >0)
				 {foreach($slider_list as $key=>$value){ ?>   
                    <tr>
                     
                      <td><?php echo $value['slider_id']; ?></td>
                      <td><img src="../uploads/sliders_images/<?php echo $value['image_link']; ?>" height=50px width="100px" /></td>
                      <td><?php echo $value['slider_title']; ?></td>
                      <td><?php if(strlen($value['slider_description'])>50){echo substr($value['slider_description'],0,50);}else{ echo $value['slider_description']; } ?></td>
                      <td><span class="label label-success"><?php if($value['slider_status']==1){echo "Active"; } else { ?></span><span class="label label-danger"><?php  echo "Inactive" ;} ?></span></td>
                    
                       <td><a href="index.php?menu=sliders&action=edit_sliders&id=<?php echo $value['slider_id']; ?>">Edit</a></td>
                       <td><a href="index.php?menu=sliders&action=delete_sliders&id=<?php echo $value['slider_id'];?>"> Delete</a></td>

               <?php }}else{?>
				   
				  
                    </tr>
                    <tr>
                   No Records Found
                
                   </tr>
                   <?php }?>
                  </table>
                  
                              
                   </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<?php 
//load the classes 
require_once('../class/connection.class.php');
require_once('../class/gallery.class.php');

//create the object
$objgallery=new Gallery();

//call the method
$objgallery=$objgallery->view_gallery();
/*echo "<pre>";
print_r($objgallery);
echo "</pre>";*/

?>
<div class="box-body table-responsive no-padding">


                  <table class="table table-hover">
                    <tr>
                    
                      <th>Image_Id</th>
                      <th>Image</th>
                      <th>Image_Status</th>
                      <th>Delete</th>
                    </tr>
                 <?php 
					 if($objgallery >0) 
					 {foreach($objgallery as $key=>$value){ ?>
                    <tr>
                     
                      <td><?php echo $value['image_id']; ?></td>
                      <td><img src="../uploads/gallery/<?php echo $value['image_link']; ?>" height="100px" width="100px" /></td>
                      
                      <td><span class="label label-success"><?php if($value['image_status']==1){echo "Active"; } else { ?></span><span class="label label-danger"><?php  echo "Inactive" ;} ?></span></td>
                    
                       <td><a href="index.php?menu=gallery&action=delete_images&id=<?php echo $value['image_id'];?>"> 
                       Delete</a></td>

               
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
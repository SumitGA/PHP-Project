<?php 
//load all the classes
require_once("../class/connection.class.php");
require_once("../class/notice.class.php");
//create an object 
$objnotice=new Notice();
//call the method
$objnotice=$objnotice->view_notices();
//display the values
/*echo "<pre>";
print_r($objnotice);
echo "</pre>";*/
?>

<table width="629" height="137" border="1">
  <tr>
    <th width="75" height="37" scope="col">Notice ID</th>
    <th width="52" scope="col">Notice Title</th>
    <th width="117" scope="col">Notice Description</th>
    <th width="61" scope="col"> Status</th>
    <th width="64" scope="col"> Date</th>
    <th width="80" scope="col">Image</th>
    <th width="61" scope="col">Edit</th>
    <th width="67" scope="col">Delete</th>
  </tr>
  <tr>
  <?php if($objnotice >0){
	  foreach($objnotice as $key=>$value){ ?>
    <td height="48"><?php echo $value['notice_id']; ?></td>
    <td><?php echo $value['notice_title']; ?></td>
    <td><?php if (strlen($value['notice_description'])>95){echo substr(($value['notice_description']),0,95); }else{ echo $value['notice_description']; }?></td>
    <td><span class="label label-success"><?php if($value['notice_status']==1){echo "Active"; } else { ?></span><span class="label label-danger"><?php  echo "Inactive" ;} ?></span></td>
    <td><?php echo $value['notice_date']; ?></td>
    <td><img src="../uploads/notice_images/<?php echo $value['image_link']; ?>" height="80px" width="80px"/></td>
    <td><a href="index.php?menu=notices&action=edit_notices&id=<?php echo $value['notice_id']; ?>">Edit</td>
    <td><a href="index.php?menu=notices&action=delete_notices&id=<?php echo $value['notice_id']; ?>">Delete</td>
  </tr>
  <tr>
  <?php }}else{?>
    <td height="42" colspan="8"><p>No Records are found</p></td>
  </tr>
  <?php }?>
</table>

<?php 
//load the classes
require_once("../class/connection.class.php");
require_once("../class/notice.class.php");
//get the id form the url 
$id=isset($_GET['id']) ? $_GET['id']:'';
//create an object 
$objnotice=new Notice();
//call the method
$objnotice->setNotice_id($id);
$objnotice=$objnotice->view_notices();
//display the result
/*echo "<pre>";
print_r($objnotice);
echo "</pre>";*/
?>



<h2>Edit Notices</h2>
<form action="process/process_edit_notices.php" method="post" enctype="multipart/form-data" name="form1">
  <table width="534" height="124" border="1">
    <tr>
    <?php if($objnotice > 0){
		foreach($objnotice as $key=>$value){ ?>
      <th height="26" scope="row">Notice Title</th>
      <td><label for="title"></label>
      <input type="text" name="title" id="title" value="<?php echo $value['notice_title']; ?>"></td>
    </tr>
    <tr>
      <th height="27" scope="row">Notice Description</th>
      <td><label for="description"></label>
      <textarea name="description" id="description" cols="45" rows="5"><?php echo $value['notice_description']; ?></textarea></td>
    </tr>
    <tr>
      <th height="30" scope="row">Image Upload</th>
      <td><label for="image"></label>
      <img src="../uploads/notice_images/<?php echo $value['image_link']; ?>" height="80px" width="80px" />
      <input type="file" name="image" id="image"></td>
    </tr>
    <tr>
    
      <th height="29" colspan="2" scope="row"><input type="hidden" name="id" id="id" value="<?php echo $value['notice_id']; ?>" />
        <input type="hidden" name="oldimage" id="oldimage" value="<?php echo $value['image_link']; ?>" />
<input type="submit" name="cmdsubmit" id="cmdsubmit" value="Edit Notice">
      <input type="reset" name="reset" id="reset" value="Reset"></th>
    </tr>
    <?php }}?>
  </table>
</form>

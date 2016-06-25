


<?php 

//connect to the database and load the classes
require_once('../functions/db_function.php');

//get the value form url
$id=isset($_GET['id']) ? $_GET['id'] : '';


//calling the functions for connecting the database
$link=connect();

//prepare the sql 
$sql="SELECT * from sliders WHERE slider_id='$id'";
//execute the sql
$res=mysqli_query($link,$sql) or trigger_error(mysqli_error($link));
//create the blank array
$slider_list=array();



//decisive paramater
$numRows = mysqli_num_rows($res);

//loop through the records 
if($numRows >0) {
	//there are records 
	while($row = mysqli_fetch_assoc($res)){
		array_push($slider_list,$row);
	} //loop ends
}//if ends
	





?>
<?php foreach($slider_list as $key=>$value){ ?>
<h1>Edit Slider</h1>
<form action="process/process_edit_slider.php" method="post" enctype="multipart/form-data" name="form1">
  <table width="540" height="119" border="1">
    <tr>
      <th height="29" scope="row">Choose Image</th>
      <td><label for="image"></label>
      <img src="../uploads/sliders_images/<?php echo $value['image_link']; ?>" height="100px" width="100px">
      <input type="file" name="image" id="image"></td>
    </tr>
    <tr>
      <th height="25" scope="row">Slider Title</th>
      <td><label for="slider_title"></label>
      <input type="text" name="slider_title" id="slider_title" value="<?php echo $value['slider_title']; ?>"></td>
    </tr>
    <tr>
      <th height="30" scope="row">Slider Description</th>
      <td><label for="slider_description"></label>
      <textarea name="slider_description" id="slider_description" cols="45" rows="5"><?php echo $value['slider_description']; ?></textarea></td>
    </tr>
    <tr>
      <th height="23" colspan="2" scope="row"><input type="hidden" name="oldimage" id="oldimage"value="<?php echo $value['image_link'];?>" />
        <input type="hidden" name="id" id="id" value="<?php echo $value['slider_id'];?>" >
        <input type="submit" name="cmdsubmit" id="cmdsubmit" value="Edit slider">
      <input type="reset" name="reset" id="reset" value="Reset"></th>
    </tr>
    <?php  } ?>
  </table>
  
</form>

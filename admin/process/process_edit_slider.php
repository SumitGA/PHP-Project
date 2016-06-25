<?php 
//load the classes
require_once('../../class/connection.class.php');
require_once('../../class/slider.class.php');
require_once('../../class/redirect.class.php');
//load the url paramater
$id=isset($_GET['id']) ? $_GET['id'] : '';
//create the object 
$objslider=new Slider();
//load the form values
$slider_title=$_POST['slider_title'];
$slider_description=$_POST['slider_description'];
$id=$_POST['id'];

//set the propertites
$objslider->setSlider_title($slider_title);
$objslider->setSlider_description($slider_description);
$objslider->setSlider_id($id);

if($_FILES['image']['name'] !=''){
	$flag = $objslider->edit_sliders('image',$_POST['oldimage']);
}else{

//call the function 
$flag = $objslider->edit_sliders();
}
if($flag==TRUE){
	new Redirect('../index.php?menu=sliders&action=view_sliders&success=The slider has been Modified');
}else{
	new Redirect('../index.php?menu=sliders&action=edit_sliders&error=The slider could not be modified');
}



?>
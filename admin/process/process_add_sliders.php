<?php 
//load the classes
require_once("../../class/connection.class.php");
require_once("../../class/slider.class.php");
require_once("../../class/redirect.class.php");




//create the objects
$objslider=new slider();

//load the form values
$slider_title=$_POST['slider_title'];



$slider_description=$_POST['slider_description'];

//set the propertites
$objslider->setSlider_title($slider_title);
$objslider->setSlider_description($slider_description);

//call the function 
$flag = $objslider->add_sliders('image');




if($flag==TRUE){
	new Redirect('../index.php?menu=sliders&action=view_sliders&success=The slider has been added');
}else{
	new Redirect('../index.php?menu=sliders&action=edit_sliders&error=The slider could not be added');
}


?>
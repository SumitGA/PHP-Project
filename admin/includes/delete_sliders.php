<?php 
//load the classes
require_once('../class/connection.class.php');
require_once('../class/slider.class.php');
require_once('../class/redirect.class.php');
//load the url paramater
$id=isset($_GET['id']) ? $_GET['id'] : '';

//create the object
$objslider=new Slider();
//call the function 
$flag=$objslider->delete_sliders($id);
if($flag == TRUE){
	
	
new Redirect('index.php?menu=sliders&action=view_sliders&success=The Slider has been removed');
}

else{
	
	new Redirect('index.php?menu=sliders&action=view_sliders&error=The Slider could not be removed');
	
}



?>
<?php 
session_start();
//load the classes 
require_once("../../class/connection.class.php");
require_once("../../class/gallery.class.php");
require_once("../../class/redirect.class.php");
//laod the url parameter

$id=$_SESSION['admin_id'];

//create object 
$objgallery=new Gallery();
$objgallery->setAdmin_id($id);
//call the function 
$flag=$objgallery->add_images('image');

if($flag = TRUE){
	new Redirect('../index.php?menu=gallery&action=add_images&success=The image has been added');
}else{
	new Redirect('../index.php?menu=gallery&action=add_images&error=The image could not be added');
}


?>
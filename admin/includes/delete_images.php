<?php 
//load the classes
require_once('../class/connection.class.php');
require_once('../class/gallery.class.php');
require_once('../class/redirect.class.php');
//get the image id
$id=isset($_GET['id']) ? $_GET['id'] : '';

//create an object
$objimage=new Gallery();

//call the method
$flag=$objimage->delete_images($id);
//redirect to the page
if($flag == TRUE){
	new Redirect('index.php?menu=gallery&action=view_images&success=The image has been deleted out of the gallery');
}else{
	new Redirect('index.php?menu=gallery&action=view_images&errors=The image could not be deleted out of the gallery');

}

?>
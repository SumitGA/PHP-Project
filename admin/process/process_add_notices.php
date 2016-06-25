<?php 
//load all the classes
require_once("../../class/connection.class.php");
require_once("../../class/notice.class.php");
require_once("../../class/redirect.class.php");
//create the objects
$objnotice=new Notice();

//load the form values
$title=$_POST['title'];
$description=$_POST['description'];
//set the properties
$objnotice->setNotice_title($title);
$objnotice->setNotice_description($description);

//call the method
$flag=$objnotice->add_notices('image');
//redirect to the appropriate page
if($flag==TRUE){
	new Redirect('../index.php?menu=notices&action=add_notices&success=The notice has been published');
}else{
	new Redirect('../index.php?menu=notices&action=add_notices&success=The notice could not be  published');
}

?>
<?php 
//load the class
require_once("../../class/connection.class.php");
require_once("../../class/notice.class.php");
require_once("../../class/redirect.class.php");
//get the id form url 
$id=isset($_GET['id']) ? $_GET['id'] : '';

//create an object
$objnotice=new Notice();

//load the form values 
$title=$_POST['title'];
$description=$_POST['description'];
$id=$_POST['id'];
//set the properties 
$objnotice->setNotice_id($id);
$objnotice->setNotice_title($title);
$objnotice->setNotice_description($description);
//call the method

if($_FILES['image']['name'] !=''){
	$flag = $objnotice->edit_notices('image',$_POST['oldimage']);
}else{

//call the function 
$flag = $objnotice->edit_notices();
}


if($flag==TRUE){
	new Redirect('../index.php?menu=notices&action=view_notices&success=The notice has been modified');
}else{
	new Redirect('../index.php?menu=notice&action=edit_notices&error=The notice could not be modified');
}

//redirect to the appropriate page


?>
<?php


//connect to the database
require_once('../class/connection.class.php');

 
require_once('../class/user.class.php');
require_once('../class/redirect.class.php');

//obtain the url paramater
$id=isset($_GET['id']) ? $_GET['id'] : '';

//create the object
$objuser=new Users();
$flag=$objuser->delete_teacher($id);



if($flag == TRUE){
	
	
new Redirect('index.php?menu=teachers&action=view_teachers&success=The Teacher has been removed');
}

else{
	
	new Redirect('index.php?menu=admins&action=view_teachers&error=The Teacher could not be removed');
	
}


?>
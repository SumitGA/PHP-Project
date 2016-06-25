<?php


//connect to the database
require_once('../class/connection.class.php');

 
require_once('../class/user.class.php');
require_once('../class/redirect.class.php');

//obtain the url paramater
$id=isset($_GET['id']) ? $_GET['id'] : '';

//create the object
$objstudent=new Users();
$flag=$objstudent->delete_students($id);



if($flag == TRUE){
	
	
new Redirect('index.php?menu=students&action=view_students&success=The Student has been removed');
}

else{
	
	new Redirect('index.php?menu=students&action=view_students&error=The Student could not be removed');
	
}


?>
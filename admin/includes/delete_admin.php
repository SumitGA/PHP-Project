<?php


//connect to the database
require_once('../class/connection.class.php');

 
require_once('../class/admin.class.php');
require_once('../class/redirect.class.php');

//obtain the url paramater
$id=isset($_GET['id']) ? $_GET['id'] : '';

//create the object
$objuser=new Admin();
$flag=$objuser->delete_admin($id);
echo "$flag";
exit;



if($flag == TRUE){
	
	
new Redirect('index.php?menu=admins&action=view_admin&success=The Admin User has been removed');
}

else{
	
	new Redirect('index.php?menu=admins&action=view_admin&error=The Admin User could not be removed');
	
}


?>
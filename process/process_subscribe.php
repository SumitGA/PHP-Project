<?php
//load the class
require_once("../functions/db_connect.php");
require_once("../class/redirect.class.php");
//load the form value
$email=$_POST['email'];
//prepare the sql 
$sql="INSERT INTO email_subscriber(email) values('$email')";
//execute the sql 
$res=mysqli_query($conxn,$sql) or trigger_error(mysqli_error($conxn));
//decisive paramater
//decisive parameter
			$affRows=mysqli_affected_rows($conxn);
			
//decide true or false
			
if($affRows >0){
	new Redirect("../index.php?success=The subscription has been received you will be processed shortly ");
}else{
	new Redirect("../index.php?error=The subscription could no be made please try again later");
}
			
		
	



?>
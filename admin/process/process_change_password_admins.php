<?php 
session_start();
require_once('../../functions/db_function.php');
require_once('../../functions/user_functions.php');

/////load the form values
$oldpass = sha1($_POST['oldpass']);
$newpass = sha1($_POST['newpass']);
$cpass  = sha1($_POST['cpass']);
////get the url values
$id = $_SESSION['admin_id'];

$flag=change_password($oldpass,$newpass,$id);

if($flag==TRUE ){
	
	redirect('../logout.php?menu=admins&action=change_password&success=The passwod was updated successfully');
}else{
	redirect('../index.php?menu=admins&action=change_password&error=The passwod could not be changed');}
	


?>